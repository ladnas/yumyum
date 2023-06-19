

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman data Section 6</h1>
                    <p class="mb-4">Tambah, edit, hapus data pada Section 6</p>
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
                                            <th>Teks button</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($section6 as $st6) : ?>
                                        <tr>
                                            <td><?= $st6->id_st6 ?></td>
                                            <td><?= $st6->judul ?></td>
                                            <td><?= $st6->sub_judul ?></td>
                                            <td><?= $st6->button ?></td>
                                            <td><img src="<?= base_url('/assets/img/') . $st6->img ?>" alt="" style="width: 150px;"></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $st6->id_st6 ?>" class="btn btn-warning btn-l"><i class="fas fa-edit">Edit</i></a>
                                                <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-l"><i class="fas fa-plus">Tambah</i></a>
                                                <a href="<?= base_url('Section6/delete_st6/' . $st6->id_st6) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger btn-l"><i class="fas fa-trash">Hapus</i><a>
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
    <?php foreach ($section6 as $st6) { ?>
        <div class="modal fade" id="edit<?= $st6->id_st6 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="<?= base_url('Section6/edit_data_st6/' . $st6->id_st6) ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control" value="<?= $st6->judul ?>">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Sub judul</label>
                                        <input type="text" name="sub_judul" class="form-control" value="<?= $st6->sub_judul ?>">
                                        <?= form_error('sub_judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">teks button</label>
                                        <input type="text" name="button" class="form-control" value="<?= $st6->button ?>">
                                        <?= form_error('button', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                    <label for="">gambar</label>
                                        <input type="file" name="img" class="form-control" value="<?= $st6->img ?>">
                                        <input type="hidden" name="gambar_lama" value="<?= $st6->img ?>">
                                        <div class="text-danger"><?php if(isset($imgerror)) {echo $imgerror;} ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                                    </div>
                                     
                                </form>
                            </div>
                            <img src="<?= base_url('/assets/img/') . $st6->img ?>" alt="" style="width: 150px;">
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
                                <form action="<?= base_url('Section6/tambah_data_st6/') ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control"">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Sub judul</label>
                                        <input type="text" name="sub_judul" class="form-control">
                                        <?= form_error('sub_judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">Button teks</label>
                                        <input type="text" name="button" class="form-control">
                                        <?= form_error('button', '<div class="text-small text-danger">', '</div>') ?>
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
       

    