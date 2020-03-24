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
                                <h2 class="text-white pb-2 fw-bold">Data Nilai</h2>
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
                                        <h4 class="card-title">Tabel Data nilai</h4>
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Tambah nilai
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
                                                            nilai
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Tambah nilai baru</p>
                                                    <form action="Tambah_nilai" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Siswa</label>
                                                                    <select name="siswa" class="form-control">
                                                                        <?php foreach ($listnama as $list) {
                                                                            echo '
                                                                        <option value="' . $list->nis . '">' . $list->nama . '</option>
                                                                        ';
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Semester</label>
                                                                    <select class="form-control" name="semester">

                                                                        <option value="1">ganjil</option>
                                                                        <option value="2">genap</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Akademik</label>
                                                                    <input name="akademik" type="number" class="form-control" placeholder="ex: 90">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Prestasi</label>
                                                                    <input name="prestasi" type="number" class="form-control" placeholder="ex: 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Sikap</label>
                                                                    <input name="sikap" type="number" class="form-control" placeholder="ex: 100">
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
                                    <!-- <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Data</span>
                                                        <span class="fw-light">
                                                            nilai
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">edit nilai</p>
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

                                                                        // foreach ($kelas as $k) {
                                                                        //     echo '
                                                                        //     <option value="' . $k->id . '">' . $k->alias . ' - ' . $k->jurusan . '</option>
                                                                        //     ';
                                                                        // }

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
                                    </div> -->
                                    <!-- end edit -->

                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Smt</th>
                                                    <th style="max-width: 30px">Akademik</th>
                                                    <th style="max-width: 25px">Prestasi</th>
                                                    <th style="max-width: 25px">Sikap</th>
                                                    <th style="width: 25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($nilai)) {
                                                    $no = 0;
                                                    foreach ($nilai as $data) {
                                                        if ($data->semester % 2 == 0)
                                                            $data->semester = "genap";
                                                        else
                                                            $data->semester = "ganjil";
                                                        $avg = floor(($data->akademik + $data->prestasi + $data->sikap) / 3);
                                                        echo '
                                                        <tr>
                                                            <td>' . $data->nama . '</td>
                                                            <td>' . $data->semester . '</td>
                                                            <td>' . $data->akademik . '</td>
                                                            <td>' . $data->prestasi . '</td>
                                                            <td>' . $data->sikap . '</td>
                                                            <td class="action">
                                                            <button class="edit-bt btn btn-success btn-sm" data-toggle="modal" data-target="#editRowModal"><i class="fa fa-pen"></i> Edit</button>
                                                            <button onclick="hapus_nilai(' . $data->id . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
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