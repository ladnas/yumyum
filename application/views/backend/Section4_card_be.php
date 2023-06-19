

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman data Section 4 card</h1>
                    <p class="mb-4">Tambah, edit, hapus data pada Section 4 card</p>
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
                                            <th>Isi</th>
                                            <th>logo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($section4_card as $sc4) : ?>
                                        <tr>
                                            <td><?= $sc4->id_card ?></td>
                                            <td><?= $sc4->judul ?></td>
                                            <td><?= $sc4->isi ?></td>
                                            <td><?= $sc4->logo ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit<?= $sc4->id_card ?>" class="btn btn-warning btn-l"><i class="fas fa-edit">Edit</i></a>
                                                <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-l"><i class="fas fa-plus">Tambah</i></a>
                                                <a href="<?= base_url('Section4/delete_card/' . $sc4->id_card) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger btn-l"><i class="fas fa-trash">Hapus</i><a>
                                                <a href="<?= base_url('Section4') ?>" class="btn btn-success btn-l">Kembali<a>   
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
    <?php foreach ($section4_card as $sc4) { ?>
        <div class="modal fade" id="edit<?= $sc4->id_card ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="<?= base_url('Section4/edit_data_card/' . $sc4->id_card) ?>" method="post">
                                    <div class="group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" class="form-control" value="<?= $sc4->judul ?>">
                                        <?= form_error('judul', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">isi</label>
                                        <input type="text" name="isi" class="form-control" value="<?= $sc4->isi ?>">
                                        <?= form_error('isi', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <div class="group">
                                        <label for="">logo</label>
                                        <input type="text" name="logo" class="form-control" value="<?= $sc4->logo ?>">
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
                                <form action="<?= base_url('Section4/tambah_data_card/') ?>" method="post" >
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
                                        <label for="">logo</label>
                                        <input type="text" name="logo" class="form-control">
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
 
    