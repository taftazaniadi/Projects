<!DOCTYPE html>
<html>
<?php $k = $kriteria; ?>

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
                                                    <th>NIS</th>
                                                    <th>Siswa</th>
                                                    <th style="max-width: 30px">Semester</th>
                                                    <th style="max-width: 30px">Kelas</th>
                                                    <th style="width: 30px">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($siswa)) {
                                                    $no = 0;
                                                    foreach ($listsiswa as $data) {
                                                        if ($data->semester == 1)
                                                            $data->semester = 'ganjil';
                                                        else
                                                            $data->semester = 'genap';
                                                        echo '
                                                        <tr>
                                                            <td>' . $data->nis . '</td>
                                                            <td>' . $data->nama . '</td>
                                                            <td>' . $data->semester . '</td>
                                                            <td >' . $data->alias . ' - ' . $data->jurusan . '</td>
                                                            <td class="action">
                                                            <button class="edit-bt btn btn-success btn-sm" onclick=" document.location.href =`'.base_url() .'Admin/Nilai/'. $data->nis . '`"><i class="fa fa-external-link-square-alt"></i> Detail</button>
                                                            <button onclick="hapus_nilai(' . $data->nis . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
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
        if ($total->c < 1) {
        ?>
            swal({
                icon: 'warning',
                title: 'Belum ada siswa',
                text: 'Daftarkan siswa terlebih dahulu',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then(res => {
                document.location.href = 'Siswa';
            })
        <?php
        } ?>
    </script>
    <script>
        <?php
        if ($k->c < 3 || $k->c > 10) {
        ?>
            swal({
                icon: 'warning',
                title: 'Total kriteria tidak valid',
                text: 'Kriteria minimal 3 dan maksimal 10',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then((result) => {
                if (result)
                    document.location.href = 'Kriteria/';

            });
        <?php
        } ?>
    </script>
</body>

</html>