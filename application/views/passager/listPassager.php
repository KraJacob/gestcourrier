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
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<div style="float:right;margin-bottom:5px;">
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_user" style="display:none;">
               Nouveau
      </button>
		</div>
		
    </section>
    <!-- Main content -->
    <section class="content"> 
	<div class="portlet portlet light portlet-fit portlet-datatable bordered" style="background-color:#fff;">
	                        	
	<div class="portlet-title">
		<div class="caption font-dark">
			<i class="fa fa-filter font-dark"></i>
			<span class="caption-subject bold uppercase">Recherche</span>	
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-checkable dataTable no-footer center_tab">
				<thead>
					<tr role="row" class="heading">
						<th>Nom</th>
						<th>Prénom</th>
						<th>Date d'enregistrement</th>
						<th>Type</th>
						<th>Destination</th>
						<th>N° depart</th>
						<th>Actions</th>
					</tr>
					<tr role="row" class="heading filter">
						<td rowspan="1" colspan="1">
							<input type="text" data-column="1" class="form-control form-filter input-sm search-input-text" name="nom"> 
						</td>
						<td rowspan="1" colspan="1">
							<input type="text" data-column="2" class="form-control form-filter input-sm search-input-text" name="prenom"> 
						</td>
						
						<td rowspan="1" colspan="1">
							<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
								<input type="text" class="form-control form-filter input-sm" data-column="5" readonly="" name="passager_created_from" placeholder="de">
								<span class="input-group-btn">
									<button class="btn btn-sm default" type="button">
										<i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
							<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
								<input type="text" class="form-control form-filter input-sm" data-column="5" readonly="" name="passager_created_to" placeholder="à">
								<span class="input-group-btn">
									<button class="btn btn-sm default" type="button">
										<i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
							
						</td>
						<td>
							<select name="type" data-column="4" class="form-control select-type form-filter input-sm">
								<option value="Selectionner">Sélectionner</option>
								<option value="normal">Normal</option>
								<option value="autres">Autres</option>						
						</td>

							<td>
							<select name="destination" data-column="7" id="statut-filter" class="form-control select-filter form-filter input-sm">
								<option value="Selectionner">Sélectionner</option>
								<option value="ABIDJAN">ABIDJAN</option>
								<option value="YAMOUSSOUKRO">YAMOUSSOUKRO</option>
								<option value="ODIENNE">ODIENNE</option>
							</select>
							
						</td>
						<td rowspan="1" colspan="1">
							<input type="text" data-column="8" class="form-control form-filter input-sm search-input-text" name="num_depart"> 
						</td>
						<td rowspan="1" colspan="1">
							<!-- <div class="margin-bottom-5">
								<button class="btn btn-sm btn-success filter-submit margin-bottom">
									<i class="fa fa-search"></i> Recherche.</button>
							</div> -->
							<button class="btn btn-sm btn-default filter-cancel refresh">
								<i class="fa fa-times"></i> Rafraîchir.</button>
						</td>
						
					</tr>
				</thead>
			</table>
		</div>
		
	</div>
</div>
 
 <div class="row">
 <div id="content">
	                        	
	<!-- Begin: Table articles -->
	<div class="portlet portlet light portlet-fit portlet-datatable bordered">
		<div class="portlet-title">

			<div class="actions" style="float:right;margin-top:15px;margin-right:2%;">
			    <a href="#" id="nouveau_passager" style="display:none;" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_user">
					<i class="fa fa-plus"></i>
					<span class="hidden-xs"> Nouveau </span>
				</a>
				<a href="#" id="voir-article" style="display: none;" class="btn btn btn-default">
					<i class="fa fa-eye"></i>
					<span class="hidden-xs"> Voir </span>
				</a>
				
				<a href="javascript:;" style="display:none;" id="list-delete-article" class="btn btn btn-danger" data-toggle="confirmation" data-original-title="Etes vous sûre ?" title="">
					<i class="fa fa-trash"></i>
					<span class="hidden-xs"> Supprimer </span>
				</a>
			</div>
			</div>
		<div class="" width="90%">
			<div class="table-container" width="90%">
				<table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="tablePassager" width="100%">
					<thead>
						<tr>
							<th >&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Mobile</th>
							<th>Type</th>
							<th>Date d'enregistrement</th>
							<th>N° siège</th>
							<th>Destination</th>
							<th>N° depart</th>
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
  <!-- /.content-wrapper -->

	
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="<?php echo base_url()."assets/";?>https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">
		$(document).ready(function(){
		
		let listPassager =  $("#tablePassager").DataTable({
					"processing": true,
					"serverSide": true,
				    "select": true,
					 buttons: [{
				            extend: "print",
				            text: "imprimer",
				            className: "btn  btn-change mt-ladda-btn ladda-button btn-secondary ",
				            title: "Liste des passager",
				            exportOptions: {
			                    columns: ':visible'
			                }
				        }, {
				            extend: "pdf",
				            className: "btn btn-good mt-ladda-btn ladda-button btn-danger ",
				            title: "Liste des passager",
				            exportOptions: {
			                    columns: ':visible'
			                }
				        }, {
				            extend: "excel",
				            className: "btn btn-snap mt-ladda-btn ladda-button btn-success ",
				            title: "Liste des passager",
				            exportOptions: {
			                    columns: ':visible'
			                }
				        }],

				    "rowCallback": function(row, data, dataIndex) {
				        
				        if(data.statut == "false") { 
				        
				            listPassager.row(dataIndex).remove().draw();
				        }
				    },
				    "ajax": {
				    	"url": "<?php echo base_url() . "index.php/ControllerPassager/list_type_passager" ?>",
				    	"type": "POST"
				    	  },
				    "columnDefs": [ 
					    {
					        "orderable": false,
					        "className": 'select-checkbox',
					        "targets":   0
					    },
					  /*
					    {
					    	"targets": [7, 8, 9],
			                "visible": false
			                
						},*/
					   /* {
					    	"targets": [4],
			                "searchable": false
			                
					    },*/
					    {
					    	"targets": "_all",
					    	"createdCell": function(td, cellData, rowData, col) {
							    	
					    		$(td).attr("align", "center");
					    	}
					    }
				    ],
					"order": [ 7, 'desc' ],
				 
				    "select": {
				        "style":    'multi'
				       
				    },
				 
				   /* "drawCallback": function( settings ) {
				        $("#list-delete-article").fadeOut(200);
				        $("#voir-article").fadeOut(200);
				    }, */
				    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
				    "columns": [
				    	{"data": "checkbox"},
						{"data": "nom"},
						{"data": "prenom"},
						//{"data": "qte_min"},
						{"data": "mobile"}, 	
						//{"data": "date_ajout_art_norm"},
						{"data": "type_passager"},
						{"data": "date_create"},
						//{"data": "date_ajout_art"},
						//{"data": "id_depart"},
						//{"data": "id_destination"},
						{"data": "num_siege"},
						{"data": "ville_arrive"},
						{"data": "num_depart"}
							
					],
					"lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
				    "language": {
				        "sProcessing":     "Traitement en cours...",
						"sSearch":         "Rechercher&nbsp;:",
					    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
						"sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
						"sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
						"sInfoFiltered":   "",
						"sInfoPostFix":    "",
						"sLoadingRecords": "Chargement en cours...",
					    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
						"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
						"oPaginate": {
							"sFirst":      "Premier",
							"sPrevious":   "Pr&eacute;c&eacute;dent",
							"sNext":       "Suivant",
							"sLast":       "Dernier"
						},
						"oAria": {
							"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
							"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
						}
				    }


				    
				}); // end of passager Datatables 

				let test = false;

		function checkForEmptyVal(v1, v2) {
			search = v1 + '-' + v2;
			if((v1 === "" || v2 === "") && search != "-" ) {
				return true; 
			}else{
				return false;
			}
		}

		$('.search-input-text').on( 'keyup click', function () {   // for text boxes
				var i =$(this).attr('data-column');  // getting column index
				var v =$(this).val();  // getting search input value
				listPassager.columns(i).search(v).draw();
		} );
		$('.form-filter').on( 'change', function () {   // for select box
			var i =$(this).attr('data-column');
			var v =$(this).val();
			listPassager.columns(i).search(v).draw();
		} );

		$(".refresh").on("click", function(e){
			
		$(".filter").find("input").val("");
		$('.select-filter option').filter(function() { 
			return ($(this).text() == 'Selectionner'); //To select Blue
		}).prop('selected', true)
		listPassager.columns().search("");
		listPassager.draw();


		})

		$(".date-picker").datepicker({
			format: 'dd/mm/yyyy',
			setDate: new Date(),
			useCurrent: false,
			autoclose: true,
			todayBtn: true,
			pickerPosition: "bottom-left",
			language: 'fr'
			})
			.on('hide', function(e) {
				
			let	i  = $("input[name='passager_created_from']").attr('data-column');
			let v1 = $("input[name='passager_created_from']").val();
			let v2 = $("input[name='passager_created_to']").val();
			listPassager.columns(i).search(v1 + "-" + v2).draw();
	        })

		 }); 
</script>
</body>
</html>
