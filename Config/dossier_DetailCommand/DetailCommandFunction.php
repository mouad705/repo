<?php
function getDatabaseConnexion()
{
    try {
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=db_ventes', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

// r�cupere tous les users
function getAlldetailcommand()
{
    $con = getDatabaseConnexion();
    $requete = 'SELECT * from detailcommand';
    $rows = $con->query($requete);
    while ($data = $rows->fetch()) {

        $ligne = '<tr>
<td>' . $data[0] . '</td>
<td>' . $data[1] . '</td>
<td>' . $data[2] . '</td>
<td>' . $data[3] . '</td>
<td>' . $data[4] . '</td>
<td>' . $data[5] . '</td>
<td>' . $data[6] . '</td>
<td>
<button class="btn btn-primary"> <i class="icon-folder-open"></i> </button>
<button id="selectcmd" class="btn btn-primary"> <i class="icon-plus"></i> </button>
</td>





  </tr>';
        echo $ligne;
    }
}

// creer un user
function createdetailcommand($id_cmd, $id_produit, $nom_produit, $prix, $quantite, $total)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO detailcommand(id_cmd,id_produit,nom_produit,prix,quantite,total) VALUES (:id_cmd,:id_produit,:nom_produit,:prix,:quantite,:total)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array(
            'id_cmd' => $id_cmd,
            'id_produit' => $id_produit,
            'nom_produit' => $nom_produit,
            'prix' => $prix,
            'quantite' => $quantite,
            'total' => $total
        ));
        $last_id = $con->lastInsertId();
        echo $last_id;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readdetailcommand($id_cmd)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from detailcommand where id_cmd = '$id_cmd' ";
    $stmt = $con->query($requete);
    $ligne = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $ligne[] = $row;
    }
    echo json_encode($ligne);
}

//met � jour le user
function updatedetailcommand($id, $nom, $tv, $remis, $etat, $prix_total)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE `detailcommand` SET `id_client`=:id_client,`nom`=:nom,`tv`=:tv,`remis`=:remis,`etat`=:etat,`prix_total`=:prix_total WHERE id='$id'";
        $stmt = $con->query($requete);
        $stmt->execute(array(
            'id_client' => $id,
            'nom' => $nom,
            'tv' => $tv,
            'remis' => $remis,
            'etat' => $etat,
            'prix_total' => $prix_total
        ));
    } catch (PDOException $e) {
        echo $requete . "<br>" . $e->getMessage();
    }
}

// suprime un user
function deletedetailcommand($id)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from detailcommand where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $requete . "<br>" . $e->getMessage();
    }
}
