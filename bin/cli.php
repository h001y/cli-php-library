<?php

try {
    unset($argv[0]);
    $systemClassName = '\\Kernel\\Controllers\\System';
    $outputClassName = '\\Kernel\\Controllers\\Output';
    spl_autoload_register(function (string $systemClassName) {
        require_once __DIR__ . '/../src/' . $systemClassName . '.php';
    });
    spl_autoload_register(function (string $outputClassName) {
        require_once __DIR__ . '/../src/' . $outputClassName . '.php';
    });


    // Init classes
    $System = new $systemClassName;
    $Output = new $outputClassName;

    //Make full ClassName, adding Namespace
    $inputClassName = array_shift($argv);

    if (!$System->isSystemClassExist($inputClassName)) {
        echo 'System class does not exist'.PHP_EOL;
    }

    if(!$System->isUsersClassExist($inputClassName)){
        echo 'User class does not exist'.PHP_EOL;
        $System->addUserClass($inputClassName);
    } else {
        spl_autoload_register(function (string $inputClassName) {
            require_once __DIR__ . '/../src/' . $inputClassName . '.php';
        });

        $userClass = new '\\UserControllers\\' . $inputClassName . '.php';
    }


 if ($System->isUsersClassExist($inputClassName)) {

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