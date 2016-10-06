        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 panel-gray5 text-center">
                    <a href="<?= base_url() . 'index.php/jobs' ?>" class="job"><h3 class="oswald upper">Find a Job</h3></a>
                </div>
                <div class="col-md-4 panel-gray2 text-center">                  
                    <?php
                    if ($this->session->userdata('data') && $this->session->userdata('data')['profile_desc']) {
                        $url = base_url() . 'index.php/jobs/post';
                    }else{
                        $url = "#";
                    }
                    ?>
                    <a href="<?= $url ?>" class="job">
                        <h3 class="oswald upper ">Post a Job</h3>
                    </a>               
                </div>
                <div class="col-md-4 panel-gray6 text-center">                    
                    <a href="<?= base_url() . 'index.php/jobs/archive'; ?>" class="job"><h3 class="oswald upper ">Job Archive</h3></a>                    
                </div>
            </div>  
        </div>  