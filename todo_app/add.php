<?php
include 'db.php';

if(isset($_POST['task_name'])) {
    $task = $_POST['task_name'];
    $conn->query("INSERT INTO tasks (task_name) VALUES ('$task')");
}

header("Location: index.php");
exit();
?>