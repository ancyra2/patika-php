<?php

$planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "", "", NULL];

function checkNullValue($arr_val){
  return ($arr_val != "" || $arr_val != NULL);
}

$planets = array_filter($planets,"checkNullValue");

function rand_arr(array $arr, int $n): array{
  $rand_key = array_rand($arr,$n);
  $new_rand_arr = [];

  foreach ($rand_key as $key) {
    $new_rand_arr[] = [
      $arr[$key],
    ];
  }
  return $new_rand_arr;
}

print_r(rand_arr($planets,5)); // Array ( [0] => Array ( [0] => Mercury ) [1] => Array ( [0] => Venus ) [2] => Array ( [0] => Earth ) [3] => Array ( [0] => Mars ) [4] => Array ( [0] => Jupiter ) )
