<?php
require_once 'models/BaseModel.php';

class MataKuliah extends BaseModel {
    protected $table = 'MataKuliah';
    protected $primaryKey = 'KodeMatkul';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function validate($data) {
        $errors = [];
        
        if (empty($data['KodeMatkul'])) {
            $errors[] = 'Kode Mata Kuliah tidak boleh kosong';
        } elseif (strlen($data['KodeMatkul']) > 10) {
            $errors[] = 'Kode Mata Kuliah maksimal 10 karakter';
        }
        
        if (empty($data['NamaMatkul'])) {
            $errors[] = 'Nama Mata Kuliah tidak boleh kosong';
        } elseif (strlen($data['NamaMatkul']) > 50) {
            $errors[] = 'Nama Mata Kuliah maksimal 50 karakter';
        }
        
        if (empty($data['SKS'])) {
            $errors[] = 'SKS tidak boleh kosong';
        } elseif (!is_numeric($data['SKS']) || $data['SKS'] < 1 || $data['SKS'] > 6) {
            $errors[] = 'SKS harus berupa angka antara 1-6';
        }
        
        if (empty($data['Semester'])) {
            $errors[] = 'Semester tidak boleh kosong';
        } elseif (!is_numeric($data['Semester']) || $data['Semester'] < 1 || $data['Semester'] > 8) {
            $errors[] = 'Semester harus berupa angka antara 1-8';
        }
        
        return $errors;
    }
    
    public function isKodeExists($kode, $excludeId = null) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE KodeMatkul = :kode";
        if ($excludeId) {
            $query .= " AND KodeMatkul != :excludeId";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode', $kode);
        if ($excludeId) {
            $stmt->bindParam(':excludeId', $excludeId);
        }
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
}
?>
