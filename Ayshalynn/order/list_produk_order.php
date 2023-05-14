<?php 
    require_once '..\dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM `order`";
   $rs = $dbh->query($sql);
?>

<?php
require_once '../admin/header.php';
require_once '../admin/sidebar.php';
?>
      <a class="btn btn-success" href="form_produk_ordrer.php" role="button">Create Produk</a>
        <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>Order Number</th><th>Date</th><th>Qty</th>
                    <th>Total Price</th><th>Customer ID</th><th>Produk ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor  =1 ;
                foreach($rs as $row){
                ?>
                    <tr>
                        <td><?=$nomor?></td>
                        <td><?=$row['order_number']?></td>
                        <td><?=$row['date']?></td>
                        <td><?=$row['qty']?></td>
                        <td><?=$row['total_price']?></td>
                        <td><?=$row['customer_id']?></td>
                        <td><?=$row['product_id']?></td>
                        <td>
<a class="btn btn-primary" href="view_produk_ordre.php?id=<?=$row['id']?>">View</a>
<a class="btn btn-primary" href="form_produk_order.php?idedit=<?=$row['id']?>">Edit</a>
<a class="btn btn-primary" href="delete_produk_order.php?iddel=<?=$row['id']?>"
onclick="if(!confirm('Anda Yakin Hapus Data Produk <?=$row['order_number']?>?')) {return false}"
>Delete</a>
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