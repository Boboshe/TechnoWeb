<?php

class Connection
{
    private $db;

    public function __construct($hostname, $username, $password)
    {
        try {
            $this->db = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password)or die(print_r($this->db->errorInfo(), true));
            echo 'Connected to database';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function getPDO()
    {
        return $this->db;
    }

    public function closeConnection() {
        $db = null;
        echo 'Disconnected from database';
    }

    public function insertIntoIncident(Incident $tableau)
    {
        echo "TEST : " .$tableau-> getDescription();

        try {
            $count = $this->db->exec("INSERT INTO Incident(Description, Type, Id, Adresse, Severite, Reference, Image)
                                  VALUES ($tableau-> getDescription(), $tableau->getType(), 1,
                                          $tableau->getAdresse(), $tableau->getSeverite(), $tableau->getReference(),
                                          $tableau->getImgURI());")or die(print_r($this->db->errorInfo(), true));
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }

        return "Nombre de lignes insérées : ".$count;
    }
}

