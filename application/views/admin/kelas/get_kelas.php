<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('admin/siswa/create_kel'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Tambah Kelas</span>
        </a>
    </div>
    <?php
	if ($this->session->flashdata('message')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('message');
		echo '</div>';
	}
	echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
						foreach ($kelas as $kelas) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $kelas->nama_kelas; ?></td>
                            <td><?= $kelas->kompetensi_keahlian; ?></td>
                            <td>
                                <a href="<?= base_url('admin/siswa/update_kel/' . $kelas->id_kelas); ?> "
                                    class="btn btn-success btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                                <?php include "delete.php"; ?>
                            </td>
                        </tr>
                        <?php $i++;
						} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>