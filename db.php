<?php

class Database {
    public $pdo;

    public function __construct ($db="auto", $host="localhost:3307",  $user="root", $pass="") {
        $this->pdo = new PDO ("mysql:host=$host;dbname=$db;", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function updateUser(string $naam, string $achternaam, int $ID) {
        $stmt = $this->pdo->prepare("UPDATE klanten SET naam = ?, achternaam = ? WHERE id = ?");
        $stmt->execute([$naam, $achternaam, $ID]);
    }

    public function deleteUser(int $ID) {
        $stmt = $this->pdo->prepare("DELETE FROM klanten WHERE id = ?");
        $stmt->execute([$ID]);
    }

    public function aanmelden($naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres) {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (naam, wachtwoord, emailadres, rijbewijsnummer, telefoonnummer, adres) VALUES (?, ?, ?, ?, ?, ?) ");
        $stmt->execute([$naam, $wachtwoord, $emailadres, $rijbewijsnummer, $telefoonnummer, $adres]);
    }

    public function upload($file) {
        $stmt = $this->pdo->prepare("INSERT INTO foto (photo) values (?)");
        $stmt->execute([$file]);
    }

    public function login($emailadres) {
        $stmt = $this->pdo->prepare("SELECT * FROM klanten where emailadres = ?");
        $stmt->execute([$emailadres]);
        $result = $stmt->fetch();
        return $result;
    }

}
?>