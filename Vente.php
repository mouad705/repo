<div class="row-fluid">
  <div class="span12">
    <div style="display: grid" class="widget-box">
      <div class="widget-title">
        <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Full Width <code>class=Span12</code></h5>
      </div>
      <div class="widget-content">
        <form action="" method="post">
          <div class="span2">
            <div class="form-group">
              <label for=""></label>
              <input onkeyup="searchclient(this.value)" type="text" class="form-control" name="" id="list_search"
                aria-describedby="helpId" placeholder="Recherche Client" />
            </div>
          </div>
          <div class="span2">
            <div class="form-group">
              <label for=""></label>
              <input type="text" class="form-control" name="nom_cmd" id="nom_cmd" value="Guest"
                aria-describedby="helpId" placeholder="Nom de Commade" />
              <input type="hidden" value="89" name="id_client" id="id_client" />
            </div>
          </div>
          <div class="span1">
            <div class="form-group">
              <label for=""></label>
              <input onclick="javascript:Ajoutercommand()" type="button" class="btn btn-primary" name="" id="addcommad"
                value="Crée" />
            </div>
          </div>
        </form>
        <div class="span2">
          <button onclick="$('#ajouter_client').modal('show')" class="btn btn-success">
            Ajouter Client<i class="icon-user"></i>
          </button>
        </div>
        <div class="span3">
          <button onclick="$('#list_command').modal('show')" class="btn btn-success">
            Choisir Command<i class="icon-th-list"></i>
          </button>
        </div>
        <div class="span12">
          <div class="span5" id="searchzone">
            <table class="table">
              <thead></thead>
              <tbody id="tablesearchclt"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal add client -->
<div class="modal fade" style="width: 310px; display: none" id="ajouter_client" tabindex="-1" role="dialog"
  aria-labelledby="modelTitleId" aria-hidden="true">
  <div style="width: 310px" class="modal-dialog" role="document">
    <form action="" method="post">
      <div style="width: 310px" class="modal-content">
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
              <input type="text" name="nom_client" id="nom_client" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tel Client :</label>
            <div class="controls">
              <input type="text" name="tel_client" id="tel_client" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button onclick="javascript:addclient()" type="button" class="btn btn-primary">
            Ajouter
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal list commandes -->
<div style="display: none" class="modal fade" id="list_command" tabindex="-1" role="dialog"
  aria-labelledby="modelTitleId" aria-hidden="true">
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
          <tbody id="tablecommand"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!--*************** vente par lecteur code bar *******/ -->

<div class="row-fluid">
  <div class="span6">
    <div class="col">
      <label for="">Quanite :</label>
      <input type="number" name="" value="" />
    </div>
    <div class="col">
      <label for="">Code Produite :</label>
      <input id="codebar" type="text" name="ad_prod_id" />
      <input id="hide_quantite" type="hidden" name="" />
    </div>
  </div>
  <div class="span6">
    <div style="display: none;" class="alert alert-danger" role="alert">
      <strong></strong>
    </div>
    <div style="display: none;" class="alert alert-success" role="alert">
      <strong></strong>
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function () {
    function autoSave() {
      var id = $("#codebar").val();

      if (id) {
        vent(id);
      } else {
        $(".alert-danger strong").text("");
        $(".alert-danger strong").text("Scanner Par Lecteur Code Bar Svp");
        $(".alert-danger").fadeIn();
        $(".alert").fadeOut("slow");
      }
      // return true;
    }
    setInterval(function () {
      autoSave();

    }, 5000);
  });
</script>

<!--/***********************************************/-->
<div class="row-fluid">
  <div class="span6">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon"> <i class="icon-list"></i> </span>
        <h5 id="command_nom"></h5>
        <label id="command_id"></label>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-inverse table-responsive">
          <thead class="thead-inverse">
            <tr>
              <th>ID</th>
              <th>CODE</th>
              <th>DESGIN</th>
              <th>QUANTITE</th>
              <th>PRIX</th>
              <th>TOTAL</th>
            </tr>
          </thead>
          <tbody id="table2"></tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Half Width <code>class=Span6</code></h5>
      </div>
      <div class="widget-content">
        <div class="span4">
          <input onkeyup="showResult(this.value)" placeholder="Rechercher par Nom" type="text" name="nom" id="nom" />
        </div>
        <div class="span4">
          <input onkeyup="showResult(this.value) " placeholder="Rechercher par id" type="text" name="id" id="id" />
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
              <th style="display: none">CODE</th>
              <th>IMAGE</th>
              <th>DESIGNATION</th>
              <th style="display: none">COEFF</th>
              <th style="display: none">PRIX</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody id="table1"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    /*function check(e)
  {
  alert(e.keyCode);
  }*/
    /*
  document.onkeydown = function(e) {
          if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {//Alt+c, Alt+v will also be disabled sadly.
              window.location.href = "./";
          }
          return false;
  };
  */

    var id_client = $("#id_client").val();
    var nom_cmd = $("#nom_cmd").val();
    getclient();
    viewcommand();
    Ajoutercommand(id_client, nom_cmd);
    $("#tablesearchclt").on("click", "#addclt", function () {
      var tab = $(this).closest("tr");
      var id = tab.find("td:eq(0)").text();
      var nom_client = tab.find("td:eq(1)").text();
      var tel_client = tab.find("td:eq(2)").text();

      $("#nom_cmd").val(nom_client + "-" + tel_client);
      $("#id_client").val(id);
    });

    //SCRIPT DE SELECTION LA COMMAND OU PUT AJOUTER LES Produit
    $("#tablecommand").on("click", "#selectcmd", function () {
      var tab = $(this).closest("tr");
      var id = tab.find("td:eq(0)").text();
      var nom_cmd = tab.find("td:eq(2)").text();
      $("#command_id").text(id);
      $("#command_nom").text(nom_cmd);
      $("#list_command").modal("hide");
    });
  });
  //CLIENT PAR default

  /**********************************************************/
  function Ajoutercommand(id_client, nom_cmd) {
    var str = new FormData();

    str.append("id_client", id_client);
    str.append("nom_cmd", nom_cmd);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Config/dossier_command/add.php", true);
    xmlhttp.send(str);

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == this.responseText) {
          $("#command_id").text(this.responseText);
          alert(this.responseText);
        } else {
          alert("bad!!, ");
        }
      }
    };
  }

  /*************************************************************/
  function addclient() {
    var str = new FormData();
    var nom_client = $("#ajouter_client #nom_client").val();
    var tel_client = $("#ajouter_client #tel_client").val();
    str.append("nom_client", nom_client);
    str.append("tel_client", tel_client);
    str.append("action", "add1");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        alert("bient insert");
      }
    };
    xmlhttp.open("POST", "Config/dossier_client/add.php", true);
    xmlhttp.send(str);
  }
  /*********************************************************************/
  // affichier list commandes
  function viewcommand() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        $("#list_command #tablecommand").html(this.responseText);
      }
    };
    xmlhttp.open("POST", "./Config/dossier_command/view.php", true);
    xmlhttp.send();
  }
  /*************************************************/
  function vent(id_produit) {
    var quantit_pp;

    $.ajax({
      type: "POST",
      url: "Config/dossier_varient_produit/view.php",
      data: {
        id_sp: id_produit
      },
      success: function (data) {
        var row = JSON.parse(data);
        for (i = 0; i < row.length; i++) {
          var id_pp = row[i].id_pp;
          var quantite = 1;
          var coeff = row[i].rapport;
          var prix = row[i].prix_vent;
          var total = quantite * prix;
          var total_sp = coeff * quantite;
          var nom_produit = row[i].designation;
        }
        $("input[name=ad_prod_id").val("");
        $.ajax({
          type: "POST",
          url: "Config/dossier_produit/view.php",
          data: {
            id_pp: id_pp
          },
          success: function (data) {
            $("#hide_quantite").val(data);
          },
        });

        //   var test = $("#hide_quantite").val();
        var id_cmd = $("#command_id").text();
        //   if (test > total_sp) {
        addlignecommand(
          id_cmd,
          id_produit,
          nom_produit,
          prix,
          quantite,
          total
        );
        update_quantite_produite(total_sp, id_pp);
        $("input[name=ad_prod_id").val("");

        //  }
      },
    });
  }
  //modifier la quantite de produit pere pour chaque ligne de commande ajouter

  function update_quantite_produite(total_sp, id_pp) {
    $.ajax({
      type: "POST",
      url: "./Config/dossier_produit/edite.php",
      data: {
        total_sp: total_sp,
        id_pp: id_pp
      },
      success: function (data) {
        $(".alert-success strong").text("");
        $(".alert-success strong").text("Bien Ajouter");
        $(".alert-success").fadeIn();
        $(".alert-success").fadeOut(2000, "slow");

      }
    });
  }

  // ajouter un ligne de commande a la commande de client
  function addlignecommand(
    id_cmd,
    id_produit,
    nom_produit,
    prix,
    quantite,
    total
  ) {
    var str = new FormData();
    str.append("id_cmd", id_cmd);
    str.append("id_produit", id_produit);
    str.append("nom_produit", nom_produit);
    str.append("prix", prix);
    str.append("quantite", quantite);
    str.append("total", total);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var ligne =
          "<tr>" +
          "<td>" +
          this.responseText +
          "</td>" +
          "<td>" +
          id_produit +
          "</td>" +
          "<td>" +
          nom_produit +
          "</td>" +
          '<td><input type="number" class="input-mini" value="' +
          quantite +
          '" /></td>' +
          "<td>" +
          prix +
          "</td>" +
          "<td>" +
          total +
          "</td>" +
          "</tr>";
        $("#table2").append(ligne);
      }
    };
    xmlhttp.open("POST", "Config/dossier_DetailCommand/add.php", true);
    xmlhttp.send(str);
  }
  $(document).ready(function () {
    $("#table1").on("click", "#add", function () {
      var str = new FormData();
      var id_cmd = $("#command_id").text();
      var currant = $(this).closest("tr");
      var id_produit = currant.find("td:eq(0)").text();
      var nom_produit = currant.find("td:eq(3)").text();
      var quantite = 1;
      var coeff = currant.find("td:eq(4)").text();
      var prix = currant.find("td:eq(5)").text();
      var total = quantite * prix;
      str.append("id_cmd", id_cmd);
      str.append("id_produit", id_produit);
      str.append("nom_produit", nom_produit);
      str.append("prix", prix);
      str.append("quantite", quantite);
      str.append("total", total);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var ligne =
            "<tr>" +
            "<td>" +
            this.responseText +
            "</td>" +
            "<td>" +
            id_produit +
            "</td>" +
            "<td>" +
            nom_produit +
            "</td>" +
            '<td><input type="number" class="input-mini" value="' +
            quantite +
            '" /></td>' +
            "<td>" +
            prix +
            "</td>" +
            "</tr>";
          $("#table2").append(ligne);
        }
      };
      xmlhttp.open("POST", "Config/dossier_DetailCommand/add.php", true);
      xmlhttp.send(str);
    });
  });
  /***************************************************/
  function testquantitestock(id_pp) {}
  /**********************************************/
  function showResult(str) {
    if (str.length == 0) {
      document.getElementById("table1").innerHTML = "";

      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("table1").innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      "Config/dossier_varient_produit/view.php?str=" + str,
      true
    );
    xmlhttp.send();
  }

  function searchclient(q) {
    while (q.length == 0) {
      document.getElementById("tablesearchclt").innerHTML = "";

      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tablesearchclt").innerHTML = this.responseText;
        if (this.responseText == "") {
          document.getElementById("tablesearchclt").innerHTML =
            "ce Client nes pas disponible ";
          document.getElementById("tablesearchclt").style.color = "red";
        }
      }
    };
    xmlhttp.open("GET", "Config/dossier_varient_produit/view.php?q=" + q, true);
    xmlhttp.send();
  }

  function getclient() {
    var id = 89;
    $.post("./Config/dossier_client/view.php", {
      id: id
    }, function (
      data,
      textStatus,
      xhr
    ) {
      $("#command_nom").text(data);
    });
  }
</script>