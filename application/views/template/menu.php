<div class="nav accordion" id="accordionSidenav">
    <a class="nav-link " href="<?php echo site_url('absensi'); ?>">
        <i class="fas fa-list-alt ml-2 mr-3 fa-lg fa-fw"></i>
        Absensi
    </a>
    <a class="nav-link " href="<?php echo site_url(''); ?>">
        <i class="fas fa-star ml-2 mr-3 fa-lg fa-fw"></i>
        Nilai
    </a>
    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
        <i class="fas fa-project-diagram ml-2 mr-3 fa-lg  fa-fw"></i>
        Master Data
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">

            <a class="nav-link" href="<?php echo site_url('guru'); ?>">
                <i class="fas fa-user ml-2 mr-2 fa-lg fa-fw"></i>
                Guru
            </a>
        </nav>
    </div>
</div>
<div class="sidenav-footer">
    <div class="sidenav-footer-content">
        <div class="sidenav-footer-subtitle">Login Sebagai:</div>
        <div class="sidenav-footer-title">Admin</div>
    </div>
</div>