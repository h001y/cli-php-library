<?php

try {
    unset($argv[0]);

    // Autoload function Register
    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../src/' . $className . '.php';
    });

    //Make full ClassName, adding Namespace
    $className = '\\Kernel\\Controllers\\' . array_shift($argv);
    $class = array_shift($argv);
    if (!class_exists($className)) {
        $filename = $class;
        $controller_text = '<?php echo "example";';

        //create new Controller
        $new_controller = fopen($filename, 'w');

        //add text to controller
        fwrite($filename, $controller_text);

        //close file
        fclose($filename);
    }

    echo 'Called command name:'.$className;
    // Make Class Instance
    $class = new $className($argv);
    $class->execute();
} catch (\Kernel\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}