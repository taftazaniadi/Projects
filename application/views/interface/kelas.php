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
                                <h2 class="text-white pb-2 fw-bold">Data Kelas</h2>
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
                                        <h4 class="card-title">Tabel Data Kelas</h4>
                                        <div class="" style="position: absolute;right:0;margin-right:15px;margin-top:-0px;">

                                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-plus"></i>
                                                Tambah Kelas
                                            </button>
                                            <button id="resetKelas" class="btn btn-danger btn-round ml-auto">
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
                                                            Kelas
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Tambah Kelas baru</p>
                                                    <form action="<?= base_url(); ?>Admin/Tambah_Kelas" method="POST">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Kelas</label>
                                                                    <select name="alias" id="" class="form-control">
                                                                        <option value="X">X</option>
                                                                        <option value="XI">XI</option>
                                                                        <option value="XII">XII</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Jurusan</label>
                                                                    <select name="jurusan" id="" class="form-control">
                                                                        <?php
                                                                        foreach ($jurusan as $j) {
                                                                            echo "
                                                                            <option value='$j->id'>$j->jurusan</option>
                                                                            ";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Wali Kelas</label>
                                                                    <select name="wali" id="" class="form-control">
                                                                        <?php
                                                                        foreach ($guru as $g) {

                                                                            echo "
                                                                            <option value='$g->nik'>$g->nama</option>
                                                                            ";
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
                                                            Kelas
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">edit Kelas</p>
                                                    <form action="#" id="form-edit" method="POST">
                                                        <div class="row">
                                                            
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Wali Kelas</label>
                                                                    <select name="wali" id="editWali" class="form-control">
                                                                        <?php
                                                                        foreach ($guru as $g) {

                                                                            echo "
                                                                            <option value='$g->nik'>$g->nama</option>
                                                                            ";
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
                                                    <th>ID</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Wali</th>
                                                    <th style="width: 25%">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($kelas)) {
                                                    $no = 0;
                                                    foreach ($kelas as $data) {
                                                        echo '
                                                        <tr>
                                                            <td>' . $data->kid . '</td>
                                                            <td>' . $data->alias . '</td>
                                                            <td>' . $data->jurusan . '</td>
                                                            <td value="'.$data->gid.'">' . $data->nama . '</td>
                                                            <td class="action">
                                                            <button class="edit-Kelas btn btn-success btn-sm" data-toggle="modal" data-target="#editRowModal"><i class="fa fa-pen"></i> Edit</button>
                                                            <button onclick="hapus_kelas(' . $data->kid . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
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
        if ($cjurusan->c<1) {
        ?>
            swal({
                icon: 'warning',
                title: 'Jurusan Kosong',
                text: 'Daftarkan jurusan terlebih dahulu',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then(res => {
                document.location.href = 'Jurusan';
            })
        <?php
        } else if($cguru->c<1){
            ?>
            swal({
                icon: 'warning',
                title: 'Guru belum ditambahkan',
                text: 'Tambahkan terlebih dulu guru untuk menjadi wali kelas',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then(res => {
                document.location.href = 'Guru';
            })
            <?php
        } ?>
    </script>
    <script>
        <?php
        if ($err > 0) {
        ?>
            swal({
                icon: 'error',
                title: 'Kelas sudah terdaftar',
                text: 'Pastikan menambahkan kelas yang belum terdaftar',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then(res => {
                document.location.href = '0/';
            })
        <?php
        } ?>
    </script>
</body>

</html>