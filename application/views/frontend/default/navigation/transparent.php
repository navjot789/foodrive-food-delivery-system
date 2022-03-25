<!--============================= HEADER =============================-->
<div class="nav-menu">
    <div class="bg transition">
        <div class="container-fluid fixed">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light" style="border:none;">
                        <a class="navbar-brand" href="<?php echo site_url(); ?>"> <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="system-icon"> <span class="d-none d-sm-inline-block"><?php echo get_system_settings('system_name'); ?></span> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>"><i class="fas fa-home"></i> <?php echo site_phrase('home'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('site/faq'); ?>"><i class="far fa-question-circle"></i> FAQ</a>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('login'); ?>"><?php echo sanitize($this->session->userdata('is_logged_in')) ? '<i class="far fa-user-circle"></i> '.site_phrase('manage_profile', true) : '<i class="fas fa-sign-in-alt"></i> '.site_phrase('sign_in', true); ?></a>
                                </li>
                            
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
