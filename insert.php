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
        <input type="text" name="cpf" placeholder="CPF"><br>
    </form>

    <?php

        if (isset($_POST['cpf'])) {

            $cpf = $_POST['cpf'];

            try {
                require ('conexão.php');

                $stmt = $pdo->prepare('DELETE FROM cadastro where cpf=:cpf;');

                $stmt -> bindParam(':cpf' , $cpf);
                $stmt -> execute();

                echo $stmt->rowCount();

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                echo "<br><b>Não Macaco</b>";
            }
        }
        require ('cad_cont_list.php')
    ?>

</body>

</html>