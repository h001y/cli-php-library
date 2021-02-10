## cli-php-library
Command line php library. You can create command if it don't equal 
Output or System.

## Creating new command
Example : 'php bin/cli.php newController {new_argument} [new_field]' - Will create a new controller in /src/UserControllers/newController.php with extends of Main controller

## How use it
type 'php bin/cli.php' - for get all commands
type 'php bin/cli.php Output ...' - for get arguments and opions in readable format

## Input arghs
Variable of arghuments : 
  - single arghs {argh} 
  - multiarghs {argh1,argh2,argh3} OR {arg1} {arg2} {arg3} OR {arg3}
Params for command :
  - 1-value params [name=value]
  - multi params [name={value1,value2}]
