<?php

//Base class
class Books {

    var $price;
    var $writer;

//    function setPrice($par1){
//        $this ->price = $par1;
//    }
//    function setWriter($par2){
//        $this->writer = $par2;
//    }
//    function getPrice(){
//        echo "the price is ".$this->price . " Rs.";
//    }
    function __construct($par1, $par2, $par) {
        $this->price = $par1;
        $this->writer = $par2;
        $this->title = $par;
    }

    function getPrice() {
        echo "the price is " . $this->price . " Rs.";
    }
    function getWriter(){
        echo "the writer is ". $this->writer ;
    }

}

//inherit class or child or derived class
class Title extends Books {

    function setTitle($par) {
        $this->title = $par;
    }

    function getTitle() {
        echo "the title is " . $this->title;
    }

}

$maths = new Books(100,"R.D. Sharma");
$physics = new Title(200, "H.C. verma", "10th");
//$maths->setPrice(100);

$maths->getPrice();
$maths->getWriter();
//$physics->setPrice(200);

$physics->getprice();
$physics->getWriter();
//$physics->setTitle("10th Physics");
$physics->getTitle();





