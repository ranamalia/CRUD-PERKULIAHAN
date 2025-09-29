<?php
require_once 'controllers/BaseController.php';
require_once 'models/Kuliah.php';

class KuliahController extends BaseController {
    private $kuliahModel;
    
    public function __construct() {
        $this->kuliahModel = new Kuliah();
    }
    
    public function index() {
        $data = [
            'title' => 'Data Kuliah',
            'kuliah' => $this->kuliahModel->findAll()
        ];
        
        $this->loadView('kuliah/index', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'NIM' => $_POST['NIM'],
                'NIP' => $_POST['NIP'],
                'KodeMatkul' => $_POST['KodeMatkul'],
                'Nilai' => $_POST['Nilai']
            ];
            
            $errors = $this->kuliahModel->validate($data);
            
            if ($this->kuliahModel->isKuliahExists($data['NIM'], $data['KodeMatkul'])) {
                $errors[] = 'Data kuliah untuk mahasiswa dan mata kuliah ini sudah ada';
            }
            
            if (empty($errors)) {
                if ($this->kuliahModel->create($data)) {
                    $this->redirect('kuliah?success=Data kuliah berhasil ditambahkan');
                } else {
                    $errors[] = 'Gagal menambahkan data kuliah';
                }
            }
            
            $viewData = [
                'title' => 'Tambah Data Kuliah',
                'errors' => $errors,
                'data' => $data,
                'mahasiswa' => $this->kuliahModel->getAllMahasiswa(),
                'dosen' => $this->kuliahModel->getAllDosen(),
                'matakuliah' => $this->kuliahModel->getAllMataKuliah()
            ];
        } else {
            $viewData = [
                'title' => 'Tambah Data Kuliah',
                'data' => [],
                'mahasiswa' => $this->kuliahModel->getAllMahasiswa(),
                'dosen' => $this->kuliahModel->getAllDosen(),
                'matakuliah' => $this->kuliahModel->getAllMataKuliah()
            ];
        }
        
        $this->loadView('kuliah/create', $viewData);
    }
    
    public function edit($nim, $kodeMatkul = null) {
        // Handle URL parameters
        if ($kodeMatkul === null) {
            // If only one parameter, it might be encoded as nim-kodeMatkul
            $parts = explode('-', $nim);
            if (count($parts) >= 2) {
                $kodeMatkul = implode('-', array_slice($parts, 1));
                $nim = $parts[0];
            } else {
                $this->redirect('kuliah?error=Parameter tidak valid');
            }
        }
        
        $kuliah = $this->kuliahModel->findByCompositeKey($nim, $kodeMatkul);
        
        if (!$kuliah) {
            $this->redirect('kuliah?error=Data kuliah tidak ditemukan');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'NIM' => $_POST['NIM'],
                'NIP' => $_POST['NIP'],
                'KodeMatkul' => $_POST['KodeMatkul'],
                'Nilai' => $_POST['Nilai']
            ];
            
            $errors = $this->kuliahModel->validate($data);
            
            // Check if the new combination already exists (excluding current record)
            if (($data['NIM'] != $nim || $data['KodeMatkul'] != $kodeMatkul) && 
                $this->kuliahModel->isKuliahExists($data['NIM'], $data['KodeMatkul'], $nim, $kodeMatkul)) {
                $errors[] = 'Data kuliah untuk mahasiswa dan mata kuliah ini sudah ada';
            }
            
            if (empty($errors)) {
                if ($this->kuliahModel->updateByCompositeKey($nim, $kodeMatkul, $data)) {
                    $this->redirect('kuliah?success=Data kuliah berhasil diupdate');
                } else {
                    $errors[] = 'Gagal mengupdate data kuliah';
                }
            }
            
            $viewData = [
                'title' => 'Edit Data Kuliah',
                'errors' => $errors,
                'data' => $data,
                'nim' => $nim,
                'kodeMatkul' => $kodeMatkul,
                'mahasiswa' => $this->kuliahModel->getAllMahasiswa(),
                'dosen' => $this->kuliahModel->getAllDosen(),
                'matakuliah' => $this->kuliahModel->getAllMataKuliah()
            ];
        } else {
            $viewData = [
                'title' => 'Edit Data Kuliah',
                'data' => $kuliah,
                'nim' => $nim,
                'kodeMatkul' => $kodeMatkul,
                'mahasiswa' => $this->kuliahModel->getAllMahasiswa(),
                'dosen' => $this->kuliahModel->getAllDosen(),
                'matakuliah' => $this->kuliahModel->getAllMataKuliah()
            ];
        }
        
        $this->loadView('kuliah/edit', $viewData);
    }
    
    public function delete($nim, $kodeMatkul = null) {
        // Handle URL parameters
        if ($kodeMatkul === null) {
            // If only one parameter, it might be encoded as nim-kodeMatkul
            $parts = explode('-', $nim);
            if (count($parts) >= 2) {
                $kodeMatkul = implode('-', array_slice($parts, 1));
                $nim = $parts[0];
            } else {
                $this->redirect('kuliah?error=Parameter tidak valid');
            }
        }
        
        $kuliah = $this->kuliahModel->findByCompositeKey($nim, $kodeMatkul);
        
        if (!$kuliah) {
            $this->redirect('kuliah?error=Data kuliah tidak ditemukan');
        }
        
        if ($this->kuliahModel->deleteByCompositeKey($nim, $kodeMatkul)) {
            $this->redirect('kuliah?success=Data kuliah berhasil dihapus');
        } else {
            $this->redirect('kuliah?error=Gagal menghapus data kuliah');
        }
    }
}
?>
