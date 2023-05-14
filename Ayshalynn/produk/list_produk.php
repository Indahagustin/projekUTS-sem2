<?php
require_once '..\dbkoneksi.php';
?>
<?php
$sql = "SELECT * FROM product";
$rs = $dbh->query($sql);
?>

<?php
require_once '../admin/header.php';
require_once '../admin/sidebar.php';
?>

<a class="btn btn-success" href="form_produk.php" role="button">Create Produk</a>
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>SKU</th>
            <th>Nama Produk</th>
            <th>Purchase Price</th>
            <th>Sell Price</th>
            <th>Stok</th>
            <th>Min Stok</th>
            <th>Produk Type</th>
            <th>Restok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor  = 1;
        foreach ($rs as $row) {
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['sku'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['purchase_price'] ?></td>
                <td><?= $row['sell_price'] ?></td>
                <td><?= $row['stock'] ?></td>
                <td><?= $row['min_stock'] ?></td>
                <td><?= $row['product_type_id'] ?></td>
                <td><?= $row['restock_id'] ?></td>
                <td>
                    <a class="btn btn-primary" href="view_produk.php?id=<?= $row['id'] ?>">View</a>
                    <a class="btn btn-primary" href="form_produk.php?idedit=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-primary" href="delete_produk.php?iddel=<?= $row['id'] ?>" 
                    onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['sku'] ?>?')) {return false}">Delete</a>
                </td>
            </tr>
        <?php
            $nomor++;
        }
        ?>
    </tbody>
</table>

<?php
require_once '../admin/footer.php';
?>