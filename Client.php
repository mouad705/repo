<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">

            <div class="widget-content nopadding">
                <button type="button" data-toggle="modal" data-target="#ajouter" class="btn btn-primary">Ajouter Nouveau
                    Client</button>
            </div>
        </div>
    </div>
</div>

<!-- zone pour client form-->


<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Form validation</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="#" id="addclient" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Nom :</label>
                        <div class="controls">
                            <input type="text" name="nom" id="nom">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tel :</label>
                        <div class="controls">
                            <input type="text" name="tel" id="tel">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Adresse :</label>
                        <div class="controls">
                            <input type="text" name="adresse" id="adresse">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Ville :</label>
                        <div class="controls">
                            <input type="text" name="ville" id="ville">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Pays :</label>
                        <div class="controls">
                            <select name="paye" id="paye">
                                <option value="Maroc">Maroc</option>
                                <option value="Algére">Algére</option>
                                <option value="France">France</option>
                                <option value="Espane">Espane</option>
                                <option value="Tunise">Tunise</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input onclick="javascript:addclient()" type="button" value="Validate" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- fin -->







<!--/.module-->
<script>
    function load() {
        $.ajax({
            type: 'POST',
            url: './Config/dossier_client/view.php',
            cache: false,
            success: function(data) {
            var myObj = JSON.parse(data);
            alert(myObj.nom);

            var ligne = '<tr>'+
            '<td>' + myObj.id_clt + '</td>'+
            '<td>' + myObj.nom_clt + '</td>'+
            '<td>' + myObj.tel_clt + '</td>'+
            '<td>' + myObj.adresse_clt + '</td>'+
            '<td>' + myObj.ville_clt + '</td>'+
            '<td>' + myObj.paye_clt + '</td>'+
            '<td>'+
            '<button id="edite" class="btn btn-primary">Edite</button>'+
            '<button id="delete" class="btn btn-danger">Delete</button>'+
            '<button id="view" class="btn btn-default">View</button>'+

            '</td>'+

          '</tr>';
                $('.client').html(ligne);
                
            }
        });
    }

    function addclient() {
        var nom = $('#nom').val();
        var tel = $('#tel').val();
        var adresse = $('#adresse').val();
        var ville = $('#ville').val();
        var paye = $('#paye').val();
        $.ajax({
            type: "POST",
            url: "Config/dossier_client/add.php",
            data: {
                nom: nom,
                tel: tel,
                adresse: adresse,
                ville: ville,
                paye: paye
            },
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    $('#ajouter').modal('hide');
                    Swal.fire(
                        'Good job!',
                        'New Record has been inserted',
                        'success'
                    );
                    load();
                } else
                if (data == 0) {
                    Swal.fire(
                        'oops!',
                        'echec opertion',
                        'warning'
                    );
                }



            }

        });


    }

</script>


<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Liste Client</h5>
    </div>
    <div class="widget-content nopadding">
        <table id="clienttable" cellpadding="0" cellspacing="0" border="0" class="table table-bordered data-table" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Tele(s)</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Paye</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="client">
                <?php
            //    require_once('Config/dossier_client/ClientFunction.php');
              //  getAllClients();

                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Tele(s)</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Paye</th>
                    <th>Action</th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>


<!--/.module-->
<script>
    $(document).ready(function() {
      load();
        $('.client').on('click', '#edite', function() {

            var tr = $(this).closest('tr');
            var d0 = tr.find('td:eq(0)').text();
            var d1 = tr.find('td:eq(1)').text();
            var d2 = tr.find('td:eq(2)').text();
            var d3 = tr.find('td:eq(3)').text();
            var d4 = tr.find('td:eq(4)').text();
            var d5 = tr.find('td:eq(5)').text();
            $('.modal #ed_id').val(d0);
            $('.modal #ed_nom').val(d1);
            $('.modal #ed_tel').val(d2);
            $('.modal #ed_adresse').val(d3);
            $('.modal #ed_ville').val(d4);
            $('.modal #ed_paye').val(d5);


            $('#modaledite').modal('show');
        });

        $('.client').on('click', '#delete', function() {
            var tr = $(this).closest('tr');
            var id = tr.find('td:eq(0)').text();
            if (confirm('Are you Sure you want to delete this client')) {
                $.ajax({
                    type: 'POST',
                    url: 'Config/dossier_client/delete.php',
                    cache: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire(
                                'Good job!',
                                'New Record has been deleted',
                                'success'
                            );
                            if (id == id) {
                                tr.remove();

                            }
                        } else if (data == 0) {
                            alert('errur de Supprission');
                        }
                    },
                });
            }

        });



    });




    function editeclient() {

        var ed_id = $('#ed_id').val();
        var ed_nom = $('#ed_nom').val();
        var ed_tel = $('#ed_tel').val();
        var ed_adresse = $('#ed_adresse').val();
        var ed_ville = $('#ed_ville').val();
        var ed_paye = $('#ed_paye').val();
        $.ajax({
            type: 'POST',
            url: 'Config/dossier_client/edite.php',
            data: {
                ed_id: ed_id,
                ed_nom: ed_nom,
                ed_tel: ed_tel,
                ed_adresse: ed_adresse,
                ed_ville: ed_ville,
                ed_paye: ed_paye
            },
            cache: false,
            success: function(data) {
                if (data == 1) {
                    Swal.fire(
                        'Good job!',
                        'New Record has been updated',
                        'success'
                    );
                    load();
                    $('.modal').modal('hide');

                } else {

                    Swal.fire(
                        'oops!',
                        'probleme de modification',
                        'warning'
                    );

                }


            }

        });


    }

</script>

<!--  Modal edite client -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modaledite" tabindex="-1" style="display: none;" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editeclient" enctype="multipart/form-data" action="#" method="post"></form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <table style="border:none;" class="table">
                    <tr>

                        <td>Nom :</>
                        <td>
                            <input type="hidden" name="ed_id" id="ed_id">
                            <input type="text" name="ed_nom" id="ed_nom">
                        </td>
                    </tr>
                    <tr>
                        <td>Tele :</td>
                        <td><input type="text" name="ed_tel" id="ed_tel"></td>
                    </tr>
                    <tr>
                        <td>Adresse :</td>
                        <td><input type="text" name="ed_adresse" id="ed_adresse"></td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td><input type="text" name="ed_ville" id="ed_ville"></td>
                    <tr>
                        <td>Paye</td>
                        <td>
                            <select name="ed_paye" id="ed_paye">
                                <option value="Maroc">Maroc</option>
                                <option value="Algére">Algére</option>
                                <option value="France">France</option>
                                <option value="Espane">Espane</option>
                                <option value="Tunise">Tunise</option>
                            </select>
                        </td>
                    </tr>


                </table>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="javascript:editeclient()" type="button" class="btn btn-primary">Edite</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.dashboard.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.tables.js"></script>
