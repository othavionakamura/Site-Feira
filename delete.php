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
        <input type="text" name="id">
        <input type="submit" value="Deletar">
    </form>
    <?php
        require('cad_cont_list.php');
        
        if(isset($_POST['id'])){
            
            $id = $_POST['id'];

            try {
                $pdo = new PDO('mysql:host=localhost:3306;dbname=site','root','');
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo("<br><br>Deletado ");

                $stmt = $pdo->prepare('DELETE * FROM `site`.`cadastro` where cpf = :id');
                $stmt -> bindParam(':id' , $id);
                $stmt -> execute();

                echo $stmt->rowCount();
            }
            catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                echo "<br><b>Não Macaco</b>";
            }
        }

    ?>
</body>
</html>
