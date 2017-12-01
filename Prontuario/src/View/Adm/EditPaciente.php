<?php require "../../Controller/Control.php";
$con = new  Control();
$con->estados();
$con->EditPaciente($_GET['cpf']);

$linha= mysqli_fetch_object($con->query);

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
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../../public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../../public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../../public/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../../public/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../../public/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../public/bower_components/select2/dist/css/select2.min.css">
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
                <li><a href="ExibeMedico.php"><i class="fa fa-fw fa-user-md"></i> <span>Médicos</span></a></li>
                <li class="active"><a href="ExibePaciente.php"><i class="ion ion-person-add"></i> <span>Pacientes</span></a></li>
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
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default" >
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Paciente</h3>
                </div>

                <form action="../../Controller/controller.php" method="GET">

                    <!-- /.box-header -->
                    <div class="box-body" align="center">
                        <div class="row" align="left">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>CPF:</label>
                                    <div class="input-group">
                                        <input readonly="true" value="<?php echo $linha->cpf; ?>" name="cpf" type="text" class="form-control" data-inputmask='"mask":"999.999.999-99"' data-mask>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nome">Nome:</label>
                                    <input value="<?php echo $linha->nome; ?>" name="nome" class="form-control" placeholder="Nome">
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Endereço">Endereço:</label>
                                    <input value="<?php echo $linha->endereco; ?>" class="form-control" name="endereco" placeholder="Endereço">
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Bairro">Bairro:</label>
                                    <input value="<?php echo $linha->bairro; ?>" class="form-control" name="bairro" placeholder="Bairro">
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="Complemento">Complemento:</label>
                                    <input value="<?php echo $linha->complemento; ?>" class="form-control" name="complemento" placeholder="Complemento">
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estados">Estado:</label>
                                    <select class="form-control" name="estado" id="estados" style="width: 100%">

                                        <?php
                                        while ( $row = mysqli_fetch_assoc( $con->queryEstd) ) {
                                            ?>
                                            <option <?php if ($linha->estado== $row['nome']) echo 'selected' ; ?> value="<?php echo $row['cod_estados']?>"> <?php echo $row['sigla']?> </option>';

                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidades">Cidade:</label>
                                    <select class="form-control" name="cidade" id="cidades" style="width: 100%;">
                                        <option  value="<?php echo $linha->cidade ?>"><?php echo utf8_encode($linha->cidade) ?> </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>CEP:</label>
                                    <div class="input-group">
                                        <input value="<?php echo $linha->cep; ?>" name="cep" type="text" class="form-control" data-inputmask='"mask":"99.999-999"' data-mask>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>RG:</label>
                                    <div class="input-group">
                                        <input value="<?php echo $linha->rg; ?>" name="rg" type="text" class="form-control" data-inputmask='"mask":"999999999999-9"' data-mask>
                                    </div>
                                </div>
                            </div>

                            <!-- Date -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data da Nascimento:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input value="<?php echo $linha->data_nascimento; ?>" name="data_nascimento" type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <!-- /.form group -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Naturalidade">Naturalidade:</label>
                                    <input value="<?php echo $linha->naturalidade; ?>" name="naturalidade" class="form-control" id="Naturalidade" placeholder="Naturalidade">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nacionalidade">Nacionalidade:</label>
                                    <input value="<?php echo $linha->nacionalidade; ?>" name="nacionalidade" class="form-control" id="Nacionalidade" placeholder="Nacionalidade">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Email">Email:</label>
                                    <input value="<?php echo $linha->email; ?>" name="email" class="form-control" id="Email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input value="<?php echo $linha->telefone; ?>" name="telefone" type="text" class="form-control" data-inputmask='"mask":"(99)9999-9999"' data-mask>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Celular:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input value="<?php echo $linha->celular; ?>" name="celular" type="text" class="form-control" data-inputmask='"mask":"(99)99999-9999"' data-mask>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="TipoS">Tipo Sanguíneo:</label>
                                    <input value="<?php echo $linha->tipo_sanguineo; ?>" name="tipoSan" class="form-control" placeholder="TipoS">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="NomePai">Nome do Pai:</label>
                                    <input value="<?php echo $linha->nome_pai; ?>" name="pai" class="form-control" placeholder="NomePai">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="NomeMae">Nome da Mãe:</label>
                                    <input value="<?php echo $linha->nome_mae; ?>" name="mae" class="form-control" id="NomeMae" placeholder="NomeMae">
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                        <div style="width: 15%; margin-top: 2%" >

                            <button type="submit" name="enviar" value="EditarPaciente" class="btn btn-block btn-primary">Editar</button>

                            <div class="modal modal-info fade" id="modal-info">
                                <div class="modal-dialog" style="margin-top: 15%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h2 class="modal-title">Paciente editado com sucesso.</h2>
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
                                            <h4 class="modal-title">Erro ao cadastar: <?php print($_GET['erro']); ?> </h4>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                        </div>
                    </div>
                    <!-- /.box-body -->

                </form>

            </div>
            <!-- /.box -->

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

<script type="text/javascript" src="../../../public/dist/js/CidEstd/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../public/dist/js/CidEstd/funcao.js"></script>
<!-- jQuery 3 -->
<script src="../../../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../../public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../../public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../../public/bower_components/moment/min/moment.min.js"></script>
<script src="../../../public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../../public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../../public/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../../public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../../public/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../../public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../public/dist/js/demo.js"></script>
<!-- Page script -->

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
</body>

<?php
if (!empty($_GET['valor'])) {
    $resultado = $_GET['valor'];

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
?>

</html>