<?php
chdir(dirname(__DIR__));
//require_once (getenv('ZF2_PATH') ?: 'vendor/pear-zf2/') . '/Zend/Loader/AutoloaderFactory.php';
//Zend\Loader\AutoloaderFactory::factory();

require_once 'vendor/.composer/autoload.php';

$appConfig = include 'config/application.config.php';

$listenerOptions  = new Zend\Module\Listener\ListenerOptions($appConfig['module_listener_options']);
$defaultListeners = new Zend\Module\Listener\DefaultListenerAggregate($listenerOptions);
$defaultListeners->getConfigListener()->addConfigGlobPath("config/autoload/{,*.}{global,local}.config.php");
    

$moduleManager = new Zend\Module\Manager($appConfig['modules']);
$moduleManager->events()->attachAggregate($defaultListeners);
$moduleManager->loadModules();

// Create application, bootstrap, and run
$bootstrap   = new Zend\Mvc\Bootstrap($defaultListeners->getConfigListener()->getMergedConfig());
$application = new Zend\Mvc\Application;
$bootstrap->bootstrap($application);
$application->run()->send();
