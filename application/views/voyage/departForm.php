<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('tpl/css_files');
    $conf = 0; ?>
    <style>

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <?php $this->load->view('tpl/header'); ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- insertion de la side barre -->
        <?php $this->load->view('tpl/side_barre'); ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <!--<ol class="breadcrumb">
                <li><a href="<?php //echo base_url() . "index.php/dashboard"; ?>"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">passager</li>
            </ol>-->
        </section>

        <!-- Main content -->
        <div class="cantainer">
            <div class="row ">
                <form class="col-md-9 col-md-offset-2 " style="margin-top:5%;" method="post" role="" id="form_depart">

                    <div class="col-md-6 col-md-offset-3 ">
                        <div class="panel panel-primary">

                            <div class="panel-heading">
                                <h3 class="panel-title">ENREGISTREMENT D'UN DEPART</h3>
                            </div>
                            <div class="panel-body">

                                <div class="panel-content">

                                    <div class="col-md-12 m-t-10 " id="">
                                        <div class="form-group">
                                            <label>N° Départ</label>
                                            <div class="option-group">
                                                <input required class="form-control  form-white" type="number"
                                                       id="num_depart"
                                                       name="num_depart"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10 " id="">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="option-group">
                                                <input required class="form-control  form-white" type="text"
                                                       id="depart_date"
                                                       name="date_depart"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10 " id="heure_depart">
                                        <div class="form-group">
                                            <label>Heure</label>
                                            <div class="option-group">
                                                <input required class="form-control  form-white" type="time"
                                                       id="heure_depart" name="heure_depart"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" data-dismiss="modal" class="btn btn-default">Annuler</button>
                                <button type="submit" class="btn btn-success">Valider</button>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-3"></div>
                </form>
            </div>

        </div>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <!-- modal message -->
    <div class="modal fade" id="msg_confirme" style="display: none;">
        <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Enregistrement effectué avec succès</p>
                </div>
                <div class="">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ok</font></font></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin modal msg -->
    <!-- modal message -->
    <div class="modal fade" id="msg_error" style="display: none;">
        <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Echec d'enregistrement</p>
                </div>
                <div class="">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ok</font></font></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin modal msg -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018<a href="<?php echo base_url(); ?>">KT</a>.</strong> All rights
        reserved.
    </footer>

</div>

<!-- ./wrapper -->

<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<?php $this->load->view('tpl/scripts'); ?>


</body>
</html>
