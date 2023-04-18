<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
   
    </style>

    <title>Cálculo de IMC</title>
</head>


<body>
    <h1>Formulario de IMC</h1>



    <?php
    $erros = [];
    //echo $erros();
    if (count($_POST) > 0) {

        $dados = $_POST;
        if (trim($dados['nome']) === "") {
            $erros['nome'] = "Digite o nome";
        }

        if (isset($dados['nascimento'])) {
            $data = DateTime::createFromFormat('Y', $dados['nascimento']);
            if (!$data) {
                $erros['nascimento'] = "A data de nascimento deverá estar no formato aaaa";
            }
        }
/* 
        $pesoConfig = ['options' => ['decimal' => ',']];
        if (!filter_var($dados['peso'], FILTER_VALIDATE_FLOAT, $pesoConfig)) {
            $erros['peso'] = "Valor de peso inválido!, Utilize a vírgula(,) para separar a casa decimal";
        }
        $alturaConfig = ['options' => ['decimal' => ',']];
        if (!filter_var($dados['altura'], FILTER_VALIDATE_FLOAT, $alturaConfig)) {
            $erros['altura'] = "Valor de Altura inválida! Utilize a vírgula(,) para separar a casa decimal";
        }

 */



    }
    ?>



    
    <div class="card bg-light mb-3" style="max-width: 30rem; position:">
  <div class="card-header">Calculadora de IMC</div>
  <div class="card-body">
    <h4 class="card-title">Insira os dados do usuário</h4>
    
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-mod-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control <?php echo isset($erros['nome']) ? 'is-invalid' : '' ?>" id="id_nome"
                    name="nome" placeholder="Nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : '' ?>">
                <div class="invalid-feedback">
                    <!-- O value, que é importante, vai receber um nome, através de um operador ternário, que é um if else simples, se der errado, mosstra mensagem de erro, e não prossegue, se estiver ok, o value, recebe o valor inserido no formulario e que poderá ser lido pelo botão submit, através do POST -->
                    <?php echo $erros['nome']; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-mod-8">
                    <label for="nome">Data de Nascimento</label>
                    <input type="text" class="form-control <?php echo isset($erros['nascimento']) ? 'is-invalid' : '' ?>"
                        id="id_nascimento" name="nascimento" placeholder="Data de Nascimento"
                        value="<?php echo isset($_POST['nascimento']) ? $_POST['nascimento'] : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $erros['nascimento']; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-mod-6">
                        <label for="nome">Peso</label>
                        <input type="text" class="form-control <?php echo isset($erros['peso']) ? 'is-invalid' : '' ?>"
                            id="id_peso" name="peso" placeholder="Peso"
                            value="<?php echo isset($_POST['peso']) ? $_POST['peso'] : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo $erros['peso']; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-mod-6">
                            <label for="nome">Altura</label>
                            <input type="text"
                                class="form-control <?php echo isset($erros['altura']) ? 'is-invalid' : '' ?>"
                                id="id_altura" name="altura" placeholder="Altura"
                                value="<?php echo isset($_POST['altura']) ? $_POST['altura'] : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo $erros['altura']; ?>
                            </div>
                        </div>



                        <input type="submit" name="btn" id="calcular" value="Calcular">
                        
  </div>
</div>

                         

                        <br>
                        <input type="submit" name="btn" id="gravar" value="Gravar">
                        <br>

                        <!-- /*olhar 10_ Inserir dados 02 php*/ -->
                        <?php
                        $op = $_POST["btn"];

                        if ($op == "Calcular") {

                            $nome = $_POST["nome"];
                            $ano = $_POST["nascimento"];
                            $altura = $_POST["altura"];
                            $peso = $_POST["peso"];
                            $imc;
                            $situacao;
                            $idade;


                            $idade = (date("Y") - $ano);
                            $imc = ($peso) / ($altura*$altura);
                            echo "<br>";

                            if ($imc < "18.5") {
                                $situacao = "Magreza";
                            } elseif ($imc >= "18.5" || $imc < "25") {
                                $situacao = "Normal";
                            } elseif ($imc >= "25" || $imc < "30") {
                                $situacao = "Sobrepeso";
                            } elseif ($imc >= "30" || $imc < "35") {
                                $situacao = "Obesidade Grau I";
                            } elseif ($imc >= "35" || $imc < "40") {
                                $situacao = "Obesidade Grau II";
                            } else {
                                $situacao = "Obesidade Grau III";
                            }


                            echo "Olá! $nome, você tem $idade anos, seu IMC é $imc, e trata-se de $situacao";
                            echo "<br>";
                          
                             $imc_resultado=[];
                            $imc_resultado['nome']=$nome;
                            $imc_resultado['idade']=$idade;
                            $imc_resultado['altura']=$altura;
                            $imc_resultado['peso']=$peso;
                            $imc_resultado['imc']=$imc;
                            $imc_resultado['situacao']=$situacao;

                            echo $imc_resultado['nome'];
                            echo $imc_resultado['idade'];
                            echo $imc_resultado['altura'];
                            echo $imc_resultado['peso'];
                            echo $imc_resultado['imc'];
                            echo $imc_resultado['situacao'];


                        } else if ($op == "Gravar") {
                        

                            echo "vai dar certo";
/* 
                            $imc_resultado=$_POST[nome];
                            $imc_resultado=$_POST['idade'];
                            $imc_resultado=$_POST['altura'];
                            $imc_resultado=$_POST['peso'];
                            $imc_resultado=$_POST['imc'];
                            $imc_resultado=$_POST['situacao']; */
/* 
                            echo $imc_resultado['nome'];
                            echo $imc_resultado['idade'];
                            echo $imc_resultado['altura'];
                            echo $imc_resultado['peso'];
                            echo $imc_resultado['imc'];
                            echo $imc_resultado['situacao']; */

                            $nome = $_POST["nome"];
                            $ano = $_POST["nascimento"];
                            $altura = $_POST["altura"];
                            $peso = $_POST["peso"];
                            $imc;
                            $situacao;
                            $idade;


                            $idade = (date("Y") - $ano);
                            $imc = ($peso) / ($altura*$altura);
                            echo "<br>";

                            if ($imc < "18.5") {
                                $situacao = "Magreza";
                            } elseif ($imc >= "18.5" || $imc < "25") {
                                $situacao = "Normal";
                            } elseif ($imc >= "25" || $imc < "30") {
                                $situacao = "Sobrepeso";
                            } elseif ($imc >= "30" || $imc < "35") {
                                $situacao = "Obesidade Grau I";
                            } elseif ($imc >= "35" || $imc < "40") {
                                $situacao = "Obesidade Grau II";
                            } else {
                                $situacao = "Obesidade Grau III";
                            }


                            echo "Olá! $nome, você tem $idade anos, seu IMC é $imc, e trata-se de $situacao";
                            echo "<br>";
                          
                             $imc_resultado=[];
                            $imc_resultado['nome']=$nome;
                            $imc_resultado['idade']=$idade;
                            $imc_resultado['altura']=$altura;
                            $imc_resultado['peso']=$peso;
                            $imc_resultado['imc']=$imc;
                            $imc_resultado['situacao']=$situacao;


                            require_once("conexao.php");
                            //Vamos criar uma variavel $SQL, onde irá recebe a instrução de inserção de dados no banco de dados, e após informarmos os campos a serem preenchidos, devemos no VALUES representar cada atributo do banco de dados com um simbolo de interrogação e um espaço separados por virgula (? , ?, ...., ?, ?,)
                            $sql="INSERT INTO cadastro (nome, idade, altura, peso, imc, situacao) values (?, ?, ?, ?, ?, ? )";
                          
                
                            $conexao = novaConexao();
                            $insert = $conexao->prepare($sql);
                
                            $params = [
                               
                                $imc_resultado['nome'],
                                $imc_resultado['idade'],
                                $imc_resultado['altura'],
                                $imc_resultado['peso'],
                                $imc_resultado['imc'],
                                $imc_resultado['situacao']
                            ];
                            
                             $insert->bind_param("ssssss", ...$params);

                            //Agora devemos fazer um bind em nosso $insert, informando qual o tipo de dado inserido, onde teremos nome(string),data(string),email(string),site(string),filhos(inteiro),dados(decimal), sendo assim iremos colocar como parametro de tipo de dado no bind_param a seguinte sequencia de tipos de dados (ssssid)
                                $insert -> execute();

                        }
                    
                       $imc_resultado=[];
                        $imc_resultado['nome']=$nome;
                        $imc_resultado['idade']=$idade;
                        $imc_resultado['altura']=$altura;
                        $imc_resultado['peso']=$peso;
                        $imc_resultado['imc']=$imc;
                        $imc_resultado['situacao']=$situacao;

                        echo $imc_resultado['nome'];
                        echo $imc_resultado['idade'];
                        echo $imc_resultado['altura'];
                        echo $imc_resultado['peso'];
                        echo $imc_resultado['imc'];
                        echo $imc_resultado['situacao'];



                        ?>



<?php 

     require_once("conexao.php");
     $sql="SELECT * from cadastro";
     $conexao=novaConexao();

     //permitindo excluir dados
     if(isset($_GET['excluir'])){

            $excluirSQL="DELETE FROM cadastro where id=?";
            $stmt=$conexao->prepare($excluirSQL);
            $stmt-> bind_param("i", $_GET['excluir']);
            $stmt->execute();
     }                   

     //Formando a tabela
    
     $resultado = $conexao->query($sql);
     
     $registros=[];

     if ($resultado->num_rows>0){
            while($row=$resultado->fetch_assoc()){
                $registros[]=$row;
            }
     }else if ($conexao->error){

            echo "Erro" .$conexao->error;

     }
     echo "<p> Dados dos clientes</p>";
    
     $conexao->close();
     ?>
  
     <table border="4">
     <thead>
         <th>ID</th>
         <th>Nome</th>
         <th>Idade</th>
         <th>Peso</th>
         <th>Altura</th>
         <th>IMC</th>
         <th>Situação</th>
     </thead>


     <tbody>
         <!-- Vamos abrir mais um bloco PhP para possamos realizar um foreach para percorrer os valores do array e vincular em nossa tabela. -->
         <?php foreach($registros as $registro): ?>
             <tr>
             <td><?=$registro['id']?></td>
             <td><?=$registro['nome']?></td>
             <td>
                 <?=$registro['idade'];
                 ?>
             </td>
             <td><?=$registro['altura']?></td>
             <td><?=$registro['peso']?></td>
             <td><?=$registro['imc']?></td>
             <td><?=$registro['situacao']?></td>
             <td><a href="formulario01.php?excluir=<?= $registro['id'] ?>" class="btn btn-danger"> Excluir</td>
             </tr>
         <?php endforeach ?>
     </tbody>
 </table>







</body>

</html>