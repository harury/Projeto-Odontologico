<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Ficha</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
        <script>
            function excluir(id){
                if(confirm('Deseja realmente excluir esta ficha?')){
                    location.href = 'deletarFicha.php?id=' + id;   
                }
            }
        </script>
	</head>
	<body>
		
		<?php include 'header.php'?>

        <h1 class = "text-center mb-4">Fichas de Pacientes</h1>
		
		
		<div class = "pl-5 pr-5">
            <div class = "d-inline-flex">
                <form class="form-inline">
                        <input class="form-control mr-2 ml-1" type="search" name = "nome">
                        <button class="btn btn-primary btn-md mr-3" type="submit">Pesquisar</button>
                </form>

                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal1">Nova Ficha</button>
                <input type="button" class ="btn btn-dark ml-5" onclick="window.print();" value="Imprimir">
            </div>
            <div class = "overflow-auto" style = "max-height: 550px">
                <table class="table w-100 mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome </th>
                            <th scope="col">Data Nascimento</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope = "col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            include_once 'conexao.php';

                            $sql = "SELECT * FROM pessoa";

                            $busca = mysqli_query($con, $sql);

                            while($array = mysqli_fetch_array($busca)){


                                $idPessoa = $array['id_pessoa'];
                                $cpf = $array['cpf'];
                                $rg = $array['rg'];
                                $nome = $array['nome'];
                                $orcamento = $array['orcamento'];
                                $telefone = $array['telefone'];
                                $celular = $array['celular'];
                                $email = $array['email'];
                                $cep = $array['cep'];
                                $endereco = $array['endereco'];
                                $complemento = $array['complemento'];
                                $bairro = $array['bairro'];
                                $nascimento = $array['nascimento'];
                                $cidade = $array['cidade'];
                                $uf= $array['uf'];
                                $situacaoficha = $array['situacaoficha'];
                                $doencabase = $array['doencabase'];
                                $alergia = $array['alergia'];
                                $medicamentos = $array['medicamentos'];
                                $cirurgia = $array['cirurgia'];
                                $internacoes = $array['internacoes'];
                                $pa = $array['pa'];
                                $queixaprinc = $array['queixaprinc']; 

                                //Ajuste da formatação da data DD/MM/AAAA
                                $dtNasci = explode('-', $nascimento);
                                $dtNascimento = $dtNasci[2] . "-" . $dtNasci[1]. "-" . $dtNasci[0];


                        ?>
                            <tr>
                                <td><?php echo $idPessoa?></td>
                                <td><?php echo $nome?></td>
                                <td><?php echo $dtNascimento?></td>
                                <td><?php echo $email?></td>
                                <td><?php echo $telefone?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm"  style="color:#fff" href="editarEstoque.php?id=<?php echo $idEstoque?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a class="btn btn-danger btn-sm"  style="color:#fff" href="#" onclick="excluir(<?php echo $array['id_estoque'];?>)" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> 
        </div>     
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>