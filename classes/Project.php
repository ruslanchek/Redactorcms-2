<?php
/*
 * Этот класс используется для расширения функционала ядра системы (/classes/Core.php)
 * */

Class Project extends Utilities
{
    public function __construct()
    {
        //Additions
        include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Simpleimage.class.php';
        $this->securimage = new Securimage();

        //Create login objct
        $this->login = new Login($this, array());

        //Operate ajax calls
        $this->operateAJAX();

        if (isset($_GET['action']) && $_GET['action'] == 'exit') {
            $this->login->exitUser();
            header('Location:' . $this->uri);
        };

        $this->operateOauth();
    }

    private function operateAJAX()
    {
        if ($this->answer_type == 'ajax') {
            switch ($_GET['action']) {
                case 'priceDemand' :
                    $this->priceDemand();
                    break;
            };

            exit;
        }
    }

    private function operateOauth()
    {
        if (isset($_GET['oauth'])) {
            $this->login->oAuth();
            exit;
        };
    }

    private function ajaxTest()
    {
        return 'Test ok!';
    }

    public function getInlineMenu($menu_id = false, $pid = false)
    {
        $additional = '';
        $menu = '';
        $pid_add = '';

        if ($pid) {
            $pid_add = " && `structure`.`pid` = " . intval($pid);
        };

        if ($menu_id > 0) {
            $menu = "`structure_data`.`menu` = " . intval($menu_id) . " && ";
        };

        $query = "
                SELECT
                    `structure_data`.`id` AS `id`,
                    `structure_data`.`name` AS `name`,
                    `structure_data`.`path` AS `path`,
                    `structure`.`pid` AS `pid`
                FROM
                    `structure_data`,
                    `structure`
                WHERE
                    " . $menu . "
                    `structure_data`.`publish` = 1 &&
                    `structure_data`.`id` = `structure`.`id` " . $pid_add . $additional . "
                ORDER BY
                    `sort` ASC
            ";

        return $this->db->assocMulti($query);
    }

    //Get page
    public function getPage($id)
    {
        $query = "
                SELECT
                    `col_33` AS `text`
                FROM
                    `section_3`
                WHERE
                    `id` = " . intval($id) . "
            ";

        $result = $this->db->assocItem($query);
        return $result['text'];
    }

    //Returns array of specified branch
    public function getBranchMenu($id = 1, $menu)
    {
        $query = "
                SELECT
                    `structure`.`id`,
                    `structure_data`.`name`,
                    `structure_data`.`path`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = " . intval($id) . " &&
                    `structure`.`id` = `structure_data`.`id` &&
                    `structure_data`.`menu` = " . intval($menu) . "
                ORDER BY
                    `structure_data`.`sort` ASC
            ";
        $result = mysql_query($query);

        while ($row = mysql_fetch_assoc($result)) {
            $row['childrens'] = $this->getBranchMenu($row['id'], $menu);
            $rows[] = $row;
        };

        return $rows;
    }


    /************************************************************
     * CUSTOM METHODS WRITE BELOW THIS BLOCK
     ************************************************************/
    public function getSearchItems($sq)
    {

    }

    //Sitemap
    public function getSitemapBranch($pid)
    {
        $query = "
                    SELECT
                        `structure`.`id`,
                        `structure_data`.`name`,
                        `structure_data`.`path`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`pid` = " . intval($pid) . " &&
                        `structure`.`id` = `structure_data`.`id` &&
                        `structure_data`.`publish` = 1 &&
                        `structure_data`.`mode` NOT IN(3, 8)
                    ORDER BY
                        `structure_data`.`sort` ASC
                ";
        $result = mysql_query($query);

        while ($row = mysql_fetch_assoc($result)) {
            $row['childrens'] = $this->getSitemapBranch($row['id']);
            $rows[] = $row;
        };

        return $rows;
    }

    // Slider items
    public function getSLiderItems()
    {
        $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_123` AS `announce`,
                    `col_127` AS `link`
                FROM
                    `section_18`
                WHERE
                    `publish` = 1
                ORDER BY
                    `sort`
                ASC
            ";

        return $this->db->assocMulti($query);
    }

    //News short
    public function getNewsShort($limit)
    {
        $query = "
                SELECT
                    s.id AS structure_id,
                    s.name AS structure_name,
                    s.path AS path,
                    s.publish AS publish,

                    d.id AS id,
                    d.name AS name,
                    d.col_132 AS date,
                    d.col_136 AS announce,
                    d.col_134 AS text
                FROM
                    structure_data s
                LEFT JOIN
                    section_19 d ON (d.id = s.content_id)
                WHERE
                    s.publish = 1 && s.pid = 17
                ORDER BY
                    d.col_132
                DESC
                LIMIT " . intval($limit);

        return $this->db->assocMulti($query);
    }

    //Makers list
    public function getMakers($limit = false)
    {
        $limit_q = "";

        if ($limit !== false) {
            $limit_q = " LIMIT " . intval($limit);
        }

        $query = "
                SELECT
                    s.id AS structure_id,
                    s.name AS structure_name,
                    s.path AS path,
                    s.publish AS publish,

                    d.id AS id,
                    d.name AS name,
                    d.col_161 AS country,
                    d.col_175 AS announce
                FROM
                    structure_data s
                LEFT JOIN
                    section_22 d ON (d.id = s.content_id)
                WHERE
                    s.publish = 1 && s.pid = 49
                ORDER BY
                    s.sort
                ASC" . $limit_q;

        return $this->db->assocMulti($query);
    }

    //Makers item
    public function getMaker($id)
    {
        $query = "
                SELECT
                    d.id,
                    d.sort,
                    d.publish,
                    d.name,
                    d.col_161 AS country,
                    d.col_156 AS short_text,
                    d.col_157 AS full_text,

                    sd.path
                FROM
                    section_22 d
                LEFT JOIN
                    structure_data sd
                ON
                    d.id = sd.content_id &&
                    sd.mode = 5
                WHERE
                    d.publish = 1 &&
                    d.id = " . intval($id);

        return $this->db->assocItem($query);
    }

    //Catalog
    public function getCatalog($limit = false)
    {
        $limit_q = "";

        if ($limit !== false) {
            $limit_q = " LIMIT " . intval($limit);
        }

        $query = "
                SELECT
                    s.id AS structure_id,
                    s.name AS structure_name,
                    s.path AS path,
                    s.publish AS publish,

                    d.id AS id,
                    d.name AS name
                FROM
                    structure_data s
                LEFT JOIN
                    section_23 d ON (d.id = s.content_id)
                WHERE
                    s.publish = 1 &&
                    s.pid = 48 &&
                    s.menu = 4
                ORDER BY
                    s.sort
                ASC" . $limit_q;

        return $this->db->assocMulti($query);
    }

    //Catalog section
    public function getCatalogSection($id)
    {
        $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_174` AS `text`
                FROM
                    `section_23`
                WHERE
                    `publish` = 1 &&
                    `id` = " . intval($id);

        return $this->db->assocItem($query);
    }

    //Catalog object
    public function getCatalogObject($id)
    {
        $query = "
                SELECT
                    co.id,
                    co.sort,
                    co.publish,
                    co.name,
                    co.col_170 AS maker,
                    co.col_171 AS text,
                    mk.name AS maker_name,
                    mk.col_156 AS maker_short_text
                FROM
                    section_24 co
                LEFT JOIN
                    section_22 mk
                ON
                    co.col_170 = mk.id
                WHERE
                    co.publish = 1 &&
                    co.id = " . intval($id);

        return $this->db->assocItem($query);
    }

    //Catalog menu list
    public function getCatalogFullList()
    {
        function getBranch($pid)
        {
            $query = "
                    SELECT
                        `s`.`id`,
                        `sd`.`name`,
                        `sd`.`path`
                    FROM
                        `structure` `s`,
                        `structure_data` `sd`
                    WHERE
                        `s`.`pid` = " . intval($pid) . " &&
                        `s`.`id` = `sd`.`id` &&
                        `sd`.`publish` = 1 &&
                        `sd`.`menu` = 4 &&
                        `sd`.`mode` != 8
                    ORDER BY
                        `sd`.`sort` ASC
                ";
            $result = mysql_query($query);

            while ($row = mysql_fetch_assoc($result)) {
                $row['childrens'] = getBranch($row['id']);
                $rows[] = $row;
            };

            return $rows;
        }

        return getBranch(48);
    }

    //Catalog branch by parent id
    public function getCatalogBranchByGroupId($pid)
    {
        $query = "
                SELECT
                    `s`.`id`,
                    `sd`.`name`,
                    `sd`.`path`
                FROM
                    `structure` `s`,
                    `structure_data` `sd`
                WHERE
                    `s`.`pid` = " . intval($pid) . " &&
                    `s`.`id` = `sd`.`id` &&
                    `sd`.`menu` = 4 &&
                    `sd`.`publish` = 1 &&
                    `sd`.`mode` != 8
                ORDER BY
                    `sd`.`sort` ASC
            ";
        $result = mysql_query($query);

        while ($row = mysql_fetch_assoc($result)) {
            $row['childrens'] = $this->getCatalogBranchByGroupId($row['id']);
            $rows[] = $row;
        };

        return $rows;
    }

    //Catalog groups
    public function getCatalogGroups()
    {
        $query = "
            SELECT
                s.id,
                sd.name,
                sd.path
            FROM
                structure s,
                structure_data sd
            WHERE
                sd.mode = 9 &&
                s.id = sd.id &&
                sd.menu = 4 && 
                sd.publish = 1
            ORDER BY
                sd.sort ASC
        ";

        return $this->db->assocMulti($query);
    }

    //Catalog sub items
    public function getCatalogSubItems($pid = false){
        if($pid === false){
            $pid = $this->page['id'];
        }

        $query = "
                SELECT
                    `structure_data`.`id` AS `id`,
                    `structure_data`.`name` AS `name`,
                    `structure_data`.`path` AS `path`,
                    `structure`.`pid` AS `pid`
                FROM
                    `structure_data`,
                    `structure`
                WHERE
                    `structure_data`.`menu` = 4 &&
                    `structure_data`.`publish` = 1 &&
                    `structure_data`.`pid` = " . intval($pid) . " &&
                    `structure_data`.`id` = `structure`.`id`
                ORDER BY
                    `sort` ASC
            ";

        return $this->db->assocMulti($query);
    }

    //Catalog sub items full data
    public function getCatalogSubItemsFullData(){
        $result = new stdClass();

        $query = "
            SELECT
                sd.id AS id,
                sd.name AS name,
                sd.path AS path,

                d.col_170 AS maker_id,
                d.col_171 AS text,

                m.col_156 AS maker_short_text
            FROM
                structure_data sd
            LEFT JOIN
                section_24 d
            ON
                d.id = sd.content_id
            LEFT JOIN
                section_22 m
            ON
                m.id = d.col_170
            WHERE
                sd.menu = 4 &&
                sd.publish = 1 &&
                sd.pid = " . intval($this->page['id']) . "
            ORDER BY
                sd.sort ASC
        ";

        $result->objects = $this->db->assocMulti($query);
        $result->makers = $this->getSectionMakers();

        return $result;
    }

    //Catalog section's makers
    private function getSectionMakersIds($pid){
        $query = "
            SELECT
                sd.id,
                d.col_170 AS maker_id
            FROM
                structure_data sd
            LEFT JOIN
                section_24 d
            ON
                d.id = sd.content_id
            WHERE
                sd.pid = " . intval($pid) . " &&
                sd.menu = 4 &&
                sd.publish = 1
            ORDER BY
                sd.sort ASC
        ";

        $result = mysql_query($query);

        while ($row = mysql_fetch_assoc($result)) {
            if($row['maker_id'] > 0 && !in_array($row['maker_id'], $this->br_tmp)){
                array_push($this->br_tmp, $row['maker_id']);
            }

            $this->getSectionMakersIds($row['id']);
        };
    }

    public function getSectionMakers(){
        $this->br_tmp = array();

        $this->getSectionMakersIds($this->page['id']);

        $in_ids = implode(', ', $this->br_tmp);

        if(!empty($this->br_tmp)){
            $query = "
                SELECT
                    sd.name,
                    sd.path,
                    sd.content_id,
                    
                    d.id,
                    d.col_161 AS country,
                    d.col_175 AS announce,
                    d.col_156 AS short_text
                FROM
                    structure_data sd
                LEFT JOIN
                    section_22 d
                ON
                    d.id = sd.content_id
                WHERE
                    sd.content_id IN (" . $this->db->quote($in_ids) . ") &&
                    sd.mode = 5 &&
                    sd.publish = 1
                ORDER BY
                    sd.sort ASC
            ";

            return $this->db->assocMulti($query);
        }
    }

    //Makers item  groups
    //Catalog section's makers
    private function getSectionMakersIdsByMakerId($maker_id, $pid){
        $query = "
            SELECT
                sd.id,
                d.col_170 AS maker_id
            FROM
                structure_data sd
            LEFT JOIN
                section_24 d
            ON
                d.id = sd.content_id
            WHERE
                sd.pid = " . intval($pid) . " &&
                sd.menu = 4 &&
                sd.publish = 1
            ORDER BY
                sd.sort ASC
        ";

        $result = mysql_query($query);

        while ($row = mysql_fetch_assoc($result)) {
            if($row['maker_id'] > 0 && $row['maker_id'] == $maker_id && !in_array($row['maker_id'], $this->br_tmp)){
                array_push($this->br_tmp, $row['maker_id']);
            }

            $this->getSectionMakersIdsByMakerId($maker_id, $row['id']);
        };
    }

    public function getMakerGroups(){
        $maker_id = $this->current_route['content_id'];

        $query = "
            SELECT id FROM structure_data WHERE mode = 9
        ";

        $result = mysql_query($query);

        $groups_ids = array();

        while ($row = mysql_fetch_assoc($result)) {
            $this->br_tmp = array();
            print_r($this->getSectionMakersIdsByMakerId($maker_id, $row['id']));

            if(!empty($this->br_tmp)){
                $groups_ids[] = $row['id'];
            }
        }

        $in_ids = implode(', ', $groups_ids);

        if(!empty($groups_ids)){
            $query = "
                SELECT
                    sd.name,
                    sd.path,
                    d.id
                FROM
                    structure_data sd
                LEFT JOIN
                    section_23 d
                ON
                    d.id = sd.content_id
                WHERE
                    sd.id IN (" . $this->db->quote($in_ids) . ") &&
                    sd.mode = 9 &&
                    sd.publish = 1
                ORDER BY
                    sd.sort ASC
            ";

            return $this->db->assocMulti($query);
        }
    }
}