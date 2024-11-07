<?php
require_once '../config/db.php';
class ferramenta
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($tipo, $nome, $descricao)
    {
        $sql = "INSERT INTO ferramenta (tipo, nome, descricao) VALUES (:tipo, :nome, :descricao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        return $stmt->execute();
    }

    public function list()
    {
        $sql = "SELECT id, nome FROM feramenta";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM feramenta WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $tipo, $nome,$descricao)
    {
        $sql = "UPDATE ferramenta SET tipo = :tipo, nome = :nome, descricao= :descriacao WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM feramenta WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}