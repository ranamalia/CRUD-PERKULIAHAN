<?php
require_once 'controllers/BaseController.php';
require_once 'models/MataKuliah.php';

class MatakuliahController extends BaseController {
    private $mataKuliahModel;
    
    public function __construct() {
        $this->mataKuliahModel = new MataKuliah();
    }
    
    public function index() {
        $data = [
            'title' => 'Data Mata Kuliah',
            'matakuliah' => $this->mataKuliahModel->findAll()
        ];
        
        $this->loadView('matakuliah/index', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'KodeMatkul' => $_POST['KodeMatkul'],
                'NamaMatkul' => $_POST['NamaMatkul'],
                'SKS' => $_POST['SKS'],
                'Semester' => $_POST['Semester']
            ];
            
            $errors = $this->mataKuliahModel->validate($data);
            
            if ($this->mataKuliahModel->isKodeExists($data['KodeMatkul'])) {
                $errors[] = 'Kode Mata Kuliah sudah terdaftar';
            }
            
            if (empty($errors)) {
                if ($this->mataKuliahModel->create($data)) {
                    $this->redirect('matakuliah?success=Data mata kuliah berhasil ditambahkan');
                } else {
                    $errors[] = 'Gagal menambahkan data mata kuliah';
                }
            }
            
            $viewData = [
                'title' => 'Tambah Mata Kuliah',
                'errors' => $errors,
                'data' => $data
            ];
        } else {
            $viewData = [
                'title' => 'Tambah Mata Kuliah',
                'data' => []
            ];
        }
        
        $this->loadView('matakuliah/create', $viewData);
    }
    
    public function edit($kode) {
        $matakuliah = $this->mataKuliahModel->findById($kode);
        
        if (!$matakuliah) {
            $this->redirect('matakuliah?error=Data mata kuliah tidak ditemukan');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'KodeMatkul' => $_POST['KodeMatkul'],
                'NamaMatkul' => $_POST['NamaMatkul'],
                'SKS' => $_POST['SKS'],
                'Semester' => $_POST['Semester']
            ];
            
            $errors = $this->mataKuliahModel->validate($data);
            
            if ($data['KodeMatkul'] != $kode && $this->mataKuliahModel->isKodeExists($data['KodeMatkul'])) {
                $errors[] = 'Kode Mata Kuliah sudah terdaftar';
            }
            
            if (empty($errors)) {
                if ($this->mataKuliahModel->update($kode, $data)) {
                    $this->redirect('matakuliah?success=Data mata kuliah berhasil diupdate');
                } else {
                    $errors[] = 'Gagal mengupdate data mata kuliah';
                }
            }
            
            $viewData = [
                'title' => 'Edit Mata Kuliah',
                'errors' => $errors,
                'data' => $data,
                'kode' => $kode
            ];
        } else {
            $viewData = [
                'title' => 'Edit Mata Kuliah',
                'data' => $matakuliah,
                'kode' => $kode
            ];
        }
        
        $this->loadView('matakuliah/edit', $viewData);
    }
    
    public function delete($kode) {
        $matakuliah = $this->mataKuliahModel->findById($kode);
        
        if (!$matakuliah) {
            $this->redirect('matakuliah?error=Data mata kuliah tidak ditemukan');
        }
        
        if ($this->mataKuliahModel->delete($kode)) {
            $this->redirect('matakuliah?success=Data mata kuliah berhasil dihapus');
        } else {
            $this->redirect('matakuliah?error=Gagal menghapus data mata kuliah');
        }
    }
}
?>
