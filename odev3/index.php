
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Odev3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <form class="" action="index.php">
      <div class="mb-3">
        <label class="form-label">Bir sayı giriniz</label>
        <input type="text" class="form-control"  placeholder="Örnek => 23" name ="number">
      </div>
      <button class="btn btn-primary" type="submit">Gönder</button>
      </form>
      <?php

      if(isset($_GET["number"])){
        $number = $_GET["number"];
        if($number == ""){
          echo "Lütfen sayı giriniz";
          exit;
        }
        function isDividedBy3($number){
          return !($number % 3);
        }
        function firstDivideableNum($number){
          $remainder = $number % 3;
          $firstNum = $number - $remainder;
          return $firstNum;
        }

        $isDivBy3 = isDividedBy3($number);

        if($isDivBy3 != true){
          echo "Senin sayına göre 3 ile bölünebilecek ilk sayı " . firstDivideableNum($number);
        }else{
          echo "Bu sayı 3 ile bölünebilir";
        }
      }
      ?>

    </div>


  </body>
</html>
