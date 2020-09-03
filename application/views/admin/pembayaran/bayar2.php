<div class="container">
    <?php echo form_open_multipart(base_url('admin/index/bayar')); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nama <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <?php foreach ($siswa as $siswa) { ?>
                                <input type="text" class="form-control" name="nisn" value="<?= $siswa->nama ?>"
                                    readonly>
                                <?php } ?>
                                <?php echo form_error('nisn', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Pembayaran<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" class="form-control" name="tgl_bayar">
                                <?php echo form_error('tgl_bayar', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Bulan Pembayaran<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="bulan_bayar" class="form-control">
                                    <option></option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <?php echo form_error('bulan_bayar', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Tahun Pembayaran<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" maxlength="4" class="form-control" name="tahun_bayar">
                                <?php echo form_error('tahun_bayar', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>SPP <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <?php if (is_array($spp)) : ?>
                                <?php foreach ($spp as $spp) : ?>
                                <input type="text" class="form-control" name="id_spp"
                                    value="<?= 'Rp ' . number_format($spp->id_spp) ?>" readonly>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php echo form_error('id_spp', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Jumlah bayar <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <?php if (is_array($jumlah)) : ?>
                                <?php foreach ($jumlah as $jumlah) : ?>
                                <input type="text" class="form-control" name="jumlah_bayar"
                                    value="<?= $jumlah->nominal ?>">
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php echo form_error('jumlah_bayar', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Keterangan
                </div>
                <div class="card-body">

                    <label>Status <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <select name="keterangan" class="form-control">
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                        <?php echo form_error('keterangan', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <?php echo form_close(); ?>
</div>