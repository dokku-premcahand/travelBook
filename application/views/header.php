<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('index/TravelBook'); ?>">
                Travel Book
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if($this->session->userdata('user_id')){
                ?>
                        <li>
                            <a href="<?php echo base_url('home/MyTravelBook'); ?>">Home</a>
                        </li>
                <?php
                    }else{
                ?>
                        <li>
                            <a href="<?php echo base_url('index/TravelBook'); ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index/login'); ?>">Login</a>
                        </li>
                <?php
                    }
                ?>
                <li>
                    <a href="post.html">Sample Post</a>
                </li>
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
                <?php
                    if($this->session->userdata('user_id')){
                ?>
                        <li>
                            <a href="<?php echo base_url('index/logout'); ?>">Logout</a>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>