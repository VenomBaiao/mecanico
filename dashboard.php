<?php
require('session.php');
require('piechart.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mecanico - Painel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="Lakeside Books">
    <meta name="keywords" content="livros, lakeside, cork, loja, online">

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/menu.css" />
    <script src="js/modernizr.custom.js"></script>

    <style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>

</head>

<body id="top" style="font-size: 62.5%;">
<!-- INÍCIO Cabeçalho -->
<header id="header-wrapper">

    <div id="top-bar" class="clearfix">

        <div id="top-bar-inner">

            <!-- Barra de pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->
            <div class="search_form">
                <form action="customer-search.php" method="post">
                    <input type="text" name="search_box" id="search_box" placeholder="Pesquisar um cliente...">
                </form>
            </div>
            <!-- Barra de pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->


            <div class="topbar-right clearfix">

                <ul class="clearfix">
                    <li class="login-user">
                        <a title="<?php echo $login_session; ?>" href="#">
                            <span class="icon"><i aria-hidden="true" class="icon-user"></i></span>
                            <?php echo $login_session; ?>
                        </a>
                    </li>
                </ul>

                <div class="log-out">
                    <!-- <p><a title="Sign out" href="#">Sign out</a></p> -->
                    <p>
                        <a href="logout.php" title="Sign out">
                            <span>Sair</span>
                            <span class="icon">
										<i aria-hidden="true" class="icon-exit"></i>
									</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="full-shadow"></div>


</header>
<!-- FIM Cabeçalho -->


<div class="main clearfix">

    <!-- INÍCIO DA NAVEGAÇÃO -->
    <nav id="menu" class="nav">
        <ul>
            <li class="active">
                <a href="#">
							<span class="icon">
								<i aria-hidden="true" class="icon-home"></i>
							</span>
                    <span>Início</span>
                </a>
            </li>
            <li>
                <a href="customer.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-users"></i>
							</span>
                    <span>Clientes</span>
                </a>
            </li>
            <li>
                <a href="repairs.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
                    <span>Reparos</span>
                </a>
            </li>
            <li>
                <a href="estimates.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-sigma"></i>
							</span>
                    <span>Estimativas</span>
                </a>
            </li>
            <li>
                <a href="inventory.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-barcode"></i>
							</span>
                    <span>Inventário</span>
                </a>
            </li>
            <li>
                <a href="account.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-user"></i>
							</span>
                    <span>Conta</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- FIM DA NAVEGAÇÃO -->


    <!--Breadcrumb -->
    <div class="bread dash"><h3>Início</h3></div>
    <!--Breadcrumb -->


    <div class="floats">

        <!-- Links de acesso rápido -->
        <div class="widget-content small-widget">
            <h1 class="center">Comece Aqui</h1>
            <ul>

                <li>
                    <a href="addCustomer.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
                        <span>Novo Cliente</span>
                    </a>
                </li>

                <li>
                    <a href="addRepair.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
                        <span>Novo Reparo</span>
                    </a>
                </li>

                <li>
                    <a href="chooseProducts.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
                        <span>Nova Estimativa</span>
                    </a>
                </li>

                <li>
                    <a href="addInventory.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
                        <span>Novo Item em Estoque</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Links de acesso rápido -->


        <!-- Resumo de Reparos -->
        <div class="widget-content wide-widget">
            <h1 class="center">Resumo de Reparos</h1>
            <!--Div que irá conter o gráfico de pizza-->
            <div id="pie_chart" style="width: 100%; height: 362px;"></div>
        </div>
        <!-- Resumo de Reparos -->


    </div>
</div>


<!-- SCRIPT PARA O MENU -->
<script src="js/menu.js"></script>
<!-- SCRIPT PARA O MENU -->

</body>

</html>

