<?php
interface moreInfo{
    public function mobileNo($par);
}

abstract class myInfo{
    var $name;
    var $age;
    var $add;
   
    function __construct($n,$ag,$ad) {
        $this->name = $n;
        $this->age = $ag;
        $this->add = $ad;
    }
    
}
class User extends myInfo implements moreInfo{
     public  $mobile;
    function getName(){
        echo $this->name;
    }
    function getAge(){
        echo $this->age;
    }
    function getAdd(){
        return $this->add;
    }
    public function mobileNo($par) {
        $this->mobile = $par;
    }
    function getMoblie(){
        echo $this->mobile;
    }
}
$user1 = new User("Shivam". "\n",20 . "\n", "New Delhi". "\n");
$user1->getName();
$user1->getAge();
$address = $user1->getAdd();
print $address;
$user1->mobileNo(8880007771);
$user1->getMoblie();
if($user1 instanceof moreInfo){
    echo "welcome";
}
