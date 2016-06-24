<?php

class demo {

    function __construct() {
        print "this is parrent class constructor \n";
    }

}

class subdemo extends demo {

    function __construct() {
        parent::__construct();
        print "this is subclass constructor call \n";
    }

}

class otherdemo extends demo {

    function happy() {
        print 'yahoo';
    }

}

$obj = new demo();
$obj1 = new subdemo();
$obj2 = new otherdemo();
$obj2->happy();
