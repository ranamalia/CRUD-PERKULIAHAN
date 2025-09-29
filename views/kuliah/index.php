<div class="content">
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Data Kuliah</h1>
            <a href="<?php echo BASE_URL; ?>kuliah/create" class="btn btn-primary">Tambah Data Kuliah</a>
        </div>
    </div>
    
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-error">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Data Kuliah</h3>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Mata Kuliah</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kuliah)): ?>
                    <?php foreach ($kuliah as $k): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($k['NIM']); ?></td>
                            <td><?php echo htmlspecialchars($k['Nama_Mhs']); ?></td>
                            <td><?php echo htmlspecialchars($k['NIP']); ?></td>
                            <td><?php echo htmlspecialchars($k['Nama_Dosen']); ?></td>
                            <td><?php echo htmlspecialchars($k['NamaMatkul']); ?></td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($k['Nilai']); ?>">
                                    <?php echo htmlspecialchars($k['Nilai']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL; ?>kuliah/edit/<?php echo $k['NIM']; ?>-<?php echo $k['KodeMatkul']; ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="<?php echo BASE_URL; ?>kuliah/delete/<?php echo $k['NIM']; ?>-<?php echo $k['KodeMatkul']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data kuliah</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.alert-error {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.badge {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 500;
    color: white;
}

.badge-a {
    background-color: #28a745;
}

.badge-b {
    background-color: #17a2b8;
}

.badge-c {
    background-color: #ffc107;
    color: #212529;
}

.badge-d {
    background-color: #fd7e14;
}

.badge-e {
    background-color: #dc3545;
}
</style>
