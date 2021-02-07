<?php
namespace Kernel\Controllers;

Class NewClass
{

    public function checkExist()
    {

    }
    // create UserController
    public function addController()
    {
        $filename = 'src/UserControllers/' . $class . '.php';
        $controller_text = '<?php echo "example";';
        file_put_contents($filename, $controller_text);
    }
}