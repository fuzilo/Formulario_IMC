<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tabela</title>
</head>
<body>
    <?php
    require_once("conexao.php");

    $sql="CREATE TABLE IF NOT EXISTS cadastro(
        id int(6) auto_increment primary key,
        nome varchar(50) not null,
        idade int(3) not null,
        altura double not null,
        peso double not null, 
        imc double,
        situacao varchar(20)
    )";

        $conexao=novaConexao();
        $resultado=$conexao->query($sql);

        if($resultado){
            echo"Tabela criada com sucesso";
        } else{
                echo "Erro.".$conexao->$error;
        }

        $conexao->close();

    ?>
    
</body>
</html>