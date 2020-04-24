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

            <!-- Navbar -->
            <?php $this->load->view("_partials/navbar.php") ?>
        </div>


        <!-- Main Content -->
        <div class="main-panel" style="width:100%">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Data user</h2>
                                <h5 class="text-white op-7 mb-2">Manajemen user</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Tabel Data user</h4>
                                        <div class="" style="position: absolute;right:0;margin-right:15px;margin-top:-0px;">

                                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-plus"></i>
                                                Tambah user
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
                                                            user
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Tambah user baru</p>
                                                    <form action="<?=base_url();?>User/Tambah_user" method="POST">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>username</label>
                                                                    <input name="username" type="text" class="form-control" placeholder="ex: dimas">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>password</label>
                                                                    <input name="password" type="password" class="form-control"  placeholder="ex: admin123">
                                                                </div>
                                                            </di
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <input name="nama" type="text" class="form-control" placeholder="ex: Dwi Agustina">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <input type="hidden" value="1" name="level">
                                                            <input type="hidden" value="User" name="keterangan">
                                                            <input type="submit" name="submit" value="submit" class="btn btn-primary"></input>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th>username</th>
                                                    <th>Nama</th>
                                                    <th>level</th>
                                                    <th style="width: 25%">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($user)) {
                                                    $no = 0;
                                                    foreach ($user as $data) {
                                                        $no++;
                                                        echo '
                                                        <tr>
                                                        <td>' . $no . '</td>
                                                            <td>' . $data->Username . '</td>
                                                            <td>' . $data->Nama . '</td>
                                                            <td>' . $data->Keterangan . '</td>
                                                            <td class="action">
                                                            ';
                                                            if($data->Username!='dimas'){
                                                            echo'
                                                            <button onclick="hapus_user(' . $data->ID . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                                        </tr>
                                                        ';}
                                                        else
                                                        echo '<i>Default</i>';
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

    </div>
    </div>

    <?php $this->load->view("_partials/js.php") ?>
    <script>
        <?php
        if ($err > 0) {
        ?>
            swal({
                icon: 'warning',
                title: 'username sudah terpakai',
                text: 'Silahkan pilih username lain',
                buttons: {
                    confirm: {
                        text: 'Mengerti',
                        className: 'btn btn-success'
                    }
                }
            }).then(()=>{
                window.location.href="<?=base_url();?>User";
            })
        <?php
        } ?>
    </script>
</body>

</html>