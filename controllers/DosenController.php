<?php
require_once 'controllers/BaseController.php';
require_once 'models/Dosen.php';

class DosenController extends BaseController {
    private $dosenModel;
    
    public function __construct() {
        $this->dosenModel = new Dosen();
    }
    
    public function index() {
        $data = [
            'title' => 'Data Dosen',
            'dosen' => $this->dosenModel->findAll()
        ];
        
        $this->loadView('dosen/index', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'NIP' => $_POST['NIP'],
                'Nama_Dosen' => $_POST['Nama_Dosen'],
                'Alamat_Dosen' => $_POST['Alamat_Dosen']
            ];
            
            $errors = $this->dosenModel->validate($data);
            
            if ($this->dosenModel->isNIPExists($data['NIP'])) {
                $errors[] = 'NIP sudah terdaftar';
            }
            
            if (empty($errors)) {
                if ($this->dosenModel->create($data)) {
                    $this->redirect('dosen?success=Data dosen berhasil ditambahkan');
                } else {
                    $errors[] = 'Gagal menambahkan data dosen';
                }
            }
            
            $viewData = [
                'title' => 'Tambah Dosen',
                'errors' => $errors,
                'data' => $data
            ];
        } else {
            $viewData = [
                'title' => 'Tambah Dosen',
                'data' => []
            ];
        }
        
        $this->loadView('dosen/create', $viewData);
    }
    
    public function edit($nip) {
        $dosen = $this->dosenModel->findById($nip);
        
        if (!$dosen) {
            $this->redirect('dosen?error=Data dosen tidak ditemukan');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'NIP' => $_POST['NIP'],
                'Nama_Dosen' => $_POST['Nama_Dosen'],
                'Alamat_Dosen' => $_POST['Alamat_Dosen']
            ];
            
            $errors = $this->dosenModel->validate($data);
            
            if ($data['NIP'] != $nip && $this->dosenModel->isNIPExists($data['NIP'])) {
                $errors[] = 'NIP sudah terdaftar';
            }
            
            if (empty($errors)) {
                if ($this->dosenModel->update($nip, $data)) {
                    $this->redirect('dosen?success=Data dosen berhasil diupdate');
                } else {
                    $errors[] = 'Gagal mengupdate data dosen';
                }
            }
            
            $viewData = [
                'title' => 'Edit Dosen',
                'errors' => $errors,
                'data' => $data,
                'nip' => $nip
            ];
        } else {
            $viewData = [
                'title' => 'Edit Dosen',
                'data' => $dosen,
                'nip' => $nip
            ];
        }
        
        $this->loadView('dosen/edit', $viewData);
    }
    
    public function delete($nip) {
        $dosen = $this->dosenModel->findById($nip);
        
        if (!$dosen) {
            $this->redirect('dosen?error=Data dosen tidak ditemukan');
        }
        
        if ($this->dosenModel->delete($nip)) {
            $this->redirect('dosen?success=Data dosen berhasil dihapus');
        } else {
            $this->redirect('dosen?error=Gagal menghapus data dosen');
        }
    }
}
?>
