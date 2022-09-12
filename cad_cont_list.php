<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .img{
            height: 100px;
        }
    </style>
</head>
<body>
    <?php
        require ('conexão.php');
        try {
            $stmt = $pdo -> query('SELECT * FROM site . cadastro;');
            
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<img src='images/{$linha['foto_perfil']}' class='img'>{$linha['nome']}<br>";
            }
        }

        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            echo "<br><b>Não Conectado</b>";
        }
    ?>
</body>
</html>