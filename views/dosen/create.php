<div class="content">
    <div class="page-header">
        <h1>Tambah Dosen</h1>
    </div>
    
    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="alert alert-error">
            <ul style="margin: 0; padding-left: 20px;">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Dosen</h3>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label class="form-label">NIP</label>
                <input type="text" name="NIP" class="form-control" value="<?php echo isset($data['NIP']) ? htmlspecialchars($data['NIP']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Nama Dosen</label>
                <input type="text" name="Nama_Dosen" class="form-control" value="<?php echo isset($data['Nama_Dosen']) ? htmlspecialchars($data['Nama_Dosen']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Alamat</label>
                <textarea name="Alamat_Dosen" class="form-control" rows="3"><?php echo isset($data['Alamat_Dosen']) ? htmlspecialchars($data['Alamat_Dosen']) : ''; ?></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo BASE_URL; ?>dosen" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.alert-error {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}
</style>
