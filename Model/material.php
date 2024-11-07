<?php
require_once '../config/db.php';
class material
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($tipo, $quantidade,$descricao,$preco)
    {
        $sql = "INSERT INTO material (tipo,quantidade,descricao,preco) VALUES (:tipo, :quantidade,:descricao,:preco)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function list()
    {
        $sql = "SELECT id, tipo FROM material";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM material WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$tipo, $quantidade,$descricao,$preco)
    {
        $sql = "UPDATE material SET tipo = :tipo, quantidade = :quantidade, descricao=:descricao, preco=:preco WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM material WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}