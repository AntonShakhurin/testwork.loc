<?php

class Database extends PDO  {

    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    protected  $db;
    protected static $instance = null;

    public function __construct(){
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'testwork';
        $this->user = 'root';
        $this->pass = '';

        $this->db =  new PDO('mysql:host=localhost;dbname=testwork', 'root', '' );

    }

    public function sql($sql,$args){
        $tasks = $this->db->query($sql);

        var_dump($tasks);
        $tasks->execute();
        $array = $tasks->fetch(PDO::FETCH_ASSOC);

        return $array;
    }
}