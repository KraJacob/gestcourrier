<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('tpl/css_files'); ?>
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
<!--        <div class="box box-primary col-md-4">-->
<!--            <!-- Content Header (Page header) -->
<!--            <section class="content-header">-->
<!--                <div style="float:right;margin-bottom:5px;">-->
<!--                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_user"-->
<!--                            style="display:none;">-->
<!--                        Nouveau-->
<!--                    </button
<!--            <section class="content">-->
<!--                <div class="portlet portlet light portlet-fit portlet-datatable bordered"-->
<!--                     style="background-color:#fff;">-->
<!--                    <div class="portlet-title">-->
<!--                        <div class="caption font-dark">-->
<!--                            <i class="fa fa-filter font-dark"></i>-->
<!--                            <span class="caption-subject bold uppercase">Recherche</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="portlet-body">-->
<!--                        <div class="table-responsive">-->
<!--                            <table class="table table-striped table-bordered table-hover table-checkable dataTable no-footer center_tab"-->
<!--                                   width="80%">-->
<!--                                <thead>-->
<!--                                 <tr class="">-->
<!--                                    <td>-->
<!--                                        <div class="row col-md-12">-->
<!---->
<!--                                            <div class="input-group date date-picker margin-bottom-5 col-md-6"-->
<!--                                                 data-date-format="dd/mm/yyyy">-->
<!--                                                <input type="text" class="form-control input-sm" data-column="3"-->
<!--                                                       readonly="" name="depense_from" placeholder="de">-->
<!--                                                <span class="input-group-btn">-->
<!--                                       <button class="btn btn-sm default" type="button">-->
<!--                                       <i class="fa fa-calendar"></i>-->
<!--                                       </button>-->
<!--                                       </span>-->
<!--                                            </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="input-group date date-picker col-md-6"-->
<!--                                             data-date-format="dd/mm/yyyy">-->
<!--                                            <input id="depense_to" type="text" class="form-control input-from input-sm"-->
<!--                                                   data-column="3" readonly="" name="depense_to" placeholder="à">-->
<!--                                            <span class="input-group-btn">-->
<!--                                       <button class="btn btn-sm default" type="button">-->
<!--                                       <i class="fa fa-calendar"></i>-->
<!--                                       </button>-->
<!--                                       </span>-->
<!--                                        </div>-->
<!--                        </div>-->
<!--                        </td>-->
<!--                        <td rowspan="1" colspan="1">-->
<!--                           <button class="btn btn-sm btn-default filter-cancel refresh">-->
<!--                                <i class="fa fa-times"></i> Rafraîchir.-->
<!--                            </button>-->
<!--                        </td>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
<!--        </div>-->
        <div class="row">
            <div id="content">
                <!-- Begin: Table articles -->
                <div class="portlet portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="actions" style="float:right;margin-top:15px;margin-right:2%;">
                            <a href="#" id="nouveau" style="" class="btn btn btn-primary" data-toggle="modal"
                               data-target="#modal_user">
                                <i class="fa fa-plus"></i>
                                <span class="hidden-xs"> Nouveau </span>
                            </a>
                            <a href="javascript:;" style="display:none;" id="list-delete-colis"
                               class="btn btn btn-danger" data-toggle="confirmation"
                               data-original-title="Etes vous sûre ?" title="">
                                <i class="fa fa-trash"></i>
                                <span class="hidden-xs"> Supprimer </span>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                                   id="table" width="100%">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th><center>Description</center></th>
                                    <th><center>Prix</center></th>
                                    <th><center>Passager</center></th>
                                    <th><center>Mobile</center></th>
                                    <th><center>Gare</center></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
<!-- Modal detail utilisateur   -->
<div class="modal fade" id="modal_bagage" style="display: none;">
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">×</font></font></span></button>
                <h4 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ENREGISTREMENT D'UN BAGAGE</font></font></h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/add_bagage' ?>" method="post" role="form">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12"></div>
                        <div class="box box-primary col-md-4">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                                <div class="box-footer" style="float:right;">
                                    <button type="submit" class="btn btn-success">Valider</button>
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php if ($this->session->flashdata('echec')): ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true"></button>
                                    <strong>Note: </strong> <?php echo "Cet enregistrement existe dejà"; ?>
                                </div>
                            <?php endif ?>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-warning alert-success">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true"></button>
                                    <strong>Note: </strong> <?php echo "Enregistrement effectué"; ?>
                                </div>
                            <?php endif ?>
                            <div class="box-body ">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="row" style="margin-bottom:2%;">
                                            <div class="col-md-6">
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-5 col-form-label">Date </label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <input id="date_ajout" required name="date" size="21"
                                                                       type="text" class="form_datetime forms" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-md-6">
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label  for="select2-single-input-sm"  class="col-md-5 col-form-label">Passager </label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <select name="passager_id" class="forms searchabl" style="" id="passager">
                                                                    <option selected>Choisissez</option>
                                                                    <?php if($passager): ?>
                                                                        <?php foreach($passager as $passagers): ?>
                                                                          <?php $i = 0; ?>

                                                                            <option value="<?php echo $passagers["id_passager"];?>" data-destination=""><?php echo $passagers["nom"]." ". $passagers["prenom"];?></option>
                                                                        <?php endforeach ?>
                                                                    <?php endif ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-5 col-form-label">Description du bagage</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <textarea name="description"  style="width: 246px; height: 60px; border-radius: 2%;" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                    <div class="form-group">
                                                        <label class="col-md-5 col-form-label">Prix</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <input id="ref" class="forms" name="prix" type="number"
                                                                       required>
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
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!--  Fin du modal Colis-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="<?php echo base_url() . "assets/"; ?>https://adminlte.io">Almsaeed
            Studio</a>.</strong> All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">
    $(document).ready(function (e) {

        let listBagage = $("#table").DataTable({
            "processing": true,
            "serverSide": true,
            "select": true,
            buttons: [{
                extend: "print",
                text: "imprimer",
                className: "btn btn-good mt-ladda-btn ladda-button btn-secondary",
                title: "Fiche des depenses",
                exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: "pdf",
                className: "btn btn-good mt-ladda-btn ladda-button btn-danger ",
                title: "Fiche des depenses",
                exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: "excel",
                className: "btn btn-snap mt-ladda-btn ladda-button btn-success ",
                title: "Fiche des depenses",
                exportOptions: {
                    columns: ':visible'
                }
            }],

            "rowCallback": function (row, data, dataIndex) {

                if (data.statut == "false") {

                    listPassager.row(dataIndex).remove().draw();
                }
            },
            "ajax": {
                "url": "<?php echo base_url() . "index.php/BagageController/listBagage" ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "orderable": false,
                    "className": 'select-checkbox',
                    "targets": 1
                },

                {
                    "targets": [0, 1],
                    "visible": false

                },
                {
                    "targets": [0, 2],
                    "searchable": true
                },
                {
                    "targets": "_all",
                    "createdCell": function (td, cellData, rowData, col) {
                        $(td).attr("align", "center");
                    }
                }
            ],
            "order": [0, 'desc'],

            "select": {
                "style": 'multi'
            },
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            "columns": [
                {"data": 0},
                {"data": 1},
                {"data": 2},
                {"data": 3},
                {"data": 4},
                {"data": 5},
                {"data": 6},

            ],
            "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
            "language": {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }


        }); // end of passager Datatables

        //

        // let numberRows = 0;
        // listdepense
        // 	.on( 'select', function ( e, dt, type, indexes ) {
        // 		$("#list-delete-colis").fadeIn(200);
        // 		numberRows = listdepense.rows({selected: true}).count();
        // 		if(numberRows === 1) {
        // 			$("#voir-article").fadeIn(200);
        // 		}else{
        // 			$("#voir-article").fadeOut(200);
        // 		}

        // 	} )
        // 	.on( 'deselect', function ( e, dt, type, indexes ) {
        // 		numberRows = listdepense.rows({selected: true}).count();
        // 		if(numberRows == 0) {
        // 		$("#list-delete-colis").fadeOut(200);
        // 		}
        // 		if(numberRows !== 1) {
        // 			$("#voir-article").fadeOut(200);
        // 		}else{
        // 			$("#voir-article").fadeIn(200);
        // 		}

        // 	} );

        // $('#list-delete-colis').confirmation({
        // 	btnOkLabel: '<i class="icon-ok-sign icon-white"></i> OUI',
        // 	btnCancelLabel: '<i class="icon-remove-sign"></i> NON',
        // 	onConfirm: function(){
        // 		let i = 0;
        // 		let selectedIds = [];
        // 		listdepense.rows({selected : true}).data().each(function(row){
        // 			selectedIds[i] = row["DT_RowId"].slice(4);
        // 			i++;
        // 		});


        // 		listdepense.rows({selected : true}).deselect();

        // 		$.ajax({
        // 			dataType: "json",
        // 			url: "delete_article_DT",
        // 			type: 'POST',
        // 			data: {
        // 				selected : selectedIds
        // 			}
        // 			})

        // 			.done(function(data){
        // 				if(data["error"] === ""){
        // 					listdepense.draw();


        // 				}else{
        // 					alert("Vous avez effectué un mouvement sur cet article, impossible de le supprimer.");
        // 				// console.log(data["error"]);
        // 				}
        // 			})
        // 			.fail(function( jqXHR, textStatus, errorThrown){

        // 				if(textStatus == "parsererror"){
        // 					bootbox.alert({
        // 					title: "Session Terminée",
        // 					message: "Votre session s'est interrompu. Veuillez-vous reconnecter.",
        // 					callback: function(){
        // 						window.location.href = "<?php //echo base_url() . "index.php/Login"; ?>"

        // 					}
        // 					})
        // 				}else{
        // 					$(".error-connexion").fadeIn(200);
        // 					$(".error-connexion").fadeOut(4000);
        // 					$('html, body').animate({ scrollTop: 0 }, 'fast');
        // 				}


        // 			}); //ajax deleting colis


        // 	}
        // }); //delete colis

        // $("#voir-article").on("click", function(e){
        // 	let id_art = listdepense.row({selected : true}).data().DT_RowId.slice(4);
        // 	window.location.href = '<?php //echo base_url() . "index.php/voir/"; ?>' + id_art;

        // })

        $("#date_ajout,.date-picker").datepicker({
            format: 'dd/mm/yyyy',
            setDate: new Date(),
            useCurrent: false,
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left",
            language: 'fr'
        }).on('hide', function (e) {

               /* let i = $("input[name='depense_from']").attr('data-column');
                let v1 = $("input[name='depense_from']").val();
                let v2 = $("input[name='depense_to']").val();
                .columns(i).search(v1 + "-" + v2).draw();*/
            });

    })

    $("#nouveau").on('click', function (e){

       $("#modal_bagage").modal('show')

    })


</script>
</body>
</html>
