<?php
require_once 'Task.php';
require_once 'TaskManager.php';

$taskManager = new TaskManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $taskManager->addTask(new Task($_POST['task_name'], $_POST['due_date']));
    } elseif (isset($_POST['update'])) {
        $taskManager->updateTask((int)$_POST['task_index'], $_POST['task_name'], $_POST['due_date']);
    } elseif (isset($_POST['delete'])) {
        $taskManager->deleteTask((int)$_POST['task_index']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        input, button {
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .task-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>

        <div class="task-actions">
            <h2>Add Task</h2>
            <form method="post">
                <input type="text" name="task_name" placeholder="Task Name" required>
                <input type="date" name="due_date" required>
                <button type="submit" name="add">Add Task</button>
            </form>

            <h2>Update Task</h2>
            <form method="post">
                <input type="number" name="task_index" placeholder="Task Index" min="0" required>
                <input type="text" name="task_name" placeholder="New Task Name" required>
                <input type="date" name="due_date" required>
                <button type="submit" name="update">Update Task</button>
            </form>

            <h2>Delete Task</h2>
            <form method="post">
                <input type="number" name="task_index" placeholder="Task Index" min="0" required>
                <button type="submit" name="delete">Delete Task</button>
            </form>
        </div>

        <h2>Current Tasks</h2>
        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($taskManager->getTasks() as $index => $task) {
                    echo "<tr>";
                    echo "<td>{$task->getName()}</td>";
                    echo "<td>{$task->getDueDate()}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
