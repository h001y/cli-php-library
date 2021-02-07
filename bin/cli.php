<?php

try {
    unset($argv[0]);
    $systemClassName = '\\Kernel\\Controllers\\System.php';
    spl_autoload_register(function (string $systemClassName) {
        require_once __DIR__ . '/../src/' . $systemClassName . '.php';
    });
    $System = new $systemClassName;

    //Make full ClassName, adding Namespace
    $inputClassName = array_shift($argv);
    $systemClasses = '\\Kernel\\Controllers\\' . $inputClassName;
    $userClasses = '\\UserControllers\\' . $inputClassName;
    if (!$System->isSystemClassExist()) {
        echo 'System class does not exist';
    }


 if (!empty($inputClassName) && !class_exists($className) && !class_exists($userClasses)) {
         spl_autoload_register(function (string $userClasses) {
             require_once __DIR__ . '/../src/' . $userClasses . '.php';
         });
        $new_class = new Kernel\Controllers\NewClass($argv);
        $new_class->add($inputClassName);
    } elseif(!empty($class)){
         spl_autoload_register(function (string $userClasses) {
             require_once __DIR__ . '/../src/' . $userClasses . '.php';
         });
         $class = new $className;
         $class->executeEmpty();
    } else {
        // Autoload function Register
        spl_autoload_register(function (string $className) {
            require_once __DIR__ . '/../src/' . $className . '.php';
        });
        echo 'Called command name:'.$inputClassName;
        // Make Class Instance
        $class = new $className($argv);
        $class->execute();
    }
} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}