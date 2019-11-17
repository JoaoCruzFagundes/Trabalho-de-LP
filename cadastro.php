<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Cliente</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
Nome:<input type="text" name="nome" /><br />
Email:<input type="text" name="email" /><br />
CPF:<input type="text" name="cpf" /><br />
Senha:<input type="password" name="senha" /><br />
<input type="submit" name="Incluir" value="Incluir" />
<input type="reset" name="Limpar" value="Limpar"/>

<input type="submit" name="Mostrar" value="Mostrar" />
<BR>
Registro a ser excluído:<input type="text" name="registro" 
placeholder="registro">
<input type="submit" name="Excluir" value="Excluir">
</form>
<?php
    
 
    $nome=isset($_POST['nome'])?$_POST['nome']:null;
    
    $email=isset($_POST['email'])?$_POST['email']:null;
    
    $cpf=isset($_POST['cpf'])?$_POST['cpf']:null;

    $senha=isset($_POST['senha'])?$_POST['senha']:null;
        
    
    include('conexao.php');
    //print_r($_FILES);    
    
    if(isset($_POST['Incluir'])){
        //código para incluir
        $db=mysqli_select_db($conexao,$banco);
        $grava=mysqli_query($conexao,"insert 
        into clientes(nome,email,cpf,senha)values('$nome',
        '$email','$senha')");
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
        $mostra=mysqli_query($conexao,"select * from clientes 
        order by codigo");
        $num_linhas=mysqli_num_rows($mostra);
        echo"<table border=\"1\">";
        echo"<td>Código</td>
	          <td>Nome</td>
			   <td>Email</td>
			   <td>Senha</td>
			    <td>Alteração</td></tr>";
        for($i=0;$i<$num_linhas;$i++){
            $mostra_tabela=mysqli_fetch_array($mostra);
		    $codigo= $mostra_tabela['codigo'];
            echo"<tr><td>Excluir $codigo</td>";
            echo "<td>$codigo</td>";
            $nome=$mostra_tabela['nome'];
            echo"<td>$nome</td>";
            $email=$mostra_tabela['email'];
            echo "<td>$email</td>";
            $cidade=$mostra_tabela['senha'];
            echo "<td>$senha</td>";
            echo"<td><a href='altera.php?codigo=$codigo'>Alteração</a></td>";
            echo "</tr>";    
        }
        echo "</table>";



/*
	echo"<form action=\"exclui_checkbox.php\" method=\"get\">";
	echo"<table border=\"1\">";
	echo"<tr><td>Excluir</td>
			<td>Código</td>
	          <td>Nome</td>
			   <td>Email</td>
			   <td>Cidade</td>
			   <td>Foto</td>
			    <td>Alteração</td></tr>";
     
	for($i=0;$i<$num_linhas;$i++)
	{	$mostra_tabela=mysqli_fetch_array($mostra);
		$codigo= $mostra_tabela['codigo'];
		echo"<tr>";
		echo"<td><input type='checkbox' 
		name=cod".$i." value='$codigo'></td>";
		echo"<td>";
		echo $codigo;
		echo"</td>";
		echo"<td>";
		echo $mostra_tabela['nome'];
		echo"</td>";
		echo"<td>";
		echo $mostra_tabela['email'];
		echo"</td>";
		echo"<td>";
		echo $mostra_tabela['cidade'];
		echo"</td>";
		echo"<td>";
		echo $mostra_tabela['foto'];
		echo"</td>";
		echo"<td><a href=\"altera.php?codigo=$codigo\">Alterar</a></td></tr>";
				
	}

	echo"<tr><tr><td colspan=\"6\" align='center'>
		<input type=\"hidden\" name=\"linhas\" value=\"$num_linhas\">
	<input type=\"submit\" name=\"Excluir\" value=\"Excluir\"></td></tr>";

	echo"</form></table>";
}*/


    }
    if(isset($_POST['Excluir'])){
        //código para excluir
        // precisamos de um id
        $id=$_POST['registro'];
        $db=mysqli_select_db($conexao,$banco);
        $resultado = mysqli_query ($conexao,"select * from clientes where codigo=$id");
        if ($resultado==false) {
             echo "Erro na query";
             exit;
         }
        if (mysqli_num_rows($resultado) != 0) {
             mysqli_query ($conexao,"delete from clientes where codigo=$id");
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