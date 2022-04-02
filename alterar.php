<?php
	error_reporting(0);
		$cpf_recebido=$_GET['cpf'];

		$conex=new mysqli ('localhost','root','','novo_banco');

		$consultar=$conex-> query ("SELECT * FROM nova_lista");

		while($resultado=$consultar-> fetch_assoc())
			{
				$cpf=$resultado['cpf'];
				$nome=$resultado['nome'];
				$data=$resultado['data'];
				$tempo=$resultado['tempo'];
				$ativo=$resultado['ativo'];
				$salario=$resultado['salario'];
				$dizimo=$resultado['dizimo'];
			}

	print"
		<form method='POST' action=''>
			<form method='POST' action=''>

						<input type='text' name='novo_cpf' value='$cpf'>

						<input type='text' name='novo_nome' value='$nome'>

						<input type='date' name='novo_data' value='$data'>

							<select name='novo_tempo' value='$tempo'>
								<option value='1'>Escolha uma opção</option>
								<option value='2'>Menos de 01 Ano</option>
								<option value='3'>De 01 a 03 Anos</option>
								<option value='4'>De 03 a 05 Anos</option>
								<option value='5'>Mais de 05 anos</option>
							</select>

							Você se considera um membro ativo?
							<select name='novo_ativo' value='$ativo'>
								<option value='1'>Escolha uma opção?</option>
								<option value='2'>Sim</option>
								<option value='3'>Não</option>
							</select>

						<input type='text' name='novo_salario' value='$salario'>

						<input type='submit' value='Alterar'>
					</form>
		</form>
	";	


	$novo_cpf=$_POST['novo_cpf'];
	$novo_nome=$_POST['novo_nome'];
	$novo_data=$_POST['novo_data'];
	$novo_tempo=$_POST['novo_tempo'];
	$novo_ativo=$_POST['novo_ativo'];
	$novo_salario=$_POST['novo_salario'];
	$novo_dizimo=$_POST['novo_dizimo'];

	$alterar=$conex-> query ("UPDATE nova_lista SET cpf='$novo_cpf', nome='$novo_nome', data='$novo_data', tempo='$novo_tempo', ativo='$novo_ativo', salario='$novo_salario' WHERE cpf='$cpf'");

	if($alterar)
		{print"O cadastro foi atualizado com sucesso!";}
	else
		{print"Não foi posssivel realizar a alteração";}

	Voltar:
	print"
	<a href='index.php'><img src='./img/voltar.png' width='100' heigth='100'></a>
	";
?>