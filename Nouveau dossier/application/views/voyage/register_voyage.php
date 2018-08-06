<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    <?php
    $nom = "";
    $prenom = "";
    $mobile = "";
    $detination = "";
    $num_siege = 0;
    $id_destination = 0;
    $type_passager = "";
    $tarif = 0;
    if (isset($passager)) {
        $nom = $passager['nom'];
        $prenom = $passager['prenom'];
        $mobile = $passager['mobile'];
        $detination = $reservation_destination;
        $num_siege = $passager['num_siege'];
        $id_destination = $passager['id_destination'];
        $type_passager = $passager['type_passager'];
        $tarif = $passager['tarif'];
    }
    ?>
    <header class="main-header">
        <?php $this->load->view('tpl/header');

        $ville = $this->session->userdata("ville");
        $parcours;
        if ($ville == "ABIDJAN") {
            $parcours = "ABIDJAN - ODIENNE";
        } else {
            $parcours = "ODIENNE - ABIDJAN";
        }
        ?>
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
                ENREGISTREMENT D'UN PASSAGER
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . "index.php/dashboard"; ?>"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">passager</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="box box-primary col-md-4">
                    <form onSubmit="return valid_form()"
                          action="<?php echo base_url() . 'index.php/Voyage/add_voyage' ?>" method="post" role="form">

                        <div class="box-header with-border">
                            <div class="col-md-4"></div>
                            <div class="box-title col-md-4">
                                <b id="parcours"
                                   style='text-align:center;color:red;font-size:20px;'><?php echo $parcours; ?></b>
                                <input type="hidden" name="parcours" value="<?php echo $parcours; ?>">
                            </div>
                            <div class="" style="float:right;">
                                <button type="submit" class="btn btn-success">Valider</button>
                                <button type="reset" class="btn btn-default">Annuler</button>
                            </div>
                            <!-- <a href="<?php //echo base_url()."index.php/ticket";  ?>" class="btn btn-warning fa fa-print">Ticket</a> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php if ($this->session->flashdata('echec')): ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Note: </strong> <?php echo "Cet enregistrement existe dejà"; ?>
                            </div>
                        <?php endif ?>
                        <!-- <?php //if($this->session->flashdata('success') ): ?>
		        <div class="alert alert-warning alert-success">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Note: </strong> <?php //echo "Enregistrement effectué"; ?>
               </div>
                <?php //endif ?> -->

                        <div class="box-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <legend>PASSAGER</legend>
                                        <?php if (isset($passager)) {
                                            // print_r($passager); echo"   ".print_r($destination); exit();
                                        } ?>
                                        <div class="row" style="margin-bottom:2%;">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-2">
                                                <label> Type du passager </label>
                                            </div>
                                            <div class="col-md-2">
                                                <input name="type_passager" id="normal"
                                                       value="normal" <?php if (isset($type_passager)) {
                                                    echo $type_passager == "normal" ? "checked" : "";
                                                }
                                                if (!$type_passager) {
                                                    echo "checked";
                                                } ?>
                                                       type="radio">Normal
                                            </div>
                                            <div class="col-md-2">
                                                <input name="type_passager" id="privilegie"
                                                       value="privilegie" <?php if (isset($type_passager)) {
                                                    echo $type_passager == "privilege" ? "checked" : "";
                                                } ?> type="radio"> Privilegié
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:;" id="fin_chargement"
                                                   class="btn btn-primary fa fa-check" style="float:right;">Fin du
                                                    chargement</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Nom</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input class="forms" name="nom"
                                                                       type="text" <?php echo $nom ? "readonly" : ""; ?>
                                                                       required value="<?= $nom; ?>"
                                                                       id="example-text-input"
                                                                       onChange="majuscule(this);">
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
                                                                       name="prenom" <?php echo $prenom ? "readonly" : ""; ?>
                                                                       required class="forms" value="<?= $prenom; ?>"
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
                                                                <input type="text" id="type"
                                                                       name="mobile" <?php echo $mobile ? "readonly" : ""; ?>
                                                                       required class="forms" value="<?= $mobile; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">N° Depart</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group col-md-10">
                                                                <select name="depart" class="forms" style="" id="depart">
                                                                    <option value="add_depart">Ajouter départ</option>
                                                                    <?php if ($departs): ?>
                                                                        <?php foreach ($departs as $depart): ?>
                                                                            <option value="<?php echo $depart["id_depart"]; ?>">
                                                                            <?php echo $depart["num_depart"]; ?></option>
                                                                        <?php endforeach ?>
                                                                    <?php endif ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label"> Destination</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group col-md-10">
                                                                <input type="hidden" id="ville_depart"
                                                                       name="ville_depart" class=""
                                                                       value='<?php echo $this->session->userdata("ville"); ?>'>
                                                                <select name="ville_arrive" class="forms select2" style=""
                                                                        id="destination">
                                                                    <?php if (isset($reservation_destination)): ?>
                                                                        <option value="<?= $id_destination; ?>"><?= $reservation_destination; ?></option>
                                                                    <?php else: ?>
                                                                        <option selected>Choisissez</option>
                                                                        <?php if ($destination): ?>
                                                                            <?php foreach ($destination as $dest): ?>

                                                                                <option value="<?php echo $dest["id_destination"]; ?>"
                                                                                        data-destination="<?php echo $dest["ville_arrive"]; ?>"><?php echo $dest["ville_arrive"]; ?></option>
                                                                            <?php endforeach ?>
                                                                        <?php endif ?>
                                                                    <?php endif ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">N°de siège</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" id="siege"
                                                                       value="<?= $num_siege; ?>" <?php echo $num_siege ? "readonly" : ""; ?>
                                                                       required name="num_siege" class="forms">
                                                            </div>
                                                            <div id="tooltip"
                                                                 style="display:none;position: absolute;cursor: pointer;left: 100px;top: 25px;border: solid 1px #eee; background-color:#ffffdd; padding: 10px; z-index: 1000;border-radus:5;">
                                                                siège déjà occupé, veuillez choisir un autre.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-form-label">Tarif</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" id="tarif" required
                                                                       name="tarif" <?php echo $tarif ? "readonly" : ""; ?>
                                                                       value="<?= $tarif; ?>" class="forms" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="row">
                <div id="info_depart" style="display: none;">
                    <form onSubmit="return valid_form()"
                          action="<?php echo base_url() . 'index.php/Voyage/add_depart' ?>" method="post" role="form">
                        <fieldset>
                            <legend>
                                Informations sur le véhicule
                                <div class="" style="float:right;margin-right:5%;">
                                    <button type="submit" class="btn btn-success" id="valid_depart" style="">Valider
                                    </button>
                                </div>
                            </legend>

                            <div class="row" style="margin-bottom:2%;">
                                <div class="col-md-2"></div>
                                <!--                           <div class="col-md-4">-->
                                <!--                             <div class="form-group">-->
                                <!--                                <label class="col-md-4 col-form-label">Départ N° </label>-->
                                <!--                                    <div class="col-md-5">-->
                                <!--                                        <div class="input-group">-->
                                <!--                                            <input class="forms" style="border:0" name="num_depart" size="20" value="-->
                                <?php //if(isset($num_depart)){ echo $num_depart;}else{echo 1;}?><!--" type="text" id="num_depart" readonly>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                             </div>-->
                                <!--                             <div class="col-md-4">-->
                                <!--                                <div class="form-group">-->
                                <!--                                <label class="col-md-6 col-form-label">Place disponible </label>-->
                                <!--                                    <div class="col-md-5">-->
                                <!--                                        <div class="input-group">-->
                                <!--                                            <input class="forms" style="border:0" name="place_disponible" size="20" type="text" value="" id="place_dispo" readonly>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div> -->
                                <!--                            </div>-->
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row" style="margin-bottom:3%;">
                                <div class="col-md-6">
                                    <!--                            <div class="col-md-12 frm" style="margin-bottom:1%;">-->
                                    <!--                              <div class="form-group">-->
                                    <!--                                <label class="col-md-3 col-form-label">Date</label>-->
                                    <!--                                <div class="col-md-9">-->
                                    <!--                                    <div class="input-group">-->
                                    <!--                                        <input id="date_depart" name="date_depart" size="21" type="text" value="-->
                                    <?php //echo  date("d/m/Y")?><!--" readonly class="forms">-->
                                    <!--                                    </div>-->
                                    <!--                                </div>-->
                                    <!--                              </div>-->
                                    <!--                          </div>-->
                                   <!-- <div class="col-md-12 frm" style="margin-bottom:1%;">
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label">Heure</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input id="heure_depart" class="forms" required name="heure_depart"
                                                           size="21" type="time"
                                                           value="<?php /*if (isset($chauffeur_depart) && $chauffeur_depart) {
                                                               echo $chauffeur_depart[0]["heure_depart"];
                                                           } */?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="col-md-12 frm" style="margin-bottom:1%;">
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label">Véhicule</label>
                                            <div class="col-md-9">
                                                <div class="input-group col-md-10">
                                                    <select name="immatriculation" class="forms" style="" id="imat" required>
                                                        <?php if (isset($chauffeur_depart) && $chauffeur_depart): ?>
                                                            <option value="<?php echo $chauffeur_depart[0]["immatriculation"]; ?>"><?php echo $chauffeur_depart[0]["immatriculation"]; ?></option>
                                                        <?php else: ?>
                                                            <option selected value="">Choisissez</option>
                                                            <?php if ($vehicule): ?>
                                                                <?php foreach ($vehicule as $veh): ?>

                                                                    <option value="<?php echo $veh["immatriculation"]; ?>"
                                                                            data-nbrePlace="<?php $veh["nbr_place"]; ?>"><?php echo $veh["immatriculation"]; ?></option>
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 frm" style="margin-bottom:1%;">
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label"> Chauffeur</label>
                                            <div class="col-md-9">
                                                <div class="input-group col-md-10">
                                                    <select name="chauffeur" class="forms" style=""
                                                            id="select_vehicule" required>

                                                        <?php if (isset($chauffeur_depart) && $chauffeur_depart): ?>
                                                            <option value="<?php echo $chauffeur_depart[0]["id_personnel"]; ?>"><?php echo $chauffeur_depart[0]["nom"] . " " . $chauffeur_depart[0]["prenom"]; ?></option>
                                                        <?php else: ?>
                                                            <option selected value="">Choisissez</option>
                                                            <?php if ($vehicule): ?>
                                                                <?php foreach ($chauffeur as $chauf): ?>
                                                                    <option value="<?php echo $chauf["id_personnel"]; ?>"><?php echo $chauf["nom"] . " " . $chauf["prenom"]; ?></option>
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-md-12 frm" style="margin-bottom:1%;">
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label">Convoyeur</label>
                                            <div class="col-md-9">
                                                <div class="input-group col-md-10">
                                                    <select name="convoyeur" class="forms" style="form"
                                                            id="inlineFormCustomSelect">
                                                        <?php /*if (isset($convoyeur_depart) && $convoyeur_depart): */?>
                                                            <option value="<?php /*echo $convoyeur_depart[0]["id_personnel"]; */?>"><?php /*echo $convoyeur_depart[0]["nom"] . " " . $convoyeur_depart[0]["prenom"]; */?></option>
                                                        <?php /*else: */?>
                                                            <option selected>Choisissez</option>
                                                            <?php /*if ($convoyeur): */?>
                                                                <?php /*foreach ($convoyeur as $conv): */?>
                                                                    <option value="<?php /*echo $conv["id_personnel"]; */?>"><?php /*echo $conv["nom"] . " " . $conv["prenom"]; */?></option>
                                                                <?php /*endforeach */?>
                                                            <?php /*endif */?>
                                                        <?php /*endif */?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <!-- modal message -->
    <div class="modal fade" id="message_confirme" style="display: none;">
        <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Voulez-vous terminer ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font
                                style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Non</font></font></button>
                    <button id="valider-depart" type="button" class="btn btn-success fa fa-check"><font
                                style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Oui</font></font></button>
                </div>
            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin modal msg -->
    <!-- modal depart -->
    <div class="modal fade depart" id="modal_depart" style="display: none;">
        <div class="modal-dialog" style="width:auto;">
            <div class="modal-content">
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
                                                        <input required class="form-control  form-white" type="number" id="num_depart"
                                                               name="num_depart"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-t-10 " id="">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <div class="option-group">
                                                        <input required class="form-control  form-white" type="text" id="depart_date"
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
                                    <div class="panel-footer" >
                                        <button type="reset" data-dismiss="modal" class="btn btn-default">Annuler</button>
                                        <button type="submit"class="btn btn-success">Valider</button>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-3"></div>
                        </form>

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
<script type="text/javascript">
    let erreur = true;
    $(document).ready(function (e) {

        var imat = $("#imat").val()
        $("#depart").prop('selectedIndex',-1)
        // console.log(imat)

        //if( imat=="Choisissze"){
        //         $("#place_dispo").val("0")
        //      }else{
        //
        //     var url = '<?php //echo base_url("index.php/Voyage/place_disponible/"); ?>//'
        // $.ajax({
        // 	method: "GET",
        // 	url:url,
        // 	dataType: "json",
        // 	data: {imat : imat},
        // 	success: function(data){
        //
        // 	}
        //
        // }).done(function(data){
        //     $("#place_dispo").val(data)
        //    // console.log(data)
        // })
        //      }
        //$("#imat").on("change", function(e){
        //  var imat = $(this).val()
        // // console.log(imat)
        //
        //    if( imat=="Choisissze"){
        //             $("#place_dispo").val("0")
        //          }else{
        //
        //             var url = '<?php //echo base_url("index.php/Voyage/place_disponible/"); ?>//'
        //	 $.ajax({
        //	 	method: "GET",
        //	 	url:url,
        //	 	dataType: "json",
        //	 	data: {imat : imat},
        //	 	success: function(data){
        //
        //	 	}
        //
        //	 }).done(function(data){
        //         $("#place_dispo").val(data)
        //         console.log(data)
        //     })
        //          }
        //     })

        $("#destination").on("change", function (e) {
            // alert('oki')
            var id = $(this).val()
            //console.log(id)
            var destination = $(`option[value=${id}]`).data("destination");
            // console.log("destination"+destination)
            var ville_depart = $("input[name=ville_depart]").val();
            var type_passager = $("input[name=type_passager]:checked").val();
            var url = '<?php echo base_url("index.php/Voyage/get_tarif/"); ?>'
            $.ajax({
                method: "GET",
                url: url,
                dataType: "json",
                data: {destination: destination},
                success: function (data) {

                }
            }).done(function (data) {
                if ((type_passager == "privilegie") && (ville_depart == "ODIENNE" || ville_depart == "ABIDJAN") && (destination == "ODIENNE" || destination == "ABIDJAN")) {
                    let tarif = parseInt(data) - 1000;
                    $("#tarif").val(tarif)
                } else {
                    $("#tarif").val(data.toLocaleString())
                }

            })

        })

        $("input[name=type_passager]").on("change", function (e) {
            let id_destination = $("#destination").val();
            let destination = $(`option[value=${id_destination}]`).data("destination");
            let ville_depart = $("input[name=ville_depart]").val();
            let tarif = $("input[name=tarif]").val().split(" ");
            let type_passager = $("input[name=type_passager]:checked").val();
            console.log(ville_depart);
            if (type_passager == "normal") {
                //console.log(destination)
                if ((tarif) && (ville_depart == "ODIENNE" || ville_depart == "ABIDJAN") && (destination == "ODIENNE" || destination == "ABIDJAN")) {
                    // res = tarif.split(" ")
                    //  console.log(tarif)
                    tarif = parseInt(tarif) + 1000
                    $("#tarif").val(tarif)
                }
            }
            else {
                //   console.log(type_passager)
                if ((tarif) && (ville_depart == "ODIENNE" || ville_depart == "ABIDJAN") && (destination == "ODIENNE" || destination == "ABIDJAN")) {
                    tarif = tarif - 1000
                    $("#tarif").val(tarif)
                }
            }

        });


    })

    $("#siege").on("keyup", function (e) {
        var num_siege = $(this).val()
        var id_depart = $("#depart").val();
       // var date_depart = $("input[name=date_depart]").val();
          console.log(id_depart)
        var url = '<?php echo base_url("index.php/Voyage/check_num_siege/"); ?>'
        $.ajax({
            method: "GET",
            url: url,
            dataType: "json",
            data: {
                num_siege: num_siege,
                id_depart: id_depart
            },
            success: function (data) {

            }

        }).done(function (data) {
            if (data) {
                erreur = false;
                console.log(data)
                //evt.preventDefault();
                $("#siege").css("border", "1px solid red");
                // $("#siege").val("");
                $("#siege").focus();
                //$('#siege').attr('data-tooltip', 'w00t');
                $("#tooltip").show();
            } else {
                erreur = true;
                console.log(data)
                $("#tooltip").hide();
                $("#siege").css("border", "1px solid");
            }

        })

        $("#tooltip").click(function () {
            $(this).hide();
            $("#siege").val("");
            $("#siege").css("border", "1px solid");
        });

        url = '<?php //echo base_url("index.php/Voyage/check_num_siege_reservation/"); ?>'
        $.ajax({
            method: "GET",
            url: url,
            dataType: "json",
            data: {
                num_siege: num_siege,
                id_depart: id_depart
            },
            success: function (data) {

            }

        }).done(function (data) {
            if (data) {
                erreur = false;
                //evt.preventDefault();
                $("#siege").css("border", "1px solid red");
                // $("#siege").val("");
                $("#siege").focus();

                //$('#siege').attr('data-tooltip', 'w00t');
                $("#tooltip").show();
            } else {
                erreur = true;
                $("#tooltip").hide();
                $("#siege").css("border", "1px solid");
            }
        })
    })
    $("#fin_chargement").on("click", function () {
        $("#info_depart").fadeIn();
        // console.log("ok")
    })

    $("#valider-depart").on("click", function () {
        let value = $("#num_depart").val();
        let date = $("#date_depart").val();
        let parcours = $("#parcours").val();
        let vehicule = $("#imat").val();
        let chauffeur = $("#select_vehicule").val();
        if(vehicule === null || chauffeur === null){
            alert("Veuillez choisir le véhicule et le chauffeur")
            return false;
        }
        //console.log("parcours: "+parcours+" date"+date)
        //if(confirme("Voulez-vous ?")){
        $.ajax({
            dataType: "json",
            url: "Voyage/valider_depart",
            type: 'POST',
            data: {
                num_depart: value,
                date: date,
                parcours: parcours
            }
        })
            .done(function (data) {
                if (data["error"] === "") {
                    $("#message_confirme").modal('hide');
                } else {
                    console.log(data["error"]);
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {

                console.log("erreur de la requête ajax")


            });


    })

    $("#depart_date").datepicker({
        format: "dd/mm/yyyy",
        language: "fr",
        autoclose: true
    });

    function valid_form() {
        if (!erreur) {
            alert("Ce siège est déjà occupé, veuillez choisir un autre")
            return erreur
        } else {
            return erreur;
        }

    }

    $("#depart").on('change',function () {
        let val = $(this).val()
        if (val=="add_depart"){
            $(".depart").modal('show')
        }

    })

</script>
</body>
</html>
