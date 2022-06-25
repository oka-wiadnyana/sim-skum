 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <img src="<?= base_url('img/pengadilan.png'); ?>" alt="" class="img-fluid d-none d-md-block" style="width:3rem;  ">
         </div>
         <div class="sidebar-brand-text mx-3">SIM-SKUM</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">


         <a class="nav-link" href="<?= base_url('radius/data_radius'); ?> ">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>

     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gugatan" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-university"></i>
             <span>Gugatan</span>
         </a>
         <div id="gugatan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('simulasi'); ?>">Hitung SKUM</a>
                 <a class="collapse-item" href="<?= base_url('skum/v_main_skum'); ?>">Daftar SKUM</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gs" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-university"></i>
             <span>Gugatan Sederhana</span>
         </a>
         <div id="gs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('simulasi/gugatan_sederhana'); ?>">Hitung SKUM</a>
                 <a class="collapse-item" href="<?= base_url('skum/v_main_skum_gs'); ?>">Daftar SKUM</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permohonan" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-university"></i>
             <span>Permohonan</span>
         </a>
         <div id="permohonan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('simulasi/permohonan'); ?>">Hitung SKUM</a>
                 <a class="collapse-item" href="<?= base_url('skum/v_main_skum_permohonan'); ?>">Daftar SKUM</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#banding" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-university"></i>
             <span>Banding</span>
         </a>
         <div id="banding" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('simulasi/banding'); ?>">Hitung SKUM</a>
                 <a class="collapse-item" href="<?= base_url('skum/v_main_skum_banding'); ?>">Daftar SKUM</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kasasi" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-university"></i>
             <span>Kasasi</span>
         </a>
         <div id="kasasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('simulasi/kasasi'); ?>">Hitung SKUM</a>
                 <a class="collapse-item" href="<?= base_url('skum/v_main_skum_kasasi'); ?>">Daftar SKUM</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pk" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-university"></i>
             <span>PK</span>
         </a>
         <div id="pk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('simulasi/pk'); ?>">Hitung SKUM</a>
                 <a class="collapse-item" href="<?= base_url('skum/v_main_skum_pk'); ?>">Daftar SKUM</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ref-biaya" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-file"></i>
             <span>Ref Biaya</span>
         </a>
         <div id="ref-biaya" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('skum/biaya_gugatan'); ?>">Biaya Gugatan</a>
                 <a class="collapse-item" href="<?= base_url('skum/biaya_permohonan'); ?>">Biaya Permohonan</a>
                 <a class="collapse-item" href="<?= base_url('skum/biaya_tk_banding'); ?>">Biaya Banding</a>
                 <a class="collapse-item" href="<?= base_url('skum/biaya_tk_kasasi'); ?>">Biaya Kasasi</a>
                 <a class="collapse-item" href="<?= base_url('skum/biaya_tk_pk'); ?>">Biaya PK</a>
             </div>
         </div>
     </li>
     <li class="nav-item">


         <a class="nav-link" href="<?= base_url('skum/kasir'); ?> ">
             <i class="fas fa-fw fa-user"></i>
             <span>Kasir</span></a>

     </li>
     <li class="nav-item">


         <a class="nav-link" href="https://drive.google.com/file/d/1uIv6KnrKzND9LcMxr1ECPZNeHW22t9VM/view" target="_blank">
             <i class="fas fa-fw fa-file"></i>
             <span>SK Panjar Perkara</span></a>

     </li>
     <li class="nav-item">


         <a class="nav-link" href="<?= base_url('auth/daftar_akun'); ?> ">
             <i class="fas fa-fw fa-users"></i>
             <span>Akun</span></a>

     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->