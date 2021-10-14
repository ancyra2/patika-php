<?php
function oTriangle(int $n)
{
  if($n <= 0) return;
  oTriangle($n-1);
  for ($i=1;  $i<=$n; $i++) {
      echo "O";
  }
echo "<br>";
}
oTriangle(15);
 ?>
