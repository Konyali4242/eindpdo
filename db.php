<?php

class Database {
    public $pdo;

    public function __construct ($db="auto", $host="localhost:3307",  $user="root", $pass="") {
        $this->pdo = new PDO ("mysql:host=$host;dbname=$db;", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function insertCar($merk, $model, $jaar, $kenteken, $beschikbaarheid, $prijsperdag) {
        $stmt = $this->pdo->prepare("INSERT INTO autos (merk, model, jaar, kenteken, beschikbaarheid, prijsperdag) VALUES (?, ?, ?, ?, ?, ?) ");
        $stmt->execute([$merk, $model, $jaar, $kenteken, $beschikbaarheid, $prijsperdag]);
    }
    public function selectAllCars() : array {
        $stmt = $this->pdo->query("SELECT * FROM autos");
        $result = $stmt->fetchAll();
        return $result; 
    }
    public function selectOneCar($autoId) : array {
        $stmt = $this->pdo->prepare("SELECT * FROM autos WHERE autoId = ?");
        $stmt->execute([$autoId]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updateCar($merk, $model, $jaar, $kenteken, $beschikbaarheid, $prijsperdag, $autoId) {
        $stmt = $this->pdo->prepare("UPDATE autos SET merk = ?, model = ?, jaar = ?, kenteken = ?, beschikbaarheid = ?, prijsperdag = ?
        WHERE autoId = ?");
        $stmt->execute([$merk, $model, $jaar, $kenteken, $beschikbaarheid, $prijsperdag, $autoId]);
    }
    public function deleteCar(int $autoId) {
        $stmt = $this->pdo->prepare("DELETE from autos WHERE autoId = ?");
        $stmt->execute([$autoId]);
    }



    public function insertReserve($klantId, $autoId, $vanaf, $tot, $totaal) {
        $stmt = $this->pdo->prepare("INSERT INTO reservering (klantId, autoId, vanaf, tot, totaal) VALUES (?, ?, ?, ?, ?) ");
        $stmt->execute([$klantId, $autoId, $vanaf, $tot, $totaal]);
    }
    public function selectAllReserves() : array {
        $stmt = $this->pdo->query("SELECT * FROM reservering");
        $result = $stmt->fetchAll();
        return $result; 
    }
    public function selectOneReserve($reserveId) : array {
        $stmt = $this->pdo->prepare("SELECT * FROM reservering WHERE reserveId = ?");
        $stmt->execute([$reserveId]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updateReserve($klantId, $autoId, $vanaf, $tot, $totaal, $reserveId) {
        $stmt = $this->pdo->prepare("UPDATE reservering SET klantId = ?, autoId = ?, vanaf = ?, tot = ?, totaal = ?
        WHERE reserveId = ?");
        $stmt->execute([$klantId, $autoId, $vanaf, $tot, $totaal, $reserveId]);
    }
    public function deleteReserve($reserveId) {
        $stmt = $this->pdo->prepare("DELETE from reservering WHERE reserveId = ?");
        $stmt->execute([$reserveId]);
    }



    public function aanmelden($naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres) {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (naam, wachtwoord, emailadres, rijbewijsnummer, telefoonnummer, adres) VALUES (?, ?, ?, ?, ?, ?) ");
        $stmt->execute([$naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres]);
    }
    public function login($emailadres) {
        $stmt = $this->pdo->prepare("SELECT * FROM klanten where emailadres = ?");
        $stmt->execute([$emailadres]);
        $result = $stmt->fetch();
        return $result;
    }
    public function insertKlant($naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres, $usertype) {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (naam, wachtwoord, emailadres, rijbewijsnummer, telefoonnummer, adres, usertype) values (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres, $usertype]);
        return $this->pdo->lastInsertId();
    }
    public function selectAllKlant() : array {
        $stmt = $this->pdo->query("SELECT * FROM klanten");
        $result = $stmt->fetchAll();
        return $result; 
    }
    public function selectOneKlant($klantId) : array {
        $stmt = $this->pdo->prepare("SELECT * FROM klanten WHERE klantId = ?");
        $stmt->execute([$klantId]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updateKlant($naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres, $usertype, $klantId) {
        $stmt = $this->pdo->prepare("UPDATE klanten SET naam = ?, wachtwoord = ?, emailadres = ?, rijbewijsnummer = ?, telefoonnummer = ?, adres = ?, usertype = ?
        WHERE klantId = ?");
        $stmt->execute([$naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres, $usertype, $klantId]);
    }
    public function deleteKlant(int $klantId) {
        $stmt = $this->pdo->prepare("DELETE from klanten WHERE klantId = ?");
        $stmt->execute([$klantId]);
    }


    
    public function upload($file) {
        $stmt = $this->pdo->prepare("INSERT INTO foto (photo) values (?)");
        $stmt->execute([$file]);
    }

}
?>