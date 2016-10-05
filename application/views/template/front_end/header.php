<!DOCTYPE html>

<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
    <title>Warhawk Global Connect</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->config->base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url(); ?>assets/css/wgc.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo $this->config->base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->config->base_url(); ?>assets/slick/slick.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
    <style type="text/css">
        /* Override bootstrap.less */
        #navbar-big {
            min-height: 100px;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-static-top navbar-fixed" role="navigation" style="margin-bottom: 0; min-height:100px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(). 'index.php/welcome' ?>"><img src="<?php echo $this->config->base_url(); ?>assets/img/uwwLogo.jpg" /></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <?php      
                        $href = $this->config->base_url();
                        if ($this->session->userdata('data') && $this->session->userdata('data')['profile_desc']) {
                            $href = $this->config->base_url() . "index.php/" .strtolower($this->session->userdata('data')['profile_desc']) . "/dashboard";
                        }
                    ?>
                    <a href="<?=$href?>">
                        <!-- Regular dashboard -->
                        <i class="fa fa-dashboard fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <!-- University news/updates -->
                        <i class="fa fa-newspaper-o fa-3x"></i> 
                    </a>
                </li>
                <li>
                <?php
                    if ($this->session->userdata('login')) {
                ?>
                    <a href="#">
                <?php
                    }
                ?>
                        <!-- Alumni connection updates -->
                        <i class="fa fa-users fa-3x"></i> 
                <?php
                    if ($this->session->userdata('login')) {
                ?>
                    </a>
                <?php
                    }
                ?>
                </li>
                <li>
                    <a href="<?= base_url() ?>index.php/jobs">
                        <!-- Job board -->
                        <i class="fa fa-briefcase fa-3x"></i> 
                    </a>
                </li>
                <li>
                <?php
                    if ($this->session->userdata('login')) {
                ?>
                    <a href="#">
                <?php
                    }
                ?>
                        <!-- Discussion forum -->
                        <i class="fa fa-comments fa-3x"></i> 
                <?php
                    if ($this->session->userdata('login')) {
                ?>
                    </a>
                <?php
                    }
                ?>
                </li>
                <li class="dropdown">
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
                        ?>
                        <li><a href="<?= base_url() ?>index.php/administrator/profile/"<?= $this->session->userdata('data')['person_id'] ?>><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="" id="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <li>
                    <?php
                        if ($this->session->userdata('login')) {
                    ?>
                        <a href="#">
                    <?php
                        }
                    ?>
                        <!-- Settings -->
                        <i class="fa fa-cogs fa-3x"></i> 
                    <?php
                        if ($this->session->userdata('login')) {
                    ?>
                        </a>
                    <?php
                        }
                    ?>
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
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
     