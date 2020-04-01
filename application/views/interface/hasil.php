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
                                <h2 class="text-white pb-2 fw-bold">Data Ranking</h2>
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
                                    <div class="d-flex ">
                                        <h4 class="card-title">Tabel Data Ranking</h4>
                                        <div class="" style="position: absolute;right:0;margin-right:15px;margin-top:-8px;">
                                            <button id="savePDF" class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-download"></i>
                                                Unduh PDF
                                            </button>
                                            <button id="resetBtn" class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-trash"></i>
                                                Reset data ranking
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive" id="kontenExport">
                                        <table class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Peringkat</th>
                                                    <th>NIS</th>
                                                    <th>Siswa</th>
                                                    <th>Total</th>
                                                    <th>Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($ranking)) {
                                                    $no = 0;
                                                    foreach ($ranking as $data) {
                                                        echo '
                                                        <tr>
                                                        <td>' . $data->peringkat . '</td>
                                                            <td>' . $data->nis . '</td>
                                                            <td>' . $data->nama . '</td>
                                                            <td>' . $data->total . '</td>
                                                            <td>' . $data->alias . ' - ' . $data->jurusan . '</td>
                                                        </tr>
                                                        ';
                                                    }
                                                } else {
                                                    echo '<tr><td  colspan=6 style="text-align:center">data kosong</td></tr>';
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