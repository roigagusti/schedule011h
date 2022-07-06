<?php
ini_set('error_reporting', E_ALL);
include 'classes.php';

$tasques = new Tasques();
$tasks = $tasques -> listTasks();


foreach($tasks as $task){
    print_r($task);
    echo '<br>';
    echo $task->atid;
    echo '<br><br>';
}
?>