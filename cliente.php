<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/cartola-icone.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
<title>Cartola</title>
</head>
<body>
    <div class="header"> 
       
            <a href="index.html">
                <div class="button"><span>HOME</span></div>
            </a>
            <a href="produtos.php">
                <div class="button"><span>PRODUTOS</span></div>
            </a>
            <strong class="text">VISTA-SE BEM</strong>
            <a href="cliente.php">
                <div class="button"><span>CLIENTES</span></div>
            </a>
         
        <img class="image" src="./images/cartola-icone.png" alt="cartola-icone">
    </div>
    <div class="container">
        <div class = "form">
            <form action="" method="post" enctype="multipart/form-data">
                Nome:<input type="text" name="nome" /><br />
                Cpf:<input type="text" name="cpf" /><br />
                Senha:<input type="password" name="senha"/><br />
                <input type="submit" name="Incluir" value="Incluir" />
                <input type="reset" name="Limpar" value="Limpar"/>
                <BR>
                Registro a ser excluído:<input type="text" name="registro"  value="registro"/>
                <input type="submit" name="Excluir" value="Excluir">
            </form>
        </div>
    </div>




<?php
    
 
    $nome=isset($_POST['nome'])?$_POST['nome']:null;
    
    $cpf=isset($_POST['cpf'])?$_POST['cpf']:null;
    
    $senha=isset($_POST['senha'])?$_POST['senha']:null;
    
    include('conexao.php');
    //print_r($_FILES);    
    
    if(isset($_POST['Incluir'])){
        //código para incluir
        $db=mysqli_select_db($conexao,$banco);
        $grava=mysqli_query($conexao,"insert 
        into cliente(cpf,nome,senha)values('$cpf','$nome','$senha')");
        if($grava==true){
            echo"Cadastro realizado com sucesso!!";
        }
        else{
            echo "Impossível incluir!!";
        }
                                
          
    }
    
    if(isset($_POST['Excluir'])){
       
        $id=$_POST['registro'];
        $db=mysqli_select_db($conexao,$banco);
        $resultado = mysqli_query ($conexao,"select * from cliente where id_cliente=$id");
        if ($resultado==false) {
             echo "Erro na query";
             exit;
         }
        if (mysqli_num_rows($resultado) != 0) {
             mysqli_query ($conexao,"delete from cliente where id_cliente=$id");
             echo "<script>alert(\"Registro excluído com sucesso!\")
             </script>";
         }
         else {
             echo "<script>alert(\"Registro inexistente!\")</script>";
         } 
   
    }

    
?>
</body>
</html>
