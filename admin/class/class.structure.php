<?php
	class Structure{
        private $new_node_prefix;

		function __construct($main){
			$this->main = $main;
            $this->new_node_prefix = $this->main->getText('structure', 'item_name');
            $this->root_node_name = $this->main->getText('structure', 'root_name');
            //$this->resetStructure();
            //$this->createRandomStructure(50);
		}

        //Create ramdom structure
        private function createRandomStructure($leafs){
            $this->resetStructure();

            $this->insertNode(1);

            $i = 0;
            while($i < $leafs){
                $i++;

                $result = $this->main->db->getRandomItems('structure', 1, array('id'));

                $this->insertNode($result[0]['id']);
            };
        }

        //Reset structure
        private function resetStructure(){
            $query = "TRUNCATE TABLE `structure`";
            mysql_query($query);

            $query = "TRUNCATE TABLE `structure_data`";
            mysql_query($query);

            $this->insertNode(0);
            $this->updateNode(1, array(array('path' => '/', 'part' => '')));
        }

        //Check for path part existance linear
        private function checkSamePart($id, $part){
            $query = "
                SELECT
                    `structure_data`.`part`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = `structure_data`.`id` &&
                    `structure`.`pid` = '".$id."' &&
                    `structure_data`.`part` = '".$part."'
            ";

            if(mysql_num_rows(mysql_query($query)) > 0){
                return false;
            }else{
                return true;
            };
        }

        //Check for path part existance linear by AJAX
        public function checkPartAJAX($id, $pid, $part){
             $query = "
                SELECT
                    `structure_data`.`part`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = '".$pid."' &&
                    `structure`.`id` NOT IN ('".$id."') &&
                    `structure_data`.`part` = '".$part."' &&
                    `structure`.`id` = `structure_data`.`id`
            ";

            if(mysql_num_rows(mysql_query($query)) > 0){
                return 'false';
            }else{
                return 'true';
            };
        }

        //Check for path part existance special
        private function checkPart($id, $part, $mode = false){
            if(!$mode){
                $query = "
                    SELECT
                        `structure`.`pid`,
                        `structure_data`.`part`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`id` = '".$id."' &&
                        `structure`.`id` = `structure_data`.`id`
                ";
                $result = mysql_fetch_assoc(mysql_query($query));

                $query = "
                    SELECT
                        `structure_data`.`part`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`pid` = '".$result['pid']."' &&
                        `structure_data`.`part` = '".$part."' &&
                        `structure`.`id` NOT IN ('".$id."') &&
                        `structure`.`id` = `structure_data`.`id`
                ";
            }else{
                $query = "
                    SELECT
                        `structure_data`.`part`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`pid` = '".$id."' &&
                        `structure_data`.`part` = '".$part."' &&
                        `structure`.`id` = `structure_data`.`id`
                ";
            };

            if(mysql_num_rows(mysql_query($query)) > 0){
                $newpart = $part.'_'.rand();

                while(!$this->checkSamePart($id, $newpart)){
                    $newpart = $part.'_'.rand();
                };

                return $newpart;
            }else{
                return $part;
            };
        }

        //Returns a full node path
        private function getNodePath($id, $path = false, $part = false){
            $query = "
                SELECT
                    `structure`.`pid`,
                    `structure_data`.`part`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = '".$id."' &&
                    `structure`.`id` = `structure_data`.`id`
            ";
            $result = mysql_fetch_assoc(mysql_query($query));


            if($result['pid'] > 1){
                $path .= $this->getNodePath($result['pid'], $path);
            }else{
                $path .= '/';
            };

            if($part){
                $path .= $part.'/';
            }else{
                $path .= $result['part'].'/';
            };

            return Utilities::removePathDoubleSlashes($path);
        }

        //Returns a branch array
        private function getChildrens($id){
            $query = "
                SELECT
                    `id`
                FROM
                    `structure`
                WHERE
                    `pid` = ".$id."
            ";
            $result = mysql_query($query);


            $array = array();

            while($row = mysql_fetch_assoc($result)){
                array_push($array, array(
                        'node' => $row,
                        'childrens' => $this->getChildrens($row['id'])
                    )
                );
            }

            return $array;
        }

        //Set path to the branch
        private function setPath($id){
            $query = "
                UPDATE
                    `structure_data`
                SET
                    `path` = '".$this->getNodePath($id)."'
                WHERE
                    `id` = ".$id."
            ";
            mysql_query($query);
        }

        //Set full path to the branch and all it's childrens
        private function setPathR($id){
            $branch = $this->getChildrens($id);

            if(!empty($branch)){
                foreach($branch as $item){
                    $this->setPath($item['node']['id']);
                    $this->setPathR($item['node']['id']);
                };
            };
        }

        //Creates a node in the tree, with specified parent
        public function insertNode($pid = 1){
            $query = "
                INSERT INTO `structure`
                    (`pid`)
                VALUES
                    ('" . $pid . "')
            ";
            mysql_query($query);

            $id = mysql_insert_id();

            $query = "
                INSERT INTO `structure_data`
                    (`id`, `pid`)
                VALUES
                    (" . intval($id) . ", " . intval($pid) . ")
            ";

            mysql_query($query);

            $part = $this->checkPart($id, $id);
            $path = $this->getNodePath($id, '', $part);

            if($id > 1 && $pid >= 1){
                $new_item_name = $this->new_node_prefix." ".$id;
            }else{
                $new_item_name = $this->root_node_name;
            };

            //Get all neighbours
            $query = "
                SELECT `sort`, `id`
                FROM `structure_data`
                WHERE `pid` = ". intval($pid) ." && `id` != " . intval($id) . "
                ORDER BY `sort` ASC
            ";

            $result = mysql_query($query);

            $sort = 1;

            while($row = mysql_fetch_assoc($result)){
                $sort += 1;

                $query = "UPDATE `structure_data` SET `sort` = " . intval($sort) . " WHERE `id` = " . intval($row['id']);

                mysql_query($query);
            }

            $query = "
                UPDATE
                    `structure_data`
                SET
                    `part` = '".$part."',
                    `path` = '".$path."',
                    `name` = '".$new_item_name."',
                    `sort` = 1
                WHERE
                    `id` = ".$id;

            mysql_query($query);

            return $id;
        }

        //Moves a branch to the specified parent
        public function moveBranch($id, $pid){
            if($id != $pid){
                $query = "
                    SELECT
                        `structure_data`.`part` AS `part`,
                        `structure`.`pid` AS `pid`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`id` = ".$id." &&
                        `structure`.`id` = `structure_data`.`id`
                ";
                $result = mysql_fetch_assoc(mysql_query($query));


                if($result['pid'] != $pid){
                    $part = $this->checkPart($pid, $result['part'], true);

                    $query = "
                        UPDATE
                            `structure`
                        SET
                            `pid` = ".$pid."
                        WHERE
                            `id` = ".$id."
                    ";
                    mysql_query($query);

                    $query = "
                        UPDATE
                            `structure_data`
                        SET
                            `pid` = ".$pid."
                        WHERE
                            `id` = ".$id."
                    ";
                    mysql_query($query);


                    $query = "
                        UPDATE
                            `structure_data`
                        SET
                            `part` = '".$part."'
                        WHERE
                            `id` = ".$id."
                    ";
                    mysql_query($query);

                    $this->setPath($id);
                    $this->setPathR($id);
                };
            };
        }

        //Updates a node data
        public function updateNode($id, $data){
            $dataline = '';
            $partupdate = false;

            $dataline .= '`just_created` = 0, ';

            for($i=0, $l=count($data); $i<$l; $i++){
                foreach($data[$i] as $key => $value){
                    if($key == 'part'){
                        $partupdate = true;
                        $dataline .= " `".$key."` = '".$this->checkPart($id, $value)."',";
                    }elseif($key != 'id' && $key != 'pid'){
                        $dataline .= " `".$key."` = '".$value."',";
                    };
                };
            };

            $dataline = substr($dataline, 0, strlen($dataline)-1).' ';

            $query = "
                UPDATE
                    `structure_data`
                SET
                    ".$dataline."
                WHERE
                    `id` = ".$id."
            ";
            mysql_query($query);


            if($partupdate){
                $this->setPath($id);
                $this->setPathR($id);
            };
        }

        //Deletes a node and all it's childrens
        public function deleteNode($id){
            $branch = $this->getChildrens($id);

            if(!empty($branch)){
                foreach($branch as $item){
                    $this->deleteNode($item['node']['id']);
                };
            };

            $query = "
                DELETE FROM
                    `structure`
                WHERE
                    `id` = ".$id."
            ";
            mysql_query($query);


            $query = "
                DELETE FROM
                    `structure_data`
                WHERE
                    `id` = ".$id."
            ";
            mysql_query($query);

        }

        //Returns array of specified branch
        public function getBranchArray($id = 1){

            $query = "
                SELECT
                    `structure`.`id`,
                    `structure_data`.`sort`,
                    `structure_data`.`name`,
                    `structure_data`.`path`,
                    `structure_data`.`publish`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = ".$id." &&
                    `structure`.`id` = `structure_data`.`id`
                ORDER BY
                    `structure_data`.`sort` ASC
            ";
            $result = mysql_query($query);


            $array = array();

            while($row = mysql_fetch_assoc($result)){
                array_push($array, array(
                        'node' => $row,
                        'childrens' => $this->getBranch($row['id'])
                    )
                );
            }

            return $array;
        }

        //Returns rendered HTML tree of specified branch
        public function getRenderedBranch($id = 1, $root = true){
            $query = "
                SELECT
                    `structure`.`id`,
                    `structure`.`pid`,
                    `structure_data`.`sort`,
                    `structure_data`.`name`,
                    `structure_data`.`path`,
                    `structure_data`.`publish`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = ".$id." &&
                    `structure`.`id` = `structure_data`.`id`
                ORDER BY
                    `structure_data`.`sort` ASC
            ";
            $result = mysql_query($query);
            $array = array();
            $html = '';

            if(mysql_num_rows($result) > 0){
                $html .= '<ul>';
            };

            while($row = mysql_fetch_assoc($result)){
                if($row['publish'] == 1){
                    $class = ' active';
                }else{
                    $class = ' hided';
                };

                $html .= '<li id="item_'.$row['id'].'" class="tree_item'.$class.'" data-url="'.$row['path'].'">';
                $html .= '<div class="item_container"><div class="item_container_inner">';
                $html .= '<a href="/admin/?option=structure&suboption=edit&id='.$row['id'].'">'.$row['name'].'</a>';
                $html .= '</div></div>';
                if($root){
                    $html .= $this->getRenderedBranch($row['id']);
                };
                $html .= '</li>';
            };

            if(mysql_num_rows($result) > 0){
                $html .= '</ul>';
            };

            return $html;
        }

        //Returns item data
		public function getItemData($id){
			$sql = mysql_query("
			    SELECT
			        `structure`.`id` AS `id`,
			        `structure`.`pid`,
			        `structure_data`.`name`,
			        `structure_data`.`part`,
			        `structure_data`.`path`,
			        `structure_data`.`sort`,
			        `structure_data`.`title`,
			        `structure_data`.`menu`,
			        `structure_data`.`mode`,
			        `structure_data`.`private`,
			        `structure_data`.`template`,
			        `structure_data`.`description`,
			        `structure_data`.`keywords`,
			        `structure_data`.`publish`,
                    `structure_data`.`content_id`,
                    `structure_data`.`just_created`
			    FROM
			        `structure`,
			        `structure_data`
			    WHERE
			        `structure`.`id` = ".$id." &&
			        `structure_data`.`id` = ".$id."
			");

            if($sql){
			    $result = mysql_fetch_assoc($sql);
            };

			$this->main->item_data = $result;

			return $result;
		}


        public function dublicateNode($id){
            $data = $this->getItemData($id);

            $new_id = $this->insertNode($data['pid']);

            $new_data = array();

            foreach($data as $key => $val){
                if($key != 'id' || $key != 'path'){
                    $new_data[] = array($key => $val);
                }

                if($key == 'name'){
                    $new_data[] = array($key => $val . ' – копия');
                }

                if($key == 'sort'){
                    $new_data[] = array($key => intval($val) + 1);
                }
            }

            $this->updateNode($new_id, $new_data);
        }


        //Return a breadcrumbs
        public function getBreadCrumbs($id){
            $query = "
                SELECT
                    `structure`.`pid`               AS `pid`,
                    `structure_data`.`id`           AS `id`,
                    `structure_data`.`name`         AS `name`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = `structure_data`.`id` &&
                    `structure`.`id` = ";

            $result = mysql_fetch_assoc(mysql_query($query.intval($id)));

            $breadcrumbs = array();
            $result['current'] = true;
            array_push($breadcrumbs, $result);

            $pid = $result['pid'];

            while($pid > 0){
                $result = mysql_fetch_assoc(mysql_query($query.intval($pid)));
                array_push($breadcrumbs, $result);
                $pid = $result['pid'];
            };

            return array_reverse($breadcrumbs);
        }

        //Return a tree items count
		public function getTreeCount(){
			$sql = mysql_query("
                SELECT
                    count(*) AS `count`
                FROM
                    `structure`
            ");

            $result = mysql_fetch_row($sql);
			return $result[0];
		}

        //Operate items
		public function operateNode($id, $mode, $parent = false, $data = false){
		    $id = DB::quote($id);

			if($mode == 'publish'){
				$this->updateNode($id, array(array(
					'publish' => '1'
				)));
			};

			if($mode == 'hide'){
				$this->updateNode($id, array(array(
					'publish' => '0'
				)));
			};


            if($mode == 'dublicate'){
                $this->dublicateNode($id);
            };


            if($mode == 'delete'){
				$this->deleteNode($id);
			};

			if($mode == 'addchild'){
				$this->insertNode($id);
			};

			if($mode == 'move'){
				$this->moveBranch($id, $parent);
			};

            if(($mode == 'up' || $mode == 'down') && $data){
				$this->orderNode($id, $data);
			};
		}

        //Returns specified node data col
        public function getNodeData($id, $col){
            $sql = mysql_query("
			    SELECT
			        `".DB::quote($col)."`
			    FROM
			        `structure_data`
			    WHERE
			        `id` = ".intval($id)."
			");

			$result = mysql_fetch_row($sql);
			return $result[0];
        }

        //Set order to the node
        public function orderNode($id, $order_params){
            $order = explode(';', $order_params);

            foreach($order as $item){
                $order_item = explode('=', $item);
                $this->updateNode($order_item[0], array(array(
					'sort' => $order_item[1]
				)));
            };
        }
	};
?>