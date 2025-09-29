<div class="sidebar">
    <div class="sidebar-header">
        <h2><?php echo APP_NAME; ?></h2>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="<?php echo BASE_URL; ?>" class="<?php echo (basename($_SERVER['REQUEST_URI']) == '' || basename($_SERVER['REQUEST_URI']) == 'perkuliahan-app') ? 'active' : ''; ?>">
                📊 Dashboard
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>mhs" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/mhs') !== false) ? 'active' : ''; ?>">
                👨‍🎓 Data Mahasiswa
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>dosen" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/dosen') !== false) ? 'active' : ''; ?>">
                👨‍🏫 Data Dosen
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>matakuliah" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/matakuliah') !== false) ? 'active' : ''; ?>">
                📚 Data Mata Kuliah
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>kuliah" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/kuliah') !== false) ? 'active' : ''; ?>">
                📊 Data Kuliah
            </a>
        </li>
    </ul>
    
    <div class="sidebar-footer">
        <div style="padding: 20px; border-top: 1px solid rgba(255, 255, 255, 0.2); margin-top: 20px;">
        </div>
    </div>
</div>

<div class="main-content">
