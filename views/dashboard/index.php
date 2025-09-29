<div class="content">
    <div class="page-header">
        <h1>Dashboard Sistem Perkuliahan</h1>
        <p>Selamat datang di Sistem Informasi Perkuliahan</p>
    </div>
    
    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card primary">
            <div class="stat-number"><?php echo $totalMhs; ?></div>
            <div class="stat-label">Total Mahasiswa</div>
        </div>
        
        <div class="stat-card secondary">
            <div class="stat-number"><?php echo $totalDosen; ?></div>
            <div class="stat-label">Total Dosen</div>
        </div>
        
        <div class="stat-card primary">
            <div class="stat-number"><?php echo $totalMataKuliah; ?></div>
            <div class="stat-label">Total Mata Kuliah</div>
        </div>
        
        <div class="stat-card secondary">
            <div class="stat-number"><?php echo $totalKuliah; ?></div>
            <div class="stat-label">Total Data Kuliah</div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Menu Utama</h3>
        </div>
        
        <div class="quick-actions">
            <div class="action-grid">
                <a href="<?php echo BASE_URL; ?>mhs" class="action-card">
                    <div class="action-icon">👨‍🎓</div>
                    <h4>Data Mahasiswa</h4>
                    <p>Kelola data mahasiswa, tambah, edit, dan hapus data mahasiswa</p>
                </a>
                
                <a href="<?php echo BASE_URL; ?>dosen" class="action-card">
                    <div class="action-icon">👨‍🏫</div>
                    <h4>Data Dosen</h4>
                    <p>Kelola data dosen pengajar mata kuliah</p>
                </a>
                
                <a href="<?php echo BASE_URL; ?>matakuliah" class="action-card">
                    <div class="action-icon">📚</div>
                    <h4>Data Mata Kuliah</h4>
                    <p>Kelola mata kuliah yang tersedia</p>
                </a>
                
                <a href="<?php echo BASE_URL; ?>kuliah" class="action-card">
                    <div class="action-icon">📊</div>
                    <h4>Data Kuliah</h4>
                    <p>Kelola data kuliah dan nilai mahasiswa</p>
                </a>
            </div>
        </div>
    </div>

<style>
.quick-actions {
    padding: 8px 0;
}

.action-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
}

.action-card {
    background: #FCEEC9;
    border: 2px solid #FFBE54;
    border-radius: 16px;
    padding: 32px;
    text-decoration: none;
    color: #2d1810;
    transition: all 0.3s ease;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #E4281F, #FFBE54);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.action-card:hover::before {
    transform: scaleX(1);
}

.action-card:hover {
    border-color: #E4281F;
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(228, 40, 31, 0.15);
}

.action-icon {
    font-size: 3.5rem;
    margin-bottom: 20px;
    filter: grayscale(0.2);
    transition: filter 0.3s ease;
}

.action-card:hover .action-icon {
    filter: grayscale(0);
}

.action-card h4 {
    background: linear-gradient(135deg, #E4281F, #FFBE54);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 12px;
    font-weight: 600;
    font-size: 1.2rem;
    letter-spacing: -0.025em;
}

.action-card p {
    color: #8b5a3c;
    font-size: 0.95rem;
    line-height: 1.5;
    font-weight: 400;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 32px;
    padding: 8px 0;
}

.info-item {
    background: #FCEEC9;
    border-radius: 12px;
    padding: 24px;
    border: 1px solid #FFBE54;
}

.info-item h4 {
    background: linear-gradient(135deg, #E4281F, #FFBE54);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 20px;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: -0.025em;
}

.info-item ul {
    list-style: none;
    padding: 0;
}

.info-item li {
    padding: 12px 0;
    border-bottom: 1px solid #FFBE54;
    font-size: 0.95rem;
    color: #8b5a3c;
    font-weight: 400;
    transition: color 0.2s ease;
}

.info-item li:hover {
    color: #5d3a26;
}

.info-item li:last-child {
    border-bottom: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .action-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .action-card {
        padding: 24px;
    }
    
    .info-item {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .action-icon {
        font-size: 3rem;
    }
    
    .action-card h4 {
        font-size: 1.1rem;
    }
}
</style>
