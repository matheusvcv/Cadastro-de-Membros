<?php
	error_reporting(0);
		$cpf_recebido=$_GET['cpf'];

		$conex=new mysqli ('localhost','root','','novo_banco');

		$deletar=$conex->query ("DELETE FROM nova_lista WHERE cpf='$cpf_recebido'");

			if($deletar)
				{print"O cadastro membro que possui o CPF:$cpf_recebido foi excluído com sucesso!";}
			else
				{print"Não foi possível realizar a exclusão!";}


			Voltar:
			print"
				<a href='index.php'><img src='./img/voltar.png' width='100' heigth='100'></a>
			";
?>