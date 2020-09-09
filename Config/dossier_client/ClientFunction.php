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
function getAllClients()
{
    $con = getDatabaseConnexion();
    $requete = 'SELECT * from client';
    $rows = $con->query($requete);
    while ($data = $rows->fetch()) {


$ligne=array(
  "id_clt"=> $data[0],
    "nom_clt"=>$data[1],
      "tel_clt"=>$data[2],
      "adresse_clt"=>$data[3],
      "ville_clt"=>$data[4],
      "paye"=>$data[5]
    );

        echo json_encode(array("getall"=>$ligne));
    }
}

// creer un user
function createClient($nom, $tel, $adresse, $ville, $paye)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO client (nom, tel, adresse, ville,paye)
                VALUES ('$nom', '$tel', '$adresse' ,'$ville','$paye')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readClient()
{
$id=89;
    $con = getDatabaseConnexion();
    $requete = "SELECT * from client where id = '$id' ";
    $row = $con->query($requete);

while ($data=$row->fetch())
{

echo json_encode(array("id"=>$data[0],"nom"=>$data[1]));

}


}

//met � jour le user
function updateClient($id, $nom, $tel, $adresse, $ville, $paye)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE client set
                    nom = '$nom',
                    tel = '$tel',
                    adresse = '$adresse',
                    ville = '$ville',
                    paye='$paye'
                    where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $requete . "<br>" . $e->getMessage();
    }
}

// suprime un user
function deleteClient($id)
{
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from client where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// Search client par Nom ou Telephone
