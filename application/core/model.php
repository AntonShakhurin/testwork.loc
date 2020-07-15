<?php

class Model{



    public function sql($sql,$args = []){
        $db =  new PDO('mysql:host=localhost;dbname=testwork', 'root', '' );
        $sth = $db->prepare($sql);
        $sth->execute($args);
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }


    public function update($sql,$args = []){
        $db =  new PDO('mysql:host=localhost;dbname=testwork', 'root', '' );
        $sth = $db->prepare($sql);
        $sth->execute($args);
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public function create($sql,$args = []){
        $db =  new PDO('mysql:host=localhost;dbname=testwork', 'root', '' );
        $sth = $db->prepare($sql);
        $sth->execute($args);
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }


}