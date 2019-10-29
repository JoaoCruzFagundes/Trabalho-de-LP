<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Cliente</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
Nome:<input type="text" name="nome" /><br />
Cpf:<input type="text" name="cpf" /><br />
Senha:<input type="password" name="senha"/><br />
<input type="submit" name="Incluir" value="Incluir" />
<input type="reset" name="Limpar" value="Limpar"/>

<input type="submit" name="Mostrar" value="Mostrar" />
<BR>
Registro a ser excluído:<input type="text" name="registro"  value="registro"/>
<input type="submit" name="Excluir" value="Excluir">
</form>
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
        into cliente(nome,cpf,senha)values('$nome','$cpf','$senha')");
        if($grava==true){
            echo"Cadastro realizado com sucesso!!";
        }
        else{
            echo "Impossível incluir!!";
        }
                                
          
    }
    /*if(isset($_POST['Mostrar'])){
        //código para mostrar
    }
    if(isset($_POST['Excluir'])){
        //código para excluir
        // precisamos de um id
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
*/
    
?>
</body>
</html>
