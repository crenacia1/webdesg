<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>My To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>My To-Do List</h2>

    <form action="add.php" method="POST">
        <input type="text" name="task_name" placeholder="Add a new task..." required>
        <button type="submit" class="add-btn">Add Task</button>
    </form>

    <hr>

    <?php
    $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="task">
            <span><?= $row['task_name']; ?></span>
            <div>
                <a href="update.php?id=<?= $row['id']; ?>" class="edit-btn">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" class="delete-btn" onclick="return confirmDelete()">Delete</a>
            </div>
        </div>
    <?php } ?>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this task?");
}
</script>

</body>
</html>