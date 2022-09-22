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
        ID para deletar:
        <input type="text" name="a" placeholder="CPF"><br>
    </form>

    <?php

    require ('cad_cont_list.php');

    if (isset($_POST['a'])) {

        $a = $_POST['a'];

        try {
            require ('conexão.php');

            $stmt = $pdo->prepare('DELETE * FROM `site`.`cadastro` WHERE id = :id');

            $stmt -> bindParam(':id' , $id);
            $stmt -> execute();

            echo $stmt->rowCount();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            echo "<br><b>Não Macaco</b>";
        }
    }
    ?>

</body>

</html>