<div class="content">
    <div class="page-header">
        <h1>Edit Mata Kuliah</h1>
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
            <h3 class="card-title">Form Edit Mata Kuliah</h3>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label class="form-label">Kode Mata Kuliah</label>
                <input type="text" name="KodeMatkul" class="form-control" value="<?php echo htmlspecialchars($data['KodeMatkul']); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="NamaMatkul" class="form-control" value="<?php echo htmlspecialchars($data['NamaMatkul']); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">SKS</label>
                <select name="SKS" class="form-control" required>
                    <option value="">Pilih SKS</option>
                    <?php for ($i = 1; $i <= 6; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo ($data['SKS'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Semester</label>
                <select name="Semester" class="form-control" required>
                    <option value="">Pilih Semester</option>
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo ($data['Semester'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo BASE_URL; ?>matakuliah" class="btn btn-secondary">Kembali</a>
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
