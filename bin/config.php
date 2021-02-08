<?php

return [
    'system_class' => '\\Kernel\\Controllers\\System',
    'output_class' => '\\Kernel\\Controllers\\Output',
    'new_class'    => '<?php
                            namespace UserControllers;
                            
                            use Kernel\Exceptions\CliException;
                            use Kernel\Controllers\Main;
                            
                            Class ClassName extends Main
                            {
                                protected function checkParams()
                                {
                                    $this->getParam();
                                }
                            
                                public function execute()
                                {
                                    echo "New class is Ready";
                                }
                            }'
];