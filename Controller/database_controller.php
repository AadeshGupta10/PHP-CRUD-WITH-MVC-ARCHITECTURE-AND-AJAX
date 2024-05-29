<?php

require_once("/wamp64/www/crud_oops/Model/operations.php");

class controller
{
    public $obj;
    function __construct()
    {
        $this->obj = new operations();
    }

    function create($name, $email, $password, $contact, $gender)
    {
        $this->obj->create($name, $email, $password, $contact, $gender);
    }

    function read()
    {
        return $this->obj->read();
    }

    function readone($id)
    {
        return $this->obj->readone($id);
    }

    function update($id, $name, $email, $password, $contact, $gender)
    {
        $this->obj->update($id, $name, $email, $password, $contact, $gender);
    }

    function delete($id)
    {
        $this->obj->delete($id);
    }
}

$object = new controller();
// Performing Operations

if (isset($_POST['create'])) {
    $object->create($_POST["name"], $_POST["email"], $_POST["password"], $_POST["contact"], $_POST["gender"]);
}

if (isset($_POST['update'])) {
    $object->update($_POST["id"], $_POST["name"], $_POST["email"], $_POST["password"], $_POST["contact"], $_POST["gender"]);
}

if (isset($_POST['delete'])) {
    $object->delete($_POST['id']);
}
