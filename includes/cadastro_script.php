<!DOCTYPE html>
<html lang="Pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" href="style.css">
   <title> logado </title>

</head>
<body>
 <div class="container">
    <div class="now"> 
<?php 
  
   include "/Users/Energy/Desktop/Xampp/htdocs/projeto/includes/conexao.php";
   
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "INSERT INTO 'bancodedados'
    ('nome','endereco','telefone','email','data_nascimento') VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";
 
 if (mysqli_query($conn, $sql)) {
     echo "$nome cadastrado com sucesso"; 
 } else 
    echo "$nome não cadastrado com sucesso";
 ?>
    </div>
</div>


</body>
</html>











