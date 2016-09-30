<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warhawk Global Connect :: File Upload</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/wgc.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/slick/slick.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <style type="text/css">
        // Override bootstrap.less
        #navbar-big {
            min-height: 100px;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; min-height:100px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="assets/img/uwwLogo.jpg" /></a>
            </div>
            <!-- /.navbar-header -->

        </nav>

        <div id="page-wrapper" class="to-100">
            <!-- load file div -->
            <div class="row medium-size">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <label for="file-upload">Select the XLS file to upload.</label>
                            <input class="form-input" type="file" name="file-upload" id="file-upload" style="font-size: 1.2em;"/>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 no-padding width80">
                            <button id="btn-file-upload" class="form-input-no-padding" >
                                <i class="fa fa-search fa-inverse"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                           <button type="button" id="load-file" class="btn btn-primary">Load file</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.footer -->
            <div class="row footer">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        &copy; 2016 University of Wisconsin-Whitewater
                    </div>
                    <div class="col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 text-center">
                        Developed by DS Contact Alumni Network
                    </div>
                    <div class="col-lg-offset-1 col-lg-3 col-md-3 col-sm-3 text-right">
                        Account Settings&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Help
                    </div>
                </div>
            </div>
            <!-- /.footer -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Modal -->

    <div id="wgc-modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div id="m-header" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="m-title" class="modal-title"></h4>
                </div>
                <div id="m-message" class="modal-body">
                </div>
                <div id="m-footer" class="modal-footer">
                    <button type="button" class="btn btn-success btn-outline" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/wgc.js"></script>
    <script src="assets/js/file_upload.js"></script>
    <!-- Slick Carrousel -->
    <script src="assets/slick/slick.min.js"></script>
</body>

</html>
