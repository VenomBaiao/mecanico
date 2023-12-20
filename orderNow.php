<?php
require_once('session.php');
require_once('newOrder.php');
require_once('ordered.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mecanico - Faça seu Pedido Agora</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="Lakeside Books">
    <meta name="keywords" content="livros, lakeside, cortiça, loja, online">

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/menu.css" />
    <script src="js/modernizr.custom.js"></script>

    <style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
        table {
            width: 100%;
        }

        table th {
            padding: 10px;
            background-color: #48577D;
            color: #fff;
            text-align: left;
        }

        table td {
            padding: 5px;
        }
        table tr {
            background-color: #d3dcf2;
        }
    </style>

</head>

<body id="top" style="font-size: 62.5%;">
<!-- INÍCIO Cabeçalho -->
<header id="header-wrapper">

    <div id="top-bar" class="clearfix">

        <div id="top-bar-inner">

            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->
            <div class="search_form">
                <form action="customer-search.php" method="post">
                    <input type="text" name="search_box" id="search_box" placeholder="Buscar por um cliente...">
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
                    <!-- <p><a title="Sair" href="#">Sair</a></p> -->
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


    <!-- Migalhas de Pão -->
    <div class="bread dash">
        <div class="submenu">
            <ul>
                <li><a href="##" onClick="history.go(-1); return false;">Voltar</a></li>

            </ul>
        </div>
        <h3><a style="text-decoration: none;" href="estimatse.php">Orçamentos</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Faça seu Pedido Agora</span>
    </div>
    <!-- Migalhas de Pão -->


    <div class="floats">
        <div class="full-widget">
                <span id="msg">
                    <?php
                    echo $success;
                    echo $error;
                    ?>
                </span>
            <form class="form-4" action="" method="post">

                ID do Reparo: <input type="text" name="rep_id" placeholder="O ID do Reparo não é válido, redirecionando..." value="<?php echo $repair; ?>" readonly>

                <table>
                    <tr>
                        <th>Número do Estoque</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Preço dos Itens</th>
                    </tr>
                    <?php
                    $conn = mysqli_connect("127.0.0.1", "root", "root", "compsys_db");
                    $sql = "SELECT * FROM stock WHERE stock_id IN (";

                    foreach ($_SESSION['cart'] as $id => $value) {
                        $sql .= $id .",";
                    }

                    $sql = substr($sql, 0, -1) .") ORDER BY stock_id ASC";

                    $res = mysqli_query($conn, $sql);
                    if (!$res) {
                        printf("Nada no carrinho: %s\n", "Volte");
                        exit();
                    }

                    $totalprice = 0;
                    while ($row = mysqli_fetch_array($res)) {
                        $subtotal = $_SESSION['cart'][$row['stock_id']]['quantity'] * $row['price'];
                        $totalprice += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $row['description'] ?></td>
                            <td><input type="text" name="quantity[<?php echo $row['stock_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?>" readonly /></td>
                            <td><?php echo  $row['price'] .' KZ'?></td>
                            <td><?php echo  $_SESSION['cart'][$row['stock_id']]['quantity'] * $row['price'] .' KZ'?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="4"><h4>Preço Total: <?php echo  $totalprice .' KZ' ?></h3></td>
                    </tr>

                </table>
                <input type="submit" name="order" value="Confirmar Pedido">

            </form>

        </div>

    </div>
    <!-- FIM DE FLOATS-->
</div>
<!-- FIM DE PRINCIPAL-->

<!-- SCRIPT PARA O MENU -->
<script src="js/menu.js"></script>
<!-- SCRIPT PARA O MENU -->

</body>

</html>
