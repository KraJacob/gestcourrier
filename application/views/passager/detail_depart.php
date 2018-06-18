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
    <!-- Main content -->
    <section class="content"> 
	<div class="portlet portlet light portlet-fit portlet-datatable bordered" style="background-color:#fff;">
	
</div>
 
 <div class="row">
 <div id="content">
	                        	
	<!-- Begin: Table articles -->
	<div class="portlet portlet light portlet-fit portlet-datatable bordered">
		<div class="portlet-title">

			<div class="actions" style="float:right;margin-top:15px;margin-right:2%;">
			</div>
			</div>
		<div class="" width="90%">
			<div class="table-container" width="90%">
				<table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="tablePassager" width="100%">
					<thead>
						<tr>
						    <th></th>
							<th><center>Date depart</center></th>
							<th><center>Gare</center></th>
							<th><center>Véhicule</center></th>
							<th><center>N° depart</center></th>
							<th><center>Place disponible</center></th>
							<th><center>Valeur</center></th>
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
				    	"url": "<?php echo base_url() . "index.php/ControllerPassager/detail_depart" ?>",
				    	"type": "POST"
				    	  },
				    "columnDefs": [ 
					    {
					        "orderable": false,
					        "className": 'select-checkbox',
					        "targets":   1
					    },
						{
					       "targets":   0,
						   "visible": false
					    },
					    {
					    	"targets": "_all",
					    	"createdCell": function(td, cellData, rowData, col) {
							    	
					    		$(td).attr("align", "center");
					    	}
					    }
				    ],
					"order": [ 0, 'desc' ],
				 
				    "select": {
				        "style":    'multi'
				       
				    },
				 
				     "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
				    "columns": [
				    	{"data": 0},
						{"data": 1},
						{"data": 2},
						{"data": 3}, 	
						{"data": 4},
						{"data": 5},
						{"data": 6}			
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
			
	        })

		 }); 
</script>
</body>
</html>
