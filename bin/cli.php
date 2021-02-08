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

    if($System->isCurrentClassOutput($inputClassName)){
        echo $Output->execute();
        die();
    }

    if(!$System->isSystemClassExist($inputClassName) && !$System->isUsersClassExist($inputClassName)){
        if(!$System->isInputNameEqualSystem()){
            $System->addUserClass($inputClassName, $conf['new_class']);
            echo 'User class ' .$inputClass. ' succesfully added.'.PHP_EOL;
        }
    } else {

    }
} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}