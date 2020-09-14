<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Ajouter Nouveau Categorie</h5>
            </div>
            <div class="widget-content nopadding">
                <form id="categoreform" class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Nom :</label>
                        <div class="controls">
                            <input type="text" name="nom" id="nom">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Description :</label>
                        <div class="controls">
                            <textarea name="description" id="description" cols="15" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input onclick="javascript:addcategorie()" type="button" value="Ajouter"
                            class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<!--Ajax add categorie-->
<script>
    function addcategorie() {

        var nom = $('#nom').val();
        var description = $('#description').val();
        $.ajax({
            type: 'POST',
            url: 'Config/dossier_categorie/add.php',
            data: {
                nom: nom,
                description: description
            },
            cache: false,
            success: function (data) {
                if (data == 1) {


                    Swal.fire(
                        'Good job!',
                        'New Record has been inserted',
                        'success'
                    );
                    loadtable();
                } else if (data == 0) {
                    Swal.fire(
                        'failed!?',
                        'verfier votre donnee',
                        'warning'
                    );

                }
            }
        });



    }

    function loadtable() {
        $.ajax({
            type: 'POST',
            url: 'Config/dossier_categorie/view.php',

            success: function (data) {
                $('.client').html(data);

            }

        });

    }


    $(document).ready(function () {
        $('.client').on('click', '#delete', function () {
            var tr = $(this).closest('tr');
            var id = tr.find('td:eq(0)').text();

            swal({
                    title: "Are you sure?",
                    text: "Are you Sure you wante to delete this Categorie!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: 'POST',
                            url: 'Config/dossier_categorie/delete.php',
                            data: {
                                id: id
                            },
                            cache: false,
                            success: function (data) {
                                if (data == 1) {
                                    swal("This categorie has been deleted!", {
                                        icon: "success",
                                    });
                                    if (id == id) {
                                        tr.remove();
                                    }
                                } else if (data == 0) {
                                    swal("faild to delete this categorie!");
                                }
                            }

                        });

                    }
                });

        });

    });

    /****View data of categorie */
    $(document).ready(function () {
        $('.client').on('click', '#view', function () {
            var tr = $(this).closest('tr');
            var nom = tr.find('td:eq(1)').text();
            var description = tr.find('td:eq(2)').text();
            var ligne = '<tr>' +
                '<td>Nom :</td>' +
                '<td>' + nom + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Description :</td>' +
                '<td>' + description + '</td>' +
                '</tr>';
            $('#viewmodal').modal('show');
            $('#viewmodal #tablecategorie').html(ligne);

        });

    });
</script>
<!--/.module-->
<br />
<!-- Modal View Data -->
<style>
    #tablecategorie tr td {
        height: 50px;
        font-size: large;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
</style>
<div class="modal fade" style="display: none;" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="tablecategorie">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!--End View Modal-->




<!--edite Modal-->

<script>
    $(document).ready(function () {
        $('.client').on('click', '#edite', function () {
            var tr = $(this).closest('tr');
            var id = tr.find('td:eq(0)').text();
            var nom = tr.find('td:eq(1)').text();
            var description = tr.find('td:eq(2)').text();

            $('#editecategorie #ed_id').val(id);
            $('#editecategorie #ed_nom').val(nom);
            $('#editecategorie #ed_description').val(description);
            $('#editemodal').modal('show');

        });
    });

    function editecategorie() {
        var ed_id = $('#ed_id').val();
        var ed_nom = $('#ed_nom').val();
        var ed_description = $('#ed_description').val();
        $.ajax({
            type: 'POST',
            url: 'Config/dossier_categorie/edite.php',
            data: {
                ed_id: ed_id,
                ed_nom: ed_nom,
                ed_description: ed_description
            },
            cache: false,
            success: function (data) {
                if (data == 1) {
                    swal({
                        title: "Good",
                        text: "Categorie updated with Success",
                        icon: "success",
                    });
                    loadtable();
                    $('#editemodal').modal('hide');

                } else if (data == 0) {
                    swal({
                        title: "oops",
                        text: "faild update operation",
                        icon: "warning",
                    });
                }
            }

        });
    }
</script>

<div class="modal fade" style="display: none;" id="editemodal" tabindex="-1" role="dialog"
    aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="editecategorie">

                        <tbody>
                            <tr>
                                <td scope="row">Nom :</td>
                                <td>
                                    <input type="text" name="ed_nom" id="ed_nom">
                                    <input type="hidden" name="ed_id" id="ed_id">
                                </td>

                            </tr>
                            <tr>
                                <td scope="row">Description :</td>
                                <td><textarea name="ed_description" id="ed_description" cols="30" rows="5"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="javascript:editecategorie()" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--End Modal-->


<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
    </div>
    <div class="widget-content nopadding">
        <table id="categorietable" cellpadding="0" cellspacing="0" border="0" class="table table-bordered "
            width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Description(s)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="client">
                <?php
                require_once('Config/dossier_categorie/view.php');
              $rows=getAllCategorie();
while ($data = $rows->fetch()) {
    $ligne = '
     <tr>
      <td>' . $data[0] . '</td>
      <td>' . $data[1] . '</td>
      <td>' . $data[2] . '</td>
      <td>
       <button id="edite" class="btn btn-primary">Edite</button>
     <button id="delete" class="btn btn-danger">Delete</button>
     <button id="view" class="btn btn-default">View</button>

      </td>

      </tr>
      ';
      echo $ligne;
}

                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Description(s)</th>
                    <th>Action</th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
<!--/.content-->
