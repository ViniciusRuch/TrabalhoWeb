<?php 
require_once '../config/db.php';

class madeira
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($tipo, $quantidade,$descricao,$preco,$dimensoes)
    {
        $sql = "INSERT INTO madeira (tipo,quantidade,descricao,preco,dimensoes) VALUES (:tipo, :quantidade,:descricao,:preco,:dimensoes)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':dimensoes', $dimensoes);
        return $stmt->execute();
    }

    public function list()
    {
        $sql = "SELECT id, tipo FROM madeira";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM madeira WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$tipo, $quantidade,$descricao,$preco,$dimensoes)
    {
        $sql = "UPDATE madeira SET tipo = :tipo, quantidade = :quantidade, descricao= :descricao, preco= :preco, dimensoes=:dimensoes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':dimensoes', $dimensoes);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM madeira WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}