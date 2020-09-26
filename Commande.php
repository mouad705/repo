<style>
    #info_cmd th {
        font-size: larger;

    }
</style>

<script>
    $(document).ready(function() {
        //methode ajax for shox data command;
        var id_cmd = location.search.split('cmd=')[1];
        $.ajax({
            type: "POST",
            url: "./Config/dossier_command/view.php",
            data: {
                id_cmd: id_cmd
            },
            dataType: 'JSON',
            success: function(response) {

                var data = '<table class="table table-bordered"><thead>';

                $.each(response, function(key, value) {

                    data += '<tr>' +
                        '<th>Commend N° :</th>' +
                        '<th>' + value[key].id + '</th>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Nom de Client :</th>' +
                        '<th>' + value[key].nom + '</th>' +
                        '</tr>';

                });
                data += '</thead></table>';
                $('#info_cmd').html(data);
            }

        });
        // methode ajax for show data ligne command

        $.ajax({
            type: "POST",
            url: "./Config/dossier_DetailCommand/view.php",
            data: {
                id_cmd: id_cmd
            },
            dataType: "JSON",
            success: function(response) {
                var table = '<table class="table data_table table-bordered table-responsive"><thead>' +
                    '<th>ID PRODUIT</th>' +
                    '<th>DESIGNATION</th>' +
                    '<th>PRIX</th>' +
                    '<th>QUANTITE</th>' +
                    '<th>TOTAL</th>' +
                    '<th>ACTION</th>' +
                    '<thead><tbody>';
                for (i = 0; i < response.length; i++) {
                    table += '<tr>' +
                        '<td>' + response[i].id_produit + '</td>' +
                        '<td>' + response[i].nom_produit + '</td>' +
                        '<td>' + response[i].prix + '</td>' +
                        '<td>' + response[i].quantite + '</td>' +
                        '<td>' + response[i].total + '</td>' +
                        '<td><button class="btn btn-primary"><span><i class="icon-trash"></i></span></button></td>' +
                        '</tr>';

                }
                table += '</tbody></table>';
                $("#lignecommand").html(table);
            },
        });

    });
</script>


<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Information De Commande</h5>
            </div>
            <div id="info_cmd" class="widget-content nopadding">

            </div>
        </div>
    </div>
</div>


<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
    </div>
    <div id="lignecommand" class="widget-content nopadding">

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