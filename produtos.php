<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Cadastro de Produtos</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link" href="produtos.php">Lista de Produtos</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <?php
                  include("conectarBD.php");
                  $sql = "SELECT * FROM produtos";
                  $resultado = $conexao->query($sql) or die($conexao->error);
                  $qtdLinhas = $resultado->num_rows;

                  if($qtdLinhas > 0)
                  {
                    print "<p>Encontrou <b>$qtdLinhas</b> resultado(s)</p>";
                    print "<table class='table table-striped'>";
                    print "<tr>";
                      print "<th text-light>Id</th>";
                      print "<th>Nome</th>";
                      print "<th>Quantidade</th>";
                      print "<th>Valor</th>";
                      print "<th>Ações</th>";
                    while($linhas = $resultado->fetch_object())
                    {
                      print "<tr>";
                      print "<td>".$linhas->proId."</td>";
                      print "<td>".$linhas->proNome."</td>";
                      print "<td>".$linhas->proQtd."</td>";
                      print "<td>".$linhas->proValor."</td>";
                      print "<td>
                               <button class='btn btn-success' onclick=\"location.href='editar.php?idPro=".$linhas->proId."';\">Editar</button>
                               <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir este produto?')){location.href='salvar.php?acao=excluir&idPro=".$linhas->proId."';}else{false;}\">Excluir</button>
                             </td>";
                      print "</tr>";
                    }
                    print "</table>";
                  }
                  else
                  {
                    print "<p>Nenhum resultado encontrado</p>";
                  }
              ?>
          </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
