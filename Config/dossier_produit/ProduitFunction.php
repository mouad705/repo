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
function getAllProduct()
{
    $tab = array();
    $con = getDatabaseConnexion();
    $requete = 'SELECT * from produit';
    $rows = $con->query($requete);
    while ($data=$rows->fetch())
    {
        $ligne='
        <tr>
        <td>'.$data[0].'</td>
        <td><img width="50" height="50" src="./'.$data[7].'" ></td>
        <td>'.$data[1].'</td>
        <td>'.$data[2].'</td>
        <td>'.$data[3].'</td>
        <td> <input style="width: 94px;" type="color" value="'.$data[5].'"/></td>
        <td>'.$data[4].'</td>
        <td>'.$data[6].'</td>
        <td>'.$data[8].'</td>
        <td>'.$data[9].'</td>

        <td>
        <button id="edite" class="btn btn-primary">Edite</button>
        <button id="delete" class="btn btn-danger">Delete</button>
        <button id="view" class="btn btn-default">View</button>

        </td>

        </tr>
        ';
        echo $ligne;
    }


}

// creer un user
function createProduct($id,$designation,$Command, $unite, $quantit, $color, $date,$imges,$etat,$stocklimit)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO `produit`(`id`,`designation`,`Command`, `unite`, `quantit`, `color`, `date`, `imges`, `etat`, `stocklimit`)
        VALUES ('$id','$designation','$Command','$unite','$quantit','$color','$date','$imges','$etat','$stocklimit')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readProduct($id)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from produit where id = '$id' ";
    $stmt = $con->query($requete);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

//met � jour le user
function updateProduct($id,$designation,$Command, $unite, $quantit, $color, $date,$imges,$etat,$stocklimit)
{
    $sql = "errur";
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE `produit` SET `designation`='$designation',`Command`='$Command',`unite`='$unite',`quantit`='$quantit',`color`='$color',`date`='$date',`imges`='$imges',`etat`='$etat',`stocklimit`='$stocklimit' WHERE id='$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// suprime un user
function deleteProduct($id)
{
    $sql = "errur";
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from produit where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
