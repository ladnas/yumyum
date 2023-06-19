

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman data popup Wa</h1>
                    <p class="mb-4">Edit data pada bagian popup wa</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Sub judul</th>
                                            <th>Sub teks</th>
                                            <th>Nama wa</th>
                                            <th>Link wa</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($wa as $was) : ?>
                                        <tr>
                                            <td><?= $was->id_wa ?></td>
                                            <td><?= $was->judul ?></td>
                                            <td><?= $was->sub_judul ?></td>
                                            <td><?= $was->sub_teks ?></td>
                                            <td><?= $was->nama_wa ?></td>
                                            <td><?= $was->link_wa ?></td>
                                            <td><img src="<?= base_url('/assets/img/') . $was->img ?>" alt="" style="width: 150px;"></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $was->id_wa ?>" class="btn btn-warning btn-l"><i class="fas fa-edit">Edit</i></a>
                                                <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-l"><i class="fas fa-plus">Tambah</i></a>
                                                <a href="<?= base_url('Popup/delete_data_wa/' . $was->id_wa) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger btn-l"><i class="fas fa-trash">Hapus</i><a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal edit -->
    <?php foreach ($wa as $was) { ?>
        <div class="modal fade" id="edit<?= $was->id_wa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="chart-area">
                                <form action="<?= base_url('Popup/edit_data_wa/' . $was->id_wa) ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control" value="<?= $was->judul ?>">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Sub judul</label>
                                        <input type="text" name="sub_judul" class="form-control" value="<?= $was->sub_judul ?>">
                                        <?= form_error('sub_judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">sub_teks</label>
                                        <input type="text" name="sub_teks" class="form-control" value="<?= $was->sub_teks ?>">
                                        <?= form_error('sub_teks', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">nama wa</label>
                                        <input type="text" name="nama_wa" class="form-control" value="<?= $was->nama_wa ?>">
                                        <?= form_error('nama_wa', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">link wa</label>
                                        <input type="text" name="link_wa" class="form-control" value="<?= $was->link_wa ?>">
                                        <?= form_error('link_wa', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                    <label for="">gambar</label>
                                        <input type="file" name="img" class="form-control" value="<?= $was->img ?>">
                                        <input type="hidden" name="gambar_lama" value="<?= $was->img ?>">
                                        <div class="text-danger"><?php if(isset($imgerror)) {echo $imgerror;} ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                                    </div>
                                     
                                </form>
                            </div>
                            <img src="<?= base_url('/assets/img/') . $was->img ?>" alt="" style="width: 150px; margin-top: 150px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

        <!-- Modal tambah -->
        
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="chart-area">
                                <form action="<?= base_url('Popup/tambah_data_wa/') ?>" method="post" enctype="multipart/form-data">
                                <div class="group">
                                        <label for="">judul</label>
                                        <input type="text" name="judul" class="form-control" >
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Sub judul</label>
                                        <input type="text" name="sub_judul" class="form-control" >
                                        <?= form_error('sub_judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Sub teks</label>
                                        <input type="text" name="sub_teks" class="form-control">
                                        <?= form_error('sub_teks', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Nama wa</label>
                                        <input type="text" name="nama_wa" class="form-control">
                                        <?= form_error('nama_wa', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Link wa</label>
                                        <input type="text" name="link_wa" class="form-control">
                                        <?= form_error('link_wa', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                    <label for="">gambar</label>
                                        <input type="file" name="img" class="form-control">
                                        <div class="text-danger"><?php if(isset($imgerror)) {echo $imgerror;} ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

    