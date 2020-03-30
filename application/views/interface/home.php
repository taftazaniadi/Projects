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
                                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                                <h5 class="text-white op-7 mb-2">Sistem Penunjang Keputusan - Metode SAW</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <!-- Statistik -->
                    <?php $this->load->view('_partials/statistik.php') ?>

                    <h4 class="page-title">Informasi Bantuan</h4>
                    <div class="row">
                        <div class="col-md-12">

                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge info"><i class="flaticon-price-tag"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><strong>Cara menggunakan Sistem</strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <ol style="text-align: justify">
                                                <li>Tambahkan Data Kriteria Atau Tes Pada Menu Data Kriteria.</li>
                                                <li>Tambahkan Data Alternatif Atau Calon Siswa Baru Yang Mendaftar Pada Menu Data Alternatif.</li>
                                                <li>Tambahkan Data Nilai Kriteria Yang Didapatkan Setiap Alternatif Pada Menu Data Nilai.</li>
                                                <li>Tekan Menu Proses Nilai Untuk Melihat Hasil Nilai Akhir Seleksi Calon Siswa Baru.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning"><i class="flaticon-alarm-1"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><strong>Apa itu Kriteria</strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p style="text-align: justify">
                                                Kriteria merupakan data tes ditetapkan untuk seleksi calon siswa baru. Kriteria dibagi menjadi 2 jenis yaitu Benefit dan Cost, Benefit merupakan jenis kriteria yang memprioritaskan nilai paling besar untuk dipilih, sedangkan Cost merupakan jenis kriteria yang memprioritaskan nilai paling kecil untuk dipilih.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning"><i class="flaticon-alarm-1"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><strong>Apa itu Alternatif</strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p style="text-align: justify">
                                                Alternatif merupakan calon siswa baru yang mendaftar di Madrasah Aliyah Negeri 1 Yogyakarta dan akan diseleksi berdasarkan nilai yang didapatkan dari setiap Kriteria atau Tes yang sudah ditetapkan.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge info"><i class="flaticon-price-tag"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><strong>Peraturan menggunakan Sistem</strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <ol style="text-align: justify">
                                                <li>Data Kriteria Yang Ditetapkan Minimal 3 dan Maksimal 10.</li>
                                                <li>Bobot Kriteria Yang Ditetapkan Jumlahnya Wajib 100.</li>
                                                <li>Proses Nilai Tidak Dapat Dilakukan Jika Data Kriteria Kurang Dari 3 Atau Bobot Kriteria Jumlahnya Kurang Dari 100 Atau Tidak Terdapat Data Nilai Setiap Alternatif.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger"><i class="flaticon-error"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><strong>Informasi Penting</strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <ol style="text-align: justify">
                                                <li>Pada Menu Data Kriteria Fungsi Tombol Hapus Semua Kriteria Untuk Menghapus Seluruh Data Kriteria.</li>
                                                <li>Pada Menu Data Nilai Fungsi Tombol Hapus Untuk Menghapus Data Nilai Alternatif Berdasarkan ID Alternatif.</li>
                                                <li>Pada Menu Proses Nilai Tombol Unduh Laporan Digunakan Untuk Mengunduh Laporan Hasil Seleksi Calon Siswa Baru Dengan Format PDF.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php //$this->load->view("_partials/footer.php") ?>
        </div>
    </div>

    <?php $this->load->view("_partials/js.php") ?>
    <?php if ($this->session->userdata('notif')) {
        $this->session->set_userdata('notif', false)
    ?>
        <script>
            swal({
                icon: 'success',
                title: 'Hello, <?= $this->fungsi->user_login()->Nama ?>',
                text: 'Welcome to SPK Systems'
            });
        </script>

    <?php } ?>

</body>

</html>