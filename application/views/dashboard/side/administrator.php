<div class='container-fluid'>    
    <div class="row">
        <div class="col-md-3" style="top:102px; padding-left:2px; padding-right:2px;">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <i class="glyphicon glyphicon-user fa-5x"></i>
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $this->session->userdata('data')['last_name'] . " " . $this->session->userdata('data')['first_name']?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $this->session->userdata('data')['profile_desc']?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="<?= base_url() ?>/index.php/<?php echo strtolower($this->session->userdata('data')['profile_desc'])?>/dashboard">Alumni</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/index.php/<?php echo strtolower($this->session->userdata('data')['profile_desc'])?>/outstanding">Outstanding approvals</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/index.php/<?php echo strtolower($this->session->userdata('data')['profile_desc'])?>/createUser">Create new User</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/index.php/<?php echo strtolower($this->session->userdata('data')['profile_desc'])?>/reset_password">Reset Alumni Password</a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>