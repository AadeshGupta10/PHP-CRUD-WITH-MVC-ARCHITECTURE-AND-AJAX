<?php
require_once("database_model.php");

class operations
{
    public $connection;

    function __construct()
    {
        $db = new database();
        $conn = $db->connection();

        if (!$conn) {
            echo "Connection Failed";
        } else {
            $this->connection = $conn;
            // echo "Connection Established";
        }
    }

    function create($name, $email, $password, $contact, $gender)
    {
        $query = "insert into user(name,email,password,contact,gender) values('$name','$email','$password','$contact','$gender');";
        mysqli_query($this->connection, $query);
    }

    function read()
    {
        return mysqli_fetch_all(mysqli_query($this->connection, "select * from user;"));
    }

    function readone($id)
    {
        return mysqli_fetch_array(mysqli_query($this->connection, "select * from user where id=$id;"));
    }

    function update($id, $name, $email, $password, $contact, $gender)
    {
        $query = "update user set name='$name',email='$email',password='$password',contact='$contact',gender='$gender' where id=$id";
        mysqli_query($this->connection, $query);
    }

    function delete($id)
    {
        mysqli_query($this->connection, "delete from user where id=$id");
    }
}
