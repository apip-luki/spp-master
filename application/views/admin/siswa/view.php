<div class="container">
    <?= form_open_multipart(base_url('admin/siswa/update_sis/' . $siswa->nisn)); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>NISN <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nisn" value="<?= $siswa->nisn; ?>"
                                    readonly>
                                <?= form_error('nisn', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>NIS <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nis" value="<?= $siswa->nis; ?>" readonly>
                                <?= form_error('nis', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Nama <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= $siswa->nama; ?>"
                                    readonly>
                                <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Kelas <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= $siswa->nama_kelas; ?>"
                                    readonly>
                                <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea class="form-control" name="alamat" id="editor" value="<?= $siswa->alamat; ?>"
                                    readonly><?= $siswa->alamat; ?></textarea>
                                <?= form_error('alamat', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>No Telp <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_telp" value="<?= $siswa->no_telp; ?>"
                                    readonly>
                                <?= form_error('no_telp', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Nominal SPP <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= $siswa->tahun ?>"
                                    readonly>
                                <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- 
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Update</button> -->
                    
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>