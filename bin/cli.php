<?php

try {
    unset($argv[0]);

    // Autoload function Register
    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../src/' . $className . '.php';
    });

    //Make full ClassName, adding Namespace
    $className = '\\Kernel\\Controllers\\' . array_shift($argv);
    if (!class_exists($className)) {
        throw new \Kernel\Exceptions\CliException('Class "' . $className . '" not found ');
    }

    //Prepare Arghs list
    $params = [];
    foreach ($argv as $argument){
        preg_match('/^-(.+)=(.+)$/', $argument, $matches);
        if (!empty($matches)){
            $paramName = $matches[1];
            $paramValue = $matches[2];

            $params[$paramName] = $paramValue;
        }
    }

    // Make Class Instance
    $class = new $className($params);
    $class->execute();
} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}