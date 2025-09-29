<?php
require_once 'models/BaseModel.php';

class Mhs extends BaseModel {
    protected $table = 'Mhs';
    protected $primaryKey = 'NIM';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function validate($data) {
        $errors = [];
        
        if (empty($data['NIM'])) {
            $errors[] = 'NIM tidak boleh kosong';
        } elseif (strlen($data['NIM']) > 10) {
            $errors[] = 'NIM maksimal 10 karakter';
        }
        
        if (empty($data['Nama_Mhs'])) {
            $errors[] = 'Nama Mahasiswa tidak boleh kosong';
        } elseif (strlen($data['Nama_Mhs']) > 50) {
            $errors[] = 'Nama Mahasiswa maksimal 50 karakter';
        }
        
        if (!empty($data['Alamat_Mhs']) && strlen($data['Alamat_Mhs']) > 100) {
            $errors[] = 'Alamat maksimal 100 karakter';
        }
        
        return $errors;
    }
    
    public function isNIMExists($nim, $excludeId = null) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE NIM = :nim";
        if ($excludeId) {
            $query .= " AND NIM != :excludeId";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nim', $nim);
        if ($excludeId) {
            $stmt->bindParam(':excludeId', $excludeId);
        }
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
}
?>
