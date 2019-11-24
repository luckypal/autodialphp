<?php

require_once 'Medoo.php';
session_start();

use Medoo\Medoo;

$database = new Medoo([
  'database_type' => 'mysql',
  'database_name' => 'laravel',
  'server' => 'localhost',
  'username' => 'root',
  'password' => ''
]);



//autodial
$callsettings = $database->queryAll("SELECT * FROM call_settings");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->

  <title>OTP</title>

  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
  <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <!-- Styles -->
  <link href="css/app.css" rel="stylesheet">
  <link href="js/app.js" rel="stylesheet">


  <style>
    /*.navbar-default {
    background-color: #ffffff !important;
    border-color: #ffffff !important;
}
.navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
    color: #fff;
}
.navbar-default .navbar-brand {
    color: #fff;
}


body {
   
    color: #525f7f;
    background-color: #1e1e2f;
}*/


    /*.btn-primary {
    background: #e14eca;
    background-image: -webkit-linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca);
    background-image: -o-linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca);
    background-image: -moz-linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca);
    background-image: linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca);
    background-size: 210% 210%;
    background-position: top right;
    background-color: #e14eca;
    transition: all 0.15s ease;
    box-shadow: none;
    color: #ffffff;
    border-color: #e14eca;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary:active:focus, .btn-primary:active:hover, .btn-primary.active:focus, .btn-primary.active:hover {
    background-color: #ba54f5 !important;
    background-image: linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca) !important;
    background-image: -webkit-linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca) !important;
    background-image: -o-linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca) !important;
    background-image: -moz-linear-gradient(to bottom left, #e14eca, #ba54f5, #e14eca) !important;
    color: #ffffff;
    box-shadow: none;
    border-color: #e14eca;
}
.navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {
    color: #ffffff;
    background-color: transparent;
}

.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #cc51e1;
    background-color: transparent;
}*/
  </style>


</head>

<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
          <a class="navbar-brand" href="#">
            OTP

          </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            &nbsp;
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Admin <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <style type="text/css">
      .div_retrieve_info {
        width: 350px;
        height: auto;
      }

      input[type="radio"] {
        margin: 0 8px 0 0px;
      }

      .myivr_list {
        width: 100px;
      }
    </style>
    <div class="container">
      <div class="row">


        <div class="col-md-3">

          <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

              <ul class="nav" id="side-menu">
                <li>
                  <a href="autodial" class="active"><i class="fa fa-phone fa-fw"></i> Call</a> </li>
                <li>
                  <a href="log"><i class="fa fa-tty fa-fw"></i> Log</a>
                </li>
                <li>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
              </ul>
            </div>
            <!-- /.sidebar-collapse -->
          </div>
        </div>



        <div class="col-md-7">
          <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">


              <?php if (isset($_SESSION['status']) && $_SESSION['status']) { ?>
              <div class="alert alert-success"> <?=$_SESSION['status']?> </div>
              <?php } ?>

              <?php if (isset($_SESSION['success']) && $_SESSION['success']) { ?>
              <div class="alert alert-success">
              <?=$_SESSION['success']?>

              </div>
              <?php } ?>

              <form method="POST" action="http://localhost:8000/autodial" accept-charset="UTF-8"><input name="_token" type="hidden" value="3J9zOySWahzd1xtTb4hflh3ekbTxvqX7tIquGSGr">
                <input type="hidden" name="_token" value="3J9zOySWahzd1xtTb4hflh3ekbTxvqX7tIquGSGr">
                <div class="col-md-4">

                  <label for="caller_id" class="control-label">Call To:</label>
                  <input class="form-control" name="caller_id" type="text" value="" id="caller_id">
                  <br />
                  <label for="ivr_list_label" class="control-label">From:</label>
                  <select class="form-control" name="ivr_list">
                    <option value="ivr_1" selected="selected">Barclays</option>
                    <option value="ivr_2">Halifax</option>
                    <option value="ivr_3">TSB</option>
                    <option value="ivr_4">Lloyds</option>
                    <option value="ivr_5">Nationwide</option>
                    <option value="ivr_6">Rbs</option>
                    <option value="ivr_7">Santander</option>
                    <option value="ivr_8">Hsbc</option>
                    <option value="ivr_9">Monzo</option>
                    <option value="ivr_10">Natwest</option>
                  </select>

                  <hr>
                  <input class="btn btn-lg btn-primary" type="submit" value="Call">
                  <br />
                </div>
              </form>

            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">Retrieve Information</div>

            <div class="panel-body">
              <div class="col-md-4">
                <label for="retrieveinfo_id" class="control-label">Enter Number:</label>
                <input class="form-control" name="retrieveinfo_id" type="text" value="" id="retrieveinfo_id">
                <hr>

                <div id="show_retrieve_info" class="div_retrieve_info"></div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(function() {
      $('#datetimepicker2').datetimepicker({
        locale: 'ru',
        defaultDate: new Date()
      });
      $('#datetimepicker3').datetimepicker({
        locale: 'ru',
        defaultDate: new Date('01.01.2028 02:00')
      });

      $("#retrieveinfo_id").blur(function() {

        if ($.trim($(this).val()) == '') return false;

        var form_data = new FormData();
        form_data.append('action', 'retrieveinfo');
        form_data.append('filename', $(this).val());

        $.ajax({
          url: "index.php?route=retrieveinfo",
          data: form_data,
          type: 'POST',
          contentType: false,
          processData: false,
          success: function(data) {
            console.log(data);
            var ret = eval('(' + data + ')');
            $('#show_retrieve_info').html(ret.contents);
          },
          error: function(xhr, status, error) {
            console.log('xhr.responseText: ' + xhr.responseText);
          }
        });
      });
    });
  </script>




  <?php if (isset($_SESSION['success']) && $_SESSION['success']) { ?>
    <script>
      let timerInterval
      Swal.fire({
        title: '$_SESSION["success"]',
        timer: 7000,
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            Swal.getContent().querySelector('b')
              .textContent = Swal.getTimerLeft()
          }, 100)
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.timer
        ) {
          console.log('I was closed by the timer')
        }
      })
    </script>
  <?php } ?>
  </div>

</body>

</html>