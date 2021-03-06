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
                                <h2 class="text-white pb-2 fw-bold">Data Siswa</h2>
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
                                        <h4 class="card-title">Tabel Data Siswa</h4>
                                        <div class="" style="position: absolute;right:0;margin-right:15px;margin-top:-0px;">
                                            <?php
                                            if ($ckelas->c > 0) {
                                            ?>
                                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                    <i class="fa fa-plus"></i>
                                                    Tambah Siswa
                                                </button>
                                                <button id="resetSiswa" class="btn btn-danger btn-round ml-auto">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus semua
                                                </button>
                                            <?php } ?>
                                        </div>
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
                                                            Siswa
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Tambah siswa baru</p>
                                                    <form action="<?= base_url(); ?>Admin/Tambah_siswa" method="POST">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>NIS</label>
                                                                    <input name="nis" type="number" class="form-control" placeholder="ex: 6100000">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <input name="nama" type="text" class="form-control" placeholder="ex: Faizal">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Kelas</label>
                                                                    <select class="form-control" name="kelas">
                                                                        <?php

                                                                        foreach ($kelas as $k) {
                                                                            echo '
                                                                            <option value="' . $k->kid . '">' . $k->alias . ' - ' . $k->jurusan . '</option>
                                                                            ';
                                                                        }

                                                                        ?>
                                                                    </select>
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
                                                            Siswa
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">edit siswa</p>
                                                    <form action="#" id="form-edit" method="POST">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>NIS</label>
                                                                    <input id="editNis" name="nis" type="number" class="form-control" placeholder="ex: 6100000">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 pr-0">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <input id="editNama" name="nama" type="text" class="form-control" placeholder="ex: Faizal">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Kelas</label>
                                                                    <select class="form-control" name="kelas" id="editKelas">
                                                                        <?php

                                                                        foreach ($kelas as $k) {
                                                                            echo '
                                                                            <option value="' . $k->kid . '">' . $k->alias . ' - ' . $k->jurusan . '</option>
                                                                            ';
                                                                        }

                                                                        ?>
                                                                    </select>
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
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th style="width: 25%">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($siswa)) {
                                                    $no = 0;
                                                    foreach ($siswa as $data) {
                                                        echo '
                                                        <tr>
                                                            <td>' . $data->nis . '</td>
                                                            <td>' . $data->nama . '</td>
                                                            <td value="' . $data->kelas . '">' . $data->alias . '</td>
                                                            <td>' . $data->jurusan . '</td>
                                                            <td class="action">
                                                            <button class="edit-bt btn btn-success btn-sm" data-toggle="modal" data-target="#editRowModal"><i class="fa fa-pen"></i> Edit</button>
                                                            <button onclick="hapus_siswa(' . $data->nis . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
                                                        </tr>
                                                        ';
                                                    }
                                                } else {
                                                    echo '<tr><td  colspan=5 style="text-align:center">data kosong</td></tr>';
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
    <script>
        <?php
        if ($ckelas->c < 1) {
        ?>
            swal({
                icon: 'warning',
                title: 'Kelas Kosong',
                text: 'Daftarkan kelas terlebih dahulu',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            })
        <?php
        } ?>
    </script>
    <script>
        <?php
        if ($err > 0) {
        ?>
            swal({
                icon: 'warning',
                title: 'NIS sudah terdaftar sebagai siswa',
                text: 'Pastikan NIS yang anda masukkan tidak salah',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            })
        <?php
        } ?>
    </script>
</body>

</html>