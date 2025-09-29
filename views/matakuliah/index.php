<div class="content">
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Data Mata Kuliah</h1>
            <a href="<?php echo BASE_URL; ?>matakuliah/create" class="btn btn-primary">Tambah Mata Kuliah</a>
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
            <h3 class="card-title">Daftar Mata Kuliah</h3>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($matakuliah)): ?>
                    <?php foreach ($matakuliah as $mk): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($mk['KodeMatkul']); ?></td>
                            <td><?php echo htmlspecialchars($mk['NamaMatkul']); ?></td>
                            <td><?php echo htmlspecialchars($mk['SKS']); ?></td>
                            <td><?php echo htmlspecialchars($mk['Semester']); ?></td>
                            <td>
                                <a href="<?php echo BASE_URL; ?>matakuliah/edit/<?php echo $mk['KodeMatkul']; ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="<?php echo BASE_URL; ?>matakuliah/delete/<?php echo $mk['KodeMatkul']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data mata kuliah</td>
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
