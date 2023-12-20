<?php
require_once('session.php');
require_once('delete/inventoryDelete.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" lang="pt-br">
<head>
    <title>Mecanico - Orçamentos</title>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        ul>li, a{cursor: pointer;}
    </style>

    <style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

</head>

<body id="top" style="font-size: 62.5%;">
<!-- INÍCIO Cabeçalho -->
<header id="header-wrapper">

    <div id="top-bar" class="clearfix">

        <div id="top-bar-inner">

            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->
            <div class="search_form">
                <form action="customer-search.php" method="post">
                    <input type="text" name="search_box" id="search_box" placeholder="Pesquisar por um cliente...">
                </form>
            </div>
            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->


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
                        <a href="logout.php" title="Sair">
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
            <li>
                <a href="dashboard.php">
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
            <li class="active">
                <a href="estimates.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-sigma"></i>
							</span>
                    <span>Orçamentos</span>
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
                <a href="#">
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
    <div class="bread">
        <div class="submenu">
            <ul>
                <li><a href="estimates.php">Voltar</a></li>
                <li id="add"><a href="chooseRepair.php">Solicitar Agora</a></li>
            </ul>
        </div>
        <h3>Escolher Produtos</h3>
    </div>
    <!--Breadcrumb -->


    <div class="floats">

        <div class=" full-widget">

            <?php require_once('displayProducts.php'); ?>

        </div>
        <!-- FIM DO WIDGET COMPLETO-->


    </div>
    <!-- FIM DOS FLOATS-->
</div>
<!-- FIM DO MAIN-->

<!-- SCRIPT PARA O MENU -->
<script src="js/menu.js"></script>
<!-- SCRIPT PARA O MENU -->
<script src="js/angular.min.customer.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.customer.js"></script>
<script src="app/inventory.js"></script>

<script>
    $( "#products" ).click(function() {
        $( "#productDiv" ).toggle( "slow", function() {
            // Animação concluída.
        });
    });
</script>

</body>

</html>
