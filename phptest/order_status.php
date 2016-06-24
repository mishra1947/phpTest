<?php

$order_created_time = strtotime("2016-03-16 02:31:20");
$order_delivery_time =strtotime("2016-03-16 04:00:00");;
var_dump(round(($order_delivery_time - $order_created_time) / 60,2));

