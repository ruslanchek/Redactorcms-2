<?php
     Class Sample1{
        function __construct($core, $chain){
            $this->core = $core;
            $this->core->setTemplate('inner.tpl');
            $this->core->parseControllerChain($chain);

            switch($this->core->current_route['mode']){
                case ROOT               : $this->ROOT(); break;
                case 'subpath'          : $this->subpath(); break;
                case 'subpathTest'      : $this->subpathTest(); break;
                case 'otherSubpathTest' : $this->otherSubpathTest(); break;
            };
        }

        public function ROOT(){
            print 'I am a ROOT method!';
        }

        public function subpath(){
            print 'I am a /subpath/ method!';
        }

        public function subpathTest(){
            print 'I am a /subpath/test/ method!';
        }

        public function otherSubpathTest(){
            print 'I am a /other_subpath/test/ method!';
        }
    };

    $chain = array(
        array(
            'name'          => ROOT,
            'route'         => '/sample1/',
            'mode'          => 'sample1',
            'vars' => array(
                'title'         => 'Sample 1 - ROOT title',
                'description'   => 'Sample 1 - ROOT description',
                'keywords'      => 'Sample 1 - ROOT keywords',
                'content'       => 'Sample 1 - ROOT content',
                'h1'            => 'Sample 1 - ROOT h1',
                'breadcrumbs'   => array(
                    array('name' => 'sample1', 'path' => '/sample1/', 'current' => true)
                )
            )
        ),
        array(
            'name'          => 'subpath',
            'route'         => '/sample1/subpath/',
            'mode'          => 'sample1',
            'vars' => array(
                'title'         => 'Sample 1 - /subpath/ title',
                'description'   => 'Sample 1 - /subpath/ description',
                'keywords'      => 'Sample 1 - /subpath/ keywords',
                'content'       => 'Sample 1 - /subpath/ content',
                'h1'            => 'Sample 1 - /subpath/ h1',
                'breadcrumbs'   => array(
                    array('name' => 'sample1', 'path' => '/sample1/'),
                    array('name' => 'subpath', 'path' => '/sample1/subpath/', 'current' => true)
                )
            )
        ),
        array(
            'name'          => 'subpathTest',
            'route'         => '/sample1/subpath/test/',
            'mode'          => 'sample1',
            'vars' => array(
                'title'         => 'Sample 1 - /subpath/test/ title',
                'description'   => 'Sample 1 - /subpath/test/ description',
                'keywords'      => 'Sample 1 - /subpath/test/ keywords',
                'content'       => 'Sample 1 - /subpath/test content',
                'h1'            => 'Sample 1 - /subpath/test/ h1',
                'breadcrumbs'   => array(
                    array('name' => 'sample1', 'path' => '/sample1/'),
                    array('name' => 'subpath', 'path' => '/sample1/subpath/'),
                    array('name' => 'subpathTest', 'path' => '/sample1/subpath/test/', 'current' => true)
                )
            )
        )
    );

    $core->controller = new Sample1(&$core, $chain);
?>