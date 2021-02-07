<?php

namespace Kernel\Controllers;

use Kernel\Exceptions\CliException;

abstract class Main
{
    private $string;

    /**
     * Main constructor.
     * @param array $string
     */
    public function __construct(array $string)
    {
        $this->string = $string;
        $this->checkParams();
    }

    /**
     * @return mixed
     */
    abstract public function execute();

    /**
     * Check parametrs and names for existing
     * @return mixed
     */
    abstract protected function checkParams();

    /**
     * Get parametrs and names from command line
     * @return array
     */
    protected function getParam() : array
    {
        $result['arguments'] = [];
        $result['parametrs'] = [];
        foreach ($this->string as $item){
            if(preg_match('\'{.*}\'', $item)){
                $result['arguments'] = array_merge($result['arguments'], explode(',', $item));
            } elseif(preg_match('\'\\[.*\\]\'', $item)){
                $result['parametrs'] = explode(',', $item);

            }
        }
        return $result;
    }

}