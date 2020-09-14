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

       $ligne =
       '<tr>'.
      '<td>' .$data[0]. '</td>'.
      '<td>' .$data[1]. '</td>'.
      '<td>' .$data[2]. '</td>'.
      '<td>' .$data[3]. '</td>'.
      '<td>' .$data[4]. '</td>'.
      '<td>' .$data[5]. '</td>'.
      '<td>'.
      '<button id="edite" class="btn btn-primary"><i class="icon-edit"></i></button>'.
      '<button id="delete" class="btn btn-danger"><i class="icon-trash"></i></button>'.
      '<button id="view" class="btn btn-default"><i class="icon-eye-open"></i></button>'.

      '</td>'.

    '</tr>';
    echo $ligne;
    }
}

// creer un user
function createClient($nom,$tel,$adresse,$ville,$paye)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO client (nom,tel,adresse,ville,paye)
                VALUES ('$nom','$tel','$adresse','$ville','$paye')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readClient($id)
{

    $con = getDatabaseConnexion();
    $requete = "SELECT * from client where id = '$id' ";
    $row = $con->query($requete);

while ($data=$row->fetch())
{

echo $data['nom'];

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
