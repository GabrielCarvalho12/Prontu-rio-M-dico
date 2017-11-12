<?php include "../../Controller/Control.php";
$con = new  Control();
$con->MedPac();
?>

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
    <link rel="stylesheet" href="../../../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../public/dist/css/skins/_all-skins.min.css">

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

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="Home.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"> <i class="fa fa-plus-square"></i><b> PM</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"> <i class="fa fa-plus-square"></i> <b>PRO</b>MED</span>    </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"> <i class="fa fa-arrow-left" ></i> Sair do Sistema</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="../../../public/dist/img/Exit_delete_close_remove_door_logout_out.png" alt="User Image">

                                <p>
                                    Deseja realmente sair do sistema ?
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/ProntuarioMedico/login" class="btn btn-default btn-flat">SIM</a>
                                </div>
                                <div class="pull-right">
                                    <a href="" class="btn btn-default btn-flat">NÃO</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div align="center">
                    <img src="../../../public/dist/img/logo.png" alt="User Image" style="width: 50%">
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"></li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="ExibeMedico.php"><i class="fa fa-fw fa-user-md"></i> <span>Médicos</span></a></li>
                <li><a href="ExibePaciente.php"><i class="ion ion-person-add"></i> <span>Pacientes</span></a></li>
                <li><a href="ExibeAtend.php"><i class="fa fa-fw fa-stethoscope"></i> <span>Atendimentos</span></a></li>
                <li><a href="ExibeAgend.php"><i class="fa fa-book"></i> <span>Agendamentos</span></a></li>
                <li class="treeview">
                    <a><i class="fa fa-user-plus"></i> <span>Inserir</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="Medico.php"> <i class="fa fa-fw fa-user-md"></i> Médico</a></li>
                        <li><a href="Paciente.php"> <i class="ion ion-person-add"></i> Paciente</a></li>
                        <li><a href="Agendamento.php"> <i class="fa fa-book"></i> Agendamento</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
             | Your Page Content Here |
             -------------------------->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Médicos</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CRM</th>
                                        <th>CPF</th>
                                        <th>Opções</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    while ($row = mysqli_fetch_object($con->medicos)) {
                                        echo "<tr>
                                          <td>$row->nome</td>
                                          <td>$row->crm</td>
                                          <td>$row->cpf</td>
                                          <td align=\"center\">

                                        <a href=\"EditMedico.php?crm= $row->crm \" <button type=\"button\" class=\"btn btn-warning\">
                                            Editar
                                        </button>
                                        </a>

                                        <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modal-default\">
                                            Deletar
                                        </button>
                                        
                            <div class=\"modal modal-default fade\" id=\"modal-default\">
                                <div class=\"modal-dialog\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                <span aria-hidden=\"true\">&times;</span></button>
                                            <h4 class=\"modal-title\">Você deseja realmente deletar esse Médico?</h4>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href=\"../../Controller/controller.php?crm=$row->crm &enviar=DelMedico\"
                                                <button type=\"button\" class=\"btn btn-default pull-left\">
                                                    Sim
                                                </button>
                                            </a>
                                            <button type=\"button\" class=\"btn btn-default pull-right\" data-dismiss=\"modal\">Não</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                                       
                                    </td>
                                </tr>";
                                    }
                                    ?>
                                    </tbody>

                                </table>

                                <div class="modal modal-info fade" id="modal-info">
                                    <div class="modal-dialog" style="margin-top: 15%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" align="center">Cadastro médico editado com sucesso.</h3>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <div class="modal modal-danger fade" id="modal-danger">
                                    <div class="modal-dialog" style="margin-top: 15%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" align="center">Erro ao editar cadastro médico: <?php print($_GET['erro']); ?> </h3>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <div class="modal modal-info fade" id="modal-info-del">
                                    <div class="modal-dialog" style="margin-top: 15%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" align="center">Cadastro médico deletado com sucesso.</h3>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <div class="modal modal-danger fade" id="modal-danger-del">
                                    <div class="modal-dialog" style="margin-top: 15%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" align="center">Erro ao Deletar: <?php print($_GET['erro']); ?> </h3>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../public/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
</body>
<?php

if (!empty($_GET['valorEdit'])) {
    $resultado = $_GET['valorEdit'];

    if ($resultado == 1) {
        ?>

        <script>
            $(document).ready(function () {
                $("#modal-info").modal();
            });
        </script>
    <?php

    }elseif ($resultado == 2){
    ?>

        <script>
            $(document).ready(function () {
                $("#modal-danger").modal();
            });
        </script>

        <?php
    }
}

if (!empty($_GET['valorDel'])) {
    $resultado = $_GET['valorDel'];

    if ($resultado == 1) {
        ?>

        <script>
            $(document).ready(function () {
                $("#modal-info-del").modal();
            });
        </script>
    <?php

    }elseif ($resultado == 2){
    ?>

        <script>
            $(document).ready(function () {
                $("#modal-danger-del").modal();
            });
        </script>

        <?php
    }
}
?>
</html>