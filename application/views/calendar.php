<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div style="height: 140px;"></div>
        <!-- 4 Panels for info. -->
        <div class="row" id="acciones">            
            <div class="col-lg-10 col-md-10 no-padding col-md-offset-1">
                <div class="panel panel-gray3">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-offset-4 col-xs-offset-4 col-xs-4 text-center">
                                <i class="fa fa-calendar fa-2x"></i> <strong style="font-size: 28px;" class="oswald upper"> CALENDAR EVENTS</strong>
                            </div>
                        </div>
                    </div>             
                    <div class="section">
                        <div class="section">                         
                            <div class="row" >
                                <form class="form-inline">
                                    <div class="form-group col-md-offset-2">
                                        <a href="<?= base_url().'index.php/agenda/index/' ?>" class="btn btn-default btn-lg btn-block" role="button">TODAY</a>

                                    </div>    
                                    <div class="form-group col-md-offset-1">
                                        <label>Month:</label>
                                        <select  name="mes" id="mes" class="form-control">
                                            <option value="" disabled selected>Go to Month:</option>
                                            <option value="1" <?= $this->GeneralModel->setSelect('1', $this->uri->segment(4)); ?>>Enero</option>
                                            <option value="2" <?= $this->GeneralModel->setSelect('2', $this->uri->segment(4)); ?>>February</option>
                                            <option value="3" <?= $this->GeneralModel->setSelect('3', $this->uri->segment(4)); ?>>March</option>
                                            <option value="4" <?= $this->GeneralModel->setSelect('4', $this->uri->segment(4)); ?>>April</option>
                                            <option value="5" <?= $this->GeneralModel->setSelect('5', $this->uri->segment(4)); ?>>May</option>
                                            <option value="6" <?= $this->GeneralModel->setSelect('6', $this->uri->segment(4)); ?>>June</option>
                                            <option value="7" <?= $this->GeneralModel->setSelect('7', $this->uri->segment(4)); ?>>July</option>
                                            <option value="8" <?= $this->GeneralModel->setSelect('8', $this->uri->segment(4)); ?>>August</option>
                                            <option value="9" <?= $this->GeneralModel->setSelect('9', $this->uri->segment(4)); ?>>September</option>
                                            <option value="10" <?= $this->GeneralModel->setSelect('10', $this->uri->segment(4)); ?>>October</option>
                                            <option value="11" <?= $this->GeneralModel->setSelect('11', $this->uri->segment(4)); ?>>November</option>
                                            <option value="12" <?= $this->GeneralModel->setSelect('12', $this->uri->segment(4)); ?>>December</option>
                                        </select>                                                                                                 
                                    </div>
                                    <div class="form-group">
                                        <label>Year:</label>
                                        <select name="anio" id="anio" class="form-control">
                                            <option value="" disabled selected>Choose one</option>
                                            <?php
                                            for ($i = 2016; $i <= date("Y") + 10; $i++) {
                                                if($i == $this->uri->segment(3)){
                                            ?>
                                            <option value="<?= $i ?>" selected="selected"><?= $i ?></option>
                                            <?php
                                                }else{
                                            ?>
                                            <option value="<?= $i ?>" ><?= $i ?></option>                                                    
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>                                                                                                 
                                    </div>
                                </form>
                                <br>   
                            </div>                                   
                        </div>
                        <br>
                    </div>
                    <div>
                        <?= $calendario ?>
                        <input type="hidden" value="<?=$this->uri->segment(3)?>" class="year" />
                        <input type="hidden" value="<?=$this->uri->segment(4)?>" class="month" />   
                        <br>
                    </div>
                    </div>                            
                   
                </div>
            </div> 

        </div>

        <?php       
            include_once('template/login.php');
            include_once('template/event.php');
        ?>


        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){  
                $('#mes').on('change', function() {
                  window.location.href = '<?= base_url() . "index.php/agenda/index/" . $this->uri->segment(3) ?>/' + this.value;
                });
                
                $('#anio').on('change', function() {
                  window.location.href = '<?= base_url() . "index.php/agenda/index/" ?>' + this.value + '/<?=  $this->uri->segment(4) ?>';
                });                 
                
                $("#calendario").on("click", "td", function(event) {        
                    event.preventDefault();
                    //obtenemos el número del día
                    var num_dia = $(this).find('.num_dia').html();                             
                    var hoy = $(this).find('.highlight').html();    
                    //obtenemos el año a través del campo oculto del formulario
                    var year = $(".year").val();
                    //obtenemos el mes a través del campo oculto del formulario
                    var month = $(".month").val();
                    //anteponemos el 0 si es un sólo número para poder trabajar
                    //correctamente la fecha
                    if(hoy){                    
                        if(hoy.length === 1){
                            hoy = '0'+hoy;
                        }
                        //anteponemos el 0 si es un sólo número para poder trabajar
                        //correctamente la fecha
                        if(month.length === 1){
                            month = '0'+month;
                        }
                        //creamos la fecha sobre la que el usuario ha pulsado
                        var fecha = year + '-' + month  + '-' +  hoy;                        
                    }else if(num_dia){
                        if(num_dia.length === 1){
                            num_dia = '0'+num_dia;
                        }
                        //anteponemos el 0 si es un sólo número para poder trabajar
                        //correctamente la fecha
                        if(month.length === 1){
                            month = '0'+month;
                        }
                        //creamos la fecha sobre la que el usuario ha pulsado
                        var fecha = year + '-' + month  + '-' +  num_dia;                     
                    }
                    $('#event_date').val(fecha);
                    
                   <?php
                   if ($this->session->userdata('data') && $this->session->userdata('data')['profile_desc']) {
                   ?>
                    $('#event-modal').modal("show");
                   <?php
                   }
                   ?>
                });
            
                
                $( '#addEvent' ).click(function() { 
                    event.preventDefault();                                                            
                    var fecha = $("input#event_date").val();
                    var evento = $("input#detail_event").val(); 
                                          
                    $.ajax({
                        url:        '<?= base_url(); ?>index.php/agenda/add',
                        type:       'POST',
                        //dataType:   'json',
                        data:       {fecha:fecha, evento:evento},
                        success:    function(code){                                
                            $("input#evento").val('');
                            setTimeout(function(){
                               window.location.reload(1);
                            }, 800);                                
                        }
                    }); 
                        
                });                    
                
                
                
                
                
            });                 
            
        </script>        