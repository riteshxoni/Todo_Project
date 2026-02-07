<?php
class Todo
{
    private $id;
    private $todoname;
    private $tododate;
    private $created;

    public function __construct($id,  $todoname,  $tododate,  $created)
    {
        $this->id = $id;
        $this->todoname = $todoname;
        $this->tododate = $tododate;
        $this->created = $created;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTodoname()
    {
        return $this->todoname;
    }

    public function getTododate()
    {
        return $this->tododate;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setTodoname($todoname): void
    {
        $this->todoname = $todoname;
    }

    public function setTododate($tododate): void
    {
        $this->tododate = $tododate;
    }

    public function setCreated($created): void
    {
        $this->created = $created;
    }
}
