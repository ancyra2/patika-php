<?php

abstract class Sekil{
  public array $kenar;
  public int $yukseklik;

  public abstract function alan(array $kenar, ?int $yukseklik): int;
  public abstract function cevre(array $kenar): int;
}

class Dikdortgen extends Sekil{

  public function alan(array $kenar, ?int $yukseklik): int{
    $this->kenar = $kenar;

    return $kenar[0] * $kenar[1];
  }

  public function cevre(array $kenar): int{
    $this -> kenar = $kenar;
    return array_sum($kenar);
  }

}

class Ucgen extends Sekil{

  public function alan(array $kenar, ?int $yukseklik): int{
    $this->kenar = $kenar;
    $this->yukseklik = $yukseklik;
    return ($kenar[0] * $yukseklik) / 2;
  }

  public function cevre($kenar) : int{
    $this->kenar = $kenar;
    return array_sum($kenar);
  }
}

class Kare extends Dikdortgen{

}

$ucgen = new Ucgen();
echo "Üçgenin alanı :" . $ucgen->alan([3],2);
echo "<br>";
echo "Üçgenin çevresi :" . $ucgen->cevre([3,4,5]);
