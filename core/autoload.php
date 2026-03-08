<?php

function autoload_register($mappings)
{
    spl_autoload_register(function ($class) use ($mappings) {
        foreach ($mappings as $namespace => $folder) {
            if (strpos($class, $namespace) === 0) {

                $class = substr($class, strlen($namespace));
                $class = str_replace('\\', '/', $class);

                require base_path("{$folder}{$class}.php");

                return;
            }
        }
    });
}
