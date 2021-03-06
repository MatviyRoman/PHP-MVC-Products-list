<?php
class Database
{
    protected $host = 'localhost';
    protected $dbname = 'mvc';
    protected $user = 'root';
    protected $password = 'root';

    public function openDbConnection()
    {
        $link = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        return $link;
    }

    public function closeDbConnection(&$link)
    {
        $link = null;
    }
}
