<?php

class base {

    public function my_function() {
        echo __CLASS__;
        echo"base::my_function() \n";
    }

}

class child extends base {

    public function my_function() {
        parent::my_function();
        echo"child::my_function() \n";
    }

}
 $object = new child();
 $object->my_function();