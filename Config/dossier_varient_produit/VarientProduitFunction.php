<?php

require_once('../../connexion.php');

function searchClient($motclef)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from client where nom like :motclef or tel like :tel  ";
    $stmt = $con->prepare($requete);
    $stmt->execute(array(
'motclef'=>'%'.$motclef.'%',
'tel'=>'%'.$motclef.'%'
    ));


   while ( $row = $stmt->fetch()) {
       $ligne='<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td><button class="btn btn-primary" id="addclt"><i class="icon-plus"></i></button></td></tr>';

       echo $ligne;
   }

}

// r�cupere tous les users
function getAllSousProduct()
{
    $tab = array();
    $con = getDatabaseConnexion();
    $requete = 'SELECT * from sous_produit';
    $rows = $con->query($requete);
    while ($data=$rows->fetch())
    {
        $ligne='
        <tr>
        <td>'.$data[0].'</td>
        <td><img width="50" height="50" src="./'.$data[6].'" ></td>
        <td>'.$data[1].'</td>
        <td>'.$data[2].'</td>
        <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
        <td>'.$data[5].'</td>


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
function createSousProduct($id,$id_pp,$designation,$unite,$rapport,$prix_vent,$description,$imges)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO `sous_produit`(`id`,`id_pp`,`designation`,`unite`,`rapport`,`prix_vent`,`description`,`images`)
        VALUES ('$id','$id_pp','$designation','$unite','$rapport','$prix_vent','$description','$imges')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user par id produit pere
function readSousProduct($id)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from sous_produit where id_pp = '$id' ";
    $stmt = $con->query($requete);
    $ligne=array();
        while ($data=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $ligne[]=$data;
            

        }
        echo json_encode($ligne);

}
//* recupere varient produit par code bar

function getvarient($id)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from sous_produit where id = '$id' ";
    $stmt = $con->query($requete);
    $ligne=array();
        while ($data=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $ligne[]=$data;
            

        }
        echo json_encode($ligne);

}

//met � jour le user
function updateSousProduct($ed_id,$ed_designation,$ed_unite,$ed_rapport,$ed_prix_vent,$ed_description,$ed_imges)
{
    $sql = "errur";
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE sous_produit SET designation='$ed_designation',unite='$ed_unite',rapport=$ed_rapport,prix_vent=$ed_prix_vent,description='$ed_description',images='$ed_imges' WHERE id ='$ed_id'";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// suprime un user
function deleteSousProduct($id)
{
    $sql = "errur";
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from sous_produit where id = '$id' ";
        $stmt = $con->query($requete);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


//SEARCH SOUS PRODUICT BY ID OR NAME//
function SearchSousProduct($id)
{
    $con = getDatabaseConnexion();
    $requete = "SELECT * from sous_produit where id_pp LIKE :id OR designation LIKE :motclef ";
    $stmt = $con->prepare($requete);
    $stmt->execute(array(
        'id'=>'%'.$id.'%',
        'motclef'=>'%'.$id.'%'
    ));
        while ($data=$stmt->fetch())
        {
            $ligne='
            <tr>
            <td>'.$data[0].'</td>
            <td><img class="rounded" style="width: 50px; height: 50px" src="./'.$data[7].'" ></td>
            <td style="display:none;">'.$data[1].'</td>
            <td>'.$data[2].'</td>
            <td style="display:none;">'.$data[4].'</td>
            <td style="display:none;">'.$data[5].'</td>
            <td>
            <button id="add" class="btn btn-primary">
            <i class="icon-plus"></i>
        </button>

            </td>

            </tr>
            ';
            echo $ligne;
        }

}
