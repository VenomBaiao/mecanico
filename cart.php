<?php
if(isset($_POST['submit'])){

    foreach($_POST['quantity'] as $key => $val) {
        if($val==0) {
            unset($_SESSION['cart'][$key]);
        }else{
            $_SESSION['cart'][$key]['quantity']=$val;
        }
    }

}

if(isset($_POST['order'])) {
    //require_once('repairs.php');
}
?>
<h1>Visualizar carrinho</h1>
<a href="chooseProducts.php?page=products">Voltar para a página de produtos</a>
<form method="post" action="chooseProducts.php?page=cart">

    <table>

        <tr>
            <th>Estoque#</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Preço dos itens</th>
        </tr>

        <?php
        $conn= mysqli_connect("127.0.0.1", "root", "root", "compsys_db");
        $sql="SELECT * FROM stock WHERE stock_id IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql .= $id .",";
        }

        //$sql[37] = ' ';
        $sql=substr($sql, 0, -1) .") ORDER BY stock_id ASC";
        //$query=mysql_query($sql);

        $res = mysqli_query($conn, $sql);
        if (!$res) {
            printf("Nada no carrinho: %s\n", "Voltar");
            exit();
        }

        $totalprice=0;
        while($row = mysqli_fetch_array($res)){
            $subtotal = $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'];
            $totalprice += $subtotal;
            ?>
            <tr>
                <td><?php echo $row['description'] ?></td>
                <td><input type="text" name="quantity[<?php echo $row['stock_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?>" /></td>
                <td><?php echo $row['price'] .' KZ'?></td>
                <td><?php echo $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'] .' KZ' ?></td>
            </tr>
            <?php

        }
        ?>
        <tr>
            <td colspan="4">Preço total: <?php echo  $totalprice .' KZ' ?></td>
        </tr>

    </table>
    <br />
    <button type="submit" name="submit">Atualizar carrinho</button>
</form>
<br />
<p>Para remover um item, defina sua quantidade como 0. </p>
