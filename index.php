<?php
	error_reporting(0);
		print"
			<form method='post' action=''>
				<table align='center' width='80%' border='1'>
					<tr>
						<th colspan='10'>
							CPF do Membro:<input type='text' name='cpf' placeholder='Digite aqui o seu CPF'>
							Nome do membro:<input type='text' name='nome' placeholder='Digite aqui o seu nome'>
							Data de Nascimento:<input type='date' name='data'>
							Quanto tempo você faz parte desta igreja?
							<select name='tempo'>
								<option value='1'>Escolha uma opção</option>
								<option value='2'>Menos de 01 Ano</option>
								<option value='3'>De 01 a 03 Anos</option>
								<option value='4'>De 03 a 05 Anos</option>
								<option value='5'>Mais de 05 anos</option>
							</select>
							Você se considera um membro ativo?
							<select name='ativo'>
								<option value='1'>Escolha uma opção?</option>
								<option value='2'>Sim</option>
								<option value='3'>Não</option>
							</select>
							Qual sua   faixa salarial:<input type='tex' name='salario' placeholder='Digite aqui o seu salário'>
							<input type='submit' value='enviar'>
							<input type='reset' value='limpar'>
						</th>
					</tr>
			</form>
	 					<tr>
							<th>CPF</th>
							<th>Nome</th>
							<th>Data</th>
							<th>Tempo</th>
							<th>Ativo</th>
							<th>Salrio</th>
							<th>Dízimo</th>
							<th>Deletar</th>
							<th>Alterar</th>
						</tr>

		";

		$cpf=$_POST['cpf'];
		$nome=$_POST['nome'];
		$data=$_POST['data'];
		$tempo=$_POST['tempo'];
		$ativo=$_POST['ativo'];
		$salario=$_POST['salario'];
		$dizimo=$salario*0.10;

		$conexao=new mysqli ('localhost','root','','novo_banco');

		$inserir=$conexao-> query ("INSERT INTO nova_lista VALUES('$cpf','$nome','$data','$tempo','$ativo','$salario','$dizimo')");

		$consultar=$conexao-> query ("SELECT * FROM nova_lista");

			while($resultados=$consultar-> fetch_assoc())
				{

					$cpf=$resultados['cpf'];
					$nome=$resultados['nome'];
					$data=$resultados['data'];
					$tempo=$resultados['tempo'];
					$ativo=$resultados['ativo'];
					$salario=$resultados['salario'];
					$dizimo=$resultados['dizimo'];

					print"
						<tr>
							<td>$cpf</td>
							<td>$nome</td>
							<td>$data</td>
							<td>$tempo</td>
							<td>$ativo</td>
							<td>$salario</td>
							<td>$dizimo</td>
							<td><a href='deletar.php?cpf=$cpf'><img src='./img/d.png' width='40' height='40'></a></td>
							<td><a href='alterar.php?cpf=$cpf'><img src='./img/a.png' width='40' height='40'></a></td>
						</tr>
					";
				}




	?>