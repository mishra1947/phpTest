<?php
       
        //$colors = array("red","green","blue");
        //foreach ($colors as $value) {
          //  echo "$value";
       // }
         // echo count($colors);
       $age = array("joe"=>"35","ben"=>"40","peter"=>"45");
       //foreach ($age as $x => $x_value){
        //    echo "Key=" . $x . ", Value=" . $x_value;
       //} 
       //sort($colors);
       //$clength = count($colors);
       //for($x=0; $x<=$clength; $x++){
       //echo $colors[$x];
      //}
      print_r($age);
      ksort($age);
       $clength = count($age);
      foreach ($age as $key => $value){
            echo "Key=" . $key . ", Value=" . $value;
       } 

?>
