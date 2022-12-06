<?php

class PembuatKode
{

    private $host;
    private $user;
    private $password;
    public $database;
    private $sql;

    function __construct()
    {
        $this->connection();
    }

    function host()
    {
       return 'localhost';
    }

    function konfigurasi()
    {
        $data = [
            'host' => "localhost",
            'user' => "root",
            'password' => "",
            'database' => "hutanginapp_db",
        ];

        return $data;
    }

    function nama_api()
    {
        return "apiHutangin";
    }

    function connection()
    {

        $this->host = $this->konfigurasi()['host'];
        $this->user = $this->konfigurasi()['user'];
        $this->password = $this->konfigurasi()['password'];
        $this->database = $this->konfigurasi()['database'];

        $this->sql = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->sql->connect_error) {
            echo $this->sql->connect_error . ", please check  connection";
            die();
        }

       
    }

    function table_list()
    {
        $query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA=?";
        $stmt = $this->sql->prepare($query) or die("Error code :" . $this->sql->errno . " (not_primary_field)");
        $stmt->bind_param('s', $this->database);
        $stmt->bind_result($table_name);
        $stmt->execute();
        while ($stmt->fetch()) {
            $fields[] = array('table_name' => $table_name);
        }
        return $fields;
        $stmt->close();
        $this->sql->close();
    }

    function primary_field($table)
    {
        $query = "SELECT COLUMN_NAME,COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME=? AND COLUMN_KEY = 'PRI'";
        $stmt = $this->sql->prepare($query) or die("Error code :" . $this->sql->errno . " (primary_field)");
        $stmt->bind_param('ss', $this->database, $table);
        $stmt->bind_result($column_name, $column_key);
        $stmt->execute();
        $stmt->fetch();
        return $column_name;
        $stmt->close();
        $this->sql->close();
    }

    function not_primary_field($table)
    {
        $query = "SELECT COLUMN_NAME,COLUMN_KEY,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME=? AND COLUMN_KEY <> 'PRI'";
        $stmt = $this->sql->prepare($query) or die("Error code :" . $this->sql->errno . " (not_primary_field)");
        $stmt->bind_param('ss', $this->database, $table);
        $stmt->bind_result($column_name, $column_key, $data_type);
        $stmt->execute();
        while ($stmt->fetch()) {
            $fields[] = array('column_name' => $column_name, 'column_key' => $column_key, 'data_type' => $data_type);
        }
        return $fields;
        $stmt->close();
        $this->sql->close();
    }

    function all_field($table)
    {
        $query = "SELECT COLUMN_NAME,COLUMN_KEY,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME=?";
        $stmt = $this->sql->prepare($query) or die("Error code :" . $this->sql->errno . " (not_primary_field)");
        $stmt->bind_param('ss', $this->database, $table);
        $stmt->bind_result($column_name, $column_key, $data_type);
        $stmt->execute();
        while ($stmt->fetch()) {
            $fields[] = array('column_name' => $column_name, 'column_key' => $column_key, 'data_type' => $data_type);
        }
        return $fields;
        $stmt->close();
        $this->sql->close();
    }
}

$PembuatKode = new PembuatKode();
