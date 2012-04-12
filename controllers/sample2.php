<?php
     Class Sample2{
        function __construct($core, $chain){
            $this->core = $core;
            $this->core->setTemplate('inner.tpl');
            $this->core->parseControllerChain($chain);

            switch($this->core->current_route['mode']){
                case ROOT : $this->ROOT() ; break;
            }
        }

        public function ROOT(){
            print 'I am a ROOT method!';
        }
    };

    $chain = array(
        array(
            'name'          => ROOT,
            'route'         => '/sample2/',
            'mode'          => 'sample2',
            'vars' => array(
                'title'         => 'Sample 2 - ROOT title',
                'description'   => 'Sample 2 - ROOT title',
                'keywords'      => 'Sample 2 - ROOT title',
                'content'       => 'Sample 2 - ROOT title',
                'h1'            => 'Sample 2 - ROOT title',
                'breadcrumbs'   => array(
                    array('name' => 'sample2', 'path' => '/sample2/', 'current' => true)
                )
            )
        )
    );

    $core->controller = new Sample2(&$core, $chain);
?>