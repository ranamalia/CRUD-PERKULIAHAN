<?php
require_once 'controllers/BaseController.php';
require_once 'models/Mhs.php';

class MhsController extends BaseController {
    private $mhsModel;
    
    public function __construct() {
        $this->mhsModel = new Mhs();
    }
    
    public function index() {
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mhsModel->findAll()
        ];
        
        $this->loadView('mhs/index', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'NIM' => $_POST['NIM'],
                'Nama_Mhs' => $_POST['Nama_Mhs'],
                'Alamat_Mhs' => $_POST['Alamat_Mhs']
            ];
            
            $errors = $this->mhsModel->validate($data);
            
            if ($this->mhsModel->isNIMExists($data['NIM'])) {
                $errors[] = 'NIM sudah terdaftar';
            }
            
            if (empty($errors)) {
                if ($this->mhsModel->create($data)) {
                    $this->redirect('mhs?success=Data mahasiswa berhasil ditambahkan');
                } else {
                    $errors[] = 'Gagal menambahkan data mahasiswa';
                }
            }
            
            $viewData = [
                'title' => 'Tambah Mahasiswa',
                'errors' => $errors,
                'data' => $data
            ];
        } else {
            $viewData = [
                'title' => 'Tambah Mahasiswa',
                'data' => []
            ];
        }
        
        $this->loadView('mhs/create', $viewData);
    }
    
    public function edit($nim) {
        $mahasiswa = $this->mhsModel->findById($nim);
        
        if (!$mahasiswa) {
            $this->redirect('mhs?error=Data mahasiswa tidak ditemukan');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'NIM' => $_POST['NIM'],
                'Nama_Mhs' => $_POST['Nama_Mhs'],
                'Alamat_Mhs' => $_POST['Alamat_Mhs']
            ];
            
            $errors = $this->mhsModel->validate($data);
            
            if ($data['NIM'] != $nim && $this->mhsModel->isNIMExists($data['NIM'])) {
                $errors[] = 'NIM sudah terdaftar';
            }
            
            if (empty($errors)) {
                if ($this->mhsModel->update($nim, $data)) {
                    $this->redirect('mhs?success=Data mahasiswa berhasil diupdate');
                } else {
                    $errors[] = 'Gagal mengupdate data mahasiswa';
                }
            }
            
            $viewData = [
                'title' => 'Edit Mahasiswa',
                'errors' => $errors,
                'data' => $data,
                'nim' => $nim
            ];
        } else {
            $viewData = [
                'title' => 'Edit Mahasiswa',
                'data' => $mahasiswa,
                'nim' => $nim
            ];
        }
        
        $this->loadView('mhs/edit', $viewData);
    }
    
    public function delete($nim) {
        $mahasiswa = $this->mhsModel->findById($nim);
        
        if (!$mahasiswa) {
            $this->redirect('mhs?error=Data mahasiswa tidak ditemukan');
        }
        
        if ($this->mhsModel->delete($nim)) {
            $this->redirect('mhs?success=Data mahasiswa berhasil dihapus');
        } else {
            $this->redirect('mhs?error=Gagal menghapus data mahasiswa');
        }
    }
}
?>
