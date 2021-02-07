<?php

namespace Kernel\Controllers;

class System
{
    public function isSystemClassExist($className)
    {
        return class_exists('\\Kernel\\Controllers\\System' . $className. '.php');
    }

    public function isUsersClassExist($className)
    {
        return class_exists('\\UserControllers' . $className. '.php');
    }

    public function addUserClass($className)
    {
        $filename = 'src/UserControllers/' . $className . '.php';
        $controller_text = '<?php echo "example";';
        file_put_contents($filename, $controller_text);
    }
}
