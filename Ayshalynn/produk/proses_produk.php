<?php 
require_once '..\dbkoneksi.php';
?>
<?php 
   $_sku = $_POST['sku'];
   $_name= $_POST['name'];
   $_purchase_price = $_POST['purchase_price'];
   $_sell_price = $_POST['sell_price'];
   $_stok = $_POST['stock'];
   $_minstok= $_POST['min_stock'];
   $_produk_type= $_POST['product_type_id'];
   $_restok= $_POST['restock_id'];


   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_sku;
   $ar_data[]=$_name; // ? 1
   $ar_data[]=$_purchase_price; // ? 2
   $ar_data[]=$_sell_price;// 3
   $ar_data[]= 1.2 * $_stok;
   $ar_data[]=$_minstok;
   $ar_data[]=$_produk_type;
   $ar_data[]=$_restok; // ? 7

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO product (sku,name,puechase_price,sell_price,stock,min_stock,
    product_type_id,restock_id) VALUES (?,?,?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE product SET sku=?,name=?,purchase_id=?,sell_price=?,
    stock=?,min_stok=?,produk_type_id=?,restock_id= WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_produk.php');
?>