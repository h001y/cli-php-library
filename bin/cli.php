<?php

try {
    unset($argv[0]);

    //Make full ClassName, adding Namespace
    $class = array_shift($argv);
    $className = '\\Kernel\\Controllers\\' . $class;

    if (!class_exists($className)) {
        $filename = 'src/UserControllers/' . $class . '.php';
        $controller_text = '<?php echo "example";';

        // create UserController
        file_put_contents($filename, $controller_text);

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