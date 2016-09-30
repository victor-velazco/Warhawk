<?php 
    $profile_name = str_replace(" ", "", $person->profile_description);
 ?>
  <?php 
    $total = 0;
    foreach ($unreadMessages as $key => $value) {
        $total = $total + $value['read'];
    }
?>
 <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                
                    <div class="row">
	                    <div class="col-md-12">
							<div class="table-layout mb15">
                            <div class="col-xs-7 widget panel">
                                <div class="panel-body text-center">
									<p>
										<?php echo ($last[0]->checkin_type_id == 1) ? "Inside of Room":""; ?>
										<?php echo ($last[0]->checkin_type_id == 2) ? "Outside of Room":""; ?>
										<?php echo ($last[0]->checkin_type_id == 3) ? "Inside the school":""; ?>
										<?php echo ($last[0]->checkin_type_id == 4) ? "Outside of school":""; ?>
									</p>
									<p>Room: <?php echo $last[0]->room_name ?></p>
									<p>School: <?php echo $last[0]->school_name ?></p>
									
									<label class="input-group">
                                            <?php 
                                             if($last[0]->checkin_type_id == 1){#igual a 1 para que sea checkout
                                                    ?>
                                            <!--<button onclick = "schoolCheckin('2')" class="btn btn-inverse form-control" dir="">Room CheckOut <i class="ico-exit3"></i></button>-->
                                            <?php   
                                                }
                                             ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-5 widget panel bgcolor-info">
                                <div class="panel-body">
                                    <h4 class="semibold text-center nm">
	                                    <i class="ico-hand-left" style="font-size:26px;"></i>
                                        Current Position
                                    </h4>
                                </div>
                            </div>
                        </div>
	                    </div>
	                </div>
                    <!-- Browser Breakpoint -->
                    <div class="row">
                    <div class="col-md-7" id="checkin_panel">
                            <!-- START panel -->
                            <div class="panel panel-primary">
                                <!-- panel heading/header -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Checkin into a room of my school</h3>
                                </div>

                                <!--/ panel heading/header -->
                                <!-- panel body with collapse capabale -->
                                <div class="table-responsive panel-collapse pull out"> <!-- out"> -->
                                        <label class="input-group">
                                                <span class="input-group-addon">User Id</span>
                                                <input value="<?php echo $person->userid ?>" type="text" id="userid_school" class="form-control" disabled>
                                                <input value="<?php echo $person->person_id ?>" type="hidden" id="person_id_school" class="form-control" disabled>
                                                <input value="<?php echo $person->school_id ?>" type="hidden" id="school_id_school" class="form-control" disabled>
                                        </label>

                                        <label class="input-group">
                                                <span class="input-group-addon">Rooms</span>
                                                <select name="room_school" id="room_school" class="form-control" required = "true" onchange = "checkin()">
                                                    <option value="-">Select Room</option>
                                                    <?php 
                                                        foreach ($rooms as $key => $value) {
                                                    ?>            
                                                        <option value="<?php echo $value['room_id'] ?>">
                                                            <?php echo $value['room_name'] ?>
                                                        </option>
                                                    <?php
                                                        }
                                                     ?>
                                                </select>
                                        </label>
                                        <label class="input-group">
                                            <!--<a id="cins" class="btn btn-success form-control" href="">CheckIn</a>-->
                                            <button onclick = "check('cins')" id="cins" class="btn btn-success form-control" dir="">CheckIn</button>
                                        </label>
                                </div>
                                <!--/ panel body with collapse capabale -->
                            </div>
                        </div>
                        <!--/ END panel -->
                        <div class="col-md-12" id="checkin_panel_school">
                            <!-- START panel -->
                            <div class="panel panel-default">
                                <!-- panel heading/header -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Check in my school</h3>
                                </div>

                                <!--/ panel heading/header -->
                                <!-- panel body with collapse capabale -->
                                <div class="table-responsive panel-collapse pull out"> <!-- out"> -->
                                        <label class="input-group">
                                                <span class="input-group-addon">User Id</span>
                                                <input value="<?php echo $person->userid ?>" type="text" id="free_userid_school" class="form-control" disabled>
                                                <input value="<?php echo $person->person_id ?>" type="hidden" id="free_person_id_school" class="form-control" disabled>
                                                <input value="<?php echo $person->school_id ?>" type="hidden" id="free_school_id_school" class="form-control" disabled>
                                        </label>

                                        <label class="input-group">
                                                <input type="hidden" name="free_room" id="free_room" value="<?php echo $free_room_id ?>">
                                        </label>
                                        <label class="input-group">
                                            <?php 
                                                 if($school_check_in == false || $school_check_in == true){
                                                    ?>
                                            <button onclick = "schoolCheckin('3')" class="btn btn-success form-control" dir="">School CheckIn <i class="ico-enter3"></i></button>
                                            <input type="hidden" id="check_status" value="0">
                                            <?php 
                                                }
                                                #if($school_check_in == true){
                                                  ?>
                                            <!--<button onclick = "schoolCheckin('4')" class="btn btn-danger form-control" dir="">School CheckOut <i class=" ico-exit3"></i></button>
                                            <input type="hidden" id="check_status" value="1">-->
                                            <?php   
                                                #}
                                             ?>
                                        </label>
                                </div>
                                <!--/ panel body with collapse capabale -->
                            </div>
                        </div>
                        <!--/ END panel -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <!-- START panel -->
                            <div class="panel panel-inverse">
                                <!-- panel heading/header -->
                                <div class="panel-heading">
                                    <h3 class="panel-title ellipsis">
                                        <i class="ico-time"></i> 
                                        Permissions (<?php echo $person->first_name; ?>)
                                    </h3>
                                    <!-- panel toolbar -->
                                    <div class="panel-toolbar text-right">
                                        <!-- option -->
                                        <div class="option">
                                            <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                                            <button class="btn" data-toggle="panelremove" data-parent=".col-md-12"><i class="remove"></i></button>
                                        </div>
                                        <!--/ option -->
                                    </div>
                                    <!--/ panel toolbar -->
                                </div>
                                <!--/ panel heading/header -->
                                <!-- panel body with collapse capabale -->
                                <div class="table-responsive panel-collapse pull out">
                                   <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Purpose</th>
                                        <th>Teacher</th>
                                        <th>Time in Minutes</th>
                                        <th>Remaining Time</th>
                                        <th>Permission Time</th>
                                        <th>Destination</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php 
                            foreach ($permissions as $key => $value) {
                        ?>            <tr>
                                            <td>
                                                    <?php echo $value['comment'] ?>
                                            </td>
                                            <td>
                                                    <?php echo $value['tea_first_name'] ?>
                                                    <?php echo $value['tea_middle_name'] ?>
                                                    <?php echo $value['tea_last_name'] ?>
                                                    <?php echo $value['tea_second_last_name'] ?>
                                            </td>

                                            <td><?php echo $value['time'] ?></td>
                                            <td>
                                                <?php 
                                                $value['val'] = trim($value['val']);
                                                if($value['val'] == ""){
                                                    #echo "vacio";
                                                    #var_dump($value['val']);
                                                }else{
                                                    #echo "NO vacio";
                                                    #var_dump($value['val']);
                                                }
                                                    if($value['val'] == "-"){
                                                        echo "0";
                                                    }else{
                                                        $actual = date('Y-m-d H:i:s');
                                                        $fecha = date_create($value['timepermission']);
                                                        #echo gettype($fecha);
                                                        #echo $value['timepermission'] ." - " . $fecha ;
                                                        if(gettype($fecha) != "boolean"){
                                                            date_add($fecha, date_interval_create_from_date_string($value['time'].' minutes'));
                                                            $anterior = date_format($fecha, 'Y-m-d H:i:s');

                                                            $datetime1 = new DateTime($actual);
                                                            $datetime2 = new DateTime($anterior);
                                                            $interval = $datetime1->diff($datetime2);
                                                            if($interval->format('%R%i min') < 0){
                                                                echo "Time Over";
                                                            }else{
                                                                echo $interval->format('%i : %s min');
                                                            }
                                                        }else{
                                                            echo "No Remaing Time";
                                                        }

                                                    }
                                                 ?>
                                            </td>
                                            <td><?php echo $value['timepermission'] ?></td>
                                            <td><?php echo $value['room_name'] ?></td>
                                            <td><?php echo $value['status'] ?></td>
                                    </tr>

                        <?php
                            }
                         ?>
                                </tbody>
                            </table>

                                </div>
                                <!--/ panel body with collapse capabale -->
                            </div>
                            <!--/ END panel -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- START panel -->
                            <div class="panel panel-primary">
                                <!-- panel heading/header -->
                                <div class="panel-heading">
                                    <h3 class="panel-title ellipsis"><i class="ico-checkbox-checked2"></i> Check In (<?php echo $person->first_name; ?>)</h3>
                                    <!-- panel toolbar -->
                                    <div class="panel-toolbar text-right">
                                        <!-- option -->
                                        <div class="option">
                                            <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                                            <button class="btn" data-toggle="panelremove" data-parent=".col-md-12"><i class="remove"></i></button>
                                        </div>
                                        <!--/ option -->
                                    </div>
                                    <!--/ panel toolbar -->
                                </div>
                                <!--/ panel heading/header -->
                                <!-- panel body with collapse capabale -->
                                <div class="table-responsive panel-collapse pull out">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date / Time</th>
                                                <th>Type</th>
                                                <th>Comments</th>
                                                <!--<th>Name</th>-->
                                                <th>School</th>
                                                <th>Room</th>
                                                <th>Limiter</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($checkins as $value) {
                                             ?>
                                            <tr>
                                                <td><span class="semibold text-accent"><?php echo "(".date('l', strtotime($value->registry_datetime)).") ".$value->registry_datetime ?></span></td>
                                                <td><?php echo $value->action ?></td>
                                                <td><?php echo $value->comments ?></td>
                                                <!--<td><?php echo $value->first_name ?> <?php echo $value->last_name ?></td>-->
                                                <td><?php echo $value->school_name ?></td>
                                                <td><?php echo $value->room_name ?></td>
                                                <td><?php echo $value->limiter_description ?></td>
                                            </tr>
                                            <?php 
                                                }
                                             ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!--/ panel body with collapse capabale -->
                            </div>
                            <!--/ END panel -->
                        </div>
                    </div>
                    <!--/ END Left Side -->
            </div>
        </section>
        <!-- jQuery -->
<script type="text/javascript" charset="utf8" src="<?php echo $this->config->base_url(); ?>assets/js/jquery/jquery.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo $this->config->base_url(); ?>assets/js/datatables/jquery.dataTables.js"></script>

<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/tables.js"></script>

<script type="text/javascript" charset="utf8" src="<?php echo $this->config->base_url(); ?>assets/js/backend/pages/vrifyNew.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo $this->config->base_url(); ?>assets/js/backend/pages/selectSchool.js"></script>

<script>
$(document).ready(function(){
    $("#checkin_panel").hide();
    $("#cins").hide();
    var check_status = $("#check_status").val();
    if(check_status != 1){//Igual a uno para los check out
        $("#checkin_panel").show();
        $("#checkin_panel_school").attr('class','col-md-5');
    }
    console.log("check_status - ".check_status);
});

function checkin(){
    var school_id = $('#school_id_school').val();
    console.log(school_id);
    var room_id = $('#room_school').val();
    console.log(room_id);
    var person_id = $('#person_id_school').val();
    console.log(person_id);
    if(room_id != "-"){
        console.log("si");
        var url = "http://ftloudounms.passport.education/rest_services/passport/checkin";
            url = url + "/" + room_id;
            url = url + "/" + person_id;
            console.log(url);
            $("#cins").show();
            $("#cins").prop("dir", url)
    }else{
        console.log("no");
        $("#cins").hide();
    }
}

function schoolCheckin(checkin_types){
    var school_id = $('#free_school_id_school').val();
    console.log(school_id);
    var free_room = $('#free_room').val();
    console.log(free_room);
    var person_id = $('#free_person_id_school').val();
    console.log(person_id);
    if(free_room != "-"){
        console.log("si");
        var url = "http://ftloudounms.passport.education/rest_services/passport/checkin";
            url = url + "/" + free_room;
            url = url + "/" + checkin_types;
            url = url + "/" + person_id;
            console.log(url);
            $.get(url,
            {
                
            },
            function(data, status){
                console.log(data + status);
                console.log(data.redirect);
                if(data.redirect == "student"){
                    console.log(data);
                    window.location.href = "main";
                }
            });
    }else{
        console.log("no");
        $("#cins").hide();
    }
}

function check(id){
    console.log(id);
    var action = $("#"+id).attr("dir");
    console.log("action" + action);
    $.get(action,
        {
            
        },
        function(data, status){
            console.log(data + status);
            console.log(data.redirect);
            if(data.redirect == "student"){
                console.log(data);
                window.location.href = "main";
            }
        });
}
</script>