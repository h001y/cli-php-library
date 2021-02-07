<?php
namespace Kernel\Controllers;

Class NewClass
{

    public function checkExist()
    {

    }

    // create UserController
    public function add($className)
    {
        $filename = 'src/UserControllers/' . $className . '.php';
        $controller_text = '<?php echo "example";';
        file_put_contents($filename, $controller_text);
    }
}