<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('../public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <?php
                        if($this->session->userdata('user_id')){
                    ?>
                            <h1>
                                <a href="<?php echo base_url('post/addPost'); ?>" style="color: #ffffff;text-decoration: none;">
                                    Share Your Experiences
                                </a>
                            </h1>
                            <hr class="small">
                            <span class="subheading">
                                Bolg For Nauter Born Travellers.
                            </span>
                    <?php
                        }else{
                    ?>
                            <h1>Travel Book</h1>
                            <hr class="small">
                            <span class="subheading">
                                <!-- Bolg For Nauter Born Travellers. -->
                                A Place To Share Your Travel Experiences.
                            </span>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>