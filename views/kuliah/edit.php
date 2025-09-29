<div class="content">
    <div class="page-header">
        <h1>Edit Data Kuliah</h1>
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
            <h3 class="card-title">Form Edit Data Kuliah</h3>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label class="form-label">Mahasiswa</label>
                <select name="NIM" class="form-control" required>
                    <option value="">Pilih Mahasiswa</option>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <option value="<?php echo $mhs['NIM']; ?>" <?php echo ($data['NIM'] == $mhs['NIM']) ? 'selected' : ''; ?>>
                            <?php echo $mhs['NIM'] . ' - ' . $mhs['Nama_Mhs']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Dosen</label>
                <select name="NIP" class="form-control" required>
                    <option value="">Pilih Dosen</option>
                    <?php foreach ($dosen as $dsn): ?>
                        <option value="<?php echo $dsn['NIP']; ?>" <?php echo ($data['NIP'] == $dsn['NIP']) ? 'selected' : ''; ?>>
                            <?php echo $dsn['NIP'] . ' - ' . $dsn['Nama_Dosen']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Mata Kuliah</label>
                <select name="KodeMatkul" class="form-control" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php foreach ($matakuliah as $mk): ?>
                        <option value="<?php echo $mk['KodeMatkul']; ?>" <?php echo ($data['KodeMatkul'] == $mk['KodeMatkul']) ? 'selected' : ''; ?>>
                            <?php echo $mk['KodeMatkul'] . ' - ' . $mk['NamaMatkul']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Nilai</label>
                <select name="Nilai" class="form-control" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A" <?php echo ($data['Nilai'] == 'A') ? 'selected' : ''; ?>>A</option>
                    <option value="B" <?php echo ($data['Nilai'] == 'B') ? 'selected' : ''; ?>>B</option>
                    <option value="C" <?php echo ($data['Nilai'] == 'C') ? 'selected' : ''; ?>>C</option>
                    <option value="D" <?php echo ($data['Nilai'] == 'D') ? 'selected' : ''; ?>>D</option>
                    <option value="E" <?php echo ($data['Nilai'] == 'E') ? 'selected' : ''; ?>>E</option>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo BASE_URL; ?>kuliah" class="btn btn-secondary">Kembali</a>
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
