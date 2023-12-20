<?php

if(isset($_GET['action']) && $_GET['action']=="add"){

    $id=intval($_GET['id']);

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]['quantity']++;

    } else {
        $conn = mysqli_connect("127.0.0.1", "root", "root", "compsys_db");

        // Verifica a conexão
        if (!$conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        $sql_s = "SELECT * FROM stock
			WHERE stock_id = {$id}";
        $res = mysqli_query($conn, $sql_s);

        if(mysqli_num_rows($res) != 0) {
            $row_s = mysqli_fetch_array($res);

            $_SESSION['cart'][$row_s['stock_id']] = array(
                "quantity" => 1,
                "price" => $row_s['price']
            );

        } else {
            $message = "Este ID de produto é inválido!";
        }

        // Libera o conjunto de resultados
        mysqli_free_result($res);

        mysqli_close($conn);
    }

}

?>

<h1>Lista de Produtos</h1>
<?php
if(isset($message)){
    echo "<h2>$message</h2>";
}
?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<table class="table table-striped">
    <tr>
        <th>Número do Estoque</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ação</th>
    </tr>
    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "root", "compsys_db");

    // Verifica a conexão
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM stock ORDER BY stock_id ASC";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($res)) {

        ?>
        <tr>
            <td><i class="fa fa-shopping-cart"></i> <?php echo $row['stock_id'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><i class="fa fa-money"></i> <?php
                $price = $row['price'];
                $formatted_price = number_format($price, 0, '.', ',');
                echo $formatted_price . ' KZ';
                ?></td>

            <td><a href="chooseProducts.php?page=products&action=add&id=<?php echo $row['stock_id'] ?>"><i class="fa fa-shopping-cart"></i> Adicionar ao carrinho</a></td>
        </tr>
        <?php

    }

    ?>
</table>
