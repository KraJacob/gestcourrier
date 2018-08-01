<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($type_colis);exit();
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('tpl/css_files');
    $etat = $detail_colis[0]['etat'];
    ?>
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
            <h1>
                DETAILS DU COLIS
                <small></small>
            </h1>
            <!-- <ol class="breadcrumb">
        <li><a href="<?php //echo base_url()."assets/";?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">passager</li>
      </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12"></div>
                <div class="box box-primary col-md-4">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-footer" style="float:right;">
                            <?php if ($etat == "reçu") : ?>
                                <button id="retrait" class="btn btn-success">Retrait</button>
                            <?php endif ?>
                            <a href="<?php echo $etat == "reçu" ? base_url() . 'index.php/colis_recu' : base_url() . 'index.php/colis_envoye'; ?>"
                               class="btn btn-default">Annuler</a>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row" style="margin-bottom:2%;">
                                    <div class="col-md-4">
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-5 col-form-label">Date d'envoi </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input id="date_ajout" name="date_ajout" size="21" type="text"
                                                               class="form_datetime"
                                                               value="<?= $detail_colis[0]['date_create']; ?>">
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
                                                        <input id="ref" name="ref" size="21" type="text"
                                                               value="<?= $detail_colis[0]['ref_colis']; ?>"
                                                               data-idcolis="<?= $detail_colis[0]['id_colis']; ?>">
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
                                                        <input id="ref" name="ref" size="21" type="text"
                                                               value="<?= $detail_colis[0]['lib_type_colis']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row" style="margin-top:5%;">
                                    <div class="col-md-4">
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-4 col-form-label">Contenu</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <textarea name="remarque" style="width:250px; height: 68px;"
                                                                  value=""><?= $detail_colis[0]['etat']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="col-md-12 frm">
                                                               <div class="form-group">
                                                                   <label class="col-md-6 col-form-label">Lieu de reception</label>
                                                                   <div class="col-md-6">
                                                                           <div class="input-group">

                                                                           </div>
                                                                   </div>
                                                               </div>
                                                       </div> -->
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Mot de passe</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" id="pass" name="pass" required
                                                               class="form-control"
                                                               value="<?= $detail_colis[0]['passe']; ?>">
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
                                                        <input type="text" id="valeur_colis" name="valeur" required
                                                               class="form-control"
                                                               value="<?= $detail_colis[0]['valeur']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                                            <div class="form-group">
                                                <label class="col-md-3 col-form-label">Montant</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" id="montant_colis" name="montant" required
                                                               class="form-control"
                                                               value="<?= $detail_colis[0]['montant']; ?>">
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
                                                            <input class="form-control" name="nom" type="text" required
                                                                   id="nom"
                                                                   value="<?= $detail_colis[0]['nom_expediteur']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-form-label">Prénom</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" id="type" name="prenom" required
                                                                   class="form-control"
                                                                   value="<?= $detail_colis[0]['prenom_expediteur']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-form-label">Mobile</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" id="mobile" name="mobile" required
                                                                   class="form-control"
                                                                   value="<?= $detail_colis[0]['mobile_expediteur']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <legend>Destinataire</legend>
                                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-form-label">Nom</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input class="form-control" name="nom_dest" type="text"
                                                                   required
                                                                   value="<?= $detail_colis[0]['nom_destinataire']; ?>"
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
                                                            <input type="text" id="prenom_dest" name="prenom_dest"
                                                                   required class="form-control"
                                                                   value="<?= $detail_colis[0]['prenom_destinataire']; ?> "
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
                                                            <input type="text" id="dest_mobile" name="mobile_dest"
                                                                   required class="form-control"
                                                                   value="<?= $detail_colis[0]['mobile_destinataire']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
    </div>
    </section>
    <!-- modal message -->

</div>
<div class="modal fade" id="message_confirme" style="display: none;">
    <div class="modal-dialog" style="width:auto;">
        <div class="modal-content">
            <div class="col-md-4 col-md-offset-5 ">
                <div class="panel panel-primary">
                    <form method="post" action="<?php echo base_url().'index.php/retraitcolis' ?>" id="form_retrait">
                        <div class="panel-body">
                            <div class="col-md-12 m-t-10 " id="">
                                <div class="form-group">
                                    <label>Nature pièce</label>
                                    <div class="option-group">
                                        <select name="nat_piece" class="forms" id="nat_piece">
                                            <option selected>Choisissez</option>
                                            <option value="CNI">CNI</option>
                                            <option value="ATTESTATION">ATTESTATION</option>
                                            <option value="PASSEPORT">PASSEPORT</option>
                                            <option value="PERMIS">PERMIS DE CONDUIRE</option>
                                            <option value="AUTRE">AUTRE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 m-t-10 " style="display: none;" id="nature_piece">
                                <div class="form-group">
                                    <label>Nature pièce</label>
                                    <div class="option-group">
                                        <input class="form-control  form-white" type="text" id=""
                                               name="nat_autre_piece"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 m-t-10 " id="">
                                <div class="form-group">
                                    <label>Nature pièce</label>
                                    <div class="option-group">
                                        <input style="" required class="form-control forms  form-white" type="text" id="num_piece"
                                               name="num_piece"/>
                                        <input type="hidden" name="id_colis" value="<?= $detail_colis[0]['id_colis']; ?>" >
                                        <input type="hidden" name="id_destinataire" value="<?= $detail_colis[0]['id_destinataire']; ?>" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><font
                                        style="vertical-align: inherit;"><font
                                            style="vertical-align: inherit;">Fermer</font></font></button>

                            <button id="valide" type="submit" style="margin-left: 2%;" class="btn btn-success fa fa-check btn-sm pull-right-container"><font
                                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enregistrer</font></font>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018<a href="<?php echo base_url(); ?>">KT</a>.</strong> All rights
    reserved.
</footer>


<!-- ./wrapper -->

<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">

    $("input,textarea").css("border", 0);
    $("input,textarea,.box-footer").css("background-color", 'transparent')
    $("#retrait").on("click", function () {
        $("#message_confirme").modal("show")
    })
    $("#valider_retrait").on("click", function () {
        let idColis = $("#ref").data("idcolis")
        let url = "<?php echo base_url() . 'index.php/retraitcolis'; ?>"
        $.ajax({
            dataType: 'json',
            url: url,
            type: 'GET',
            data: {"idcolis": idColis}
        }).done(function (data) {
            /// console.log(data)
            $("#message_confirme").modal("hide")
            window.location.href = '<?php echo base_url() . "index.php/colis_recu"; ?>';
        }).fail(function () {
            console.log("fail")
        })
    })

    $("#nat_piece").on("change", function () {
        let type = $(this).find(":selected").text();
        // console.log(type)
        if (type == "AUTRE") {
            $("#nature_piece").fadeIn();
        } else {
            $("#nature_piece").fadeOut();
        }
    })

</script>
</body>
</html>
