<?php 
include_once "db.php";
$title = "Ürünler";
include_once "_header.php";
session_start();
$_SESSION['userId'] = 2;
?>

<div class = "container ">
  <h1 class="text-center mt-3 mb-3">Ürünlerimiz</h1>
  <div class = "row " style="margin-left:auto; margin-right:auto;">
          <!--Products Start --> 
<?php 
  $stmt = $pdo->prepare("SELECT * FROM products");
  $products = $stmt->execute();
  $products = $stmt->fetchAll();
  
foreach($products as $product){
              echo "<div class='card' style='width: 18rem;margin:0.5rem;'>
              <img src='img/$product[img]' class='card-img-top' alt='Ürün resmi' style='height:275px;'>
              <div class='card-body'>
                <h5 class='card-title'>".substr($product['name'],0,20)."...</h5>
                <p class='card-text'>".substr($product['description'],0,55)."...</p>
                <span style = 'background-color:#61e1ed; font-size:18px; border-radius:5px;width:300%;text-align:right;'>$product[price] ₺</span>
                <hr>
                <a href='/patika-sepet/basket.php?action=add&item=$product[id]' class='btn btn-primary'>Sepete Ekle</a>
               
              </div>
            </div>";
} 
?>
      <!--Products Ends --> 
     
  </div>

</div> 

<?php include_once "_footer.php";?>