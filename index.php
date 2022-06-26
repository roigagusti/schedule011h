<?php
ini_set('error_reporting', E_ALL);
include 'classes.php';

class A
{
    function foo()
    {
        echo "hola";
    }
}

class B
{
    function bar()
    {
        A::foo();
    }
}

// Create an instance of Tasques -> listTasks(), listHabitants(), listHitos()
$a = new Tasques();
$b = $a -> listTasks();
print_r($b);
?>