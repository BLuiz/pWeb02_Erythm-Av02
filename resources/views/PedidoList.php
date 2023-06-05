<?php 
include "../controller/PedidoController.php";
include '../Util.class.php';
Util::verify();

  $pedido = new PedidoController();

  if(!empty($_GET['id'])){
    $pedido->deletar($_GET['id']);
    header("location: PedidoList.php");
  }

  if(!empty($_POST)){
    $load = $pedido->pesquisar($_POST);

  }else{
    $load = $pedido->carregar();

  }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERythm - Pedidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="./main.php">ERythm</a>
          <div class="btn-group">
              <a class="btn btn-dark" href="./UsuarioList.php">Usuários</a>
              <a class="btn btn-dark" href="./DiscoList.php">Discos</a>
              <a class="btn btn-dark" href="./PedidoList.php">Pedidos</a>
              <a class="btn btn-danger" href='./login.php?sair=1'>Sair</a>             
          </div>
      </div>
    </nav>

  <div class="container mt-5">
    <h1>Listagem de Pedidos</h1></br>
    <form action="PedidoList.php" method="post">
      <div class="row">
        <div class="col-2">
          <select name="campo" class="form-select">
            <option value="cliente">Cliente</option>
            <option value="endereco">Endereço</option>
            <option value="telefone">Telefone</option>
          </select>
        </div>
        <div class="col-4">
          <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
        </div>
        <div class="col-6">
          <button class="btn btn-primary" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i> Buscar
          </button>
          <a class="btn btn-success" href="PedidoForm.php"><i class="fa-solid fa-plus"></i> Cadastrar</a>
        </div>
      </div>
    </form>
      <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Cliente</th>
          <th scope="col">Endereço</th>
          <th scope="col">Telefone</th>
          <th scope="col">Editar</th>
          <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      foreach($load as $item){
        echo"<tr>
              <td scope='row'>$item->id</td>
              <td>$item->cliente</td>
              <td>$item->endereco</td>
              <td>$item->telefone</td>
              <td>
                <a href='./PedidoForm.php?id=$item->id'>
                <i class='fa-solid fa-pen-to-square' style='color: darkblue;'></i></a>
              </td>
              <td>
                <a href='./PedidoList.php?id=$item->id' onclick='return confirm(\"Deseja Excluir?\")'>
                <i class='fa-solid fa-trash' style='color:red;'></i></a>
              </td>
            </tr>";
      }
          ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>