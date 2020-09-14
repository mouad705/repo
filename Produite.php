<script>
    $(document).ready(function() {
        //***** View data in edite Modal *******/
        $("#produitdata").on("click", "#edite", function() {
            var tr = $(this).closest("tr");
            $("#editeproduite").modal("show");
            var id = tr.find("td:eq(0)").text();
            var img = tr.find("td:eq(1) img").attr("src");
            var design = tr.find("td:eq(2)").text();
            var categorie = tr.find("td:eq(3)").text();
            var unite = tr.find("td:eq(4)").text();
            var color = tr.find("td:eq(5) input").val();
            var quantit = tr.find("td:eq(6)").text();
            var date = tr.find("td:eq(7)").text();
            var etat = tr.find("td:eq(8)").text();
            var stocklimit = tr.find("td:eq(9)").text();
            $("#editeproduite #ed_id").val(id);
            $("#editeproduite #ed_designation").val(design);
            $("#editeproduite #ed_categorie").val(categorie);
            $("#editeproduite #ed_unite").val(unite);
            $("#editeproduite #ed_quantit").val(quantit);
            $("#editeproduite #ed_color").val(color);
            $("#editeproduite #ed_date").val(date);
            $("#editeproduite #uu").attr("src", img);
            $("#editeproduite #ed_etat").val(etat);
            $("#editeproduite #ed_stocklimit").val(stocklimit);
        });

        /***** Fin******/
        $("#produitdata").on("click", "#view", function() {
            $("#produitview").modal("show");
            var tr = $(this).closest("tr");
            var id = tr.find("td:eq(0)").text();
            var img = tr.find("td:eq(1) img").attr("src");
            var design = tr.find("td:eq(2)").text();
            var categorie = tr.find("td:eq(3)").text();
            var unite = tr.find("td:eq(4)").text();
            var color = tr.find("td:eq(5) input").val();
            var quantit = tr.find("td:eq(6)").text();
            var date = tr.find("td:eq(7)").text();
            var etat = tr.find("td:eq(8)").text();
            var stocklimit = tr.find("td:eq(9)").text();
            $("#produitview #v_img").attr("src", img);
            $("#v_id").html(id);
            $("#v_designation").html(design);
            $("#v_categorie").html(categorie);
            $("#v_unite").html(unite);
            $("#v_color").val(color);
            $("#v_quantit").html(quantit);
            $("#v_date").html(date);
            $("#v_etat").html(etat);
            $("#v_stocklimit").html(stocklimit);

        });
    });
</script>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-content nopadding">
                <button type="button" data-toggle="modal" data-target="#ajouter" class="btn btn-primary">
                    Ajouter Nouveau Produit
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal add produite -->
<!-- Local bootstrap CSS & JS -->
<div style="display: none;" id="ajouter" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" id="add">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Nouveau Produite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Designiation</label>
                        <div class="controls">
                            <input type="text" name="designation" id="designation" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Categorie :</label>
                        <div class="controls">
                            <select id="categorie" name="categorie">
                                <option value="">--- Choisir un Categorie ---</option>
                                <?php
                                require_once('./Config/dossier_categorie/view.php');
                                $rows = getAllCategorie();
                                while ($data = $rows->fetch()) {
                                    $ligne =
                                        '
                <option value="' .
                                        $data[0] .
                                        '">' .
                                        $data[1] .
                                        '</option>';
                                    echo $ligne;
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Unite</label>
                        <div class="controls">
                            <select id="unite" name="unite">
                                <option value="">--- Choisir une Unite ---</option>
                                <option value="G">G</option>
                                <option value="KG">KG</option>
                                <option value="M">M</option>
                                <option value="PICE">PICE</option>
                                <option value="L">L</option>
                                <option value="T">T</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Quantite :</label>
                        <div class="controls">
                            <input type="number" name="quantit" id="quantit" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Color :</label>
                        <div class="controls">
                            <input type="color" id="color" name="color" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Stoke Limite :</label>
                        <div class="controls">
                            <input type="number" name="stocklimit" id="stocklimit" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Date Experation :</label>
                        <div class="controls">
                            <input type="date" name="date" id="date" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Etat :</label>
                        <div class="controls">
                            <select id="etat" name="etat">
                                <option value="">---Choisir un Etat ---</option>
                                <option value="disponible">disponible</option>
                                <option value="equise">equise</option>
                                <option value="pause">pause</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image :</label>
                        <div class="controls">
                            <input onchange="document.getElementById('ui').src = window.URL.createObjectURL(this.files[0])" type="file" name="imges" id="imges" /><br />
                            <img width="200" height="250" src="uploads/uploade.jpg" id="ui" value="Uploade Images" alt="Uploade Image" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="javascript:addproduite()" type="button" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon"><i class="icon-th"></i></span>
        <h5>Liste Produites</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Image
                    </th>

                    <th>
                        Designation
                    </th>
                    <th>
                        Categorie
                    </th>

                    <th>
                        Unite
                    </th>
                    <th>
                        Quantite
                    </th>
                    <th>
                        Color
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Etat
                    </th>
                    <th>
                        Stock Limit
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="produitdata">


            </tbody>
        </table>
    </div>
</div>

<!--edite produite modal-->

<!-- Button trigger modal -->

<!-- Modal -->
<div style="display: none;" class="modal fade" id="editeproduite" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" id="edite">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier un Produite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Designiation</label>
                        <div class="controls">
                            <input type="text" name="ed_id" disabled id="ed_id" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Designiation</label>
                        <div class="controls">
                            <input type="text" name="ed_designation" id="ed_designation" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Categorie :</label>
                        <div class="controls">
                            <select id="ed_categorie" name="ed_categorie">
                                <?php
                                require_once('Config/dossier_categorie/view.php');
                                $rows = getAllCategorie();
                                while ($data = $rows->fetch()) {
                                    $ligne =
                                        '
                <option value="' .
                                        $data[0] .
                                        '">' .
                                        $data[1] .
                                        '</option>

                ';
                                    echo $ligne;
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Unite</label>
                        <div class="controls">
                            <select id="ed_unite" name="ed_unite">
                                <option value="G">G</option>
                                <option value="KG">KG</option>
                                <option value="M">M</option>
                                <option value="PICE">PICE</option>
                                <option value="L">L</option>
                                <option value="T">T</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Quantite :</label>
                        <div class="controls">
                            <input type="text" name="ed_quantit" id="ed_quantit" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Color :</label>
                        <div class="controls">
                            <input type="color" id="ed_color" name="ed_color" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Stoke Limite :</label>
                        <div class="controls">
                            <input type="text" name="ed_stocklimit" id="ed_stocklimit" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Date Experation :</label>
                        <div class="controls">
                            <input type="date" name="ed_date" id="ed_date" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Etat :</label>
                        <div class="controls">
                            <select id="ed_etat" name="ed_etat">
                                <option>disponible</option>
                                <option>equise</option>
                                <option>pause</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image :</label>
                        <div class="controls">
                            <input onchange="document.getElementById('uu').src = window.URL.createObjectURL(this.files[0])" type="file" name="ed_imges" id="ed_imges" /><br />
                            <img width="200" height="250" src="uploads/uploade.jpg" id="uu" value="Uploade Images" alt="Uploade Image" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="javascript:editproduite()" type="button" class="btn btn-primary">
                        Modifier
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal View Data -->

<div style="display: none;" class="modal fade  bd-example-modal-xl" id="produitview" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 100%;text-align: center; font-weight: bold;">

                    <div class="card-body">
                        <h3 class="card-title">Info General </h3>
                        <table width="100%">
                            <tr>
                                <td style="text-align: left;">ID :</td>
                                <td id="v_id"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Designation :</td>
                                <td id="v_designation"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Categorie :</td>
                                <td id="v_categorie"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Unite :</td>
                                <td id="v_unite"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Quantite :</td>
                                <td id="v_quantit"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Color :</td>
                                <td id=""><input type="color" name="" id="v_color"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Date :</td>
                                <td id="v_date"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Etat :</td>
                                <td id="v_etat"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Stock Limite :</td>
                                <td id="v_stocklimit"></td>
                            </tr>
                            <tr>
                                <td><button type="button" id="addvarient" class="btn btn-primary">Ajouter les Varient de
                                        Produite</button></td>
                                <td><button onclick="javascript:ViewVarient()" type="button" id="listvarient" class="btn btn-primary">List Varient de Produite</button>
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Close
            </button>

        </div>
    </div>
</div>
</div>
<script>
    function ViewVarient() {
        $("#produitview").modal('hide');
        $('#modallistvarient').modal('show');
        var id = $('#v_id').text();
        $.ajax({
            type: 'POST',
            url: './Config/dossier_varient_produit/view.php',
            data: {
                id: id
            },
            
            success: function(data) {
                var row=JSON.parse(data);
                var ligne="";
                for(var val=0;val<row.length;val++){
                console.log(row);
                  
                    ligne+='<tr>';
                        ligne+='<td>'+row[val].id+'</td>';
                        ligne+='<td><img width="50" height="50" src="./'+row[val].images+'"></td>';
                        ligne+='<td>'+row[val].designation+'</td>';
                        ligne+='<td>'+row[val].unite+'</td>';
                        ligne+='<td>'+row[val].rapport+'</td>';
                        ligne+='<td>'+row[val].prix_vent+'</td>';
                        ligne+='<td>'+row[val].description+'</td>';
                        ligne+='<td>';
                        ligne+='<button id="edite" class="btn btn-primary"><i class="icon-edit"></i></button>';
                        ligne+='<button id="delete" class="btn btn-danger"><i class="icon-trash"></i></button>';
                        ligne+='<button id="view" class="btn btn-default"><i class="icon-eye-open"></i></button>';
                        ligne+='</td>';
                        ligne+='</tr>';
                           
        }
        
      $("#tablevarient").html(ligne);
            }

        });
    }
</script>

<!-- Fin -->


<!--  Modal add varient  -->

<div style="display:none;" class="modal fade modal-lg" id="modaladdvarient" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form action="#" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Varient de produit -
                        <p id="nom_produit"></p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div style="width: 100%;" class="span6">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>

                                </div>
                                <div class="widget-content nopadding">
                                    <div class="control-group">
                                        <label class="control-label">id Produit</label>
                                        <div class="controls">
                                            <input type="text" name="sp_id" id="sp_id" /><input id="generation" type="button" class="btn btn-primary" value="Genere Code">
                                            <input type="hidden" name="sp_id_pp" id="sp_id_pp">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Designiation</label>
                                        <div class="controls">
                                            <input type="text" name="sp_designation" id="sp_designation" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Unite</label>
                                        <div class="controls">
                                            <select id="sp_unite" name="sp_unite">
                                                <option value="">--- Choisir une Unite ---</option>
                                                <option value="G">G</option>
                                                <option value="KG">KG</option>
                                                <option value="M">M</option>
                                                <option value="PICE">PICE</option>
                                                <option value="L">L</option>
                                                <option value="T">T</option>
                                                <option value="P">P</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Rapport :</label>
                                        <div class="controls">
                                            <input type="number" name="sp_rapport" id="sp_rapport" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Quantite :</label>
                                        <div class="controls">
                                            <input type="number" name="sp_quantite" id="sp_quantite" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Prix de Vent :</label>
                                        <div class="controls">
                                            <input type="text" id="sp_prix_vent" name="sp_prix_vent" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Description : :</label>
                                        <div class="controls">
                                            <textarea rows="5" cols="15" name="sp_description" id="sp_description" />
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Image :</label>
                                        <div class="controls">
                                            <input onchange="document.getElementById('sp_view_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="sp_imges" id="sp_imges" /><br />
                                            <img width="200" height="250" src="uploads/uploade.jpg" id="sp_view_img" value="Uploade Images" alt="Uploade Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="routeur" type="button" class="btn btn-primary">Routeur</button>
                    <button onclick="javascript:addvarientproduite()" type="button" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        /***** Generation de code de sous produite****/

        $('#generation').on('click', function() {
            var d = $('#v_unite').text() + "-" + $('#sp_id_pp').val();
            $("#sp_id").val(d);

        });

        $('#sp_unite').on('change', function() {
            var d = $('#sp_unite').val() + "-" + $('#sp_id_pp').val();
            $("#sp_id").val(d);
        });


        load();
        $("#addvarient").on('click', function() {
            $("#produitview").modal('hide');
            $('#modaladdvarient').modal('show');
            var v = $("#produitview #v_id").text();
            var nom = $("#produitview #v_designation").text();
            $("#nom_produit").text(nom);
            $(" #sp_id_pp").val(v);
        });

        $("#routeur").on('click', function() {
            $("#produitview").modal('show');
            $('#modaladdvarient').modal('hide');
        });

        $("#produitdata").on("click", "#delete", function() {
            var currentRow = $(this).closest("tr");
            var dm = currentRow.find("td:eq(0)").text();

            swal({
                title: "Are you sure?",
                text: "Are you Sure you wante to delete this Categorie!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "Config/dossier_produit/delete.php",
                        data: {
                            id: dm,
                        },
                        cache: false,
                        success: function(data) {
                            if (data == 1) {
                                swal("This product has been deleted!", {
                                    icon: "success",
                                });
                                load();
                            } else if (data == 0) {
                                swal("faild to delete this product!");
                            }
                        },
                    });
                }
            });
        });
    });

    /****** FUNCTION AJOUTER NOUVEAU VARIENT ********/

    function addvarientproduite() {
        var str = new FormData();
        //var d=$("#sp_id_pp").val();

        var id = $("#sp_id").val();
        var id_pp = $("#sp_id_pp").val();
        var design = $("#sp_designation").val();
        var unite = $("#sp_unite").val();
        var rapport = $("#sp_rapport").val();
        var prix_vent = $("#sp_prix_vent").val();
        var description = $("#sp_description").val();
        var imges = $("#sp_imges").prop("files")[0];
        str.append("sp_id_pp", id_pp);
        str.append("sp_id", id);
        str.append("sp_designation", design);
        str.append("sp_unite", unite);
        str.append("sp_rapport", rapport);
        str.append("sp_prix_vent", prix_vent);
        str.append("sp_description", description);
        str.append("sp_imges", imges);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#modaladdvarient").modal("hide");
                swal(" user has been Inserted!", {
                    icon: "success",
                });
                $(':form')[0].reset();
                ViewVarient();
            }
        };
        xmlhttp.open("POST", "Config/dossier_varient_produit/add.php", true);
        xmlhttp.send(str);
    }



    /*******FIN********/
    /************ FUNCTION EDITE VARIENT PRODUITE ************/

    function editevarientproduite() {
        var str = new FormData();
        //var d=$("#sp_id_pp").val();
        var id = $('#ed_sp_id').val();
        var design = $("#ed_sp_designation").val();
        var unite = $("#ed_sp_unite").val();
        var rapport = $("#ed_sp_rapport").val();
        var prix_vent = $("#ed_sp_prix_vent").val();
        var description = $("#ed_sp_description").val();
        var imges = $("#ed_sp_imge").prop("files")[0];
        if (!imges) {
            imges = $('#ed_sp_view_imge').attr('src');
        }
        str.append('ed_sp_id', id);
        str.append("ed_sp_designation", design);
        str.append("ed_sp_unite", unite);
        str.append("ed_sp_rapport", rapport);
        str.append("ed_sp_prix_vent", prix_vent);
        str.append("ed_sp_description", description);
        str.append("ed_sp_imge", imges);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#modaladdvarient").modal("hide");
                swal(" user has been Inserted!", {
                    icon: "success",
                });
                ViewVarient();
                $('#EditeVarient').modal('hide');

            }
        };
        xmlhttp.open("POST", "Config/dossier_varient_produit/edite.php", true);
        xmlhttp.send(str);
    }



    /*********AFFICHER INFO DES VARIANT POUR LA MODIFICATION********/

    $(document).ready(function() {

        /************delete varient produit********* */

        $('#tablevarient').on('click', '#delete', function() {
            var tr = $(this).closest('tr');
            var id = tr.find('td:eq(0)').text();
            swal({
                title: "Are you sure?",
                text: "Are you Sure you wante to delete this varient!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "Config/dossier_varient_produit/delete.php",
                        data: {
                            id: id,
                        },
                        cache: false,
                        success: function(data) {
                            if (data == 1) {
                                swal("This varient has been deleted!", {
                                    icon: "success",
                                });
                                ViewVarient();
                            } else if (data == 0) {
                                swal("faild to delete this varient!");
                            }
                        },
                    });
                }
            });

        });

        $('#tablevarient').on('click', '#edite', function() {

            var tr = $(this).closest('tr');
            var d0 = tr.find('td:eq(0)').text();
            var d1 = tr.find('td:eq(1) img').attr('src');
            var d2 = tr.find('td:eq(2)').text();
            var d3 = tr.find('td:eq(3)').text();
            var d4 = tr.find('td:eq(4)').text();
            var d6 = tr.find('td:eq(6)').text();
            var d7 = tr.find('td:eq(7)').text();

            $("#ed_sp_id").val(d0);
            $("#ed_sp_designation").val(d2);
            $("#ed_sp_unite").val(d3);
            $("#ed_sp_rapport").val(d4);
            $("#ed_sp_prix_vent").val(d6);
            $("#ed_sp_description").val(d7);
            $("#ed_sp_view_img").attr('src', d1);
            $('#EditeVarient').modal('show');
            $('#modallistvarient').modal('hide');

        });
        $('#routeur_list_varient').on('click', function() {
            $('#modallistvarient').modal('show');
            $('#EditeVarient').modal('hide');

        })

    });

    /************** FIN ********************************************/


    function addproduite() {
        var str = new FormData();
        var design = $("#designation").val();
        var categorie = $("#categorie").val();
        var unite = $("#unite").val();
        var quantit = $("#quantit").val();
        var color = $("#color").val();
        var date = $("#date").val();
        var imges = $("#imges").prop("files")[0];
        var etat = $("#etat").val();
        var stocklimit = $("#stocklimit").val();
        str.append("designation", design);
        str.append("categorie", categorie);
        str.append("unite", unite);
        str.append("quantit", quantit);
        str.append("color", color);
        str.append("date", date);
        str.append("imges", imges);
        str.append("stocklimit", stocklimit);
        str.append("etat", etat);
        alert(design);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#ajouter").modal("hide");
                swal(" user has been deleted!", {
                    icon: "success",
                });
                load();
            }
        };
        xmlhttp.open("POST", "Config/dossier_produit/add.php", true);
        xmlhttp.send(str);
    }

    function load() {
        $.ajax({
            type: "POST",
            url: "Config/dossier_produit/view.php",
            data:{action:"allproduct"},
            cache: false,
            dataType: "html",
            success: function(data) {
                $("#produitdata").html(data);
            },
        });
    }



    /**** edite produite ****/

    function editproduite() {
        var str = new FormData();
        var id = $("#ed_id").val();
        var design = $("#ed_designation").val();
        var categorie = $("#ed_categorie").val();
        var unite = $("#ed_unite").val();
        var quantit = $("#ed_quantit").val();
        var color = $("#ed_color").val();
        var date = $("#ed_date").val();
        imges = $("#ed_imges").prop("files")[0];
        if (!imges) {
            var imges = $("#uu").attr("src");
        }
        var etat = $("#ed_etat").val();
        var stocklimit = $("#ed_stocklimit").val();
        str.append("ed_id", id);
        str.append("ed_designation", design);
        str.append("ed_categorie", categorie);
        str.append("ed_unite", unite);
        str.append("ed_quantit", quantit);
        str.append("ed_color", color);
        str.append("ed_date", date);
        str.append("ed_imges", imges);
        str.append("ed_stocklimit", stocklimit);
        str.append("ed_etat", etat);
        str.append("action", "edit");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#editeproduite").modal("hide");
                swal(" user has been deleted!", {
                    icon: "success",
                });
                load();

            }
        };
        xmlhttp.open("POST", "Config/dossier_produit/edite.php", true);
        xmlhttp.send(str);
    }

</script>
<!--    modal list varient de produite     -->
<div id="modallistvarient" style="width: 983px;left: 40%;display:none;" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <table class="table " style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID SOUS-PRODUITE</th>
                            <th>IMAGE</th>
                            <th>DESIGNATION</th>
                            <th>UNITE</th>
                            <th>RAPPORT</th>
                            <th>PRIX VENT</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>

                        </tr>
                    </thead>
                    <tbody id="tablevarient">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button onclick="$('#produitview').modal('show');$('#modallistvarient').modal('hide')" type="button" class="btn btn-primary">Routeur</button>
            </div>
        </div>

    </div>
</div>


<!-- Modal Modification de varient -->
<div class="modal fade" id="EditeVarient" tabindex="-1" style="display: none; top: 2%;" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="#" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Varient de produit -
                        <p id="nom_produit"></p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div style="width: 100%;" class="span6">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>

                                </div>
                                <div class="widget-content nopadding">
                                    <div class="control-group">
                                        <label class="control-label">id Produit</label>
                                        <div class="controls">
                                            <input disabled type="text" name="ed_sp_id" id="ed_sp_id" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Designiation</label>
                                        <div class="controls">
                                            <input type="text" name="ed_sp_designation" id="ed_sp_designation" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Unite</label>
                                        <div class="controls">
                                            <select id="ed_sp_unite" name="ed_sp_unite">
                                                <option value="">--- Choisir une Unite ---</option>
                                                <option value="G">G</option>
                                                <option value="KG">KG</option>
                                                <option value="M">M</option>
                                                <option value="PICE">PICE</option>
                                                <option value="L">L</option>
                                                <option value="T">T</option>
                                                <option value="P">P</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Rapport :</label>
                                        <div class="controls">
                                            <input type="number" name="ed_sp_rapport" id="ed_sp_rapport" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Quantite :</label>
                                        <div class="controls">
                                            <input type="number" name="ed_sp_quantite" id="ed_sp_quantite" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Prix de Vent :</label>
                                        <div class="controls">
                                            <input type="text" id="ed_sp_prix_vent" name="ed_sp_prix_vent" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Description : :</label>
                                        <div class="controls">
                                            <textarea rows="5" cols="15" name="ed_sp_description" id="ed_sp_description" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Image :</label>
                                        <div class="controls">
                                            <input onchange="document.getElementById('ed_sp_view_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="ed_sp_imge" id="ed_sp_imge" /><br />
                                            <img width="200" height="250" src="uploads/uploade.jpg" id="ed_sp_view_img" value="Uploade Images" alt="Uploade Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="routeur_list_varient" type="button" class="btn btn-primary">Routeur</button>
                    <button onclick="javascript:editevarientproduite()" type="button" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
