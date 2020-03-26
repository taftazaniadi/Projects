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
        text: <?php echo $count->c; ?>,
        colors: ['#f1f1f1', '#F28391'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })
</script>

<script>
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
    function hapus_nilai(id) {
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
    $('.edit-bt').on('click', function(e) {
        data = $(this).parent().parent();
        nis = data.children().eq(0).html();
        nama = data.children().eq(1).html();
        kelas=data.children().eq(2).attr('value');
        // console.log($(this).parent().parent()[0].children[0]);
        // console.log(kelas+nama+nis);
        $('#editNis').val(nis);
        $('#editNama').val(nama);
        $('#editKelas').val(kelas);
        $("#form-edit").attr('action','Edit_siswa/'+nis);

    });
    $('.edit-nilai').on('click', function(e) {
        data = $(this).parent().parent();
        id = data.children().eq(0).attr('value');
        nis = data.children().eq(0).attr('nis');
        semester=data.children().eq(1).attr('value');
        akademik = data.children().eq(2).html();
        prestasi = data.children().eq(3).html();
        sikap = data.children().eq(4).html();
        // console.log($(this).parent().parent()[0].children[0]);
        // console.log(kelas+nama+nis);
        $('#editSiswa').val(nis);
        $('#editSmt').val(semester);
        $('#editAkademik').val(akademik);
        $('#editPrestasi').val(prestasi);
        $('#editSikap').val(sikap);
        $("#form-edit").attr('action','Edit_nilai/'+id);

    });
    $('.edit-kriteria').on('click', function(e) {
        data = $(this).parent().parent();
        id = data.children().eq(0).html();
        nama = data.children().eq(1).html();
        jenis=data.children().eq(2).html();
        bobot = data.children().eq(3).html();
        // console.log($(this).parent().parent()[0].children[0]);
        // console.log(kelas+nama+nis);
        $('#editNama').val(nama);
        $('#editJenis').val(jenis);
        $('#editBobot').val(bobot);
        $("#form-edit").attr('action','Edit_kriteria/'+id);

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