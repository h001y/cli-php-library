<?php

namespace Kernel\Controllers;

class System
{
    /**
     * Class check existing class from command name in Kernel
     * @param string $className
     * @return bool
     */
    public function isSystemClassExist(string $className) : bool
    {
        return file_exists('src/Kernel/Controllers/' . $className . '.php');
    }

    /**
     * Class check existing class from command name in UserControllers
     * @param string $className
     * @return bool
     */
    public function isUsersClassExist(string $className) : bool
    {
        return file_exists('src/UserControllers/' . $className . '.php');
    }

    public function addUserClass($className)
    {
        $filename = 'src/UserControllers/' . $className . '.php';
        $controller_text = '<?php echo "example";';
        file_put_contents($filename, $controller_text);
    }
}
