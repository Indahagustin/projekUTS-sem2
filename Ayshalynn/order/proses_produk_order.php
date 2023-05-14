<?php 
require_once '..\dbkoneksi.php';
?>
<?php 
   $_kode = $_POST['order_number'];
   $_nama = $_POST['date'];
   $_harga = $_POST['qty'];
   $_stok = $_POST['total_price'];
   $_minstok = $_POST['customer_id'];
   $_jenis = $_POST['product_id'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_order_number; // ? 1
   $ar_data[]=$_date; // ? 2
   $ar_data[]=$_qty;// 3
   $ar_data[]= 1.2 * $_total_price;
   $ar_data[]=$_customer_id;
   $ar_data[]=$_product_id;
   

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO product(order_number,date,qty,total_price,customer_id,
    product_id) VALUES (?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE product SET,order_number=?,date=?,qty=?,
   total_price=?,customer_id=?,product_id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_produk.php');
?>