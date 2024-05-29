<?php
class database
{
    function connection()
    {
        return $connection = mysqli_connect("localhost", "root", "1001", "oops");
    }
}

?>