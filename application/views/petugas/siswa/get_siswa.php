<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <!-- <a href="<?= base_url('admin/siswa/create_sis'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-newspaper"></i>
            </span>
            <span class="text">Tambah Siswa</span>
        </a> -->
    </div>
    <?php

	if ($this->session->flashdata('message')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('message');
		echo '</div>';
	}

	?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tahun Spp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
						foreach ($siswa as $siswa) { ?>


                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $siswa->nis; ?></td>
                            <td><?= $siswa->nama; ?></td>
                            <td><?= $siswa->nama_kelas; ?></td>
                            <td><?= $siswa->tahun; ?></td>
                            <td>
                                <a href='<?= base_url('index/view/') . $siswa->nisn  ?>'
                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
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

</div>