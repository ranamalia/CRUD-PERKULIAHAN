<?php
require_once 'config/database.php';

class BaseModel {
    protected $db;
    protected $table;
    protected $primaryKey;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function findAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE " . $this->primaryKey . " = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $query = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";
        $stmt = $this->db->prepare($query);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        
        return $stmt->execute();
    }
    
    public function update($id, $data) {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= $key . ' = :' . $key . ', ';
        }
        $setClause = rtrim($setClause, ', ');
        
        $query = "UPDATE " . $this->table . " SET $setClause WHERE " . $this->primaryKey . " = :id";
        $stmt = $this->db->prepare($query);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE " . $this->primaryKey . " = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function count() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
?>
