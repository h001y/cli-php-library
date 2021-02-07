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
    $Output = new $outputClassName($argv);

    //Make full ClassName, adding Namespace
    $inputClassName = array_shift($argv);

    if (empty($inputClassName)){
        echo $Output->executeEmty();
    }

    if (!$System->isSystemClassExist($inputClassName)) {
        echo 'System class does not exist'.PHP_EOL;
    }

    if(!$System->isUsersClassExist($inputClassName)){
        echo 'User class does not exist'.PHP_EOL;
        $System->addUserClass($inputClassName);
    } else {

    }
} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}