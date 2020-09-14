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
function getAllUsers()
{
    $tab = array();
    $con = getDatabaseConnexion();
    $requete = 'SELECT * from utilisateur';
    $rows = $con->query($requete);
    while ($data=$rows->fetch())
    {
        $ligne='
        <tr>
        <td>'.$data[0].'</td>
        <td><img width="50" height="50" src="./'.$data[5].'" ></td>
        <td>'.$data[1].'</td>
        <td>'.$data[2].'</td>
        <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
        <td>'.$data[6].'</td>
        <td>
        <button id="edite" class="btn btn-primary"><i class="icon-edit"></i></button>
        <button id="delete" class="btn btn-danger"><i class="icon-trash"></i></button>
        <button id="view" class="btn btn-default"><i class="icon-eye-open"></i></button>

        </td>

        </tr>
        ';
        echo $ligne;
    }


}

// creer un user
function createUser($nom, $logins, $passwords, $descriptions, $images, $etat)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO utilisateur (nom, logins, passwords, descriptions,images,etat)
					VALUES ('$nom','$logins', '$passwords', '$descriptions','$images','$etat')";
        $con->exec($sql);
        header('Location: ../../index.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readUser($id)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from utilisateur where id = '$id' ";
    $stmt = $con->query($requete);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

//met � jour le user
function updateUser($id, $nom, $logins, $passwords, $descriptions, $images, $etat)
{
    $sql = "errur";
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE utilisateur set
						nom = '$nom',
						logins = '$logins',
						passwords = '$passwords',
						descriptions = '$descriptions',
                        images='$images',
                        etat='$etat'
						where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// suprime un user
function deleteUser($id)
{
    $sql = "errur";
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from utilisateur where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
