<?php
    Class Tree{
        private $new_node_prefix;

        function __construct($new_node_prefix, $main){
            $this->new_node_prefix = $new_node_prefix;
            $this->main = $main;
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
                    `structure`.`pid` = '".$id."' &&
                    `structure_data`.`part` = '".$part."' &&
                    `structure`.`id` = `structure_data`.`id`
            ";

            if(mysql_num_rows(mysql_query($query)) > 0){
                return false;
            }else{
                return true;
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

            return $path;
        }

        //Returns a branch array
        private function getChildrens($id){
            
            $query = "
                SELECT
                    `id`
                FROM
                    `structure`
                WHERE
                    `pid` = '".$id."'
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
                    `id` = '".$id."'
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
                    ('".$pid."')
            ";
            mysql_query($query);
            

            $id = mysql_insert_id();

            $query = "
                INSERT INTO `structure_data`
                    (`id`)
                VALUES
                    ('".$id."')
            ";
            mysql_query($query);
            

            $part = $this->checkPart($id, $id);
            $path = $this->getNodePath($id, '', $part);

            $query = "
                UPDATE
                    `structure_data`
                SET
                    `part` = '".$part."',
                    `path` = '".$path."',
                    `name` = '".$this->new_node_prefix." ".$id."'
                WHERE
                    `id` = '".$id."'";
            mysql_query($query);
            

            return $id;
        }

        //Moves a branch to the specified parent
        public function moveBranch($id, $pid){
            
            $query = "
                SELECT
                    `structure_data`.`part` AS `part`,
                    `structure`.`pid` AS `pid`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = '".$id."' &&
                    `structure`.`id` = `structure_data`.`id`
            ";
            $result = mysql_fetch_assoc(mysql_query($query));
            

            if($result['pid'] != $pid){
                $part = $this->checkPart($pid, $result['part'], true);

                $query = "
                    UPDATE
                        `structure`
                    SET
                        `pid` = '".$pid."'
                    WHERE
                        `id` = '".$id."'
                ";
                mysql_query($query);
                

                $query = "
                    UPDATE
                        `structure_data`
                    SET
                        `part` = '".$part."'
                    WHERE
                        `id` = '".$id."'
                ";
                mysql_query($query);
                

                $this->setPath($id);
                $this->setPathR($id);
            };
        }

        //Updates a node data
        public function updateNode($id, $data){
            
            $dataline = '';
            $partupdate = false;

            foreach($data as $key => $value){
                if($key == 'part'){
                    $partupdate = true;
                    $dataline .= " `".$key."` = '".$this->checkPart($id, $value)."',";
                }else{
                    $dataline .= " `".$key."` = '".$value."',";
                };
            };

            $dataline = substr($dataline, 0, strlen($dataline)-1).' ';

            $query = "
                UPDATE
                    `structure_data`
                SET
                    ".$dataline."
                WHERE
                    `id` = '".$id."'
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
                    `id` = '".$id."'
            ";
            mysql_query($query);
            

            $query = "
                DELETE FROM
                    `structure_data`
                WHERE
                    `id` = '".$id."'
            ";
            mysql_query($query);
            
        }

        //Returns array of specified branch
        public function getBranchArray($id = 1){
            
            $query = "
                SELECT
                    `structure`.`id`,
                    `structure_data`.`ord`,
                    `structure_data`.`name`,
                    `structure_data`.`path`,
                    `structure_data`.`publish`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = '".$id."' &&
                    `structure`.`id` = `structure_data`.`id`
                ORDER BY
                    `structure_data`.`ord` ASC
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
                    `structure_data`.`ord`,
                    `structure_data`.`name`,
                    `structure_data`.`path`,
                    `structure_data`.`publish`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = '".$id."' &&
                    `structure`.`id` = `structure_data`.`id`
                ORDER BY
                    `structure_data`.`ord` ASC
            ";
            $result = mysql_query($query);
            

            $array = array();

            if(mysql_num_rows($result) > 0){
                $html = '<ul>';
            };

            while($row = mysql_fetch_assoc($result)){
                if($row['publish'] == 1){
                    $class = ' active';
                }else{
                    $class = ' hided';
                };

                $html .= '<li id="item_'.$row['id'].'" class="tree_item'.$class.'">';
                $html .= '<div class="item_container"><span class="item_container_inner">';
                $html .= '<a title="'.$this->main->getText('structure', 'physical_path').': '.$row['path'].'" href="/admin/?option=structure&suboption=edit&id='.$row['id'].'">'.$row['name'].'</a>';
                $html .= '</span></div>';
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
    }
?>