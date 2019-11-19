<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
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
<form action="" method="post" enctype="multipart/form-data">
Nome:<input type="text" name="nome" /><br />
Valor:<input type="text" name="valor" /><br />
<input type="submit" name="Incluir" value="Incluir" />
<input type="reset" name="Limpar" value="Limpar"/>

<input type="submit" name="Mostrar" value="Mostrar" />
<BR>
Registro a ser excluído:<input type="text" name="registro" 
placeholder="registro">
<input type="submit" name="Excluir" value="Excluir">
</form>
<?php
    
 
    $descricao=isset($_POST['descricao'])?$_POST['descricao']:null;
    
    $valor=isset($_POST['valor'])?$_POST['valor']:null;
        
    
    include('conexao.php');
    //print_r($_FILES);    
    
    if(isset($_POST['Incluir'])){
        //código para incluir
        $db=mysqli_select_db($conexao,$banco);
        $grava=mysqli_query($conexao,"insert 
        into item(descricao, valor )values('$descricao',
        '$valor')");
        if($grava==true){
            echo"Cadastro realizado com sucesso!!";
  
        }
        else{
            echo "Impossível incluir!!";
        }
                                
          
    }
    if(isset($_POST['Mostrar'])){
        //código para mostrar
        $db=mysqli_select_db($conexao,$banco);
        $mostra=mysqli_query($conexao,"select * from item 
        order by id_item");
        $num_linhas=mysqli_num_rows($mostra);
        echo"<table border=\"1\">";
        echo"<td>Código</td>
	          <td>descricao</td>
			   <td>valor</td>";
        for($i=0;$i<$num_linhas;$i++){
            $mostra_tabela=mysqli_fetch_array($mostra);
		    $codigo= $mostra_tabela['id_item'];
            echo"<tr><td>Excluir $codigo</td>";
            echo "<td>$codigo</td>";
            $descricao=$mostra_tabela['descricao'];
            echo"<td>$descricao</td>";
            $valor=$mostra_tabela['valor'];
            echo "<td>$valor</td>";
            echo"<td><a href='altera.php?id_item=$codigo'>Alteração</a></td>";
            echo "</tr>";    
        }
        echo "</table>";





    }
    if(isset($_POST['Excluir'])){
        $id=$_POST['registro'];
        $db=mysqli_select_db($conexao,$banco);
        $resultado = mysqli_query ($conexao,"select * from item where id_item=$id");
        if ($resultado==false) {
             echo "Erro na query";
             exit;
         }
        if (mysqli_num_rows($resultado) != 0) {
             mysqli_query ($conexao,"delete from item where id_item=$id");
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