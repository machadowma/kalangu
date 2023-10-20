<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include("banco_dados_conexao.php");
    try {
      $id = $_GET['id'];
      $stmt = $dbh->prepare("DELETE FROM calango WHERE id = ?");
      $stmt->bindParam( 1, $id );
      if($stmt->execute()) {
        echo "Dado excluído com sucesso!";
      }
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
  }
?>

<br><br>
<a href="lista.php">Voltar</a>
    
</body>
</html>