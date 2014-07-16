<?php

  function solution($a) {
    
    $dir = array('up', 'right', 'down', 'left');
    $store = array();
    $x = 0;
    $y = 0;
    $pos = 0;
    array_push($store, '0,0');
    
    for($i = 0; $i < count($a); $i++) {
      
      if($pos >= 4) $pos = 0;
      $dummy = 0;
      switch($dir[$pos]) {
        
        case 'up':
          $dummy = $y;
          $y += $a[$i];
          $store = store($store, $x, $dummy, $x, $y);
          break;
          
        case 'right':
          $dummy = $x;
          $x += $a[$i];
          $store = store($store, $dummy, $y, $x, $y);
          break;
          
        case 'down':
          $dummy = $y;
          $y -= $a[$i];
          $store = store($store, $x, $dummy, $x, $y);
          break;
          
        case 'left':
          $dummy = $x;
          $x -= $a[$i];
          $store = store($store, $dummy, $y, $x, $y);
          break;
        
      }
      if(has_dupes($store)) return $i+1;
      $pos++;
      
    }
    
  }
  
  function store($store, $x1, $y1, $x2, $y2){
    if($x1 == $x2) {
      if($y1 < $y2){
        for($i = $y1+1; $i <= $y2; $i++){
          array_push($store, ($x1.','.$i));
        }
      }
      else{;
        for($i = $y1-1; $i >= $y2; $i--){
          array_push($store, ($x1.','.$i));
        }
      }
    }
    elseif($y1 == $y2) {
      if($x1 < $x2){
        for($i = $x1+1; $i <= $x2; $i++){
          array_push($store, ($i.','.$y1));
        }
      }
      else{
        for($i = $x1-1; $i >= $x2; $i--){
          array_push($store, ($i.','.$y1));
        }
      }
    }
    return $store;
  }
  
  function has_dupes($array){
    $dupe_array = array();
    foreach($array as $val){
      if(++$dupe_array[$val] > 1){
        return true;
      }
    }
      return false;
  }

  $a = array(1,3,2,5,4,4,6);
  echo solution($a);
