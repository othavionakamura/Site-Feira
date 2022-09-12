<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <form method="post">
        Digite seu CPF:
        <input type="text" name="a" placeholder="CPF"><br>

        Digite seu nome:
        <input type="text" name="b" placeholder="NOME"><br>

        Digite seu telefone:
        <input type="text" name="c" placeholder="TEL"><br>

        Digite seu email:
        <input type="text" name="d" placeholder="EMAIL">
        <input type="submit" value="Enviar">
    </form>

    <form method="POST" enctype="multipart/form-data">
        <label for="conteudo">Enviar imagem:</label>
        <input type="file" name="pic" accept="image/*" class="form-control">

        <div align="center">
            <button type="submit" class="btn btn-success">Enviar imagem</button>
        </div>
    </form>

</body>

</html>

<?php
if (isset($_POST['a'])) {

    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];

    try {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=site', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo ("<br><br>Macaco");

        $stmt = $pdo->prepare('INSERT INTO `site`.`cadastro` VALUES (:cpf, :nome, :telefone, :email)');

        $stmt->execute(array(
            ':cpf' => $a,
            ':nome' => $b,
            ':telefone' => $c,
            ':email' => $d
        ));

        echo $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "<br><b>Não Macaco</b>";
    }
}

if (isset($_FILES['pic'])) {
    $ext = strtolower(substr($_FILES['pic']['name'], -4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $aux = $new_name;
    $dir = 'images/'; //Diretório para uploads

    move_uploaded_file($_FILES['pic']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
    echo '<div class="alert alert-success" role="alert" align="center">
          <img src="images/' . "$aux" . '" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem enviada com sucesso!
          <br>
          <a href="exemplo_upload_de_imagens.php">
          <button class="btn btn-default">Enviar nova imagem</button>
          </a></div>';

    echo "$aux";
    echo "$new_name";
}
?>