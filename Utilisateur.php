<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Button trigger modal -->

<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-content nopadding">
                <button type="button" data-toggle="modal" data-target="#test" class="btn btn-primary">
                    Ajouter Nouveau Client
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Form validation</h5>
            </div>
            <div class="widget-content nopadding">
                <form id="adduser" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                    <div class="control-group">
                        <label class="control-label">Nom</label>
                        <div class="controls">
                            <input type="text" name="nom" id="nom" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Pesudo</label>
                        <div class="controls">
                            <input type="text" name="pesudo" id="pesudo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mots de Pass :</label>
                        <div class="controls">
                            <input type="text" name="pass" id="pass" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input type="text" name="description" id="description" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image :</label>
                        <div class="controls">
                            <img width="200" height="250" id="u" class="img-fluid img-thumbnail"
                                src="https://via.placeholder.com/800x500" alt="image" />
                            <input
                                onchange="document.getElementById('u').src = window.URL.createObjectURL(this.files[0])"
                                id="imges" name="imges" type="file" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <input onclick="javascript:adduser()" type="button" value="Validate" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
    </div>
    <div class="widget-content nopadding">
        <table id="userdata" class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Nom Complete
                    </th>

                    <th>
                        Pesudo
                    </th>
                    <th>
                        Mote de Pass
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Etat
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
require_once('./Config/dossier_utilisateur/UtilisateurFunction.php');
getAllUsers();

?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    /*************edite user************************/
    function editeUser() {
        var str = new FormData();
        var ed_id = $("#ed_id").val();
        var ed_nom = $("#ed_nom").val();
        var ed_pesudo = $("#ed_pesudo").val();
        var ed_pass = $("#ed_pass").val();
        var ed_description = $("#ed_description").val();
        var ed_imges = $("#ed_imges").prop("files")[0];
        if (!ed_imges) {
            var images = $('#ui').attr('src');

        } else {
            images = ed_imges;
        }
        alert(images);
        str.append("ed_id", ed_id);
        str.append("ed_nom", ed_nom);
        str.append("ed_pesudo", ed_pesudo);
        str.append("ed_pass", ed_pass);
        str.append("ed_description", ed_description);
        str.append("ed_imges", images);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                $("#UserEdit").modal("hide");
                swal(" user has been deleted!", {
                    icon: "success",
                });
                load();
            }
        };
        xmlhttp.open("POST", "Config/dossier_utilisateur/edite.php", true);
        xmlhttp.send(str);
    }

    function adduser() {
        var str = new FormData();

        var nom = $("#nom").val();
        var pesudo = $("#pesudo").val();
        var pass = $("#pass").val();
        var description = $("#description").val();
        var imges = $("#imges").prop("files")[0];

        str.append("nom", nom);
        str.append("pesudo", pesudo);
        str.append("pass", pass);
        str.append("description", description);
        str.append("imges", imges);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                swal(" user has been deleted!", {
                    icon: "success",
                });
                load();
            }
        };
        xmlhttp.open("POST", "Config/dossier_utilisateur/add.php", true);
        xmlhttp.send(str);
    }

    function load() {
        $.ajax({
            type: "POST",
            url: "Config/dossier_utilisateur/view.php",
            cache: false,
            success: function (data) {
                $("#userdata").html(data);
            },
        });
    }

    $(document).ready(function () {
/*
('.data-table').dataTable({
    "bServerSide": true,
    "bDestroy": true
});

        /********show recorde in modal********* */
        $("#userdata").on("click", "#edite", function () {
            $("#UserEdit").modal("show");
            var tr = $(this).closest("tr");
            var d0 = tr.find("td:eq(0)").text();
            var d1 = tr.find("td:eq(1) img").attr('src');
            var d2 = tr.find("td:eq(2)").text();
            var d3 = tr.find("td:eq(3)").text();
            var d4 = tr.find("td:eq(4)").text();
            var d5 = tr.find("td:eq(5)").text();
            var d6 = tr.find("td:eq(6)").text();
            $("#UserEdit #ed_id").val(d0);
            $("#UserEdit #ed_nom").val(d2);
            $("#UserEdit #ed_pesudo").val(d3);
            $("#UserEdit #ed_pass").val(d4);
            $("#UserEdit #ed_description").val(d5);
            $("#UserEdit #ui").attr('src', d1);
        });

        /**************delete recorde*********** */

        $("#userdata").on("click", "#delete", function () {
            var currentRow = $(this).closest("tr");
            var dm = currentRow.find("td:eq(0)").text();

            swal({
                title: "Are you sure?",
                text: "Are you Sure you wante to delete this Command!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "Config/dossier_utilisateur/delete.php",
                        data: {
                            id: dm,
                        },
                        cache: false,
                        success: function (data) {
                            if (data == 1) {
                                swal("This Command has been deleted!", {
                                    icon: "success",
                                });
                                load();
                            } else if (data == 0) {
                                swal("faild to delete this Command!");
                            }
                        },
                    });
                }
            });
        });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="UserEdit" tabindex="-1" style="display: none;" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="edituser" enctype="multipart/form-data" action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edite User</h5>
                </div>

                <div class="modal-body">
                    <table id="formadd">
                        <tr>
                            <td><label for="">Nom :</label></td>
                            <td>
                                <input type="text" name="ed_nom" id="ed_nom" placeholder="saisir votre nom" />
                                <input type="hidden" name="ed_id" id="ed_id" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Pesudo :</label></td>
                            <td>
                                <input type="text" name="ed_pesudo" id="ed_pesudo" aria-describedby="helpId"
                                    placeholder="saisir votre pesudo" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Mot de Pass :</label></td>
                            <td>
                                <input type="text" name="ed_pass" id="ed_pass" aria-describedby="helpId"
                                    placeholder="saisir mot de pass" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Description :</label></td>
                            <td>
                                <input type="text" name="ed_description" id="ed_description" aria-describedby="helpId"
                                    placeholder="saisir la description" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label" for="basicinput">Image :</label>
                            </td>
                            <td width="230px">
                                <img width="200" height="250" id="ui" class="img-fluid img-thumbnail"
                                    src="https://via.placeholder.com/800x500" alt="image" />
                                <input
                                    onchange="document.getElementById('ui').src = window.URL.createObjectURL(this.files[0])"
                                    id="ed_imges" name="ed_imges" type="file" />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button onclick="javascript:editeUser()" type="button" class="btn btn-primary">
                        Edite
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--/.content-->

<script>
    $(document).ready(function () {
        $("#userdata").on("click", "#view", function () {
            $("#userview").modal("show");
            var tr = $(this).closest("tr");
            //var d0 = tr.find('td:eq(0)').text();
            var d1 = tr.find("td:eq(1) img").attr("src");
            var d2 = tr.find("td:eq(2)").text();
            var d3 = tr.find("td:eq(3)").text();
            var d4 = tr.find("td:eq(4)").text();
            var d5 = tr.find("td:eq(5)").text();
            var d6 = tr.find("td:eq(6)").text();
            var ligne =
                "<tr>" +
                '<td><img width="100" height="100" src="' +
                d1 +
                '" alt=""></td>' +
                "<td></td>" +
                "</tr>" +
                "<tr>" +
                "<td>Nom :</td>" +
                "<td>" +
                d2 +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>Pesudo :</td>" +
                "<td>" +
                d3 +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>Mot de Pass :</td>" +
                "<td>" +
                d4 +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>Description :</td>" +
                "<td>" +
                d5 +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>Etat :</td>" +
                "<td>" +
                d6 +
                "</td>" +
                "</tr>";
            $("#userview #viewtable").html(ligne);
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="userview" style="display: none;" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="width: 100%;" id="viewtable"></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
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

<div class="modal fade" id="test" tabindex="-1" style="display: none;" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="testform" enctype="multipart/form-data" action="./Config/dossier_utilisateur/edite.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edite User</h5>
                </div>

                <div class="modal-body">
                    <table id="formadd">
                        <tr>
                            <td><label for="">Nom :</label></td>
                            <td>
                                <input type="text" name="nom" id="nom" placeholder="saisir votre nom" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Pesudo :</label></td>
                            <td>
                                <input type="text" name="pesudo" id="pesudo" aria-describedby="helpId"
                                    placeholder="saisir votre pesudo" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Mot de Pass :</label></td>
                            <td>
                                <input type="text" name="pass" id="pass" aria-describedby="helpId"
                                    placeholder="saisir mot de pass" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Description :</label></td>
                            <td>
                                <input type="text" name="description" id="description" aria-describedby="helpId"
                                    placeholder="saisir la description" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label" for="basicinput">Image :</label>
                            </td>
                            <td width="230px">
                                <img width="200" height="250" id="u" class="img-fluid img-thumbnail"
                                    src="https://via.placeholder.com/800x500" alt="image" />
                                <input
                                    onchange="document.getElementById('u').src = window.URL.createObjectURL(this.files[0])"
                                    id="imges" name="imges" type="file" />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">add</button>
                </div>
            </div>
        </form>
    </div>
</div>