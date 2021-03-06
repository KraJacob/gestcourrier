<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo"lieu ". $lieu_reception." "; exit();
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('tpl/css_files'); ?>
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
        <?php $this->load->view('tpl/side_barre');
        $data = Array();
        $data["date"] = $date_expedition;
        $data["nom"] = $nom_expediteur;
        $data["prenom"] = $prenom_expediteur;
        $data["ref_colis"] = $ref_colis;
        $data["nom_dest"] = $nom_dest;
        $data["prenom_dest"] = $prenom_dest;
        $data["contenu"] = $description;
        $this->session->set_userdata("param", $data)
        ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                FICHE DU COLIS
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . "assets/"; ?>#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">passager</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="<?php echo base_url() . 'index.php/add_colis' ?>" method="post" role="form">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12"></div>
                    <div class="box box-primary col-md-4">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <div class="box-footer" style="float:right;">

                                <a href="<?php echo base_url() . "index.php/print_recu"; ?> " target="_blank"
                                   class="btn btn-warning fa fa-print"> REÇU</a>
                                <a class="btn btn-primary fa fa-edit hide"> Modifier</a>
                                <a href="<?php echo base_url() . "index.php/colis"; ?>"
                                   class="btn btn-default fa fa-mail-reply"> RETOUR</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php if ($this->session->flashdata('echec')): ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Note: </strong> <?php echo "Cet enregistrement existe dejà"; ?>
                            </div>
                        <?php endif ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-warning alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Note: </strong> <?php echo "Enregistrement effectué"; ?>
                            </div>
                        <?php endif ?>

                        <div class="box-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row" style="margin-bottom:2%;">
                                        <div class="col-md-4">
                                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                    <label class="col-md-5 col-form-label">Enregistré le </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <input id="date_ajout" name="date_ajout" size="21"
                                                                   type="text" value="<?= $date_expedition; ?>"
                                                                   class="form_datetime">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-form-label">Référence</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input id="ref" name="ref" size="21"
                                                                   value="<?= $ref_colis; ?>" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-form-label">Type</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="type_colis"
                                                                    class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0"
                                                                    id="type">
                                                                <option selected><?= $id_type_colis; ?></option>
                                                                <?php //if($destination): ?>
                                                                <?php // foreach($destination as $dest): ?>

                                                                <option value="<?php //echo $dest["id_destination"];?>"><?php //echo $dest["ville_arrive"];?></option>
                                                                <?php //endforeach ?>
                                                                <?php //endif ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <legend>Expéditeur</legend>

                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Nom</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input class="form-control" name="nom"
                                                                       value="<?= $nom_expediteur; ?>" type="text"
                                                                       required id="nom" onChange="majuscule(this);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Prénom</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" id="type"
                                                                       value="<?= $nom_expediteur; ?>" name="prenom"
                                                                       required class="form-control"
                                                                       onChange="majuscule(this);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Mobile</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" value="<?= $mobile_expediteur; ?>"
                                                                       id="mobile" name="mobile" required
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Nature pièce</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="nat_piece"
                                                                        class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0"
                                                                        id="nat_piece">
                                                                    <option selected><?= $nature_piece_expediteur; ?></option>
                                                                    <?php //if($destination): ?>
                                                                    <?php // foreach($destination as $dest): ?>

                                                                    <option value="<?php //echo $dest["id_destination"];?>"><?php //echo $dest["ville_arrive"];?></option>
                                                                    <?php //endforeach ?>
                                                                    <?php //endif ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">N° pièce</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" value="<?= $num_piece_expediteur; ?>"
                                                                       id="num_piece" name="num_piece" required
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                        </fieldset>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <legend>Destinateur</legend>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Nom</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input class="form-control" value="<?= $nom_dest; ?>"
                                                                       name="nom_dest" type="text" required
                                                                       id="nom_dest" onChange="majuscule(this);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Prénom</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" value="<?= $prenom_dest; ?>"
                                                                       id="prenom_dest" name="prenom_dest" required
                                                                       class="form-control" onChange="majuscule(this);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Mobile</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" value="<?= $mobile_dest; ?>"
                                                                       id="dest_mobile" name="mobile_dest" required
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:25%;">
                                    <div class="col-md-4">
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-3 col-form-label">Description</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <textarea name="remarque" style="width:268px; height: 68px;"
                                                                  value="<?= $description; ?>"
                                                                  required><?= $description; ?> </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12 frm">
                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Lieu de reception</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <select name="lieu_reception"
                                                                class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0"
                                                                id="lieu_reception">
                                                            <option selected><?= $lieu_reception; ?></option>
                                                            <?php //if($destination): ?>
                                                            <?php // foreach($destination as $dest): ?>

                                                            <option value="<?php //echo $dest["id_destination"];?>"><?php //echo $dest["ville_arrive"];?></option>
                                                            <?php //endforeach ?>
                                                            <?php //endif ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Mot de passe</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" value="<?= $passe; ?>" id="pass" name="pass"
                                                               required class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-3 col-form-label">Valeur</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" id="valeur" value="<?= $valeur; ?>"
                                                               name="valeur" required class="form-control"
                                                               onChange="majuscule(this);">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-3 col-form-label">Montant</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" value="<?= $montant; ?>" id="montant"
                                                               name="montant" required class="form-control"
                                                               onChange="majuscule(this);">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
    </div>
    <!-- /.row (main row) -->
    </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
<script type="text/javascript">
    $(document).ready(function (e) {
        $("input,select,textarea").css("border", "0px");

    })


</script>
</body>
</html>
