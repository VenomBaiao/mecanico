<?php
require_once('session.php');
require_once('update/repairForm.php');
require_once('update/repairUpdated.php');
require_once('update/functions.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Mecanico - Atualizar Reparo</title>
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
            <li class="active">
                <a href="repairs.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
                    <span>Reparos</span>
                </a>
            </li>
            <li>
                <a href="#">
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
								<i aria-hidden="true" class="icon-coin"></i>
							</span>
                    <span>Faturas</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- FIM DA NAVEGAÇÃO -->


    <!--Breadcrumb -->
    <div class="bread dash">
        <div class="submenu">
            <ul>
                <li><a href="##" onClick="history.go(-1); return false;">Voltar</a></li>
                <li id="add"><a href="addRepair.php">Adicionar Reparo</a></li>
            </ul>
        </div>
        <h3><a style="text-decoration: none;" href="repairs.php">Reparos</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Atualizar Reparo</span>
    </div>
    <!--Breadcrumb -->


    <div class="floats">
        <div class="full-widget">
					<span id="msg">
						<?php
                        echo $success;
                        echo $error;
                        ?>
					</span>
            <form class="form-4" action="" method="post">
                <input type="hidden" name="ud_id" value="<?php echo $id; ?>" readonly>
                Customer_ID: <input type="text" name="ud_cust_id" value="<?php echo $cust_id; ?>" readonly>
                <input type="hidden" name="ud_staff_id" value="<?php echo $staff_id; ?>" readonly>
                Tipo de Veiculo: <?php echo enumDropdown("repairs", "DeviceType", "ud_device"); ?>
                Marca: <input type="text" name="ud_brand" value="<?php echo $brand; ?>" required>
                Modelo: <input type="text" name="ud_model" value="<?php echo $model; ?>" required>
                Sistema Operacional: <?php echo enumDropdown("repairs", "OS", "ud_os"); ?>
                Descrição: <textarea rows="5" name="ud_description" required><?php echo $description; ?></textarea>
                Status: <?php echo enumDropdown("repairs", "Status", "ud_status"); ?>
                <input type="submit" name="submit" value="Atualizar Detalhes do Reparo">

            </form>

        </div>

    </div>
    <!-- FIM DOS FLOATS-->
</div>
<!-- FIM DO MAIN-->

<!-- SCRIPT PARA O MENU -->
<script src="js/menu.js"></script>
<!-- SCRIPT PARA O MENU -->

</body>

</html>
