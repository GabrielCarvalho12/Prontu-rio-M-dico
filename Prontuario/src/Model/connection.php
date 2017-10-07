<?php

class connection
{

    private $db;

    public function conect()
    {
        $this->db = mysqli_connect('localhost', 'root', '', "prontuario");
        mysqli_select_db($this->db, "seletor de cidade");
    }


    public function getDb()
    {
        return $this->db;
    }
}