<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warhawk Global Connect</title>

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
        <nav class="navbar navbar-static-top navbar-fixed" role="navigation" style="margin-bottom: 0; min-height:100px;">
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
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-newspaper-o fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-briefcase fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comments fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-user fa-3x"></i> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cogs fa-3x"></i> 
                    </a>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>

        <div id="page-wrapper">
            <div class="row medium-size">
                <div class="col-lg-10 col-md-6 col-sm-12 slider">
                    <div><img class="all-width" src="assets/img/back1.png" /></div>
                    <div><img class="all-width" src="assets/img/group1.jpg" /></div>
                    <div><img class="all-width" src="assets/img/group2.jpg" /></div>
                </div>
                <div class="fixed back-purple">
                    <h2 align="center" class="oswald upper">First University Update Headline</h4>
                    <p class="text-justify raleway">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p>

                    <p class="text-justify raleway">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. </p>
                    <div class="row" style="position: absolute; right:10px; left:15px; bottom:10px;">
                        <div class="col-sm-1">
                            <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-1">
                            <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-1 col-xs-offset-7">
                            <i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search bar -->
            <div class="row">
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 no-padding">
                    <input type="text" name="search" placeholder="Search" id="search" class="form-input light-gray"/>
                </div>
                 <div class="col-lg-3 col-md-6 col-sm-10 no-padding">
                    <select name="category" class="form-input dark-gray special-select">
                        <option value="-1">No Category</option>
                        <option value="0">Category #1</option>
                        <option value="1">Category #2</option>
                        <option value="2">Category #3</option>
                    </select>
                </div>
                <div class="col-sm-1 no-padding width80">
                    <button class="form-input-no-padding" >
                    <i class="fa fa-search fa-inverse"></i>
                    </button>
                </div>
            </div>

            <!-- 4 Panels for info. -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
                    <div class="col-lg-12 col-md-12 no-padding">
                        <div class="panel panel-gray1">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-offset-4 col-xs-offset-4 col-xs-4">
                                        <i class="fa fa-users fa-5x fa-inverse"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body middle-panel">
                                <div class="row margin10">
                                    <img src="assets/img/profile-small1.png">
                                    <strong>Jane Smith</strong>
                                    Updated her current job
                                </div>
                                <hr />
                                <div class="row margin10">
                                    <img src="assets/img/profile-small2.png">
                                    <strong>Chris Johnson</strong>
                                    Is traveling to Mexico
                                </div>
                                <hr />
                                <div class="row margin10">
                                    <img src="assets/img/profile-small3.png">
                                    <strong>Amanda McCarthy</strong>
                                    Added a new picture
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
                    <div class="col-lg-12 col-md-12 no-padding">
                        <div class="panel panel-gray2">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-offset-4 col-xs-offset-4 col-md-1">
                                        <i class="fa fa-briefcase fa-5x fa-inverse"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body middle-panel">
                                <div class="row margin10">
                                    <strong>Marketing Director</strong><br/>
                                    ABC Marketing company
                                </div>
                                <hr />
                                <div class="row margin10">
                                     <strong>Accounting Manager</strong><br/>
                                    Smith Finance, LLC
                                </div>
                                <hr />
                                <div class="row margin10">
                                    <strong>Lead Systems Analyst</strong><br/>
                                    Apex Technology, Inc
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
                    <div class="col-lg-12 col-md-12 no-padding">
                        <div class="panel panel-gray3">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-offset-4 col-xs-offset-4 col-xs-4">
                                        <i class="fa fa-comments fa-5x fa-inverse"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body middle-panel">
                                <div class="row margin10">
                                    <strong>Recent Discussion</strong><br/>
                                    The most recent one....
                                </div>
                                <hr />
                                <div class="row margin10">
                                     <strong>New Discussion Topic</strong><br/>
                                    The new discussion topic is....
                                </div>
                                <hr />
                                <div class="row margin10">
                                    <strong>Discussion with recent comments</strong><br/>
                                    The last comment is.....
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 no-padding">
                    <div class="col-lg-12 col-md-12 no-padding">
                        <div class="panel">
                            <div class="panel-heading padding-profile-picture">
                                <div class="row">
                                    <img src="assets/img/profile-img.png" />
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <strong>Sara Amiri</strong>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1">
                                        <i class="fa fa-user fa-2x fa-inverse panel-gray2 padding-icons"></i>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1">
                                       <i class="fa fa-cogs fa-2x fa-inverse panel-gray3 padding-icons"></i> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
            <!-- /.map -->
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">

                </div>
            </div>
            <!-- /.map -->
            <!-- /.featured alumni -->
            <div class="row" style="padding-bottom: 1px;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel purple-on-white  text-center" style="line-height:180px;">
                       <span class="centered-vertically"><h2 class="oswald upper">Featured Alumni</h2></span>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                        Alumni 1
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                        Alumni 2
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                        Alumni 3
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                        Alumni 4
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 eatured-alumni-panel">
                        Alumni 5
                    </div>
                </div>
            </div>
            <!-- /.featured alumni -->
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

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/wgc.js"></script>
    <!-- Slick Carrousel -->
    <script src="assets/slick/slick.min.js"></script>
</body>

</html>
