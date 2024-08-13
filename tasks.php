<?php
include("config/database.php");

// Delete task if id is set
if (isset($_GET['id'])) {
    extract($_GET);
    $sql = "DELETE FROM tasks WHERE id = " . $id;
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['success'] = "Task has been deleted";
    } else {
        $_SESSION['error'] = "Something went wrong, please try again";
    }
    header("LOCATION: tasks.php");
}

// Get all tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <title>Taskmate</title>
</head>
<body class="bg-gray-100">
    <section class="p-6 max-w-4xl mx-auto bg-white rounded-lg shadow-md mt-10">
        <?php include("include/alert.php"); ?>
        <h2 class="text-2xl font-bold mb-4">All Tasks</h2>
        <div class="space-y-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200">
                        <h3 class="text-xl font-semibold mb-2"><?php echo $row['title']; ?></h3>
                        <p class="text-gray-700 mb-2"><?php echo $row['description']; ?></p>
                        <p class="text-gray-500 text-sm">Created At: <?php echo $row['created_at']; ?></p>
                        <div class="mt-4 flex space-x-2">
                            <a href="edit-task.php?id=<?php echo $row['id']; ?>" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">Edit</a>
                            <a href="tasks.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">Delete</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='bg-white rounded-lg shadow-md p-4 border border-gray-200'><p class='text-center text-gray-500'>No tasks found!</p></div>";
            }
            ?>
        </div>
        <div class="mt-4 bg-gray-200 text-center p-4 rounded-lg bg-green-500 hover:bg-green-600">
            <a href="index.php" class="text-white ">Add New Task</a>
        </div>
    </section>
</body>
</html>
