<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Human Resources ERP</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>HR-ERP</span></a>
            </div>

            <div class="clearfix"></div>


            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Control Panel <span class="fa fa-chevron-down"></span></a>

                  </li>
                  <li><a><i class="fa fa-edit"></i> Lectures <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ action('LectureController@create') }}">Add Lecture</a></li>
                      <li><a href="{{ action('LectureController@index') }}">List Lectures</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Vacations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Approve Vacation</a></li>
                      <li><a href="{{ action('VacationController@create') }}">Demand Vacation</a></li>
                      <li><a href="{{ action('VacationController@index') }}">List Vacations</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Demands  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ action('DemandController@create') }}">Add Demand</a></li>
                      <li><a href="{{ action('DemandController@index') }}">List Demands</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Projects  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ action('ProjectController@create') }}">Add Project</a></li>
                      <li><a href="{{ action('ProjectController@index') }}">List Projects</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ action('EmployeeController@create') }}">Add Employee</a></li>
                      <li><a href="{{ action('EmployeeController@index') }}">List Employees</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Timelines </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>



        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            @yield('content')

            @if($flash = session('message'))
              <div id="flash-message" class="alert alert-success" role="alert">


                {{ $flash }}

              </div>
            @endif

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    @yield('script')

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>

    <script type="text/javascript">
      //console.log("adsad");
      $('#project-delete').on('shown.bs.modal', function (e) {
          var $invoker = $(e.relatedTarget);
          $(this).find('.btn-delete').attr("data-url", $invoker.attr("data-url"));
      })
      $('.btn-delete').on('click', function (e) {
        //e.preventDefault(); // 
        //e.stopPropogation(); //
        $this = $(this);
        $.ajax({
          url: $(this).attr("data-url"),
          data: {
            _method: 'delete'
          },
          type: 'post', 
          method: 'post',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          success: function(result){
             $("#project-table button[data-url='"+ $this.attr('data-url') +"']").parents("tr").eq(0).remove(); // 
             $("#project-delete").modal('hide'); // hide modal
             $("#project-container").append('<div class="alert alert-success" role="alert">'+result.message+'</div>') // show flash msg
             $('div.alert').not('.alert-important').delay(4000).fadeOut(200); // hide flash 
          }});

      })

    </script> 
    <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

    <script type="text/javascript">
        $('.btn-edit-tmp').on('click', function (e) {
          //var $invoker = $(e.relatedTarget);
          //$(this).find('.btn-edit').attr("data-url", $invoker.attr("data-url"));

          $.ajax({
              type: 'get',
              url: $(this).attr("data-url"),
              method: 'get',
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(result) {
                  var prj = $("#project-edit");
                  prj.modal('show');
                  prj.find('*[name="first-name-edit"]').val(result.project['name']);
                  prj.find('*[name="start-date-edit"]').val(result.project['starts']);
                  prj.find('*[name="end-date-edit"]').val(result.project['ends']);
                  prj.find('*[name="project-manager-name-edit"]').val(result.project.manager.name);

                 // $("#project-edit").find('*[name=')
              }
          });
        })
        
    </script>

  </body>
</html>
