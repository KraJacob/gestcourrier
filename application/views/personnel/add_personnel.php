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
            <h1>
                ENREGISTREMENT D'UN PERSONNEL
                <small>personnel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . "index.php/dashboard2"; ?>"><i class="fa fa-dashboard"></i>
                        Home</a></li>
                <li class="active">personnel</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12"></div>
                <div class="box box-primary col-md-4">
                    <div class="box-header with-border" style="float:right;">
                        <h3 class="box-title"></h3>
                        <a href="Javascript:;" id="btn_update" style="display: none;" class="btn btn btn-primary">
                            <i class="fa fa-update"></i>
                            <span class="hidden-xs"> Modifier </span>
                        </a>
                        <a href="javascript:;" style="display:none;" id="btn_delete" class="btn btn btn-danger"
                           data-toggle="confirmation" data-original-title="Etes vous sûre ?" title="">
                            <i class="fa fa-trash"></i>
                            <span class="hidden-xs"> Supprimer </span>
                        </a>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_user">
                            Nouveau
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php if ($this->session->flashdata('msg_erreur')): ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>Note: </strong> <?php echo "Cet utilisateur existe déjà"; ?>
                        </div>
                    <?php endif ?>
                    <div class="table-container">

                        <table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer center_tab"
                               id="personnel" width="100%">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>&nbsp;&nbsp;</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Mobile</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Modal detail utilisateur   -->
    <div class="modal fade" id="modal_user" style="display: none;">
        <div class="modal-dialog" style="width:700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><font style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;">×</font></font></span></button>
                    <h4 class="modal-title"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Enregistrement d'un personnel</font></font></h4>
                </div>
                <div class="modal-body">

                    <form id="form_personnel" role="form">
                        <div class="box-body ">

                            <div class="col-md-12 frm">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Type personnel</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <select id="type_personnel" name="id_type_personnel" class=" forms">
                                                <?php foreach ($type_personnel as $per) : ?>
                                                    <option value="<?php echo $per['id_type_personnel']; ?>">  <?php echo $per['lib_personnel']; ?> </option>
                                                <?php endforeach ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 frm">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="nom" name="nom" class="forms" value=''>
                                            <input type="hidden" id="id_personnel" name="update_personnel"
                                                   class="form-control" value=''>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 frm">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prénom</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="prenom" name="prenom" class="forms" value=''>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 frm">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Mobile</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="number" id="mobile" name="mobile" class="forms"
                                                   value=''>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="javascript:;" id="btn_submit" class="btn btn-success">Valider</a>
                            <button type="reset" data-dismiss="modal" class="btn btn-default">Annuler</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!--  Fin du modal -->
    <!-- modal message suppression-->
    <div class="modal fade" id="msg_delete" style="display: none;">
        <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Voulez-vous supprimer ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font
                                style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Non</font></font></button>
                    <button id="valider_delete" type="button" class="btn btn-success fa fa-check"><font
                                style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Oui</font></font></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal message suppression -->
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
        let ajaxLink = "<?php echo base_url() . "index.php/ControllerPersonnel/listPersonnel" ?>";
        let userlist = $("#personnel").DataTable({
            buttons: [
                {
                    extend: "print",
                    text: "imprimer",
                    className: "btn btn-change mt-ladda-btn ladda-button btn-secondary",
                    title: "Liste des utilisateurs",
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: "pdf",
                    className: "btn btn-good mt-ladda-btn ladda-button btn-danger ",
                    title: "Liste des utilisateurs",
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: "excel",
                    className: "btn btn-snap mt-ladda-btn ladda-button btn-success ",
                    title: "Liste des utilisateurs",
                    exportOptions: {
                        columns: ':visible'
                    }
                }],
            "select": true,

            "select": {
                "style": 'multi'
            },
            "columnDefs": [
                {
                    "orderable": false,
                    "className": 'select-checkbox',
                    "targets": 1
                },
                {
                    "targets": [0],
                    "visible": false

                }
            ],
            "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
            "order": [0, 'desc'],
            "columns": [
                {data: 0},
                {data: 1},
                {data: 2},
                {data: 3},
                {data: 4}
            ],

            //   "language": {
            //     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            // },
            "language": {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "",
                "sInfoEmpty": "",
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
            },
            "ajax": {
                url: ajaxLink,
                "type": "POST"
            },

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"

        });

        userlist.on('select', function (e, dt, type, indexes) {
            $("#btn_delete").fadeIn(200);
            numberRows = userlist.rows({selected: true}).count();
            if (numberRows === 1) {
                $("#btn_update").fadeIn(200);
            } else {
                $("#btn_update").fadeOut(200);
            }

        })
            .on('deselect', function (e, dt, type, indexes) {
                numberRows = userlist.rows({selected: true}).count();
                if (numberRows == 0) {
                    $("#btn_delete").fadeOut(200);
                }
                if (numberRows !== 1) {
                    $("#btn_update").fadeOut(200);

                } else {
                    $("#btn_update").fadeIn(200);
                }

            });


        //affichage du message de suppression
        $("#btn_delete").on("click", function () {
            $("#msg_delete").modal("show")
        })
        // function de suppression
        $('#valider_delete').on("click", function () {
            let i = 0;
            let selectedIds = [];
            userlist.rows({selected: true}).data().each(function (row) {
                selectedIds[i] = userlist.row({selcted: true}).data()[0];
                i++;
            });

            //console.log(selectedIds)
            userlist.rows({selected: true}).deselect();

            $.ajax({
                dataType: "json",
                url: "delete_personnel",
                type: 'POST',
                data: {
                    selected: selectedIds
                }
            })

                .done(function (data) {
                    $("#msg_delete").modal("hide")
                    location.reload(true);

                })
                .fail(function (jqXHR, textStatus, errorThrown) {


                }); //ajax deleting colis


        }); //delete colis

        $("#btn_update").on("click", function () {
            let id_personnel = userlist.row({selected: true}).data()[0];
            console.log(id_personnel)
            let url = '<?php echo base_url() . "index.php/ControllerPersonnel/get_personnel_for_update";?>';

            $.ajax({
                dataType: "json",
                url: url,
                type: "GET",
                data: {id_personnel: id_personnel}
            }).done(function (data) {
                console.log("data")
                $("#modal_user").modal("show")
                let id_type = data[0]["id_type_personnel"]
                $("#nom").val(data[0]["nom"])
                $("#prenom").val(data[0]["prenom"])
                $("#mobile").val(data[0]["mobile"])
                $("#id_personnel").val(data[0]["id_personnel"])
                // let id_gare = data[0]["id_gare"]
                $("#type_personnel option[value=" + id_type + "]").prop('selected', true);

            }).fail(function () {
                console.log("failed")
            })
        })
        //

        $('#btn_submit').on("click", function (e) {
            url = '<?php echo base_url() . 'index.php/ControllerPersonnel/add_personnel' ?>'
            var donnee = $("#form_personnel").serialize();
            console.log("donne " + donnee)
            $.ajax({
                data: donnee,
                method: "POST",
                url: url,
                dataType: "json",
                success: function (data) {

                }

            }).done(function (data) {
               if(data){
                   $("#modal_user").modal("hide")
               }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                console.log(errorThrown)
                console.log(textStatus)
            })

        })

    })

</script>
</body>
</html>
