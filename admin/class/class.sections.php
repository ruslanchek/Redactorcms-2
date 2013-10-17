<?php
//TODO : Сделать разделение разделов тегов и отдельный модуль для их редактирования

class Sections
{
    public $content_list_where_statement = "";
    public $per_page = 10;

    public $table = 'sections';
    public $datasets_table = 'datasets';

    public $list_mysql_fieldset = array(
        'id', 'name', 'color'
    );

    public $item_mysql_fieldset = array(
        'id', 'name'
    );

    function __construct($main, $login)
    {
        //Vars
        $this->main = & $main;
        $this->login = & $login;
    }

    //Returns item data
    public function getItemData($id)
    {
        $sql = mysql_query("
            	SELECT " . $this->main->getMySqlFieldset($this->item_mysql_fieldset) . "
            	FROM `" . $this->table . "`
            	WHERE `id` = " . intval($id) . "
            ");

        $result = mysql_fetch_assoc($sql);
        $this->main->item_data = $result;

        return $result;
    }

    //Returns fieldset array from dataset
    public function getEditorFieldsList($id)
    {
        $query = "
            	SELECT * FROM `" . $this->datasets_table . "`
            	WHERE `section_id` = " . $id . "
            	ORDER BY `sort` ASC
            ";
        $sql = mysql_query($query);

        while ($req = mysql_fetch_assoc($sql)) {
            $rows[] = $req;
        };

        return $rows;
    }

    //Returns list array
    public function getList()
    {
        $query = "
            	SELECT " . $this->main->getMySqlFieldset($this->list_mysql_fieldset) . "
            	FROM `" . $this->table . "`
            	ORDER BY `sort` ASC
            ";

        $sql = mysql_query($query);

        $rows = array();

        while ($req = mysql_fetch_assoc($sql)) {
            $rows[] = $req;
        };

        if (!empty($rows)) {
            return $rows;
        };
    }

    //Returns an array with dataset items for list table
    public function getContentListCols()
    {
        $query = "
            	SELECT
            		`id`,
            		`type`,
            		`label`,
            		`options_custom`,
            		`options_table`,
            		`options_source`,
            		`embed`,
            		`prefix`,
            		`suffix`,
            		`mode`
            	FROM
            	    `" . $this->datasets_table . "`
            	WHERE
            		`list` = 1 &&
            		`section_id` = " . $this->main->item_data['id'] . "
            	ORDER BY `sort` ASC
            ";

        $sql = mysql_query($query);

        while ($req = mysql_fetch_assoc($sql)) {
            if ($req['embed'] != '1') {
                $rows[] = array(
                    'name' => $req['label'],
                    'col_name' => 'col_' . $req['id'],
                    'type' => $req['type'],
                    'options_custom' => $req['options_custom'],
                    'options_table' => $req['options_table'],
                    'options_source' => $req['options_source'],
                    'prefix' => $req['prefix'],
                    'suffix' => $req['suffix'],
                    'mode' => $req['mode']
                );
            };
        };

        return $rows;
    }

    //Returns a colset from dataset
    public function getListColnames()
    {
        $query = "
            	SELECT
            		`id`,
            		`embed`
            	FROM
            	    `" . $this->datasets_table . "`
            	WHERE
                    `list` = '1' &&
                    `section_id` = '" . $this->main->item_data['id'] . "'
            ";

        $sql = mysql_query($query);

        //Add some static cols
        $rows[] = 'id';
        $rows[] = 'publish';
        $rows[] = 'name';
        $rows[] = 'sort';

        while ($req = mysql_fetch_assoc($sql)) {
            if ($req['embed'] != '1') {
                $rows[] = 'col_' . $req['id'];
            };
        };

        return $rows;
    }

    //Set per page to pager
    public function setPerPage($value)
    {
        setcookie('sections_list_per_page_limit', $value, time() + 3600 * 24 * 365, '/admin/');
        $this->per_page = $value;
    }

    //Returns content list array
    public function getContentListRows()
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        $colnames = $this->getListColnames();

        $counter_query = "
                SELECT
                    count(*) AS `count`
                FROM
                    `" . $section_list_table_name . "`
                " . $this->content_list_where_statement;

        $counter_result = mysql_fetch_row(mysql_query($counter_query));
        $limit = $this->main->getLimitsForList($counter_result[0], $this->per_page);

        $query = "
            	SELECT
            	    " . $this->main->getMySqlFieldset($colnames) . "
            	FROM
            	    `" . $section_list_table_name . "`
                " . $this->content_list_where_statement . $this->main->getSortingParams() . "
            	LIMIT " . $limit[0] . ", " . $limit[1];

        $sql = mysql_query($query);

        while ($req = mysql_fetch_assoc($sql)) {
            $rows[] = $req;
        };

        return $rows;
    }

    //Returns true if '1' given
    private function parseDatasetParam($param)
    {
        if ($param == '1') {
            return true;
        } else {
            return false;
        };
    }

    //Returns prepared dataset item
    private function prepareDatesetItem($req, $values)
    {
        if ($req['embed'] == '1') {
            $result['name'] = $req['embed_name'];

            if (isset($values[$req['embed_name']])) {
                $result['value'] = $values[$req['embed_name']];
            };

            if ($result['name'] == 'name') {
                $result['default'] = $values[$req['embed_name']];
            } else {
                $result['default'] = $req['default'];
            };
        } else {
            $result['name'] = 'col_' . $req['id'];
            $result['value'] = $values['col_' . $req['id']];
            $result['default'] = $req['default'];
        };

        $result['type'] = $req['type'];
        $result['label'] = $req['label'];
        $result['help'] = $req['description'];
        $result['rows'] = $req['rows'];
        $result['folder'] = $req['folder'];
        $result['thumbs'] = $req['thumbs'];
        $result['prefix'] = $req['prefix'];
        $result['suffix'] = $req['suffix'];
        $result['mode'] = $req['mode'];
        $result['min'] = $req['min'];
        $result['max'] = $req['max'];
        $result['interval'] = $req['interval'];

        if ($req['extensions']) {
            $result['extensions'] = $this->main->parseCustomOptions($req['extensions']);
        };

        if ($req['options_source'] == '1') {
            $result['options'] = $this->main->parseOptionsFromTable($req['options_table']);
        } else {
            $result['options'] = $this->main->parseCustomOptions($req['options_custom']);
        };

        $result['required'] = $this->parseDatasetParam($req['required']);
        $result['unique'] = $this->parseDatasetParam($req['unique']);
        $result['use_editor'] = $this->parseDatasetParam($req['use_editor']);
        $result['randomize'] = $this->parseDatasetParam($req['randomize']);
        $result['email'] = $this->parseDatasetParam($req['email']);
        $result['number'] = $this->parseDatasetParam($req['number']);

        return $result;
    }

    //Returns a content item default values
    private function getContentItemDefaultValues($section_id)
    {
        $query = "
            	SELECT
            		`id`,
            		`default`,
            		`type`
                FROM
                    `" . $this->datasets_table . "`
            	WHERE
            		`section_id` = " . intval($section_id) . " &&
            		`default` != '' &&
            		`embed` != 1
            ";

        $sql = mysql_query($query);

        while ($req = mysql_fetch_assoc($sql)) {
            if ($req['type'] == 'calendar') {
                $req['default'] = date('Y-m-d H:i') . ':00';
                $rows[] = $req;
            } else {
                $rows[] = $req;
            };
        };

        return $rows;
    }

    //Returns a content item random values
    private function getContentItemRandomValues($section_id)
    {
        $query = "
            	SELECT
            		`id` FROM `" . $this->datasets_table . "`
            	WHERE
            		(`section_id` = " . $section_id . ") &&
            		(`randomize` = 1) &&
            		(`embed` != 1)
            ";
        $sql = mysql_query($query);

        while ($req = mysql_fetch_assoc($sql)) {
            $rows[] = $req;
        };

        return $rows;
    }

    //Creates a new content item
    function createContentItem($section_id)
    {
        $result = mysql_fetch_row(mysql_query("SELECT max(`sort`) FROM `section_" . $section_id . "`"));

        $min_sort = $result[0] + 1;

        //Insert new section item
        $query = "
                INSERT INTO `section_" . $section_id . "` (
                    `name`,
                    `sort`,
                    `creator_id`,
                    `changer_id`,
                    `creation_date`,
                    `change_date`,
                    `publish`
                ) VALUES (
                    '',
                    '" . $min_sort . "',
                    " . intval($this->login->userdata['id']) . ",
                    " . intval($this->login->userdata['id']) . ",
                    NOW(),
                    NOW(),
                    1
            )";

        mysql_query($query);

        $new_id = mysql_insert_id();

        if($_GET['structure_link_id'] && $_GET['structure_link_col_id']){
            $query = "
                UPDATE
                    `structure_data`
                SET
                    `" . DB::quote($_GET['structure_link_col_id']) . "` = " . intval($new_id) . "
                WHERE
                    `structure_data`.`id` = " . intval($_GET['structure_link_id']) . "
                ";

            mysql_query($query);
        }

        //Set defaults to the new item
        $content_item_defaults = $this->getContentItemDefaultValues($section_id);

        if (!empty($content_item_defaults)) {
            $query = "UPDATE `section_" . $section_id . "` SET";

            foreach ($content_item_defaults as $item) {
                $query .= " `col_" . $item['id'] . "` = '" . $item['default'] . "',";
            };

            $query = substr($query, 0, strlen($query) - 1);
            $query .= " WHERE `id` = '" . $new_id . "'";

            mysql_query($query);
        };

        //Set random values to the new item
        $content_item_randoms = $this->getContentItemRandomValues($section_id);

        if (!empty($content_item_randoms)) {
            $query = "UPDATE `section_" . $section_id . "` SET";

            foreach ($content_item_randoms as $item) {
                $query .= " `col_" . $item['id'] . "` = '" . Utilities::getRandomColor() . "',";
            };

            $query = substr($query, 0, strlen($query) - 1);
            $query .= " WHERE `id` = '" . $new_id . "'";

            mysql_query($query);
        };

        $query = "
                UPDATE `section_" . $section_id . "`
                SET `name` = '" . $this->main->getText('sections', 'new_content_item_suffix') . " " . $new_id . "'
                WHERE `id` = '" . $new_id . "'
            ";

        mysql_query($query);

        return $new_id;
    }

    //Returns content list item data
    public function getContentItemData($id, $item)
    {
        $query = "
                SELECT * FROM `section_" . $id . "`
                WHERE `id` = '" . $item . "'
            ";

        $sql = mysql_query($query);

        if ($sql) {
            $values = mysql_fetch_assoc($sql);
        };

        $query = "
                SELECT * FROM `" . $this->datasets_table . "`
                WHERE `section_id` = " . $id . "
                ORDER BY `sort` ASC
            ";

        $sql = mysql_query($query);

        $rows['params']['enctype'] = 'application/x-www-form-urlencoded';
        $rows['params']['method'] = 'POST';
        $rows['params']['validate'] = true;
        $rows['params']['table'] = 'section_' . $id;
        $rows['params']['item_params'] = $values;

        while ($req = mysql_fetch_assoc($sql)) {
            $rows['data'][] = $this->prepareDatesetItem($req, $values);
        };

        return $rows;
    }

    //Prepares variables for content list
    public function prepareContentListData()
    {
        $this->main->list_items = $this->getContentListCols();
        $this->main->content_list = $this->getContentListRows();
    }

    //Moves content list row up or down
    public function upndownContentListRow($row_id, $target_id, $row_value, $target_value)
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        mysql_query("
        		UPDATE `" . $section_list_table_name . "`
        		SET `sort` = " . $row_value . "
        		WHERE `id` = " . $row_id . "
        	");

        mysql_query("
        		UPDATE `" . $section_list_table_name . "`
        		SET `sort` = " . $target_value . "
        		WHERE `id` = " . $target_id . "
        	");

        return true;
    }

    //Copy list row
    public function copyContentListRow($id)
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        $query = "CREATE TEMPORARY TABLE `temp_table` AS SELECT * FROM `" . $section_list_table_name . "` WHERE id = " . intval($id);
        mysql_query($query);

        $result = mysql_fetch_row(mysql_query("SELECT id FROM `" . $section_list_table_name . "` WHERE `id`=(SELECT max(`id`) FROM `" . $section_list_table_name . "`)"));
        $maxid = $result[0] + 1;

        $query = "SELECT `name` FROM `" . $section_list_table_name . "` WHERE `id`= " . intval($id);
        $result = mysql_fetch_row(mysql_query($query));

        $name = $result[0] . " (копия)";

        $query = "UPDATE temp_table SET id = " . intval($maxid) . ", name = '" . $name . "' WHERE id = " . intval($id);
        mysql_query($query);

        $query = "INSERT INTO `" . $section_list_table_name . "` SELECT * FROM temp_table";
        mysql_query($query);

        $query = "DROP TEMPORARY TABLE temp_table";
        mysql_query($query);

        return $maxid;
    }

    //Deletes a content list row
    public function deleteContentListRow($id)
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        mysql_query("
        		DELETE FROM `" . $section_list_table_name . "`
        		WHERE `id` = " . $id . "
        	");

        return true;
    }

    //Hides a content list row
    public function hideContentListRow($id)
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        mysql_query("
        		UPDATE `" . $section_list_table_name . "`
        		SET `publish` = 0
        		WHERE `id` = " . $id . "
        	");

        return true;
    }

    //Shows a content list row
    public function showContentListRow($id)
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        mysql_query("
        		UPDATE `" . $section_list_table_name . "`
        		SET `publish` = 1
        		WHERE `id` = " . $id . "
        	");

        return true;
    }

    //Hides a content list row
    public function reorderContentListRow($item)
    {
        $section_list_table_name = 'section_' . $this->main->item_data['id'];

        $item_data = explode(',', $item);

        mysql_query("
        		UPDATE `" . $section_list_table_name . "`
        		SET `sort` = " . $item_data[1] . "
        		WHERE `id` = " . $item_data[0] . "
        	");

        return true;
    }

    //Multiple
    public function doMultipleAction($operation, $items)
    {
        foreach (explode(';', $items) as $item) {
            switch ($operation) {
                case 'del'      :
                    $this->deleteContentListRow($item);
                    break;
                case 'show'     :
                    $this->showContentListRow($item);
                    break;
                case 'hide'     :
                    $this->hideContentListRow($item);
                    break;
                case 'reorder'  :
                    $this->reorderContentListRow($item);
                    break;
            };
        };
    }

    //Deletes a section
    public function deleteSection($id)
    {
        //Delete contents table
        $delete_contents_table_query = "
            	DROP TABLE IF EXISTS `section_" . $id . "`
            ";
        mysql_query($delete_contents_table_query);

        //Delete dataset item
        $delete_dataset_query = "
            	DELETE FROM `" . $this->datasets_table . "`
            	WHERE `section_id` = " . $id . "
            ";
        mysql_query($delete_dataset_query);

        //Delete section item
        $delete_section_item_query = "
            	DELETE FROM `" . $this->table . "`
            	WHERE `id` = " . $id . "
            ";
        mysql_query($delete_section_item_query);

        return true;
    }

    //Section existance checking
    public function checkExistSection($name, $type = 'boolean', $current_id = false)
    {
        $query = "
        		SELECT `id`
        		FROM `" . $this->table . "`
        		WHERE
        			(`id` NOT IN (" . $current_id . ")) &&
        			(`name` = '" . DB::quote($name) . "')
        	";
        $result = mysql_fetch_array(mysql_query($query));

        if (!empty($result)) {
            if ($type == 'string') {
                return 'false';
            } elseif ($type == 'boolean') {
                return false;
            };
        } else {
            if ($type == 'string') {
                return 'true';
            } elseif ($type == 'boolean') {
                return true;
            };
        };
    }

    //Row existance checking
    public function checkExistRow($col_name, $data, $section_id, $current_id, $type = 'boolean')
    {
        $query = "
        		SELECT
        		    `id`
        		FROM
        		    `section_" . $section_id . "`
        		WHERE
        		    (`id` NOT IN (" . $current_id . ")) &&
        			(`" . $col_name . "` = '" . DB::quote($data) . "')
        	";
        $result = mysql_fetch_array(mysql_query($query));

        if (!empty($result)) {
            if ($type == 'string') {
                return 'false';
            } elseif ($type == 'boolean') {
                return false;
            };
        } else {
            if ($type == 'string') {
                return 'true';
            } elseif ($type == 'boolean') {
                return true;
            };
        };
    }

    //Creates a new section
    public function createSection()
    {
        //Insert new section item
        $query = "
                INSERT INTO `" . $this->table . "`
                    (`id`)
                VALUES
                    ('NULL')
            ";

        mysql_query($query);

        //Get created section ID
        $new_section_id = mysql_insert_id();

        $name = $this->main->getText('sections', 'new_item_name') . ' ' . $new_section_id;

        $query = "
                UPDATE
                    " . $this->table . "
                SET
                    `name` = '" . $name . "',
                    `color` = '" . Utilities::getColorByStringHash($name) . "'
                WHERE
                    `id`   = " . $new_section_id . "
            ";

        mysql_query($query);

        //Create section data table
        $new_section_table_name = "section_" . $new_section_id;

        $query = "
                CREATE TABLE `" . $new_section_table_name . "` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `publish` tinyint(1) NOT NULL DEFAULT '0',
                    `name` tinytext NULL,
                    `sort` int NOT NULL DEFAULT 1,
                    `creator_id` int NOT NULL,
                    `changer_id` int NOT NULL,
                    `creation_date` datetime NOT NULL DEFAULT '" . date('Y-m-d H:i') . ":00',
                    `change_date` datetime NOT NULL DEFAULT '" . date('Y-m-d H:i') . ":00',
                    PRIMARY KEY (`id`)
                )
                DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
            ";

        mysql_query($query);

        //Insert new section dataset
        mysql_query("
                INSERT INTO `" . $this->datasets_table . "` (
                    `section_id`,
                    `type`,
                    `label`,
                    `description`,
                    `required`,
                    `sort`,
                    `embed`,
                    `embed_name`,
                    `list`
                ) VALUES (
                    '" . $new_section_id . "',
                    'checkbox',
                    '" . $this->main->getText('sections', 'default_field_publish_label') . "',
                    '" . $this->main->getText('sections', 'default_field_publish_help') . "',
                    1,
                    1,
                    1,
                    'publish',
                    1
                );
            ");

        mysql_query("
                INSERT INTO `" . $this->datasets_table . "` (
                    `section_id`,
                    `type`,
                    `label`,
                    `description`,
                    `sort`,
                    `embed`,
                    `embed_name`
                ) VALUES (
                    '" . $new_section_id . "',
                    'separator',
                    '" . $this->main->getText('sections', 'form_editor_tools_splitter') . "',
                    '" . $this->main->getText('sections', 'form_editor_tools_splitter') . "',
                    2,
                    1,
                    'main'
                );
            ");

        mysql_query("
                INSERT INTO `" . $this->datasets_table . "` (
                    `section_id`,
                    `type`,
                    `label`,
                    `description`,
                    `required`,
                    `sort`,
                    `embed`,
                    `embed_name`,
                    `list`
                ) VALUES (
                    '" . $new_section_id . "',
                    'text',
                    '" . $this->main->getText('sections', 'default_field_name_label') . "',
                    '" . $this->main->getText('sections', 'default_field_name_help') . "',
                    1,
                    3,
                    1,
                    'name',
                    1
                );
            ");

        return $new_section_id;
    }

    //Parse save parameters
    private function parseSaveParam($data)
    {
        unset(
        $data['ok'],
        $data['save'],
        $data['section_name']
        );

        $result = array();

        foreach ($data as $key => $value) {
            $key_array = explode('**__**', $key);

            if ($key_array[1]) {
                $arr['id'] = $key_array[1];

                if (!in_array(array('id' => $arr['id']), $result)) {
                    array_push($result, $arr);
                };
            };
        };

        foreach ($result as $item) {
            foreach ($data as $key1 => $value1) {
                $key_array1 = explode('**__**', $key1);

                $arr1['id'] = $key_array1[1];
                $arr1['name'] = $key_array1[0];
                $arr1['value'] = $value1;

                if ($item['id'] == $arr1['id']) {
                    $result1[$arr1['id']]['id'] = $arr1['id'];
                    $result1[$arr1['id']][$key_array1[0]] = $value1;
                }
            };
        };

        return $result1;
    }

    //Parse and save form fields
    public function saveFormFields($data)
    {
        mysql_query("
                UPDATE
                    " . $this->table . "
                SET
                    `name` = '" . DB::quote($data['section_name']) . "',
                    `color` = '" . Utilities::getColorByStringHash($data['section_name']) . "'
                WHERE
                    `id`   = '" . $this->main->item_data['id'] . "'
            ");

        foreach ($this->parseSaveParam($data) as $item) {
            if (preg_match('/^new_\d+$/', $item['id'])) {
                if ($item['type'] == 'color_picker') {
                    $default_param = 'FFFFFF';
                    $requied_param = '1';

                } else if ($item['type'] == 'calendar') {
                    $default_param = 'now';
                    $requied_param = '1';

                } else if ($item['type'] == 'catalog') {
                    $default_param = '[]';

                } else if ($item['type'] == 'multiselect') {
                    $default_param = Main::parseMultipleSelectParams($item['default']);

                } else if ($item['type'] == 'slider') {
                    $default_param = DB::quote($item['min']);

                } else {
                    $default_param = DB::quote($item['default']);
                    $requied_param = DB::quote($item['required']);
                };

                $query = "
                        INSERT INTO " . $this->datasets_table . " (
                            `section_id`,
                            `type`,
                            `label`,
                            `description`,
                            `required`,
                            `unique`,
                            `sort`,
                            `embed`,
                            `list`,
                            `email`,
                            `number`,
                            `use_editor`,
                            `rows`,
                            `default`,
                            `options_table`,
                            `options_custom`,
                            `options_source`,
                            `randomize`,
                            `extensions`,
                            `folder`,
                            `suffix`,
                            `prefix`,
                            `thumbs`,
                            `mode`,
                            `min`,
                            `max`,
                            `interval`
                        ) VALUES (
                            '" . $this->main->item_data['id'] . "',
                            '" . DB::quote($item['type']) . "',
                            '" . DB::quote($item['label']) . "',
                            '" . DB::quote($item['description']) . "',
                            '" . $requied_param . "',
                            '" . DB::quote($item['unique']) . "',
                            '" . DB::quote($item['sort']) . "',
                            '0',
                            '" . DB::quote($item['list']) . "',
                            '" . DB::quote($item['email']) . "',
                            '" . DB::quote($item['number']) . "',
                            '" . DB::quote($item['use_editor']) . "',
                            '" . DB::quote($item['rows']) . "',
                            '" . $default_param . "',
                            '" . DB::quote($item['options_table']) . "',
                            '" . DB::quote($item['options_custom']) . "',
                            '" . DB::quote($item['options_source']) . "',
                            '" . DB::quote($item['randomize']) . "',
                            '" . DB::quote($item['extensions']) . "',
                            '" . Utilities::convertUrl(DB::quote($item['folder'])) . "',
                            '" . DB::quote($item['suffix']) . "',
                            '" . DB::quote($item['prefix']) . "',
                            '" . DB::quote($item['thumbs']) . "',
                            '" . DB::quote($item['mode']) . "',
                            '" . DB::quote($item['min']) . "',
                            '" . DB::quote($item['max']) . "',
                            '" . DB::quote($item['interval']) . "'
                        );
                    ";

                mysql_query($query);

                //Switch col type
                switch ($item['type']) {
                    case 'calendar':
                        $type_params = "datetime NOT NULL DEFAULT '" . date('Y-m-d H:i') . ":00'";
                        break;

                    case 'checkbox':
                        $type_params = 'tinyint(1) NULL';
                        break;

                    case 'color_picker':
                        $type_params = "varchar(6) NULL DEFAULT 'FFFFFF'";
                        break;

                    case 'select':
                        $type_params = "int NULL DEFAULT '0'";
                        break;

                    case 'slider':
                        $type_params = "int NULL DEFAULT '0'";
                        break;

                    case 'multiselect':
                        $type_params = "tinytext NULL";
                        break;

                    case 'textarea':
                        $type_params = 'longtext NULL';
                        break;

                    case 'catalog':
                        $type_params = 'longtext NULL';
                        break;

                    case 'multifile':
                        $type_params = "int NULL DEFAULT '0'";
                        break;

                    case 'gallery':
                        $type_params = "int NULL DEFAULT '0'";
                        break;

                    default:
                        $type_params = 'text NULL';
                };

                if ($item['type'] != 'separator') {
                    mysql_query("
							ALTER TABLE
								`section_" . $this->main->item_data['id'] . "`
							ADD COLUMN
								`col_" . mysql_insert_id() . "` " . $type_params . ";
						");
                };

            } else {

                if ($item['type'] == 'multiselect') {
                    $default_param = Main::parseMultipleSelectParams($item['default']);

                } else if ($item['type'] == 'slider') {
                    $default_param = DB::quote($item['min']);

                } else if ($item['type'] == 'catalog') {
                    $default_param = '[]';

                } else {
                    $default_param = DB::quote($item['default']);
                };

                $query = "
                        UPDATE
                            " . $this->datasets_table . "
                        SET
                            `label`				= '" . DB::quote($item['label']) . "',
                            `description` 		= '" . DB::quote($item['description']) . "',
                            `required` 			= '" . DB::quote($item['required']) . "',
                            `unique` 			= '" . DB::quote($item['unique']) . "',
                            `sort` 				= '" . DB::quote($item['sort']) . "',
                            `list`          	= '" . DB::quote($item['list']) . "',
                            `email`				= '" . DB::quote($item['email']) . "',
                            `number`			= '" . DB::quote($item['number']) . "',
                            `rows`				= '" . DB::quote($item['rows']) . "',
                            `use_editor`		= '" . DB::quote($item['use_editor']) . "',
                            `default`			= '" . $default_param . "',
                            `options_table`		= '" . DB::quote($item['options_table']) . "',
                            `options_custom`	= '" . DB::quote($item['options_custom']) . "',
                            `options_source`	= '" . DB::quote($item['options_source']) . "',
                            `randomize`			= '" . DB::quote($item['randomize']) . "',
                            `extensions`		= '" . DB::quote($item['extensions']) . "',
                            `folder`            = '" . Utilities::convertUrl(DB::quote($item['folder'])) . "',
                            `suffix`		    = '" . DB::quote($item['suffix']) . "',
                            `prefix`            = '" . DB::quote($item['prefix']) . "',
                            `thumbs`			= '" . DB::quote($item['thumbs']) . "',
                            `mode`              = '" . DB::quote($item['mode']) . "',
                            `min`               = '" . DB::quote($item['min']) . "',
                            `max`               = '" . DB::quote($item['max']) . "',
                            `interval`          = '" . DB::quote($item['interval']) . "'
                        WHERE
                            `id` 				= '" . intval($item['id']) . "'
                    ";

                mysql_query($query);
            }
        };
    }

    //Returns search results to autocomplete
    public function autocompleteSearch($q, $id)
    {
        $search_query = "SELECT `id`, `name` FROM `section_" . $id . "` WHERE ";

        $searchStringArray = $this->main->getArrayFromSearchString($q);

        $where = '';

        foreach ($searchStringArray as $key => $val) {
            if (strlen($val) > 0) {
                $where .= "`name` LIKE '%" . $val . "%' OR ";
            };
        };

        $where = substr($where, 0, -3);

        if ($where == '') {
            return null;
        } else {
            $search_query .= $where;
        };

        $sql = mysql_query($search_query);

        $result = $q . "\n";

        while ($req = mysql_fetch_assoc($sql)) {
            $result .= $req['name'] . "\n";
        };

        return $result;
    }

    //Returns search results
    public function searchContentItem($q)
    {
        if ($q) {
            if ($this->content_list_where_statement == '') {
                $bracket = false;
                $this->content_list_where_statement = "WHERE ";
            } else {
                $this->content_list_where_statement = "&& (";
                $bracket = true;
            };

            $searchStringArray = $this->main->getArrayFromSearchString($q);

            foreach ($searchStringArray as $key => $val) {
                if (strlen($val) > 0) {
                    $this->content_list_where_statement .= "`name` LIKE '%" . $val . "%' OR ";
                };
            };

            $this->content_list_where_statement .= "`name` LIKE '%" . $q . "%'";

            if ($bracket) {
                $this->content_list_where_statement .= ")";
            };
        };
    }

    //Deletes an item field
    public function deleteFieldItem($id, $section_id)
    {
        //Delete dataset item
        $query = "
            	DELETE FROM
            	    `" . $this->datasets_table . "`
            	WHERE
                    `id` = '" . $id . "' &&
                    `section_id` = '" . $section_id . "'
            ";
        mysql_query($query);

        $query = "
                ALTER TABLE
                    `section_" . $section_id . "`
                DROP COLUMN
                    `col_" . $id . "`
            ";
        mysql_query($query);
    }

    //Return total items count
    public function getSectionItemsCount($id)
    {
        $section_list_table_name = 'section_' . intval($id);

        $sql = "
                SELECT
                    count(*) AS `count`
                FROM
                    `" . $section_list_table_name . "`
            ";

        $result = mysql_fetch_row(mysql_query($sql));
        return $result[0];
    }

    //Get map markers
    public function getMarkers($section_id, $reilative_id, $form_item)
    {
        $query = "
                SELECT
                    `id`, `data`
                FROM
                    `maps_objects`
                WHERE
                    `section_id`    = '" . DB::quote($section_id) . "' &&
                    `relative_id`   = '" . DB::quote($reilative_id) . "' &&
                    `form_item`     = '" . DB::quote($form_item) . "'
                ORDER BY
                    `id`
                ASC
            ";

        $sql = mysql_query($query);

        while ($row = mysql_fetch_assoc($sql)) {
            $d = explode(';', $row['data']);
            $row['data'] = $d;
            $rows[] = $row;
        };

        return $rows;
    }

    //Add map marker
    public function addMarker($data, $relative_id, $section_id, $form_item)
    {
        $query = "
                INSERT INTO `maps_objects` (
                    `data`,
                    `relative_id`,
                    `section_id`,
                    `form_item`,
                    `type`,
                    `module`
                ) VALUES (
                    '" . $data . "',
                    '" . $relative_id . "',
                    '" . $section_id . "',
                    '" . $form_item . "',
                    '1',
                    '0'
                )
            ";

        mysql_query($query);

        $result = '
                {
                    "marker_id" : "' . mysql_insert_id() . '"
                }
            ';

        return $result;
    }

    //Refresh marker data
    public function refreshMarker($data, $id)
    {
        $query = "
                UPDATE
                    `maps_objects`
                SET
                    `data` = '" . $data . "'
                WHERE
                    `id` = " . $id . "
            ";

        mysql_query($query);
    }

    //Delete map marker
    public function deleteMarker($id)
    {
        $query = "
                DELETE FROM
                    `maps_objects`
                WHERE
                    `id` = " . $id . "
            ";

        mysql_query($query);
    }

    //Get marker params
    public function getMarkerParams($id)
    {
        $query = "
                SELECT
                    `name`,
                    `description`
                FROM
                    `maps_objects`
                WHERE
                    `id` = '" . $id . "'
            ";

        $sql = mysql_query($query);
        $data = mysql_fetch_assoc($sql);

        $result = '
                {
                    "name" : "' . $data['name'] . '",
                    "description" : "' . $data['description'] . '"
                }
            ';

        return $result;
    }

    //Get marker params
    public function setMarkerParams($name, $desc, $id)
    {
        $query = "
                UPDATE
                    `maps_objects`
                SET
                    `name` = '" . $name . "',
                    `description` = '" . $desc . "'
                WHERE
                    `id` = '" . $id . "'
            ";

        mysql_query($query);
    }

    //Get file
    public function getRowFile($relative_id, $section_id, $form_item)
    {
        $query = "
                SELECT
                    `name`,
                    `extension`,
                    `path`
                FROM
                    `files`
                WHERE
                    `relative_id` = " . intval($relative_id) . " &&
                    `relative_table` = 'section_" . intval($section_id) . "' &&
                    `form_item` = '" . DB::quote($form_item) . "' &&
                    `type` = 0 &&
                    `module` = 0
            ";

        if ($sql = mysql_query($query)) {
            return mysql_fetch_assoc($sql);
        };
    }

    //Get image
    public function getRowImage($relative_id, $section_id, $form_item)
    {
        $query = "
                SELECT
                    `name`,
                    `extension`,
                    `path`
                FROM
                    `images`
                WHERE
                    `relative_id` = " . intval($relative_id) . " &&
                    `relative_table` = 'section_" . intval($section_id) . "' &&
                    `form_item` = '" . DB::quote($form_item) . "' &&
                    `type` = 0 &&
                    `module` = 0
            ";

        if ($sql = mysql_query($query)) {
            return mysql_fetch_assoc($sql);
        };
    }

    //Switch list item state
    public function switchContentListRowState($id, $item_id, $colname, $state)
    {
        $query = "
                UPDATE
                    `section_" . intval($id) . "`
                SET
                    `" . $colname . "` = " . $state . "
                WHERE
                    `id` = '" . $item_id . "'
            ";

        mysql_query($query);
    }

    //Get userstamp for tools block
    public function getUserStamp($id)
    {
        $query = "
                SELECT
                    `name`,
                    `login`
                FROM
                    `users`
                WHERE
                    `id` = " . intval($id) . "
            ";

        $result = $this->main->db->assocItem($query);

        return $result['name'] . ' <em class="gray_text">(' . $result['login'] . ')</em>';
    }

    private function getRealColName($id, $col_name)
    {
        switch ($col_name) {
            case 'Код' :
            {
                return 'id';
            };
                break;

            case 'Публиковать' :
            {
                return 'publish';
            };
                break;

            case 'Название' :
            {
                return 'name';
            };
                break;

            case 'Порядок сортировки' :
            {
                return 'sort';
            };
                break;

            default :
                {
                $query = "
                        SELECT
                            `id`
                        FROM
                            `datasets`
                        WHERE
                            `type` NOT IN ('separator', 'map', 'image', 'gallery', 'file', 'multifile') &&
                            `section_id` = " . intval($id) . " &&
                            `label` = '" . DB::quote($col_name) . "'
                        LIMIT 1
                    ";
                $result = $this->main->db->assocItem($query);

                if ($result['id'] > 0) {
                    return 'col_' . $result['id'];
                };
                };
                break;
        };
    }

    private function parseValue($col_name, $value, $id)
    {
        if ($col_name == 'publish') {
            if ($value == 'да') {
                return '1';
            } else {
                return '0';
            };
        };

        if ($col_name != 'id' && $col_name != 'name' && $col_name != 'sort') {
            $query = "
                    SELECT
                        `id`,
                        `type`,
                        `options_source`,
                        `options_custom`,
                        `options_table`
                    FROM
                        `datasets`
                    WHERE
                        `id` = " . intval(substr($col_name, 4, strlen($col_name)));

            $result = $this->main->db->assocItem($query);

            switch ($result['type']) {
                case 'checkbox' :
                {
                    if ($value == 'да') {
                        return '1';
                    } else {
                        return '0';
                    };
                };
                    break;

                case 'select' :
                {
                    if ($result['options_source'] == '1') {
                        if ($value) {
                            $query = "
                                    SELECT
                                        `id`
                                    FROM
                                        `" . DB::quote($result['options_table']) . "`
                                    WHERE
                                        `name` = '" . DB::quote($value) . "'";

                            $result = $this->main->db->assocItem($query);
                            return $result['id'];
                        } else {
                            return '';
                        };
                    } else {
                        $opts1 = explode(';', $result['options_custom']);

                        foreach ($opts1 as $item) {
                            $opts2 = explode('=', $item);

                            if ($opts2[1] == $value) {
                                return $opts2[0];
                            };
                        };
                    };
                };
                    break;

                default :
                    {
                    return $value;
                    };
                    break;
            };
        } else {
            return $value;
        }
    }

    public function importContent($id)
    {
        $file = $_FILES['csv']['tmp_name'];
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/admin/import/';
        $fileinfo = pathinfo($_FILES['csv']['name']);
        $target_path = $dir . $fileinfo['basename'];

        if ($fileinfo['extension'] == 'xls' && file_exists($file)) {
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            };

            if (move_uploaded_file($file, $target_path)) {
                set_include_path(get_include_path() . PATH_SEPARATOR . 'PhpExcel/Classes/');
                include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/excel/PHPExcel/IOFactory.php';

                $objPHPExcel = PHPExcel_IOFactory::load($target_path);
                $objPHPExcel->setActiveSheetIndex(0);
                $aSheet = $objPHPExcel->getActiveSheet();

                $cols = array();
                $result = array();

                //получим итератор строки и пройдемся по нему циклом
                $row_id = 0;
                foreach ($aSheet->getRowIterator() as $row) {
                    //получим итератор ячеек текущей строки
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    //пройдемся циклом по ячейкам строки
                    $cell_id = 0;
                    foreach ($cellIterator as $cell) {
                        if ($row_id == 0) {
                            $col_name = $this->getRealColName($id, $cell->getValue());

                            if ($col_name != '') {
                                $cols[$cell_id] = $col_name;
                            };
                        } else {
                            $result[$row_id][] = array('name' => $cols[$cell_id], 'value' => $cell->getValue());
                        };

                        $cell_id++;
                    };
                    $row_id++;
                };

                //$this->main->db->query("TRUNCATE TABLE `section_".intval($id)."`");

                foreach ($result as $row) {
                    $colnames = "";
                    $values = "";
                    $exists = false;

                    foreach ($row as $cell) {
                        //Пороверяем по ID существование записи
                        if ($cell['name'] == 'id') {
                            $item_id = $cell['value'];
                            $exists = $this->main->db->checkRowExistance('section_' . intval($id), 'id', $cell['value'], $not = false);
                        };

                        if ($exists) {
                            if ($cell['name'] != '') {
                                $colnames .= "`" . DB::quote($cell['name']) . "` = '" . DB::quote($this->parseValue($cell['name'], $cell['value'], $id)) . "', ";
                            };
                        } else {
                            if ($cell['name'] != '') {
                                $colnames .= "`" . DB::quote($cell['name']) . "`, ";
                                $values .= "'" . DB::quote($this->parseValue($cell['name'], $cell['value'], $id)) . "', ";
                            };
                        };
                    };

                    if ($exists) {
                        $colnames = substr($colnames, 0, strlen($colnames) - 2);

                        $query = "UPDATE `section_" . intval($id) . "` SET " . $colnames . " WHERE `id` = " . intval($item_id);

                        $this->main->db->query($query);

                    } else {
                        $colnames = substr($colnames, 0, strlen($colnames) - 2);
                        $values = substr($values, 0, strlen($values) - 2);

                        $query = "
								INSERT INTO `section_" . intval($id) . "` (
									" . $colnames . "
								) VALUES (
									" . $values . "
								)
							";

                        $this->main->db->query($query);
                    };
                };
            };
        };
    }

    public function exportContent($id)
    {
        $query = "
                SELECT
                    `id`,
                    `label`,
                    `embed_name`
                FROM
                    `datasets`
                WHERE
                    `type` NOT IN ('separator', 'map', 'image', 'gallery', 'file', 'multifile') &&
                    `section_id` = " . intval($id) . "
            ";

        $result = $this->main->db->assocMulti($query);

        $csv_table_headers = array();

        $fields = "`id` AS `Код`, ";
        $csv_table_headers[] = 'Код';

        $fields .= "`sort` AS `Порядок сортировки`, ";
        $csv_table_headers[] = 'Порядок сортировки';

        foreach ($result as $item) {
            if (!$item['embed_name']) {
                $fields .= "`col_" . intval($item['id']) . "` AS `" . $item['label'] . "`, ";
                $csv_table_headers[] = $item['label'];
            } else {
                if ($item['embed_name'] == 'name') {
                    $fields .= "`name` AS `Название`, ";
                    $csv_table_headers[] = 'Название';
                } elseif ($item['embed_name'] == 'publish') {
                    $fields .= "`publish` AS `Публиковать`, ";
                    $csv_table_headers[] = 'Публиковать';
                };
            };
        };

        $fields = substr($fields, 0, strlen($fields) - 2);

        $query = "
                SELECT
                    " . $fields . "
                FROM
                    `section_" . intval($id) . "`
                ORDER BY
                    `id`
                ASC
            ";

        $result = $this->main->db->assocMulti($query);

        set_include_path(get_include_path() . PATH_SEPARATOR . 'PhpExcel/Classes/');

        //подключаем и создаем класс PHPExcel
        include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/excel/PHPExcel.php';

        $pExcel = new PHPExcel();
        $pExcel->setActiveSheetIndex(0);
        $aSheet = $pExcel->getActiveSheet();
        $aSheet->setTitle('Первый лист');

        $boldFont = array(
            'font' => array(
                'name' => 'Arial Cyr',
                'size' => '10',
                'bold' => true
            )
        );

        $cell = 0;
        foreach ($csv_table_headers as $item) {
            $aSheet->setCellValueByColumnAndRow($cell, 1, $item);
            $cell++;
        };

        $aSheet->getStyle('A1:AK1')->applyFromArray($boldFont);

        $row = 2;
        $item_id = 0;

        foreach ($result as $item) {
            $col = 0;
            foreach ($item as $key => $value) {
                switch ($key) {
                    case 'Порядок сортировки';
                    case 'Код' :
                    {
                        $type = PHPExcel_Cell_DataType::TYPE_NUMERIC;
                        $item_id = $value;
                    };
                        break;

                    default :
                        {
                        $type = PHPExcel_Cell_DataType::TYPE_STRING;
                        };
                        break;
                };

                $value = $this->getRealColValue($key, $value, $id, $item_id);

                $aSheet->getCellByColumnAndRow($col, $row)->setValueExplicit($value, $type);
                $col++;
            };

            $row++;
        };

        //устанавливаем ширину
        $aSheet->getColumnDimension('B')->setWidth(25);

        //отдаем пользователю в браузер
        include($_SERVER['DOCUMENT_ROOT'] . "/admin/excel/PHPExcel/Writer/Excel2007.php");

        $objWriter = new PHPExcel_Writer_Excel2007($pExcel);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="section_' . $id . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter->save($_SERVER['DOCUMENT_ROOT'] . '/admin/export/section_' . $id . '.xls');

        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/admin/export/section_' . $id . '.xls', 'rb');

        while ($cline = fgets($fp)) {
            print $cline;
        };

        fclose($fp);

        //$objWriter->save('php://output');
    }

    private function getRealColValue($key, $value, $id, $item_id)
    {
        switch ($key) {
            case 'Порядок сортировки' :
                return $value;
                break;
            case 'Код' :
                return $value;
                break;

            default :
                {
                $query = "
                        SELECT
                            `id`,
                            `type`,
                            `options_source`,
                            `options_custom`,
                            `options_table`
                        FROM
                            `datasets`
                        WHERE
                            `label` = '" . DB::quote($key) . "' &&
                            `section_id` = " . intval($id);

                $result = $this->main->db->assocItem($query);

                switch ($result['type']) {
                    case 'select' :
                    {
                        if ($result['options_source'] == '1') {
                            $query = "
                                    SELECT
                                        `name`
                                    FROM
                                        `" . DB::quote($result['options_table']) . "`
                                    WHERE
                                        `id` = '" . intval($item_id) . "'";

                            $result = $this->main->db->assocItem($query);
                            return $result['name'];
                        } else {
                            $opts1 = explode(';', $result['options_custom']);

                            foreach ($opts1 as $item) {
                                $opts2 = explode('=', $item);

                                if ($opts2[0] == $item_id) {
                                    return $opts2[1]; // TODO: Проверить! Выдает хуйню!
                                };
                            };
                        };
                    };
                        break;

                    case 'checkbox' :
                    {
                        if ($value == '1') {
                            return 'да';
                        } else {
                            return 'нет';
                        };
                    };
                        break;

                    default :
                    {
                        return $value;
                    };
                        break;
                };
            };
                break;
        };
    }
}

;
?>