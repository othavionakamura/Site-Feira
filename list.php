<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="file" name="a">
        <input type="submit" value="Enviar">
    </form>
</body>

<?php

    try {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=site','root','');
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo("<br>Conectado<br>");

        $stmt = $pdo -> query('SELECT * FROM site . imagem;');

        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<img src='{$linha['img']}'><br>";
        }
    }

    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "<br><b>Não Conectado</b>";
    }
?>

</html>