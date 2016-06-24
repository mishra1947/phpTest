<?php
// CTest does not derive from stdClass
class CTest{
    public $property1;
}
$obj = new CTest();
var_dump($obj instanceof stdClass);
var_dump(is_subclass_of($obj, 'stdClass'));
echo get_class($obj);
var_dump(get_parent_class($obj));