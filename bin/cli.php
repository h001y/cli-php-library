<?php

try {
    unset($argv[0]);
    $conf = include('config.php');
    $systemClassName = $conf['system_class'];
    $outputClassName = $conf['output_class'];
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
    $inputClass = '\\Kernel\\Controllers\\' . $inputClassName. '.php';

    if (empty($inputClassName)){
        echo $Output->executeEmty();
        die();
    }

    if (!$System->isSystemClassExist($inputClassName)) {
        echo 'System class does not exist'.PHP_EOL;
    }

    if(!$System->isUsersClassExist($inputClassName)){
        echo 'User class does not exist'.PHP_EOL;
        $System->addUserClass($inputClassName, $conf['new_class']);
    } else {

    }
} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}