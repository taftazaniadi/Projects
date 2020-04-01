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



                                    <div class="table-responsive">
                                        
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
        swal({
            icon: 'error',
            title: 'Gagal menambahkan nilai',
            text: 'Siswa sudah memiliki nilai',
            buttons: {
                confirm: {
                    text: 'Mengerti',
                    className: 'btn btn-success'
                }
            }
        }).then(res => {
            document.location.href = 'Nilai';
        })
    </script>

</body>

</html>