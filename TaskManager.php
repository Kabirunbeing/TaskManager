<?php

require_once 'Task.php';

class TaskManager {
    private $tasks = [];

    public function addTask(Task $task) {
        $this->tasks[] = $task;
    }

    public function updateTask($index, $taskName, $dueDate) {
        if (isset($this->tasks[$index])) {
            $this->tasks[$index]->setName($taskName);
            $this->tasks[$index]->setDueDate($dueDate);
        }
    }

    public function deleteTask($index) {
        if (isset($this->tasks[$index])) {
            unset($this->tasks[$index]);
            $this->tasks = array_values($this->tasks); // Re-index array
        }
    }

    public function viewTasks() {
        foreach ($this->tasks as $task) {
            echo "Task Name: " . $task->getName() . " - Due Date: " . $task->getDueDate() . "\n";
        }
    }

    public function getTasks() {
        return $this->tasks;
    }
}
?>
