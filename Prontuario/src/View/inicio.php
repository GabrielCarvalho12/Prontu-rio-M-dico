
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProMed</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="public/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body background="public/dist/img/planodefundo.jpg" style="background-size: 100%" >


    <!-- Content Wrapper. Contains page content -->
    <div >
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section>

 <!--------------------------
  | Your Page Content Here |
  -------------------------->
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-4 col-xs-4" style="margin-top: 32%" >
                    <!-- small box -->
                    <div class="small-box bg-light-blue">
                        <div class="inner">
                            <h3>Médico<sup style="font-size: 20px"></sup></h3>

                            <p>Fazer login como Médico</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-user-md"></i>
                        </div>
                        <a href="/ProntuarioMedico/loginMedico" class="small-box-footer">Entrar <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-4" style="float: left; margin-top: 32%">
                    <!-- small box -->
                    <div class="small-box bg-light-blue">
                        <div class="inner">
                            <h3>Atendimento</h3>

                            <p>Fazer login como Atendente</p>
                        </div>
                        <div class="icon">
                            <i class=" fa fa-pencil-square-o"></i>
                        </div>
                        <a href="/ProntuarioMedico/loginAtend" class="small-box-footer">Entrar <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-4" style="float: left; margin-top: 32%">
                    <!-- small box -->
                    <div class="small-box bg-light-blue">
                        <div class="inner">
                            <h3>Administrador</h3>

                            <p>Fazer login como Administrador</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-gears "></i>
                        </div>
                        <a href="/ProntuarioMedico/login" class="small-box-footer">Entrar <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<!-- jQuery 3 -->
<script src="../../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/dist/js/demo.js"></script>
<!-- Page script -->

</body>
</html>