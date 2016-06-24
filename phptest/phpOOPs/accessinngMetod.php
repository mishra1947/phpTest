<?php
class Calssy{
    const STAT = "constant";
    static $stat = "static";
    public $pub = "public";
    private $pri = "private";
    
    function access(){
        print '<br> access constant like'. self::STAT;
        print '<br> access static variable like'. Calssy::$stat;
        print '<br> OR access static variable like'. self::$stat;
        print '<br> access public'. $this->pub;
      //  print $this->$stat;//legal but not what you might think: empty result
        
    }
}

$obj = new Calssy();
$obj->access();