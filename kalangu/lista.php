<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calangos</h1>

    <table>
        <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Cor</th>
        <th>Detalhe</th>
        </tr>

    <?php
          include("banco_dados_conexao.php");
          try {
            $sth = $dbh->prepare('SELECT * from calango');
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)) {
              foreach($result as $row) {
                echo "<tr>";
                echo "<td>". $row["id"] ."</td>";
                echo "<td>". $row["nome"] ."</td>";
                echo "<td>". $row["cor"] ."</td>";
                echo "<td>". $row["detalhes"] ."</td>";
                echo "<td><a href='excluir.php?id=".$row["id"]."'>Excluir</a></td>";
                echo "<td><a href='alterar_form.php?id=".$row["id"]."'>Alterar</a></td>";
                echo "</tr>";
              }
            } 
            $dbh = null;
          } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
          }
        ?>

</table>

    <br><br>
<a href="index.php">Voltar</a>
    
</body>
</html>