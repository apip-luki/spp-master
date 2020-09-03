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
                                <input type="text" class="form-control" name="nisn" value="<?= $siswa->nisn; ?>">
                                <?= form_error('nisn', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>NIS <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nis" value="<?= $siswa->nis; ?>">
                                <?= form_error('nis', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Nama <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= $siswa->nama; ?>">
                                <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Kelas <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="id_kelas" class="form-control">
                                    <option></option>
                                    <?php foreach ($kelas as $kelas) { ?>
                                    <option value="<?= $kelas->id_kelas; ?>" <?php if ($siswa->id_kelas == $kelas->id_kelas) {
																						echo "selected";
																					} ?>>
                                        <?= $kelas->nama_kelas; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_kelas', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea class="form-control" name="alamat" id="editor"
                                    value="<?= $siswa->alamat; ?>"><?= $siswa->alamat; ?></textarea>
                                <?= form_error('alamat', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>No Telp <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_telp" value="<?= $siswa->no_telp; ?>">
                                <?= form_error('no_telp', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Nominal SPP <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="id_spp" class="form-control">
                                    <option></option>
                                    <?php foreach ($spp as $spp) { ?>
                                    <option value="<?= $spp->id_spp; ?>" <?php if ($siswa->id_spp == $spp->id_spp) {
																					echo "selected";
																				} ?>>
                                        <?= $spp->tahun; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_spp', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= form_close(); ?>