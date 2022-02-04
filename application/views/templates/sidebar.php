
            <!-- Sidebar -->
            <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0e2a2f;">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-icon ">
                        <!-- logo  -->
                    <!-- <img src="<?= base_url('assets/') ?>img/logo.png" alt="RedDoorz" width="55"> -->
                    </div>
                    <div class="sidebar-brand-text mx-3">
                    
                    Ryal Hotel <br><sup>Administrator</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- akan melakukan query dari menu -->

                <?php 
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id`,`menu`
                                    FROM `user_menu` JOIN `user_access_menu` 
                                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                   WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` DESC
                   ";

                   $menu = $this->db->query($queryMenu)->result_array();
                ?>


                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('');?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span><b>Dashboard Admin</b></span></a>
                        
                    </li>
                    <hr class="sidebar-divider mt-2">
                <!-- akhir melakukan query dari menu -->
                <!-- Looping menu -->
                <?php foreach ($menu as $m) : ?>
                <div class="sidebar-heading">
                    <?= $m['menu']?>
                </div>



                <!-- Siapkan sub menu sesuai menu -->
                <?php 
                $menuId = $m['id'];
                $querySubMenu = " SELECT *
                                    FROM `user_sub_menu` WHERE `menu_id` = $menuId
                                    AND `user_sub_menu`.`is_active` = 1 
               ";

               $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach($subMenu as $sm) :?>
                <?php if($title == $sm['title']): ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                    <a class="nav-link pb-0" href="<?= base_url($sm['url']);?>">
                        <i class="<?= $sm['icon']?>"></i>
                        <span><?= $sm['title']?></span></a>
                </li>
                <?php endforeach; ?>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <?php endforeach; ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout')?>" >
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
