<?php
class Task {
    private $name;
    private $dueDate;

    public function __construct($name, $dueDate) {
        $this->name = $name;
        $this->dueDate = $dueDate;
    }

    public function getName() {
        return $this->name;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }
}
?>
