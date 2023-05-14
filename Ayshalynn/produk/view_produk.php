<?php
require_once '..\dbkoneksi.php';

if (!(isset($_GET['id']))) {
    header('location:list_produk.php');
}
?>
<?php
require_once '../admin/header.php';
require_once '../admin/sidebar.php';
?>
<?php
$_id = $_GET['id'];
// select * from produk where id = $_id;
//$sql = "SELECT a.*,b.nama as jenis FROM produk a
//INNER JOIN jenis_produk b ON a.jenis_produk_id=b.id WHERE a.id=?";
$sql = "SELECT * FROM product WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$_id]);
$row = $st->fetch();
//echo 'NAMA PRODUK ' . $row['nama'];
?>

<table class="table table-striped">
    <tbody>
        <tr>
            <td>sku</td>
            <td><?= $row['sku'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $row['name'] ?></td>
        </tr>
        <tr>
            <td>Purchase Price</td>
            <td><?= $row['purchase_price'] ?></td>
        </tr>
        <tr>
            <td>Sell Price</td>
            <td><?= $row['sell_price'] ?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><?= $row['stock'] ?></td>
        </tr>
        <tr>
            <td>MinStok</td>
            <td><?= $row['min_stock'] ?></td>
        </tr>
        <tr>
            <td>Produk Type</td>
            <td><?= $row['product_type_id'] ?></td>
        </tr>
        <tr>
            <td>Restok</td>
            <td><?= $row['restock_id'] ?></td>
        </tr>
    </tbody>
</table>

<?php
require_once '../admin/footer.php';


?>
