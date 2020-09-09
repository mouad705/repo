<div class="row-fluid">
    <div class="span12">
        <div style="display: grid;" class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                <h5>Full Width <code>class=Span12</code></h5>
            </div>
            <div class="widget-content">
                <form action="" method="post">
                    <div class="span2">
                        <div class="form-group">
                            <label for=""></label>
                            <input  onkeyup="searchclient(this.value)" type="text" class="form-control" name="" id="list_search" aria-describedby="helpId" placeholder="Recherche Client">

                        </div>
                    </div>
                    <div class="span2">
                        <div class="form-group">
                            <label for=""></label>
                            <input  type="text" class="form-control" name="nom_cmd" id="nom_cmd" aria-describedby="helpId" placeholder="Nom de Commade">
                            <input type="hidden" name="id_cmd" id="id_client">
                        </div>
                    </div>
                    <div class="span1">
                        <div class="form-group">
                            <label for=""></label>
                            <input onclick="javascript:Ajoutercommand()" type="button" class="btn btn-primary" name="" id="addcommad" value="Crée">
                        </div>
                    </div>


                </form>
                <div class="span2">
                    <button onclick="$('#ajouter_client').modal('show')" class="btn btn-success ">Ajouter Client<i class="icon-user"></i></button>
                </div>
                <div class="span3">
                    <button onclick="$('#list_command').modal('show');" class="btn btn-success ">Choisir Command<i class="icon-th-list"></i></button>
                </div>
                <div class="span12">
                    <div class="span5" id="searchzone">
    <table  class="table ">
    <thead>

    </thead>
    <tbody id="tablesearchclt">
    </tbody></table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
viewcommand();
    $('#tablesearchclt').on('click','#addclt',function(){
        var tab=$(this).closest('tr');
        var id=tab.find('td:eq(0)').text();
        var nom_client=tab.find('td:eq(1)').text();
        var tel_client=tab.find('td:eq(2)').text();

        $('#nom_cmd').val(nom_client+'-'+tel_client);
        $('#id_client').val(id);

    });

    //CLIENT PAR default
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if (this.readyState==4 && this.status==200)
      {
var data=JSON.parse(this.responseText);
        $("#command_id").text(data.id);
        $("#command_nom").text(data.nom);
      }
    }
    xmlhttp.open('POST','./Config/dossier_client/View',true);
    xmlhttp.send();



    //SCRIPT DE SELECTION LA COMMAND OU PUT AJOUTER LES Produit

    $('#tablecommand').on('click','#selectcmd',function(){
      var tab=$(this).closest('tr');
      var id=tab.find('td:eq(0)').text();
      var nom_cmd=tab.find('td:eq(2)').text();
      $("#command_id").text(id);
      $("#command_nom").text(nom_cmd);
      $("#list_command").modal('hide');
    });

});

function Ajoutercommand()
{
  var str= new FormData();
  var id_client=$('#id_client').val();
  var nom_cmd=$('#nom_cmd').val();
  str.append('id_client',id_client);
  str.append('nom_cmd',nom_cmd);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if (this.responseText == 1) {

              alert('bien insert')

          } else {
              alert('bad!!, ')
          }

      }
  }
  xmlhttp.open("POST", "Config/dossier_command/add.php", true);
  xmlhttp.send(str);

}


    function addclient() {

        var str = new FormData();
        var nom_client = $('#ajouter_client #nom_client').val();
        var tel_client = $('#ajouter_client #tel_client').val();
        str.append('nom_client', nom_client);
        str.append('tel_client', tel_client);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
alert('bient insert');

            }
        }
        xmlhttp.open("POST", "Config/dossier_client/add.php", true);
        xmlhttp.send(str);
    }







     // affichier list commandes
     function viewcommand()
     {
       var xmlhttp=new XMLHttpRequest();
       xmlhttp.onreadystatechange=function()
       {
         if (this.readyState==4 && this.status==200) {
           $("#list_command #tablecommand").append(this.responseText);

         }
       }
       xmlhttp.open('POST','./Config/dossier_command/view.php',true);
       xmlhttp.send();
     }

</script>
<!-- Modal add client -->
<div class="modal fade" style="width: 310px;display:none;" id="ajouter_client" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div style="width: 310px;" class="modal-dialog" role="document">
        <form action="" method="post">
            <div style="width: 310px;" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Nom Client :</label>
                        <div class="controls">
                            <input type="text" name="nom_client" id="nom_client">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tel Client :</label>
                        <div class="controls">
                            <input type="text" name="tel_client" id="tel_client">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="javascript:addclient()" type="button" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal list commandes -->
<div style="display:none;" class="modal fade" id="list_command" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<table class="table data_table table-bordered table-inverse table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>ID CLIENT</th>
      <th>NOM COMMAD</th>
      <th>TV</th>
      <th>REMIS</th>
      <th>ETAT</th>
      <th>PRIX TOTAL</th>
      <th>ACTION</th>

    </tr>
  </thead>
  <tbody id="tablecommand">

  </tbody>
</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>





<div class="row-fluid">
    <div class="span6 ">
        <div class="widget-box ">
            <div class="widget-title ">
                <span class="icon "> <i class="icon-list "></i> </span>
                <h5 id="command_nom"></h5><label id="command_id"></label>
            </div>
            <div class="widget-content">
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse ">
                        <tr>
                            <th>CODE</th>
                            <th>DESGIN</th>
                            <th>QUANTITE</th>
                            <th>PRIX</th>
                        </tr>
                    </thead>
                    <tbody id="table2">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="span6 ">
        <div class="widget-box ">
            <div class="widget-title ">
                <span class="icon "> <i class="icon-list "></i> </span>
                <h5>Half Width <code>class=Span6</code></h5>
            </div>
            <div class="widget-content ">
                <div class="span4 ">
                    <input onkeyup="showResult(this.value)" placeholder="Rechercher par Nom" type="text" name="nom" id="nom">

                </div>
                <div class="span4 ">
                    <input onkeyup="showResult(this.value) " placeholder="Rechercher par id" type="text" name="id" id="id">
                </div>
                <style>
                    #table1 tr td {
                        vertical-align: inherit;
                        align-items: center;
                    }

                </style>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMAGE</th>
                            <th>DESIGNATION</th>
                            <th>COEFF</th>
                            <th>PRIX</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="table1">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//fonction pour ajouter les ligne de commandes

$(document).ready(function(){
  $("#table1").on('click','#add',function(){
    var str= new FormData();
var id_cmd=$("#command_id").text();
var currant=$(this).closest('tr');
var id_produit=currant.find('td:eq(0)').text();
var nom_produit=currant.find('td:eq(2)').text();
var quantite=1;
var coeff=currant.find('td:eq(3)').text();
var prix=currant.find('td:eq(4)').text();
var total=quantite*prix;
str.append('id_cmd',id_cmd);
str.append('id_produit',id_produit);
str.append('nom_produit',nom_produit);
str.append('prix',prix);
str.append('quantite',quantite);
str.append('total',total);
alert(id_cmd);
var ligne='<tr>'+
'<td>'+id_produit+'</td>'+
'<td>'+nom_produit+'</td>'+
'<td><input type="number" class="input-mini" value="'+quantite+'" /></td>'+
'<td>'+prix+'</td>'+
'</tr>';



var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function(){

  if (this.readyState==4 && this.status==200) {
    $("#table2").append(ligne);
  }
}
xmlhttp.open('POST','Config/dossier_DetailCommand/add.php',true);
xmlhttp.send(str);



  });
});







    function showResult(str) {
        if (str.length == 0) {
            document.getElementById("table1").innerHTML = "";

            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table1").innerHTML = this.responseText;



            }
        }
        xmlhttp.open("GET", "Config/dossier_varient_produit/view.php?str=" + str, true);
        xmlhttp.send();
    }

    function searchclient(q) {

        while (q.length == 0) {
            document.getElementById("tablesearchclt").innerHTML = "";

            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tablesearchclt").innerHTML = this.responseText;
                if (this.responseText == "") {
                    document.getElementById("tablesearchclt").innerHTML = "ce Client nes pas disponible ";
                    document.getElementById("tablesearchclt").style.color = 'red';

                }



            }
        }
        xmlhttp.open("GET", "Config/dossier_varient_produit/view.php?q=" + q, true);
        xmlhttp.send();


    }

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
