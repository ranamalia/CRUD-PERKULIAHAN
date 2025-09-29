<?php
require_once 'controllers/BaseController.php';
require_once 'models/Mhs.php';
require_once 'models/Dosen.php';
require_once 'models/MataKuliah.php';
require_once 'models/Kuliah.php';

class DashboardController extends BaseController {
    public function index() {
        $mhsModel = new Mhs();
        $dosenModel = new Dosen();
        $mataKuliahModel = new MataKuliah();
        $kuliahModel = new Kuliah();
        
        $data = [
            'title' => 'Dashboard',
            'totalMhs' => $mhsModel->count(),
            'totalDosen' => $dosenModel->count(),
            'totalMataKuliah' => $mataKuliahModel->count(),
            'totalKuliah' => $kuliahModel->count()
        ];
        
        $this->loadView('dashboard/index', $data);
    }
}
?>
