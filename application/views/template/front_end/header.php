<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Warhawk Global Connect</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= $this->config->base_url(); ?>assets/webroot/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $this->config->base_url(); ?>assets/webroot/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/webroot/css/half-slider.css">
        
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/webroot/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/webroot/slick/slick-theme.css">        
      
        <link href='https://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>        
        <script src="<?= $this->config->base_url(); ?>assets/webroot/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link rel="shortcut icon" href="<?= $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        
    <!-- Fixed navbar -->
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= $this->config->base_url(); ?>index.php/welcome/dashboard"><img src="<?= $this->config->base_url(); ?>assets/img/logo.png"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <br>
        <?php 
            $href = $this->config->base_url();
            if ($this->session->userdata('data') && $this->session->userdata('data')['profile_desc']) {
                $href = $this->config->base_url() . "index.php/" .strtolower($this->session->userdata('data')['profile_desc']) . "/dashboard";
            }
        ?>            
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=$href?>"><i class="fa fa-tachometer fa-3x" aria-hidden="true"></i></a></li>
            <li><a href="<?= base_url() ?>index.php/welcome/announcements"><i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i></a></li>
            <li>
            <?php
                if ($this->session->userdata('login')) {
                    $users = base_url() . "index.php/Welcome/profile/" .$this->session->userdata('data')['alumni_id'];
                }else{
                    $users = "#";
                }
            ?>                  
                <a href="<?= $users ?>"><i class="fa fa-users fa-3x" aria-hidden="true"></i></a>
            </li>
            <li><a href="<?= base_url() ?>index.php/jobs"><i class="fa fa-briefcase fa-3x" aria-hidden="true"></i></a></li>
            <li><a href="<?= base_url() ?>index.php/agenda"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a></li>
            <li>
            <?php
                if ($this->session->userdata('login')) {
                    $comments = base_url() . "index.php/welcome/messaging";
                }else{
                    $comments = "#";
                }
            ?>                  
                <a href="<?= $comments ?>"><i class="fa fa-comments fa-3x" aria-hidden="true"></i></a>
            </li>
            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-3x"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <?php
                        if(!$this->session->userdata('login')){
                    ?>
                    <li><a id="login" href="" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                    </li>
                    <?php 
                        } else {
                            if ($this->session->userdata('data')['person_id']!=1) {
                    ?>
                    <li><a href="<?= base_url() ?>index.php/Welcome/about/<?=$this->session->userdata('data')['alumni_id']?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <?php
                        }
                    ?>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li><a href="<?= base_url() ?>index.php/Welcome/refer/"><i class="fa fa-paper-plane-o fa-fw"></i> Refer a peer</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/welcome/donate?id=<?=$this->session->userdata('data')['alumni_id']?>"><i class="fa fa-usd fa-fw"></i> Pledge to donate</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="" id="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>                
            </li>
            <li>
            <?php
                if ($this->session->userdata('login')) {
                    $cogs = "#";
                }else{
                    $cogs = "#";
                }
            ?>                
                <a href="<?= $cogs ?>"><i class="fa fa-cogs fa-3x" aria-hidden="true"></i></a>
            </li>
            <?php
                if ($this->session->userdata('data') && $this->session->userdata('data')['profile_id']==1) {
            ?>
            <li>
                <a href="<?= base_url(). 'index.php/administrator/fileupload' ?>">
                    <i class="fa fa-upload fa-3x"></i> 
                </a>
            </li>
            <?php
                }
            ?>            
            <li>&nbsp;</li>
            <li>&nbsp;</li>
          </ul>
        </div><!--/.nav-collapse -->

    </nav>