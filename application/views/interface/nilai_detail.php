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
                                            <button onclick=" document.location.href ='<?= base_url() ?>Admin/Nilai/'" class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-backward"></i>
                                                Kembali
                                            </button>

                                        </div>

                                    </div>

                                </div>

                                <div class="card-body">
                                   <!-- edit modal -->
                                   <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold" id="editSiswa">
                                                            
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small" id="editKriteria">edit nilai</p>
                                                    <form action="#" method="POST" id="form-edit">
                                                        <div class="row">
                                                            
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

                                                    <th style="max-width: 30px">Kriteria</th>
                                                    <th style="max-width: 30px">Nilai</th>
                                                    <th style="max-width: 30px">Bobot</th>
                                                    <th style="max-width: 30px">Normalisasi</th>
                                                    <th style="max-width: 30px">Preferensi</th>
                                                    <th style="max-width: 30px">Kelola</th>
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
                                                            <td value="'.$data->nid.'">' . $data->knama . ' (' . $data->jenis . ')</td>
                                                            <td  value="'.$data->siswa.'">' . $data->nilai . '</td>
                                                            <td value="'.$data->knama.'">' . $data->bobot . '%</td>
                                                            <td value="'.$data->nama.'">' . $data->normalisasi . '</td>
                                                            <td>' . $data->preferensi . '</td>
                                                            <td><button class="edit-nilai btn btn-success btn-sm" data-toggle="modal" data-target="#editRowModal"><i class="fa fa-pen"></i> Edit</button></td>
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