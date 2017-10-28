<?php

class connection{

public $db;

public function conect()
{
    $this->db = mysqli_connect('localhost', 'root', '', "prontuario");
    mysqli_select_db($this->db, "seletor de cidade");
}
}