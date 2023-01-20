<?php
include_once dirname(__DIR__) . '/../konfiguracija/config.php';

class Baza {
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(SERVER, KORIME, LOZINKA, BAZA);

        if ($this->conn->connect_error) {
            throw new Exception("Nije uspela konekcija ka bazi!");
        }
    }

    public function selectAll($upit) {
        $result = $this->conn->query($upit);

        if ($result->num_rows == 0)
            return false;

        if (!$result)
            Baza::ThrowQueryException($upit, $this->conn->error);
        
        return $result;
    }

    public function selectOne($upit) {
        $result = $this->selectAll($upit);
        if ($result === false)
            return $result;

        $row = $result->fetch_assoc();

        if (!$result)
            Baza::ThrowQueryException($upit, $this->conn->error);

        return $row;
    }

    public function executeNonQuery($upit) {
        if ($this->conn->query($upit))
            return 'Uspesno ubaceni podaci u bazu!';

        Baza::ThrowQueryException($upit, $this->conn->error);
    }

    private static function ThrowQueryException($upit, $greska) {
        throw new Exception("Dogodila se greska prilikom izvrsenja upita '$upit'\nPoruka greske: $greska");
    }

    function __destruct()
    {
        $this->conn->close();
    }
}