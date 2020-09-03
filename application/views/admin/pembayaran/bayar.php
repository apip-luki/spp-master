<div class="container">
    <?= form_open_multipart(base_url('admin/pembayaran/bayar/' . $pembayaran->id_pembayaran)); ?>
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Data Siswa
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td>NISN</td>
                                        <td><?= $pembayaran->nisn; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIS</td>
                                        <td><?= $pembayaran->nis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= $pembayaran->nama; ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Kelas</td>
                                        <td><?= $pembayaran->nama_kelas; ?></td>
                                    </tr> -->
                                    <tr>
                                        <td>Nominal</td>
                                        <td><?= 'Rp ' . number_format($pembayaran->nominal); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="col-md-auto">
                        <label>Tanggal Pembayaran<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <input type="date" class="form-control" name="tgl_bayar">
                            <?php echo form_error('tgl_bayar', '<span class="text-danger">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <label>Bulan Pembayaran<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-auto">
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
                    <div class="col-md-auto">
                        <label>Tahun Pembayaran<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <input type="text" maxlength="4" class="form-control" name="tahun_bayar">
                            <?php echo form_error('tahun_bayar', '<span class="text-danger">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <label>Jumlah bayar <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <input type="text" class="form-control" name="jumlah_bayar"
                                value="<?= $pembayaran->nominal ?>">
                            <?php echo form_error('jumlah_bayar', '<span class="text-danger">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <label>Keterangan<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <select name="keterangan" class="form-control">
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Bayar">Belum Bayar</option>
                            </select>
                            <?php echo form_error('Lunas', '<span class="text-danger">', '</span>'); ?>
                        </div>
                    </div>

                    <div class="col-md-auto">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i
                                    class="fa fa-save"></i> Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=
	form_close();
?>


















</div>