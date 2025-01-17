<?php
spl_autoload_register('Autoloader::autoloadTrait');
spl_autoload_register('Autoloader::autoloadDto');
spl_autoload_register('Autoloader::autoloadDao');
spl_autoload_register('Autoloader::autoloadLib');


class Autoloader{

    static function autoloadTrait($class): void
    {
        $file = 'modeles/traits/' . $class . '.php';
        if(is_file($file)&& is_readable($file)){
            require $file;
        }
        
    }
    
    static function autoloadDto($class){
        $file = 'modeles/dto/' . lcfirst($class) . '.php';
        if(is_file($file)&& is_readable($file)){
            require $file;
        }
      
    }
    
    static function autoloadLib($class){
        $file = 'lib/' . lcfirst($class) . '.php';
        if(is_file($file)&& is_readable($file)){
            require $file;
        }
        
    }
    
    static function autoloadDao($class){
        $file = 'modeles/dao/' . lcfirst($class) . '.php';
        if(is_file($file)&& is_readable($file)){
            require $file;
        }
        
    }
    
    
}


