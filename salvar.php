<?php
	include("conectarBD.php");
	//Aqui vai buscar a ação através do Request
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO produtos 
						(proNome, proQtd, proValor)
					VALUES
						('".$_POST["nome"]."','".$_POST["quantidade"]."','".$_POST["valor"]."')";

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Produto Cadastrado com sucesso !!!!');</script>";
				print "<script>location.href='produtos.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível cadastrar o produto !!!!');</script>";
				print "<script>location.href='produtos.php';</script>";
			}
		break;
		
		case 'editar':
			$sql = "UPDATE produtos SET
						proNome='".$_POST["nome"]."',
						proQtd='".$_POST["quantidade"]."',
						proValor='".$_POST["valor"]."'
					WHERE
						proId=".$_POST["idPro"];

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Cliente editado com Sucesso !!!!');</script>";
				print "<script>location.href='produtos.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível editar o cliente !!!!');</script>";
				print "<script>location.href='produtos.php';</script>";
			}
		break;

		case 'excluir':
			$sql = "DELETE FROM produtos WHERE proId=".$_REQUEST["idPro"];

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Cliente Excluido com sucesso !!!!');</script>";
				print "<script>location.href='produtos.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível excluir o cliente !!!!');</script>";
				print "<script>location.href='produtos.php';</script>";
			}
		break;
	}
?>
