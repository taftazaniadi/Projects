<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url() ?>assets/js/setting-demo.js"></script>
<!-- <script src="<?= base_url() ?>assets/js/demo.js"></script> -->
<script>
    function htmlDecode(input) {
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
    }
    //statistik
    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: 100,
        maxValue: 100,
        width: 7,
        text: <?php echo $kriteria->c; ?>,
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: 100,
        maxValue: 100,
        width: 7,
        text: <?php echo $total->c; ?>,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })


    Circles.create({
        id: 'circles-4',
        radius: 45,
        value: 100,
        maxValue: 100,
        width: 7,
        text: <?php echo $csiswa->c; ?>,
        colors: ['#f1f1f1', '#F28391'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-5',
        radius: 45,
        value: 100,
        maxValue: 100,
        width: 7,
        text: <?php echo $listacc->c; ?>,
        colors: ['#f1f1f1', '#6610f2'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })
</script>

<script>
    //siswa edit & hapus
    $('.edit-bt').on('click', function(e) {
        data = $(this).parent().parent();
        nis = data.children().eq(0).html();
        nama = data.children().eq(1).html();
        kelas = data.children().eq(2).attr('value');

        $('#editNis').val(nis);
        $('#editNama').val(nama);
        $('#editKelas').val(kelas);
        $("#form-edit").attr('action', 'Edit_siswa/' + nis);

    });
    $('.edit-guru').on('click', function(e) {
        data = $(this).parent().parent();
        nik = data.children().eq(0).html();
        nama = data.children().eq(1).html();

        $('#editNik').val(nik);
        $('#editNama').val(nama);
        $("#form-edit").attr('action', 'Edit_guru/' + nik);

    });
    $('.edit-Kelas').on('click', function(e) {
        data = $(this).parent().parent();
        id = data.children().eq(0).html();
        wali = data.children().eq(3).attr('value');

        $('#editWali').val(wali);
        $("#form-edit").attr('action', '<?=base_url();?>Admin/Edit_kelas/' + id);

    });
    $('.edit-jurusan').on('click', function(e) {
        data = $(this).parent().parent();
        id = data.children().eq(0).html();
        nama = data.children().eq(1).html();

        $('#editNama').val(nama);
        $("#form-edit").attr('action', '<?=base_url();?>Admin/Edit_jurusan/' + id);

    });

    function hapus_siswa(nis) {
        swal({
            icon: 'warning',
            title: 'Yakin ingin menghapus data: ',
            text: 'nis: ' + nis,
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: 'true',
                    className: 'btn btn-success'
                }
            }
        }).then((result) => {
            if (result)
                document.location.href = 'Hapus_siswa/' + nis;

        });
    }
    function hapus_guru(nik) {
        swal({
            icon: 'warning',
            title: 'Yakin ingin menghapus guru: ',
            text: 'data yang telah dihapus tidak dapat dikembalikan',
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: 'true',
                    className: 'btn btn-success'
                }
            }
        }).then((result) => {
            if (result)
                document.location.href = 'Hapus_guru/' + nik;

        });
    }
    function hapus_jurusan(id) {
        swal({
            icon: 'error',
            title: 'Peringatan keras',
            text: 'data kelas dan siswa akan ikut terhapus!',
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: 'true',
                    className: 'btn btn-success'
                }
            }
        }).then((result) => {
            if (result)
                document.location.href = 'Hapus_jurusan/' + id;

        });
    }
    function hapus_kelas(id) {
        swal({
            icon: 'warning',
            title: 'Yakin ingin menghapus kelas: ',
            text: 'data yang telah dihapus tidak dapat dikembalikan',
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: 'true',
                    className: 'btn btn-success'
                }
            }
        }).then((result) => {
            if (result)
                document.location.href = 'Hapus_kelas/' + id;

        });
    }
    $('#resetSiswa').on('click',function(e){
        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to get this data again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = '<?=base_url();?>Admin/Reset_Siswa';
            }
        });
    });
    $('#resetGuru').on('click',function(e){
        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to get this data again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = 'Reset_guru';
            }
        });
    });
    $('#resetJurusan').on('click',function(e){
        swal({
            icon: 'error',
            title: 'Peringatan',
            text: "data siswa dan kelas akan ikut terhapus",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = 'Reset_jurusan';
            }
        });
    });
    $('#resetKelas').on('click',function(e){
        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "Data siswa dalam kelas akan ikut terhapus",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = '<?=base_url();?>Admin/Reset_kelas/';
            }
        });
    });
    //nilai edit & hapus
    $('.edit-nilai').on('click', function(e) {
        data = $(this).parent().parent();
        id = data.children().eq(0).attr('value');
        nis = data.children().eq(0).attr('nis');
        semester = data.children().eq(1).attr('value');
        kriteria = data.children().eq(2).attr('value');
        akademik = data.children().eq(3).html();
        prestasi = data.children().eq(4).html();
        sikap = data.children().eq(5).html();

        $('#editSiswa').val(nis);
        $('#editSmt').val(semester);
        $('#editKriteria').val(kriteria);
        $('#editnilai').val(akademik);
        $('#editnormalisasi').val(prestasi);
        $('#editpreferensi').val(sikap);
        $("#form-edit").attr('action', 'Edit_nilai/' + id);

    });

    function hapus_nilai() {
        id=$('#hapusItem').val();
        if(id<1){
            swal({
            icon: 'warning',
            title: 'Peringatan: ',
            text: 'Anda belum memilih nilai siswa untuk dihapus',
            buttons: {
                confirm: {
                    text: 'Mengerti',
                    className: 'btn btn-success'
                }
            }
        })    
        }
        else{
            swal({
            icon: 'warning',
            title: 'Peringatan: ',
            text: 'Yakin ingin menghapus nilai?',
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: 'true',
                    className: 'btn btn-success'
                }
            }
        }).then((result) => {
            if (result)
                document.location.href = 'Hapus_nilai/' + id;

        });
        }
        
    }
    $('#resetNilai').on('click',function(e){
        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to get this data again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = 'Reset_Nilai';
            }
        });
    });
    //kriteria edit & hapus
    $('.edit-kriteria').on('click', function(e) {
        data = $(this).parent().parent();
        id = data.children().eq(0).html();
        nama = data.children().eq(1).html();
        jenis = data.children().eq(2).html();
        bobot = data.children().eq(3).html();

        $('#editNama').val(nama);
        $('#editJenis').val(jenis);
        $('#editBobot').val(bobot);
        $("#form-edit").attr('action', 'Edit_kriteria/' + id);

    });

    function hapus_kriteria(id) {
        swal({
            icon: 'warning',
            title: 'Peringatan: ',
            text: 'Yakin ingin menghapus kriteria?',
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: 'true',
                    className: 'btn btn-success'
                }
            }
        }).then((result) => {
            if (result)
                document.location.href = 'Hapus_kriteria/' + id;

        });
    }
    $('#resetKriteria').on('click',function(e){
        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to get this data again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = 'Reset_Kriteria';
            }
        });
    });

    $('.log-out').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to access this again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Log Out',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = href;
            }
        });
    });

    $('.remove').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to get this data again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = href;
            }
        });
    });
    $('#savePDF').on('click',function(e){
        text=$('#kontenExport').html();
        fetch('<?= base_url();?>Admin/Cetak')
        .then(res=>res.json())
        .then(res=>{
            console.log(res);
        })
    });
    $('#resetBtn').on('click',function(e){
        swal({
            icon: 'warning',
            title: 'Are you sure?',
            text: "You won't be able to get this data again!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, Remove all data',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.location.href = 'Reset';
            }
        });
    });
    
</script>

<script>
    $(document).ready(function() {
        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>