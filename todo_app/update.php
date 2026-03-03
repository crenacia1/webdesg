<?php
include 'db.php';

$id = $_GET['id'];

if(isset($_POST['update'])) {
    $task = $_POST['task_name'];
    $conn->query("UPDATE tasks SET task_name='$task' WHERE id=$id");
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Task</h2>

    <form method="POST">
        <input type="text" name="task_name" value="<?= $row['task_name']; ?>" required>
        <button type="submit" name="update" class="add-btn">Update</button>
    </form>
</div>

</body>
</html>