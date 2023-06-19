

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman data Section 5 testimoni</h1>
                    <p class="mb-4">Tambah, edit, hapus data pada Section 5 testimoni</p>

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
                                            <th>isi testi</th>
                                            <th>Nama user</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($section5_testimoni as $testi) : ?>
                                        <tr>
                                            <td><?= $testi->id_testi ?></td>
                                            <td><?= $testi->isi_testi ?></td>
                                            <td><?= $testi->nama_user ?></td>
                                            <td> <img src="<?= base_url('/assets/img/') . $testi->img ?>" alt="" style="width: 150px;"></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $testi->id_testi ?>" class="btn btn-warning btn-l"><i class="fas fa-edit">Edit</i></a>
                                                <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-l"><i class="fas fa-plus">Tambah</i></a>
                                                <a href="<?= base_url('Section5/delete_data_testi/' . $testi->id_testi) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger btn-l"><i class="fas fa-trash">Hapus</i><a>
                                                <a href="<?= base_url('Section5') ?>" class="btn btn-success btn-l">Kembali<a>
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

    <!-- Scroll to Top nama_user-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    
    <!-- Modal edit -->
    <?php foreach ($section5_testimoni as $testi) { ?>
        <div class="modal fade" id="edit<?= $testi->id_testi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="<?= base_url('Section5/edit_data_testi/' . $testi->id_testi) ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">isi_testi</label>
                                        <input type="text" name="isi_testi" class="form-control" value="<?= $testi->isi_testi ?>">
                                        <?= form_error('isi_testi', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">nama_user</label>
                                        <input type="text" name="nama_user" class="form-control" value="<?= $testi->nama_user ?>">
                                        <?= form_error('nama_user', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">gambar</label>
                                        <input type="file" name="img" class="form-control" value="<?= $testi->img ?>">
                                        <input type="hidden" name="gambar_lama" value="<?= $testi->img ?>">
                                        <div class="text-danger"><?php if(isset($imgerror)) {echo $imgerror;} ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                                    </div>
                                </form>
                            </div>
                            <img src="<?= base_url('/assets/img/') . $testi->img ?>" alt="" style="width: 150px;">
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
                                <form action="<?= base_url('Section5/tambah_data_testi/') ?>" method="post" enctype="multipart/form-data">
                                    <div class="group">
                                        <label for="">isi_testi</label>
                                        <input type="text" name="isi_testi" class="form-control">
                                        <?= form_error('isi_testi', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">nama_user</label>
                                        <input type="text" name="nama_user" class="form-control">
                                        <?= form_error('nama_user', '<div class="text-small text-danger">', '</div>') ?>
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
     

    