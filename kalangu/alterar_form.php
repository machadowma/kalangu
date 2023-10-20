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
      $stmt = $dbh->prepare("SELECT * FROM calango WHERE id = ?");
      $stmt->bindParam( 1, $id );
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
  }
?>


    <h1>Alterar Calango</h1>
    <form action="alterar_action.php" method="POST">
    Nome: <input type="text" name="nome" value="<?php echo $result[0]["nome"];?>">
    <br>
    Cor: <input type="text" name="cor" value="<?php echo $result[0]["cor"];?>">
    <br>
    Detalhe: <input type="text" name="detalhe" value="<?php echo $result[0]["detalhes"];?>">
    <br>
    <input type="hidden" name="id" value="<?php echo $result[0]["id"];?>">
    <input type="submit" value="Ok">
    </form>

    <br><br>
<a href="index.php">Voltar</a>
</body>
</html>