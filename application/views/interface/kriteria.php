<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("_partials/head.php") ?>
    <style type="text/css">
        .action button {
            margin: 4px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo -->
            <?php $this->load->view("_partials/logo.php") ?>

            <!-- Navbar -->
            <?php $this->load->view("_partials/navbar.php") ?>
        </div>

        <!-- Sidebar -->
        <?php $this->load->view("_partials/sidebar.php") ?>

        <!-- Main Content -->
        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Data kriteria</h2>
                                <h5 class="text-white op-7 mb-2">Sistem Penunjang Keputusan - Metode SAW</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <!-- Statistik -->
                    <?php $this->load->view('_partials/statistik.php') ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Tabel Data kriteria</h4>
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Tambah kriteria
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Data</span>
                                                        <span class="fw-light">
                                                            kriteria
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Tambah kriteria baru</p>
                                                    <form action="Tambah_kriteria" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <input name='nama' type='text' class='form-control' placeholder='ex: Rata-rata prestasi'>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Jenis</label>
                                                                    <input name='jenis' type='text' class='form-control' placeholder='ex: Benefit'>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Bobot</label>
                                                                    <input name="bobot" type="number" class="form-control" placeholder="ex: 90">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <input type="submit" name="submit" value="submit" class="btn btn-primary"></input>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- edit modal -->
                                    <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Data</span>
                                                        <span class="fw-light">
                                                            kriteria
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Edit kriteria</p>
                                                    <form action="" method="POST" id="form-edit">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <input id="editNama" name='nama' type='text' class='form-control' placeholder='ex: Rata-rata prestasi'>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Jenis</label>
                                                                    <input id="editJenis" name='jenis' type='text' class='form-control' placeholder='ex: Benefit'>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Bobot</label>
                                                                    <input id="editBobot" name="bobot" type="number" class="form-control" placeholder="ex: 90">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <input type="submit" name="submit" value="submit" class="btn btn-primary"></input>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end edit -->



                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Jenis</th>
                                                    <th>Bobot</th>
                                                    <th style="width: 25%">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($listkriteria)) {
                                                    foreach ($listkriteria as $data) {

                                                        echo '
                                                        <tr>
                                                            <td>' . $data->id . '</td>
                                                            <td>' . $data->nama . '</td>
                                                            <td>' . $data->jenis . '</td>
                                                            <td>' . $data->bobot . '</td>
                                                            <td class="action">
                                                            <button class="edit-kriteria btn btn-success btn-sm" data-toggle="modal" data-target="#editRowModal"><i class="fa fa-pen"></i> Edit</button>
                                                            <button onclick="hapus_kriteria(' . $data->id . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
                                                        </tr>
                                                        ';
                                                    }
                                                } else {
                                                    echo '<tr><td>data kosong</td></tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view("_partials/footer.php") ?>
    </div>
    </div>

    <?php $this->load->view("_partials/js.php") ?>
</body>

</html>