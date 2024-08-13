<?php
include("config/database.php");

## Step 1 - Get user's data, by user id
if (isset($_GET['id'])) {
    $sql = "select * from tasks where id = " . $_GET['id'];
    $result = $conn->query($sql);
    $task = mysqli_fetch_assoc($result);
} else {
    echo "<h1>Invalid request</h1>";
    exit;
}

## Step 2 - Update user data, by form submit
if (isset($_POST['submit'])) {
    extract($_POST);

    $sql = "UPDATE tasks SET title = '$title', description = '$description' where id = " . $_GET['id'];

    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['success'] = "User has been updated";
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">

    <title>Taskmate</title>
</head>

<body class="bg-gray-100">
    <section class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold mb-4">Edit Task</h2>
        <form action="edit-task.php?id=<?php echo $task['id']; ?>" method="post">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="<?php echo $task['title']; ?>" required>
            </div>
            <div class="mb-2">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea id="description" name="description" class="w-full  py-2 border border-gray-300 rounded-lg" rows="4" required>
                    <?php echo $task['description']; ?>
                </textarea>
                <input type="email" name="" id="">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 text-center rounded-lg hover:bg-blue-600">Update Task</button>
            </div>
        </form>
        
        <div class="mt-4 text-center p-4 rounded-lg bg-green-500 hover:bg-green-600">
            <a href="tasks.php" class="text-white ">View All Tasks</a>
        </div>
    </section>
</body>
</html>