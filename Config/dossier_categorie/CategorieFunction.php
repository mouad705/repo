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
  function getAllCategorie()
  {
      $con = getDatabaseConnexion();
      $requete = 'SELECT * from categorie';
      $rows = $con->query($requete);
  return $rows;
  }

  // creer un user
  function createCategorie($nom, $description)
  {
      try {
          $con = getDatabaseConnexion();
          $sql = "INSERT INTO categorie (nom, descriptions)
                  VALUES ('$nom', '$description')";
          $con->exec($sql);
      } catch (PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
  }

  //recupere un user
  function readCategorie($id)
  {
      $con = getDatabaseConnexion();
      $requete = "SELECT * from categorie where id = '$id' ";
      $stmt = $con->query($requete);
      $row = $stmt->fetchAll();
      if (!empty($row)) {
          return $row[0];
      }
  }

  //met � jour le user
  function updateCategorie($id, $nom, $description)
  {
      try {
          $con = getDatabaseConnexion();
          $requete = "UPDATE categorie set
                      nom = '$nom',
                      descriptions = '$description'

                      where id = '$id' ";
          $stmt = $con->query($requete);
      } catch (PDOException $e) {
          echo $requete . "<br>" . $e->getMessage();
      }
  }

  // suprime un user
  function deleteCategorie($id)
  {
      try {
          $con = getDatabaseConnexion();
          $requete = "DELETE from categorie where id = '$id' ";
          $stmt = $con->query($requete);
      } catch (PDOException $e) {
          echo $requete . "<br>" . $e->getMessage();
      }
  }
