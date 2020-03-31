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
                                        <div class="" style="position: absolute;right:0;margin-right:15px;margin-top:-0px;">
                                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-plus"></i>
                                                Tambah nilai
                                            </button>
                                            <button id="resetNilai" class="btn btn-danger btn-round ml-auto">
                                                <i class="fa fa-trash"></i>
                                                Hapus semua
                                            </button>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center" style="margin-top:35px;">
                                        <h4 class="card-title">&nbsp;</h4>
                                        <div class="" style="position: absolute;right:0;margin-right:15px;margin-top:-0px;width:60%;display:flex;justify-content:flex-end;">
                                            <select name="" id="hapusItem" class="form-control col-6" style="margin-left:30%;">
                                                <option value="-5">--pilih siswa untuk dihapus--</option>
                                                <?php
                                                    foreach ($dsiswa as $data) {
                                                        echo "<option value='$data->nis'>$data->nama</option>";
                                                    }
                                                ?>
                                            </select>
                                            <button onclick="hapus_nilai()" class="btn btn-danger btn-round ml-auto">
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </button>
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
                                                            <div class="col-md-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Semester</label>
                                                                    <select class="form-control" name="semester">

                                                                        <option value="1">ganjil</option>
                                                                        <option value="2">genap</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <?php $i = 0;
                                                            foreach ($listkriteria as $kriteria) {
                                                                //     echo '
                                                                // <option value="' . $kriteria->id . '">' . $kriteria->nama . ' - (' . $kriteria->jenis . ')</option>
                                                                // ';
                                                            ?>
                                                                <div class="col-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label><?= $kriteria->nama; ?></label>
                                                                        <input name="k[<?= $i ?>][id]" type="hidden" value='<?= $kriteria->id ?>'>
                                                                        <input name="k[<?= $i++ ?>][val]" class='form-control' type="number" min='1'>
                                                                        </input>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }

                                                            ?>

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
                                                            nilai
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">edit nilai</p>
                                                    <form action="#" method="POST" id="form-edit">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Siswa</label>
                                                                    <select name="siswa" class="form-control" id="editSiswa">
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
                                                                    <select class="form-control" name="semester" id="editSmt">

                                                                        <option value="1">ganjil</option>
                                                                        <option value="2">genap</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>nilai</label>
                                                                    <input id="editnilai" name="nilai" type="number" class="form-control" placeholder="ex: 90">
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
                                                    <th>Nama</th>
                                                    <th>Semester</th>
                                                    <th style="max-width: 30px">Kriteria</th>
                                                    <th style="max-width: 30px">Nilai</th>
                                                    <th style="width: 30px">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($nilai)) {
                                                    $no = 0;
                                                    $strSmt = [];
                                                    array_push($strSmt, 'ganjil');
                                                    array_push($strSmt, 'genap');
                                                    foreach ($nilai as $data) {

                                                        $avg = floor(($data->nilai + $data->normalisasi + $data->preferensi) / 3);
                                                        echo '
                                                        <tr>
                                                            <td value="' . $data->nid . '" nis="' . $data->siswa . '">' . $data->nama . '</td>
                                                            <td value="' . $data->semester . '">' . $strSmt[--$data->semester] . '</td>
                                                            <td value="' . $data->kriteria . '">' . $data->knama . ' (' . $data->jenis . ')</td>
                                                            <td>' . $data->nilai . '</td>
                                                            <td class="action">
                                                            <button class="edit-nilai btn btn-success btn-sm" data-toggle="modal" data-target="#editRowModal"><i class="fa fa-pen"></i> Edit</button>
                                                        </tr>
                                                        ';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan=7 style="text-align:center">data kosong</td></tr>';
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