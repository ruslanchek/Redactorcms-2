<?php
    Class Mainpage{
        function __construct($core){
            $this->core = $core;
            $this->core->setTemplate('inner.tpl');

            $this->core->page['title']          = 'Mainpage title';
            $this->core->page['description']    = 'Mainpage description';
            $this->core->page['keywords']       = 'Mainpage keywords';
            $this->core->page['h1']             = 'Mainpage h1';
            $this->core->page['mode']           = 'mainpage';
        }
    };

    $core->controller = new Mainpage(&$core);
?>