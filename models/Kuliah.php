<?php
require_once 'models/BaseModel.php';

class Kuliah extends BaseModel {
    protected $table = 'Kuliah';
    protected $primaryKey = 'NIM'; // Composite key, but we'll handle it differently
    
    public function __construct() {
        parent::__construct();
    }
    
    public function findAll() {
        $query = "SELECT k.*, m.Nama_Mhs, d.Nama_Dosen, mk.NamaMatkul 
                  FROM " . $this->table . " k
                  JOIN Mhs m ON k.NIM = m.NIM
                  JOIN Dosen d ON k.NIP = d.NIP
                  JOIN MataKuliah mk ON k.KodeMatkul = mk.KodeMatkul
                  ORDER BY k.NIM, k.KodeMatkul";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findByCompositeKey($nim, $kodeMatkul) {
        $query = "SELECT k.*, m.Nama_Mhs, d.Nama_Dosen, mk.NamaMatkul 
                  FROM " . $this->table . " k
                  JOIN Mhs m ON k.NIM = m.NIM
                  JOIN Dosen d ON k.NIP = d.NIP
                  JOIN MataKuliah mk ON k.KodeMatkul = mk.KodeMatkul
                  WHERE k.NIM = :nim AND k.KodeMatkul = :kodeMatkul";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':kodeMatkul', $kodeMatkul);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteByCompositeKey($nim, $kodeMatkul) {
        $query = "DELETE FROM " . $this->table . " WHERE NIM = :nim AND KodeMatkul = :kodeMatkul";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':kodeMatkul', $kodeMatkul);
        return $stmt->execute();
    }
    
    public function updateByCompositeKey($nim, $kodeMatkul, $data) {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= $key . ' = :' . $key . ', ';
        }
        $setClause = rtrim($setClause, ', ');
        
        $query = "UPDATE " . $this->table . " SET $setClause WHERE NIM = :nim AND KodeMatkul = :kodeMatkul";
        $stmt = $this->db->prepare($query);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':nim', $nim);
        $stmt->bindValue(':kodeMatkul', $kodeMatkul);
        
        return $stmt->execute();
    }
    
    public function validate($data) {
        $errors = [];
        
        if (empty($data['NIM'])) {
            $errors[] = 'NIM tidak boleh kosong';
        }
        
        if (empty($data['NIP'])) {
            $errors[] = 'NIP tidak boleh kosong';
        }
        
        if (empty($data['KodeMatkul'])) {
            $errors[] = 'Kode Mata Kuliah tidak boleh kosong';
        }
        
        if (empty($data['Nilai'])) {
            $errors[] = 'Nilai tidak boleh kosong';
        } elseif (!in_array($data['Nilai'], ['A', 'B', 'C', 'D', 'E'])) {
            $errors[] = 'Nilai harus berupa A, B, C, D, atau E';
        }
        
        return $errors;
    }
    
    public function isKuliahExists($nim, $kodeMatkul, $excludeNim = null, $excludeKode = null) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE NIM = :nim AND KodeMatkul = :kodeMatkul";
        if ($excludeNim && $excludeKode) {
            $query .= " AND NOT (NIM = :excludeNim AND KodeMatkul = :excludeKode)";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':kodeMatkul', $kodeMatkul);
        if ($excludeNim && $excludeKode) {
            $stmt->bindParam(':excludeNim', $excludeNim);
            $stmt->bindParam(':excludeKode', $excludeKode);
        }
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
    
    public function getAllMahasiswa() {
        $query = "SELECT NIM, Nama_Mhs FROM Mhs ORDER BY Nama_Mhs";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllDosen() {
        $query = "SELECT NIP, Nama_Dosen FROM Dosen ORDER BY Nama_Dosen";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllMataKuliah() {
        $query = "SELECT KodeMatkul, NamaMatkul FROM MataKuliah ORDER BY NamaMatkul";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
