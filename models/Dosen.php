<?php
require_once 'models/BaseModel.php';

class Dosen extends BaseModel {
    protected $table = 'Dosen';
    protected $primaryKey = 'NIP';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function validate($data) {
        $errors = [];
        
        if (empty($data['NIP'])) {
            $errors[] = 'NIP tidak boleh kosong';
        } elseif (strlen($data['NIP']) > 10) {
            $errors[] = 'NIP maksimal 10 karakter';
        }
        
        if (empty($data['Nama_Dosen'])) {
            $errors[] = 'Nama Dosen tidak boleh kosong';
        } elseif (strlen($data['Nama_Dosen']) > 50) {
            $errors[] = 'Nama Dosen maksimal 50 karakter';
        }
        
        if (!empty($data['Alamat_Dosen']) && strlen($data['Alamat_Dosen']) > 100) {
            $errors[] = 'Alamat maksimal 100 karakter';
        }
        
        return $errors;
    }
    
    public function isNIPExists($nip, $excludeId = null) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE NIP = :nip";
        if ($excludeId) {
            $query .= " AND NIP != :excludeId";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nip', $nip);
        if ($excludeId) {
            $stmt->bindParam(':excludeId', $excludeId);
        }
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
}
?>
