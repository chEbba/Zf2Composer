<?php
return array(
    'modules' => array(
        'Application',
        'ZendDeveloperTools'
    ),
    'module_listener_options' => array( 
        'config_cache_enabled' => false,
        'cache_dir'            => 'data/cache',
        'module_paths' => array(
            './module',
            './vendor',
            'ZendDeveloperTools' => __DIR__ . '/../vendor/zendframework'
        ),
    ),
);
