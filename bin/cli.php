<?php

try {
    unset($argv[0]);

    //Make full ClassName, adding Namespace
    $class = array_shift($argv);
    $className = '\\Kernel\\Controllers\\' . $class;
    $userClasses = '\\UserControllers\\' . $class;

    if(empty($class)){
        echo 'first time app';
    } elseif (!class_exists($className) && !class_exists($userClasses)) {
        $new_class = new Kernel\Controllers\NewClass();
        $new_class->addController($class);
    } else {
        // Autoload function Register
        spl_autoload_register(function (string $className) {
            require_once __DIR__ . '/../src/' . $className . '.php';
        });
        echo 'Called command name:'.$class;
        // Make Class Instance
        $class = new $className($argv);
        $class->execute();
    }


} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}