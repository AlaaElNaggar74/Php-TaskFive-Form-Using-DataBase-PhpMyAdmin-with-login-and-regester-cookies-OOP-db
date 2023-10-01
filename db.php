<?php

class Db
{
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $dbName = 'fci';
    private $connection;

    function __construct()
    {
        $this->connection = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
    }

    function get_connection()
    {
        return $this->connection;
    }

    function get_Data($table, $condition = 1)
    {
        return  $this->connection->query("select * from $table where $condition");
    }

    function reset_Index($table)
    {
        $this->connection->query("ALTER TABLE $table AUTO_INCREMENT = 1");
    }

    function delete_Spec_Data($table, $condition = 1)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        $this->connection->query($sql);
    }

    function insert_Data($table, $attributes, $values)
    {
        $this->connection->query("insert into $table $attributes values $values");
    }

    function edit_Data($table, $set, $condition)
    {
        $this->connection->query("UPDATE $table SET $set where $condition");
    }
}
