<?php $user = get_active_user();?>
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive"src="<?php echo base_url("assets")?>/assets/images/ferzendervarlifoto.jpg" alt="<?php echo convertToSEO($user->full_name); ?>""/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name;?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small></small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url()?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_existing_user/$user->id")?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="settings.html">
                                        <span class="m-r-xs"><i class="fa zmdi-email"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>

                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout")?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">

                <!--Dashboard-->
                <?php if(is_allowed_view_module("dashboard")) {?>
                    <li>
                        <a href="<?php echo base_url("dashboard")?>">
                            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>

                    </li>
                <?php } ?>

                <!--Settings-->
                <?php if(is_allowed_view_module("settings")) {?>
                    <li>
                    <a href="<?php echo base_url("settings")?>">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Site Settings</span>
                    </a>
                </li>
                <?php } ?>

                <!--Email Settings-->
                <?php if(is_allowed_view_module("emailsettings")) {?>
                    <li>
                    <a href="<?php echo base_url("emailsettings");?>">
                        <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                        <span class="menu-text">Email Settings</span>
                    </a>
                </li>
                <?php } ?>


                <!--Galleries-->
                <?php if(is_allowed_view_module("galleries")) {?>
                    <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Gallery</span>
                        <span class="label label-info menu-label">3</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("galleries");?>"><span class="menu-text">Pictures Gallery</span></a></li>
                        <li><a href="#"><span class="menu-text">Video Gallery</span></a></li>
                        <li><a href="#"><span class="menu-text">File Gallery</span></a></li>
                    </ul>
                </li>
                <?php } ?>

                <!--Slider-->
                <?php if(is_allowed_view_module("slides")) {?>
                    <li>
                    <a href="<?php echo base_url("slides")?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Slides</span>
                    </a>
                </li>
                <?php } ?>

                <!--Products-->
                <?php if(is_allowed_view_module("products")) {?>
                    <li>
                    <a href="<?php echo base_url("products");?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Products</span>
                    </a>
                </li>
                <?php } ?>

                <!--Services-->
                <?php if(is_allowed_view_module("services")) {?>
                    <li>
                    <a href="<?php echo base_url("services");?>">
                        <i class="menu-icon fa fa-cutlery"></i>
                        <span class="menu-text">Services</span>
                    </a>
                </li>
                <?php } ?>

                <!-- Portfolios -->
                <?php if(is_allowed_view_module("portfolio_categories") && is_allowed_view_module("portfolios")) {?>
                    <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon fa fa-asterisk"></i>
                        <span class="menu-text">Portfolio</span>
                        <span class="label label-info menu-label">2</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo base_url("portfolio_categories");?>">
                                <span class="menu-text">Portfolio Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("portfolios");?>">
                                <span class="menu-text">Portfolios</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>

                <!--News-->
                <?php if(is_allowed_view_module("news")) {?>
                    <li>
                    <a href="<?php echo base_url("news");?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">News</span>
                    </a>
                </li>
                <?php } ?>

                <!--Courses-->
                <?php if(is_allowed_view_module("courses")) {?>
                    <li>
                    <a href="<?php echo base_url("courses");?>">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text">Courses</span>
                    </a>
                </li>
                <?php } ?>

                <!--References-->
                <?php if(is_allowed_view_module("references")) {?>
                    <li>
                    <a href="<?php echo base_url("references");?>">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text">References</span>
                    </a>
                </li>
                <?php } ?>

                <!--Users-->
                <?php if(is_allowed_view_module("users")) {?>
                    <li>
                    <a href="<?php echo base_url("users");?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Users</span>
                    </a>
                </li>
                <?php } ?>

                <!--Users Roles-->
                <?php if(is_allowed_view_module("user_roles")) {?>
                    <li>
                    <a href="<?php echo base_url("user_roles");?>">
                        <i class="menu-icon fa fa-eye"></i>
                        <span class="menu-text">Users Roles</span>
                    </a>
                </li>
                <?php } ?>

                <!--Members-->
                <?php if(is_allowed_view_module("members")) {?>
                    <li>
                    <a href="<?php echo base_url("members");?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Members</span>
                    </a>
                </li>
                <?php } ?>

                <!--Testimonials-->
                <?php if(is_allowed_view_module("testimonials")) {?>
                    <li>
                    <a href="<?php echo base_url("testimonials");?>">
                        <i class="menu-icon fa fa-comments"></i>
                        <span class="menu-text">Visitor's Notes</span>
                    </a>
                </li>
                <?php } ?>

                <!--Brands-->
                <?php if(is_allowed_view_module("brands")) {?>
                    <li>
                    <a href="<?php echo base_url("brands");?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">Brands</span>
                    </a>
                </li>
                <?php } ?>

                <!--Popup-->
                <?php if(is_allowed_view_module("popups")) {?>
                    <li>
                    <a href="<?php echo base_url("popups");?>">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popups</span>
                    </a>
                </li>
                <?php } ?>

                <!--Home-->
                <li>
                    <a href="documentation.html">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Home</span>
                    </a>
                </li>

                <!--
                Layouts
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Layouts</span>
                        <span class="label label-warning menu-label">2</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="../default/index.html"><span class="menu-text">Default</span></a></li>
                        <li><a href="../topbar/index.html"><span class="menu-text">Topbar</span></a></li>
                    </ul>
                </li>

                UI Kit
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">UI Kit</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="buttons.html"><span class="menu-text">Buttons</span></a></li>
                        <li><a href="alerts.html"><span class="menu-text">Alerts</span></a></li>
                        <li><a href="panels.html"><span class="menu-text">Panels</span></a></li>
                        <li><a href="lists.html"><span class="menu-text">Lists</span></a></li>
                        <li><a href="icons.html"><span class="menu-text">Icons</span></a></li>
                        <li><a href="media.html"><span class="menu-text">Media</span></a></li>
                        <li><a href="widgets.html"><span class="menu-text">Widgets</span></a></li>
                        <li><a href="tabs.html"><span class="menu-text">Tabs &amp; Accordions</span></a></li>
                        <li><a href="progress.html"><span class="menu-text">Progress</span></a></li>
                    </ul>
                </li>

                Mail Box
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-inbox zmdi-hc-lg"></i>
                        <span class="menu-text">Mail Box</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="inbox.html">
                                <span class="menu-text">Inbox</span>
                                <span class="label label-primary menu-label">12</span>
                            </a>
                        </li>
                        <li><a href="compose.html"><span class="menu-text">Compose</span></a></li>
                    </ul>
                </li>

                Search
                <li>
                    <a href="search.web.html">
                        <i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i>
                        <span class="menu-text">Search</span>
                    </a>
                </li>

                Pages
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-pages zmdi-hc-lg"></i>
                        <span class="menu-text">Pages</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="profile.html"><span class="menu-text">Profile</span></a></li>
                        <li><a href="price.html"><span class="menu-text">Prices</span></a></li>
                        <li><a href="invoice.html"><span class="menu-text">Invoice</span></a></li>
                        <li><a href="gallery.1.html"><span class="menu-text">Gallery</span></a></li>
                        <li><a href="gallery.2.html"><span class="menu-text">Gallery 2</span></a></li>
                        <li><a href="support.html"><span class="menu-text">FAQ</span></a></li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)" class="submenu-toggle">
                                <i class="menu-icon zmdi zmdi-plus zmdi-hc-lg"></i>
                                <span class="menu-text">Misc Pages</span>
                                <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="login.html"><span class="menu-text">Login</span></a></li>
                                <li><a href="signup.html"><span class="menu-text">Sign Up</span></a></li>
                                <li><a href="password-forget.html"><span class="menu-text">Reset Password</span></a></li>
                                <li><a href="unlock.html"><span class="menu-text">Unlock Screen</span></a></li>
                                <li><a href="404.html"><span class="menu-text">404 Error</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                Forms
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text">Forms</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="form.layouts.html"><span class="menu-text">Form Layouts</span></a></li>
                        <li><a href="form.elements.html"><span class="menu-text">Form Elements</span></a></li>
                        <li><a href="form.custom.html"><span class="menu-text">Customized Elements</span></a></li>
                        <li><a href="form.plugins.html"><span class="menu-text">Form Plugins</span></a></li>
                        <li><a href="file-upload.html"><span class="menu-text">File Upload</span></a></li>
                        <li><a href="form.datetime.html"><span class="menu-text">DateTime Pickers</span></a></li>
                        <li><a href="editors.html"><span class="menu-text">Editors</span></a></li>
                    </ul>
                </li>

                Tables
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i>
                        <span class="menu-text">Tables</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="tables.basic.html"><span class="menu-text">Basic Tables</span></a></li>
                        <li><a href="datatables.html"><span class="menu-text">DataTables</span></a></li>
                    </ul>
                </li>

                Charts
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-chart zmdi-hc-lg"></i>
                        <span class="menu-text">Charts</span>
                        <span class="label label-success menu-label">7</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="charts.flot.html"><span class="menu-text">Flot Charts</span></a></li>
                        <li><a href="echarts.bar.html"><span class="menu-text">Bar echarts</span></a></li>
                        <li><a href="echarts.pie.html"><span class="menu-text">Pie echarts</span></a></li>
                        <li><a href="echarts.line.html"><span class="menu-text">Line echarts</span></a></li>
                        <li><a href="echarts.map.html"><span class="menu-text">Map echarts</span></a></li>
                        <li><a href="echarts.scatter.html"><span class="menu-text">Scatter echarts</span></a></li>
                        <li><a href="echarts.custom.html"><span class="menu-text">Custom echarts</span></a></li>
                    </ul>
                </li>

                Maps
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-pin zmdi-hc-lg"></i>
                        <span class="menu-text">Maps</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="map-google.html"><span class="menu-text">Google Maps</span></a></li>
                        <li><a href="map-vector.html"><span class="menu-text">Vector Maps</span></a></li>
                    </ul>
                </li>
                -->

                <!--Separator-->
                <li class="menu-separator">
                    <hr>
                </li>

                <!--Documentation-->
                <li>
                    <a href="documentation.html">
                        <i class="menu-icon zmdi zmdi-file-text zmdi-hc-lg"></i>
                        <span class="menu-text">Documentation</span>
                    </a>
                </li>
                <!--Angular Version-->
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-language-javascript zmdi-hc-lg"></i>
                        <span class="menu-text">Angular Version</span>
                    </a>
                </li>
            </ul>
            <!-- .app-menu -->
        </div>
        <!-- .menubar-scroll-inner -->
    </div>
    <!-- .menubar-scroll -->
</aside>