<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <?php $this->load->view('styleHeader'); ?>
    <link href="<?php echo base_url('public/css/login.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/full-slider.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/fileinput.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/clean-blog.css'); ?>" rel="stylesheet" type="text/css">
<body>
    <?php
        $this->load->view('header');
    ?>

    <!-- Main Content -->
    <div class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
    </div>
    <div class="container">
        <div class="login-page">
            <div class="form">
                    <?php
                        if($this->session->flashdata('error')){
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php
                        }
                    ?>
                    <?php
                        if($this->session->flashdata('success')){
                    ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php
                        }
                    ?>
                <form class="login-form form-horizontal" action="<?php echo base_url('index/authentication'); ?>" method="post">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" name="username" placeholder="Username" class=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="password" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="col-lg-12">
                            <button class="btn btn-success col-lg-12">login</button>
                        </div>
                    </div>
                </form>
                <div>
                    <p class="message" style="color: #000000 !important;">Not registered? <a href="#" data-toggle="modal" data-target="#registrationModal" >Create an account</a></p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?php echo $facebook_url; ?>">
                            <button class="btn btn-primary col-lg-12">Facebook</button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo $google_url; ?>">
                            <button class="btn btn-danger col-lg-12">Google+</button>
                        </a>
                    </div>
                    <!-- <div class="col-sm-4">
                        <button class="btn btn-info">Twitter</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!---------------------------- Registration Modal ---------------------------->
        <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Sign Up</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="registration" action="<?php echo base_url('index/registration'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-lg-3 form-label">Email :</label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" placeholder="Email" id="regEmail" class="form-control" for="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 form-label">Profile Photo :</label>
                                <div class="col-lg-6">
                                    <input type="file" name="profile_picture" id="profilePic" class="filestyle" data-buttonName="btn-primary" data-placeholder="Select Profile Image."/>
                                </div>
                                <div class="col-lg-3">
                                    <img src="<?php echo base_url('public/images/default_profile_picture.jpg'); ?>" alt="profile image" class="profile_picture"/>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Sign Up</button>
                        <button type="button" class="btn btn-dnager" data-dismiss="modal" id="registrationModalClose">Close</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <!-------------------------- End -------------------------->
    <?php $this->load->view('jsFooter'); ?>
    <script type="text/javascript" src="<?php echo base_url('public/js/bootstrap-filestyle.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/validation.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/login.js'); ?>"></script>
    <script>
        $('.carousel').carousel();
    </script>
</body>
</html>
