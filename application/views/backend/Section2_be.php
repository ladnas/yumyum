

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman data Section 2</h1>
                    <p class="mb-4">Tambah, edit, hapus data pada Section 2</p>

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
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($section2 as $st2) : ?>
                                        <tr>
                                            <td><?= $st2->id_st2 ?></td>
                                            <td><?= $st2->judul ?></td>
                                            <td><img src="<?= base_url('/assets/img/') . $st2->img ?>" alt="" style="width: 150px;"></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $st2->id_st2 ?>" class="btn btn-warning btn-l"><i class="fas fa-edit">Edit</i></a>
                                                <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-l"><i class="fas fa-plus">Tambah</i></a>
                                                <a href="<?= base_url('Section2/delete_data_st2/' . $st2->id_st2) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger btn-l"><i class="fas fa-trash">Hapus</i><a>
                                                <a href="<?= base_url('Section2/subteks') ?>" class="btn btn-success btn-l">Tambah/Edit Sub teks<a>
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
    <?php foreach ($section2 as $st2) { ?>
        <div class="modal fade" id="edit<?= $st2->id_st2 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="<?= base_url('Section2/edit_data_st2/' . $st2->id_st2) ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control" value="<?= $st2->judul ?>">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                    <label for="">gambar</label>
                                        <input type="file" name="img" class="form-control" value="<?= $st2->img ?>">
                                        <input type="hidden" name="gambar_lama" value="<?= $st2->img ?>">
                                        <div class="text-danger"><?php if(isset($imgerror)) {echo $imgerror;} ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                                    </div>
                                </form>
                            </div>
                            <th><img src="<?= base_url('/assets/img/') . $st2->img ?>" alt="" style="width: 150px; margin-top: -125px;"></th>
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
                                <form action="<?= base_url('Section2/tambah_data_st2/' . $st2->id_st2) ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control"">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
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


    