<?php
include_once "db.php";
$title = "Sepetiniz";
include_once "_header.php";

$item = $_GET['item']??'Sepetinizde ürününüz yok';
$action = $_GET['action']??'';
session_start();
$userId = $_SESSION['userId'];

if($action =="add"){
    $stmt = $pdo->prepare("INSERT INTO basket (user_id, product_id, quantity) VALUES(?, ?, ?)");
    $stmt->execute(array($userId, $item, 1));
    $stmt = $pdo->prepare("SELECT * FROM basket WHERE user_id = $userId");
    $stmt->execute();
    $userBasketItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}elseif($action == "delete"){
    $stmt = $pdo->prepare("DELETE FROM basket WHERE user_id = $userId AND product_id = $item");
    $stmt->execute();
    header("Location:/patika-sepet/basket.php");

}else{
    $stmt = $pdo->prepare("SELECT * FROM basket WHERE user_id = $userId");
    $stmt->execute();
    $userBasketItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<div class="container-fluid p-0" style ="background-color:#da1254">
    <div class="container">
        <h1 class="text-center" style="color:#fff;padding:2.5rem;">Sepetiniz</h1>
        <!-- Basket Items Starts -->
        <div class="basket-table-wrapper">
            <div class="basket-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ürün İsmi</th>
                            <th scope="col">Fiyat</th>
                            <th scope="col">Miktar</th>
                            <th scope="col">Kaldır</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(!empty($userBasketItems)){
                            foreach($userBasketItems as $userBasketItem){

                                $productId = $userBasketItem['product_id'];
                                $stmt = $pdo->prepare("SELECT * FROM products Where id = $productId");
                                $stmt->execute();
                                $product = $stmt->fetch();
                                
                               echo " <tr>
                               <th scope='row'>$product[name]</th>
                               <td>$product[price] ₺</td>
                               <td>1</td>
                               <td>
                                   <a href='#' class='btn btn-success' style = 'margin-right:5px;'>Satın Al</a>
                                   <a href='/patika-sepet/basket.php?action=delete&item=$product[id]' class='btn btn-danger'>Kaldır</a>
                               </td>
                           </tr>";
                            }
                        } 
                         
                        ?>
                       

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Basket Items Ends -->
    </div>
</div>

<?php include_once "_footer.php";
