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
function getAllCommand()
{
    $con = getDatabaseConnexion();
    $requete = 'SELECT * from command';
    $rows = $con->query($requete);
while ($data=$rows->fetch()) {

  $ligne='<tr>
<td>'.$data[0].'</td>
<td>'.$data[1].'</td>
<td>'.$data[2].'</td>
<td>'.$data[3].'</td>
<td>'.$data[4].'</td>
<td>'.$data[5].'</td>
<td>'.$data[6].'</td>
<td>
<button id="foldercmd" class="btn btn-primary"> <i class="icon-folder-open"></i> </button>
<button id="selectcmd" class="btn btn-primary"><i class="icon-plus"></i></button>
</td>





  </tr>';
  echo $ligne;
}
}

// creer un user
function createCommand($id_client,$nom,$tv,$remis,$etat,$prix_total)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO command(id_client,nom,tv,remis,etat,prix_total) VALUES (:id_client,:nom,:tv,:remis,:etat,:prix_total)";
      $stmt= $con->prepare($sql);
      $stmt->execute(array(
        'id_client'=>$id_client,
        'nom'=>$nom,
        'tv'=>$tv,
        'remis'=>$remis,
        'etat'=>$etat,
        'prix_total'=>$prix_total
      ));
      $last_id = $con->lastInsertId();
      echo $last_id;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readCommand($id_client)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from command where id_client = '$id_client' ";
    $stmt = $con->query($requete);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

//met � jour le user
function updateCommand($id_client,$nom,$tv,$remis,$etat,$prix_total)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE `command` SET `id_client`=:id_client,`nom`=:nom,`tv`=:tv,`remis`=:remis,`etat`=:etat,`prix_total`=:prix_total WHERE id='$id'";
        $stmt = $con->query($requete);
        $stmt->execute(array(
'id_client'=>$id_client,
'nom'=>$nom,
'tv'=>$tv,
'remis'=>$remis,
'etat'=>$etat,
'prix_total'=>$prix_total
        ));
    } catch (PDOException $e) {
        echo $requete . "<br>" . $e->getMessage();
    }
}

//affecter client a une command déja existe

function affectCommand($id,$id_client,$nom,$total)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE `command` SET `id_client`='$id_client',`nom`='$nom',`prix_total`='$total' WHERE id='$id'";
        $stmt = $con->query($requete);

    } catch (PDOException $e) {
        echo $requete . "<br>" . $e->getMessage();
    }
}









// suprime un user
function deleteCommand($id)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from command where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $requete . "<br>" . $e->getMessage();
    }
}
