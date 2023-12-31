<?php
// session_start();
require_once("dbconnect.php");
if (isset($_GET['page'])) {

    $pages = array("products", "cart");

    if (in_array($_GET['page'], $pages)) {
        $_page = $_GET['page'];
    } else {
        $_page = "products";
    }

} else {
    $_page = "products";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/reset.css" />

    <!-- Rest of your styles -->
    <style>

        #container {
            width: 100%;
            margin: auto;
            background-color: #eee;
            overflow: hidden; /* Defina overflow: hidden para limpar os floats em #main e #sidebar */
            padding: 15px;
        }

        #main {
            width: 520px;
            float: left;
        }

        #sidebar {
            width: 350px;
            float: left;
        }

        a {color: #48577D; text-decoration: none;}

        a:hover {text-decoration: underline;}

        h1, h2 {margin-bottom: 15px}

        h1 {font-size: 18px;}
        h2 {font-size: 16px}
        #main table {
            width: 480px;
        }

        #main table th {
            padding: 10px;
            background-color: #48577D;
            color: #fff;
            text-align: left;
        }

        #main table td {
            padding: 5px;
        }
        #main table tr {
            background-color: #d3dcf2;
        }

    </style>

    <title>Carrinho de Compras</title>

</head>

<body>

<div id="container">

    <div id="main">
        <?php require($_page . ".php"); ?>
    </div><!--end main-->

    <div id="sidebar">
        <h1>Carrinho</h1>
        <?php

        if (isset($_SESSION['cart'])) {
            $conn = mysqli_connect("127.0.0.1", "root", "root", "compsys_db");
            $sql = "SELECT * FROM stock WHERE stock_id IN (";

            foreach ($_SESSION['cart'] as $id => $value) {
                $sql .= $id . ",";
            }

            $sql = substr($sql, 0, -1) . ") ORDER BY stock_id ASC";

            $res = mysqli_query($conn, $sql);

            if (!$res) {
                printf("<h2>O carrinho está vazio.</h2> %s", "<br><strong>Por favor, escolha seus produtos à esquerda!<strong>");
                exit();
            }

            while ($row = mysqli_fetch_array($res)) {
                ?>
                <p><?php echo $row['description'] ?> x <?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?></p>
                <?php
            }
            ?>
            <hr />
            <a href="chooseProducts.php?page=cart">Ir para o carrinho</a>
            <?php
        } else {
            echo "<p>Seu carrinho está vazio. Por favor, adicione alguns produtos.</p>";
        }

        ?>
    </div><!--end sidebar-->

</div><!--end container-->

</body>
</html>
