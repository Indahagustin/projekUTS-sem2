<?php 
require_once '..\dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];
    // select * from produk where id = $_id;
    //$sql = "SELECT a.*,b.nama as jenis FROM produk a
    //INNER JOIN jenis_produk b ON a.jenis_produk_id=b.id WHERE a.id=?";
    $sql = "SELECT * FROM order WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    //echo 'NAMA PRODUK ' . $row['nama'];
?>

<table class="table table-striped">
    <tbody>
        <tr>  <td>Order Number</td><td><?=$row['order_number']?></td></tr>
        <tr>   <td>Date</td><td><?=$row['date']?></td></tr>
        <tr>   <td>Qty</td><td><?=$row['qty']?></td></tr>
        <tr>   <td>Total Price</td><td><?=$row['total_price']?></td></tr>
        <tr>   <td>Customer ID</td><td><?=$row['customer_id']?></td></tr>
        <tr>   <td>Produk ID</td><td><?=$row['product_id']?></td></tr>
    </tbody>
</table>
