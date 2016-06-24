<?php
class Car{
    public $color;
    public $modal;
    public $company;
    
    function __construct($color,$modal,$company) {
        $this->color = $color;
        $this->modal = $modal;
        $this->company = $company;
    }
    public function getColor(){
        return "the color is ". $this->color;
    }
    public function getModal(){
        return "The Modal is ". $this->modal;
    }
    public function getCompany(){
        return "The company is". $this->company;
    }
}

$car = new Car("red","swift dezire","Suzuki");
echo $car->getColor();
echo $car->getModal();
echo $car->getCompany();
