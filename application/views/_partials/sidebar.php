<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a>
                        <span>
                            <?= $this->fungsi->user_login()->Nama ?>
                            <span class="user-level"><?= $this->fungsi->user_login()->Keterangan ?></span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="<?= base_url('Admin') ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= base_url('Admin/Kriteria') ?>">
                                    <span class="sub-item">Kriteria</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('Admin/Parameter') ?>">
                                    <span class="sub-item">Parameter</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('Admin/Siswa') ?>">
                                    <span class="sub-item">Siswa</span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="<?= base_url('Admin/Nilai') ?>">
                                    <span class="sub-item">Nilai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Proses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= base_url('Admin/Proses') ?>">
                                    <span class="sub-item">Nilai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Setting</h4>
                </li>
                <li class="nav-item">
                    <a class="log-out" href="<?= base_url() ?>Auth/Logout">
                        <i class="fas fa-power-off"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>