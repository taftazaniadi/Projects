<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("_partials/head.php") ?>
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
                                <h2 class="text-white pb-2 fw-bold">Proses Nilai</h2>
                                <h5 class="text-white op-7 mb-2">Sistem Penunjang Keputusan - Metode SAW</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row mt--2" style="display:flex;justify-content:center;">
                        <div class="col-sm-6">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title">Konfirmasi Kuota</div>
                                    <div class="card-category">Masukkan Jumlah siswa yang diterima</div>
                                    <div class="modal-body">
                                        <p class="small"></p>
                                        <form action="<?= base_url() ?>Admin/Hasil" id="form-edit" method="POST">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Kuota</label>
                                                        <input id="jumlah" name="jumlah" type="number" class="form-control" min='1' placeholder="ex: 30">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default" style="border:0">
                                                        <input type="submit" name="submit" value="submit" class="btn btn-primary"></input>

                                                    </div>
                                                </div>

                                                <div class="modal-footer no-bd">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("_partials/js.php") ?>
    <script>
        <?php
        if ($count->c<$kriteria->c) {
        ?>
            swal({
                icon: 'warning',
                title: 'Belum ada nilai',
                text: 'Isi terlebih dahulu nilai untuk memulai perhitungan',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then(res => {
                document.location.href = 'Nilai';
            })
        <?php
        } ?>
    </script>
    <script>
        <?php
        if ($kriteria->c < 3 || $kriteria->c > 10) {
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
        }
        if ($over != 0) {
            $over = 0;
        ?>
            swal({
                icon: 'warning',
                title: 'Melebihi batas',
                text: 'Total siswa yang valid: ' + <?= $csiswa->c ?>,
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then((result) => {
                if (result)
                    document.location.href = 'Hapus_siswa/' + nis;

            });
        <?php
        } ?>
    </script>
</body>

</html>