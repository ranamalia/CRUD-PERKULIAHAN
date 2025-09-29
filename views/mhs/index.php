<div class="content">
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Data Mahasiswa</h1>
            <a href="<?php echo BASE_URL; ?>mhs/create" class="btn btn-primary">Tambah Mahasiswa</a>
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
            <h3 class="card-title">Daftar Mahasiswa</h3>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($mahasiswa)): ?>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($mhs['NIM']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['Nama_Mhs']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['Alamat_Mhs']); ?></td>
                            <td>
                                <a href="<?php echo BASE_URL; ?>mhs/edit/<?php echo $mhs['NIM']; ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="<?php echo BASE_URL; ?>mhs/delete/<?php echo $mhs['NIM']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data mahasiswa</td>
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
</style>
