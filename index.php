<?php
include("config/database.php");

// Form submit handling
if (isset($_POST['submit'])) {
    extract($_POST);

    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO tasks (title, description, created_at) VALUES ('$title', '$description', '$date')";

    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['success'] = "Task has been added";
    } else {
        $_SESSION['error'] = "Something went wrong, please try again";
    }
    header("LOCATION: tasks.php");
}
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
    <section class="p-6 max-w-md mx-auto bg-white rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-semibold mb-4">Add New Task</h2>
        <form action="index.php" method="post">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md" rows="4" required></textarea>
            </div>
            <div class="flex justify-center">
            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Task</button>
            </div>
        </form>
        
        <div class="mt-4 text-center p-4 rounded-lg bg-green-500 hover:bg-green-600">
            <a href="tasks.php" class="text-white ">View All Tasks</a>
        </div>
    </section>
</body>
</html>
