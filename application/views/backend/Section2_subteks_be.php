

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman data Section 2 sub teks</h1>
                    <p class="mb-4">Tambah, edit, hapus data pada Section 2 subteks</p>
                    <h4>Untuk mengedit/tambah logo, tolong gunakan code class icon yang ada di <a href="https://fontawesome.com/icons"> Disini </a></h4>

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
                                            <th>Subteks</th>
                                            <th>logo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($section2_subteks as $sb2) : ?>
                                        <tr>
                                            <td><?= $sb2->id_sub ?></td>
                                            <td><?= $sb2->judul ?></td>
                                            <td><?= $sb2->isi ?></td>
                                            <td><?= $sb2->logo ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $sb2->id_sub ?>" class="btn btn-warning btn-l"><i class="fas fa-edit">Edit</i></a>
                                                <a data-toggle="modal" data-target="#tambah<?= $sb2->id_sub ?>" class="btn btn-primary btn-l"><i class="fas fa-plus">Tambah</i></a>
                                                <a href="<?= base_url('Section2/delete_subteks/' . $sb2->id_sub) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger btn-l"><i class="fas fa-trash">Hapus</i><a>
                                                <a href="<?= base_url('Section2') ?>" class="btn btn-success btn-l">Kembali<a>
                                                <a href="<?= base_url('Section2/subteks2') ?>" class="btn btn-success btn-l">edit subteks sebelah kanan<a>
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

   

    <!-- Modal edit -->
    <?php foreach ($section2_subteks as $sb2) { ?>
        <div class="modal fade" id="edit<?= $sb2->id_sub ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="<?= base_url('Section2/edit_subteks/' . $sb2->id_sub) ?>" method="post">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control" value="<?= $sb2->judul ?>">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Isi</label>
                                        <input type="text" name="isi" class="form-control" value="<?= $sb2->isi ?>">
                                        <?= form_error('isi', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Logo</label>
                                        <input type="text" name="logo" class="form-control" value="<?= $sb2->logo ?>">
                                        <?= form_error('logo', '<div class="text-small text-danger">', '</div>') ?>
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
        <?php } ?>

        <!-- Modal tambah -->
        <?php foreach ($section2_subteks as $sb2) { ?>
        <div class="modal fade" id="tambah<?= $sb2->id_sub ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="<?= base_url('Section2/tambah_subteks/' . $sb2->id_sub) ?>" method="post">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Isi</label>
                                        <input type="text" name="isi" class="form-control">
                                        <?= form_error('isi', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Logo</label>
                                        <input type="text" name="logo" class="form-control">
                                        <?= form_error('logo', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div>
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
        <?php } ?>

    