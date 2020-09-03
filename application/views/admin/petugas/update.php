<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <?= form_open_multipart(base_url('admin/petugas/update/' . $petugas->id_petugas));
            ?>
            <div class="row">
                <div class="col-md-3">
                    <label>Username</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username..."
                            value="<?= $petugas->username; ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Nama Petugas</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas..."
                            value="<?= $petugas->nama_petugas; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Level</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <select name="level" class="form-control">
                            <option value="Admin" <?php if ($petugas->level == "Admin") {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                            <option value="Petugas" <?php if ($petugas->level == "Petugas") {
                                                        echo "selected";
                                                    } ?>>Petugas</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Update Petugas</button>
                    </div>
                </div>
            </div>
            <?= form_close();
            ?>
        </div>
    </div>
</div>