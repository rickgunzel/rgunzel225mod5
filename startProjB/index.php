<?php
session_start();
ini_set("session.cookie_lifetime","31536000");

if(!isset($_SESSION['tasks'])) {$_SESSION['tasks'] = array();}

if (isset($_POST['tasklist'])) {
    $task_list = $_POST['tasklist'];
} else {
    $task_list = array();
}

$errors = array();

switch((isset($_POST['action']) ? $_POST['action'] : null)) {
    case 'add':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
            $_SESSION['tasks'][] = $_POST['newtask'];
        }
        break;
    case 'delete':
        $task_index = $_POST['taskid'];
        unset($_SESSION['tasks'][$task_index]);
        $task_list = array_values($task_list);
        break;
}

include('task_list.php');
?>