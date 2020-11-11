<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Pagina Inicial</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'><link rel="stylesheet" href="./css/style.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'><link rel="stylesheet" href="./css/style.css">

</head>
<body>
<!-- MENU LATERAL -->
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="index.html">MENU</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
           <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="sidebar-dropdown">
            <a href="solicit-pedido.php">
              <i class="fa fa-shopping-cart"></i>
              <span>SOLICITAÇÃO DE PEDIDOS</span>
              
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>CADASTRO DE PRODUTOS</span>
              
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="cad-pizza.html">SABORES DE PIZZA

                  </a>
                </li>
                <li>
                  <a href="cad-refri.html">MARCAS DE REFRIGERANTE</a>
                </li>
                <li>
                  <a href="cad-outros.html">OUTROS</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>LISTA DE CLIENTES</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="cad-cliente.html">CADASTRO DE CLIENTE

                  </a>
                </li>
            </div>
           
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>FLUXO DE ENTRADA</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="cad-cliente.html">FLUXO DE ENTRADA
                  </a>
                </li>
            </div>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    </nav>
    <main class="page-content-cad">
      <div class="cad-wrapper" style="height: 37rem;">
        <h3>Cadastro de Pedidos</h3>
        <form action="scripts/cadastrando.php?formulario=0" method="post">
          <input type="text" class="field" name="nm_cliente" placeholder="Nome do cliente">
          <input type="text" class="field" name="rua" placeholder="Endereço do cliente">
          <input type="text" class="field" name="ncasa" placeholder="Número da residencia">
          <input type="text" class="field" name="bairro" placeholder="Bairro do cliente">
          <div class="select">
            <select id="sabor" name="s_sabores">
              <?php
                include('scripts/configs.php');
                $con = mysqli_connect($localhost,$user_name,$password,$db);
                $dados = mysqli_query($con, "SELECT * FROM sabores");
                while($sabores = mysqli_fetch_array($dados)){
                  $status = mysqli_query($con, "SELECT * FROM status WHERE status = ".$sabores['STATUS'].";");
                  while($statusd = mysqli_fetch_array($status)) {
                    if ($statusd['NM_STATUS'] == "ATIVO") {
                      echo "<option value=".$sabores['SABOR'].">".$sabores['NM_SABOR']."</option>";
                    }
                  }
                }
              ?>
            </select>
          </div>
          <div class="select">
              <select id="bebida" name="s_bebidas">
                <?php
                  include('scripts/configs.php');
                  $con = mysqli_connect($localhost,$user_name,$password,$db);
                  $dados = mysqli_query($con, "SELECT * FROM bebidas");
                  while($bebidas = mysqli_fetch_array($dados)){
                    $status = mysqli_query($con, "SELECT * FROM status WHERE status = ".$bebidas['STATUS'].";");
                    while($statusd = mysqli_fetch_array($status)) {
                      if ($statusd['NM_STATUS'] == "ATIVO") {
                        echo "<option value=".$bebidas['BEBIDA'].">".$bebidas['NM_BEBIDA']."</option>";
                      }
                    }
                  }
                ?>
              </select>
          </div>
          <div class="select">
              <select id="outro" name="s_outros">
                <?php
                  include('scripts/configs.php');
                  $con = mysqli_connect($localhost,$user_name,$password,$db);
                  $dados = mysqli_query($con, "SELECT * FROM outros");
                  while($outros = mysqli_fetch_array($dados)){
                    $status = mysqli_query($con, "SELECT * FROM status WHERE status = ".$outros['STATUS'].";");
                    while($statusd = mysqli_fetch_array($status)) {
                      if ($statusd['NM_STATUS'] == "ATIVO") {
                        echo "<option value=".$outros['OUTRO'].">".$outros['NM_OUTRO']."</option>";
                      }
                    }
                  }
                ?>
              </select>
          </div>
          <button>Cadastrar</button>
        </form>
      </div>
    </main>
  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script><script  src="./script.js"></script>
    
    </body>
    </html>