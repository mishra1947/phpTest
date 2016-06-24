<?php
class PubnubNotification extends BaseModel{
	static $table_name = "pubnub_notification";
	const CLASS_ORDER = 'dishIconPoint';
	const CLASS_GROUP_ORDER = 'dishIconPoint';
	const CLASS_RESERVATION = 'reservIconPoint';
	const CLASS_WELCOME = 'welcomeIconPoint';	
	const ONE_CLASS_ORDER = 'dishIconPoint-orange';
	const ONE_CLASS_GROUP_ORDER = 'dishIconPoint-orange';
	const ONE_CLASS_RESERVATION = 'reservIconPoint-orange';
	const ONE_CLASS_WELCOME = 'welcomeIconPoint-orange';
	const NO_NOTIFICATION = 'nonotificationIconPoint-orange';	

	const NOTIFICATION_TYPE_ORDER = 1;
    const NOTIFICATION_TYPE_GROUP_ORDER = 2;
    const NOTIFICATION_TYPE_RESERVATION = 3;
    const NOTIFICATION_TYPE_REVIEWS = 6;
    const NOTIFICATION_TYPE_DEALS = 4;
    const NOTIFICATION_TYPE_INVITE_FRIENDS = 5;
    const NOTIFICATION_CLASS_ORDER = "dishIconPoint-orange";
    const NOTIFICATION_CLASS_GORDER = "dishIconPoint-orange";
    const NOTIFICATION_CLASS_RESERVATION = "reservIconPoint-orange";
    const NOTIFICATION_CLASS_REVIEW = "review_notification";

	static $belongs_to = array();
	public static function get_all_notification($restaurant_id){
		$notification_arr=array();
		$archivelists =array();	        
        $order = "created_on desc";
        $conditions = array("restaurant_id = ? and channel = ? and created_on <= ?", $restaurant_id,'dashboard_'.$restaurant_id,date('Y-m-d H:i:s'));
        $notifications =self::find("all", array(
        	                "conditions" => $conditions,
      	                    "order"=>$order,
      	                    "limit"=>11
                          ));
              
        if($notifications){
	      	$archive_record = self::array_attributes($notifications);
	      	$i=0;
	        foreach ($archive_record as $key => $archivevalue){
	       		$date1 = date('Y-m-d H:i:s',strtotime($archivevalue['created_on']));
		        $date2 = date('Y-m-d H:i:s');
		        $date3 = strtotime($date2)-strtotime($date1);
		        if($i>0){
	         	if($archivevalue['type']==1){
	         		$classes = self::CLASS_ORDER;
		        } 
	         	elseif($archivevalue['type']==2){
					$classes = self::CLASS_GROUP_ORDER;
		       	}
	         	elseif ($archivevalue['type']==3) {
	         		$classes = self::CLASS_RESERVATION;
				}
			    elseif ($archivevalue['type']==5) {
	         		$classes = "twoFriIconPoint";
	         	}
	         	elseif ($archivevalue['type']==6) {
	         		$classes = "reviewIconPoint";
	         	}
	         	else{
					$classes = self::CLASS_GROUP_ORDER ;
				}
	         	$notifications_arr['datediff'] = "1 second ago";
		        if($date3 >0){
	         		$datediff = self::calculate_day_time($date3);
					$arr = split(' ',$datediff);
					$notification_arr['datediff'] = $arr[0]." ". $arr[1];
				}
				
				$notification_arr['date_time'] = self::check_day($date1);
				$notification_arr['time_diff'] = (int)$date3; 
				$notification_arr['classes'] = $classes;
				$notification_arr['notification_msg'] = $archivevalue['notification_msg'];
				$archivelists[] =  $notification_arr ;
  				}
  				$i++;
	        }
	        
	        return !empty($archivelists) ? $archivelists : array('notification_msg'=>"You currently have no new notifications",'datediff'=>0,'date_time'=>date('Y-m-d H:i:s'), 'time_diff'=>0, 'classes'=>self::NO_NOTIFICATION);
	    }

	     return !empty($archivelists) ? $archivelists : array();
	    
	}
	function check_day($date){
	
		$date1= date('Y-m-d',strtotime($date)); // created on date
		$date5 = date('Y-m-d'); // today's date
			$today = date('Y-m-d H:i:s');

        $date7 = date ("Y-m-d", strtotime('-7 days',strtotime($date5)));
        //return self::joinbefore($date,$today);
        if($date1!=$date5){
        	if($date1>$date7){
	        	for($i=1;$i<=6;$i++){
					$date6 = date ("Y-m-d", strtotime('-'.$i. 'days',strtotime($date5)));		
					if($date1 ===$date6){
						if($i==1) 
							return date('M d, Y',strtotime($date))." (".$i." day ago)";	//Feb 21, 2013 (1 day ago)
						else
							return date('M d, Y',strtotime($date))." (".$i." days ago)";	//Feb 21, 2013 (2 days ago)
					}
				}
			}
			else{
				return date('M d, Y',strtotime($date));	// Feb 21, 2013
			}
          	/*$today = date('Y-m-d H:i:s');
           	$diff = strtotime($today) -strtotime($date);
           	
           	if($diff < 0) return '1 second ago'; 
	           	if($diff >= 604800){
            		return date('M d, Y',strtotime($date));	// Feb 21, 2013
            	}
            	else
            	{
            		if($diff >= 86400){
	            		$cal_diff = self::calculate_day_time($diff);
	            		$arr = split(' ',$cal_diff);
	            		$archivevalue = $arr[0]." ". $arr[1]." ago"; 
            		}
	            	else{
	            		$archivevalue = '1 day ago'; 	
	            	}
            	
            	$date_data = date('M d, Y',strtotime($date)).'('.$archivevalue.')'."";//Feb 21, 2013 (2 days ago)
				return $date_data;
				}*/
                //return date('M d @ h:i A',strtotime($date));
            }
            elseif($date1=== $date5){
             //     return "Yesterday @ ".date('h:i A',strtotime($date));
            	if(date('H:i',strtotime($date)) =='12:00'){
            		return "Today, ". date('h:i',strtotime($date))." noon"; //Today, 12:00 noon	
            	}
            	else{
            		return "Today, ". date('h:i a',strtotime($date)); //Today, 6:35PM
            	}
            }    
           /* else{
            	  //return date('h:i A',strtotime($date));
            	$today = date('Y-m-d H:i:s');
            	$diff = strtotime($today) -strtotime($date);
            	$archivevalue = '1 second ago'; 
            	if($diff >0)
            	{
            		$cal_diff = self::calculate_day_time($diff);
            	
            		$arr = split(' ',$cal_diff);
            		$archivevalue = $arr[0]." ". $arr[1]; 
            	}
				return $archivevalue;
            }*/
	}
	function calculate_day_time($secs){
    $ret=array();
    $bit = array(
        ' year'        => $secs / 31556926 % 12,
        ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60
        );
       
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
        }
    array($ret, count($ret)-1, 0, 'and');
    
    $ret[] = 'ago.';
   
    return join(' ', $ret);
    }
    
	public static function get_one_notification($restaurant_id){
	    $notifications_arr =array();
        $order = "created_on desc";
        $conditions = array("restaurant_id = ? and channel=? and created_on <= ?", $restaurant_id,'dashboard_'.$restaurant_id,date('Y-m-d H:i:s'));
        $notifications =self::find("one", array(
        				 
                          "conditions" => $conditions,
                          "order"=>$order,
                          "limit"=>1
                          ));
        
        //print_r($notifications); die();
       if($notifications){
      	 $archivevalue = $notifications->filtered_attributes();
	            if($archivevalue['type']==1){
	         		$order_notification= UserOrder::get_latest_order_notification($restaurant_id,'I');
	         		
	         		$notifications_arr['classes'] = self::ONE_CLASS_ORDER;
	         	
	         	} 
	         	elseif($archivevalue['type']==2){

	         		$order_notification= UserOrder::get_latest_order_notification($archivevalue['restaurant_id'],'G');
	         		
	         		
	         		$notifications_arr['classes'] = self::ONE_CLASS_GROUP_ORDER;
	         	
	         	}
	         	elseif ($archivevalue['type']==3) {
	         			$order_notification= UserReservation::get_latest_reservation_notification($archivevalue['restaurant_id']);
	         		
	         			$notifications_arr['classes'] = self::ONE_CLASS_RESERVATION;
	         	
	         	}
	         	elseif ($archivevalue['type']==5) {
	         		$notifications_arr['classes'] = "twoFriIconPoint";
	         	}
	         	elseif ($archivevalue['type']==6) {
	         		$notifications_arr['classes'] = "reviewIconPoint";
	         	}
	         	else{
	         		$notifications_arr['classes'] = self::ONE_CLASS_RESERVATION;
	         	}
	         	if($notifications){    
	         		$date1 = date('Y-m-d H:i:s',strtotime($archivevalue['created_on']));
		           	$date2 = date('Y-m-d H:i:s');
		          
		            $date3 = strtotime($date2)-strtotime($date1);
		            $notifications_arr['date_time'] = "1 second ago";
		            if($date3 >0){
		           		$datediff = self::calculate_day_time($date3);
		            	$arr = split(' ',$datediff);
		            	$notifications_arr['date_time'] = $arr[0]." ". $arr[1]." ago";
		        	}
		           
		            $notifications_arr['datediff'] = self::check_day($date1);
		            $notifications_arr['time_diff'] = $date3;
		            $notifications_arr['notification_msg'] = Menu::to_utf8($archivevalue['notification_msg']);
		            $archivelists =  $notifications_arr ;
		            return $archivelists;
		        }
		        else{
		        	return array('notification_msg'=>" Welcome to your restaurant dashboard! You’ll be able to manage your business on Munch Ado from here.",'datediff'=>'','date_time'=>date('Y-m-d H:i:s'), 'time_diff'=>-1, 'classes'=>self::NO_NOTIFICATION );
		        }
	       
	    }else{
	    	return array('notification_msg'=>" Welcome to your restaurant dashboard! You’ll be able to manage your business on Munch Ado from here.",'datediff'=>'','date_time'=>date('Y-m-d H:i:s'), 'time_diff'=>-1, 'classes'=>self::NO_NOTIFICATION );
	    }
	    
	}
    
     public static function order_updated_notification($order_id, $status) {
        if (! empty ( $order_id )) {
            $data = array ();
            $order_data = UserOrder::find_one ( array (
                    "id" => $order_id
            ) );
             $data ['cronUpdate'] = 1;
            if (! empty ( $order_data )) {
                $order_type1 = $order_data->order_type1;
                if ($order_type1 == PreOrder::GROUP) {
                    $data ['type'] = self::NOTIFICATION_TYPE_GROUP_ORDER;
                } else {
                    $data ['type'] = self::NOTIFICATION_TYPE_ORDER;
                }
                $restaurant_id = $order_data->restaurant_id;
                $restaurant = Restaurant::find_one ( array (
                        "id" => $restaurant_id
                ) );
                $data ['user_id'] = $order_data->user_id;
                $city_id = $restaurant->city_id;
                $city_data = City::find_by_id ( $city_id );
                if ($city_data) {
                    $time_zone = $city_data->time_zone;
                } else {
                    $time_zone = 'America/New_York';
                }
                $curr_date = new DateTime ( 'now', new DateTimeZone ( $time_zone ) );
                $post_date = $curr_date->format ( 'Y-m-d H:i:s' );
                $data ['created_on'] = $post_date;
                $data ['restaurant_id'] = $restaurant_id;
             
                if ($status == UserOrder::REJECTED) {
                    if($order_data->status==="ordered"){
                    $msg = ucfirst($restaurant->restaurant_name) . " had to cancel your order. Don’t let it keep you down though, place another order!";
                    }else if($order_data->status==="placed"){
                       $msg = ucfirst($restaurant->restaurant_name) . " had to cancel your pre-order. Don’t let it keep you down though, place another order!"; 
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_" . $order_data->user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name"=>$restaurant->restaurant_name, "order_id" => $order_data->id));
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_" . $order_data->user_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "restaurant_name"=>$restaurant->restaurant_name,
                                    "order_id" => $order_data->id,
                                    "order_status" => 2
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );

                    $msg = "You've successfully rejected order number: ".$order_data->payment_receipt;
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_" . $order_data->restaurant_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name"=>$restaurant->restaurant_name, "order_id" => $order_data->id));
                    //$response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_" . $order_data->restaurant_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "payment_receipt" => $order_data->payment_receipt,
                                    "order_id" => $order_data->id,
                                    "order_status" => 2
                            )
                    );
                    //self::post_to_pubnub ( $pubnub_data );
                }
                if ($status == UserOrder::DELIVERED) {
                    $msg = $restaurant->restaurant_name . " told us they delivered your order. It was to you...right?";
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_" . $order_data->user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name"=>$restaurant->restaurant_name, "order_id" => $order_data->id));
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_" . $order_data->user_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "restaurant_name"=>$restaurant->restaurant_name,
                                    "order_id" => $order_data->id,
                                    "order_status" => 0
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                }
                if ($status == UserOrder::CANCELLED) {
                    //$msg = 'Someone canceled their order. They must have cold feet.';
                    if($order_data->order_type==="Delivery"){
                        $msg = 'Your customer cancelled their delivery order. Receipt number: '.$order_data->payment_receipt.'. They must have cold feet.';
                    }else if($order_data->order_type==="Takeout"){
                        if($order_data->status==="ordered"){
                           $msg = 'Your customer cancelled their order. They must have cold feet.'; 
                        }else if($order_data->status==="ordered"){
                            $msg = 'Your customer cancelled their takeout order. Receipt number: '.$order_data->payment_receipt.'. They must have cold feet.'; 
                        }
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_" . $order_data->restaurant_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "order_id" => $order_data->id));
                    //$response = PubnubDashboardNotification::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_" . $order_data->restaurant_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "payment_receipt" => $order_data->payment_receipt,
                                    "order_id" => $order_data->id,
                                    "order_status" => 2
                            )
                    );
                    //self::post_to_pubnub ( $pubnub_data );
                    
                    /* to user */
                    if($order_data->status==="ordered"){
                        if($order_data->order_type==="Delivery"){
                         $msg = 'We’ve successfully canceled your order for you. Bummer.';   
                        }else if($order_data->order_type==="Takeout"){
                         $msg = 'Your order was successfully cancelled. Bummer.';  
                        }
                    }else if($order_data->status==="placed"){
                        $msg = 'We’ve successfully canceled your pre-order for you. Bummer.';
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_" . $order_data->user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "order_id" => $order_data->id));
                    //$response = PubnubDashboardNotification::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_" . $order_data->user_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "payment_receipt" => $order_data->payment_receipt,
                                    "order_id" => $order_data->id,
                                    "order_status" => 2
                            )
                    );
                    //self::post_to_pubnub ( $pubnub_data );
                }
              /*  if ($status == UserOrder::ARRIVED) {
                    $msg = 'Order arrived by ' . $restaurant->restaurant_name;
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_" . $order_data->user_id;
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_" . $order_data->user_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "post_date" => $post_date
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                }*/
                if ($status == UserOrder::CONFIRMED) {
                    if($order_data->order_type==="Delivery"){
                       $msg = ucfirst($restaurant->restaurant_name) . " has accepted, and started preparing your order. Get hungry.";
                    }else if($order_data->order_type==="Takeout"){
                       $msg = ucfirst($restaurant->restaurant_name) . " has accepted, and started preparing your order."; 
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_" . $order_data->user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "order_id" => $order_data->id, "restaurant_name"=>$restaurant->restaurant_name));
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_" . $order_data->user_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "restaurant_name"=>$restaurant->restaurant_name,
                                    "order_id" => $order_data->id,
                                    "order_status" => 1
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                    
                    /* send to dashboard */
                    $msg = '';
                    if($order_data->order_type==="Delivery"){
                        $msg = "You've confirmed delivery order number: ".$order_data->payment_receipt;
                    }else if($order_data->order_type==="Takeout"){
                    $msg = "You've confirmed takeout order number: ".$order_data->payment_receipt;
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_" . $order_data->restaurant_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "order_id" => $order_data->id, "restaurant_name"=>$restaurant->restaurant_name));
                    //$response = PubnubDashboardNotification::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_" . $order_data->restaurant_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "payment_receipt" => $order_data->payment_receipt,
                                    "order_id" => $order_data->id,
                                    "order_status" => 1
                            )
                    );
                    //self::post_to_pubnub ( $pubnub_data );
                    
                }
                if ($status == UserOrder::READY) {
                    $msg = $restaurant->restaurant_name . " finished preparing your takeout order and is waiting patiently for you to claim it.";
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_" . $order_data->user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "order_id" => $order_data->id, "restaurant_name"=>$restaurant->restaurant_name));
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_" . $order_data->user_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "restaurant_name"=>$restaurant->restaurant_name,
                                    "order_id" => $order_data->id,
                                    "order_status" => 0
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                    /* send to dashboard*/
                    if($order_data->order_type==="Takeout"){
                        $msg = "You've marked takeout order number: ".$order_data->payment_receipt." as “Ready.”";
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_" . $order_data->restaurant_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $order_data->user_id, "restaurant_id" =>$restaurant_id , "order_id" => $order_data->id, "restaurant_name"=>$restaurant->restaurant_name));
                    //$response = PubnubDashboardNotification::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_" . $order_data->restaurant_id,
                            "message" => array (
                                    "user_id" => $order_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "order",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "payment_receipt" => $order_data->payment_receipt,
                                    "order_id" => $order_data->id,
                                    "order_status" => 0
                            )
                    );
                   // self::post_to_pubnub ( $pubnub_data );
                }
            }
        }
        return 'success';
    }

     public static function reservation_updated_notification($reservation_id, $status) {
        $city_data = "";
        $updated_data ="";
        if (! empty ( $reservation_id )) {
            $reservation_data = UserReservation::find_one ( array (
                    "id" => $reservation_id
            ) );
            if (! empty ( $reservation_data )) {
                $restaurant_id = ( string ) $reservation_data->restaurant_id;
                $data = array ();
                $restaurant = Restaurant::find_one ( array (
                        "id" => $restaurant_id
                ) );
                $city_id = $restaurant->city_id;
                if ($city_id) {
                    $city_data = City::find_by_id ( $city_id );
                }
                if ($city_data) {
                    $time_zone = $city_data->time_zone;
                    if ($time_zone == '' || $time_zone == null) {
                        $time_zone = 'America/Los_Angeles';
                    }
                } else {
                    $time_zone = 'America/Los_Angeles';
                }
                date_default_timezone_set ( $time_zone );
               
                $post_date = date ( 'Y-m-d H:i:s' );
               
                $data ['user_id'] = $reservation_data->user_id;
                // $post_date=date('Y-m-d H:i:s');
                $data ['created_on'] = $post_date;
                $data ['type'] = self::NOTIFICATION_TYPE_RESERVATION;
                $data ['cronUpdate'] = 1;
                $data ['restaurant_id'] = $restaurant_id;
                $userName = User::find_user_name ( $data ['user_id'] );
                if ($status == UserReservation::UPCOMING) {
                    $msg = ucwords ( $restaurant->restaurant_name ) . " had to make a few changes to your reservation. Let us know if they still work for you or if you'd like to find another place.";
                    if($reservation_data->order_id!=''){
                        $msg = ucwords ( $restaurant->restaurant_name ) . " made a change to your pre-paid reservation. Check it out." ; 
                    }
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_" . $reservation_data->user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $reservation_data->user_id, "restaurant_id" =>$restaurant_id , "reservation_id"=>$reservation_id, "restaurant_name"=>$restaurant->restaurant_name));
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_" . $reservation_data->user_id,
                            "message" => array (
                                    "user_id" => $reservation_data->user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "reservation",
                                    "msg" => $msg,
                                    "curdate" => $post_date,
                                    "restaurant_name"=>$restaurant->restaurant_name,
                                    "reservation_id"=>$reservation_id,
                                    "reservation_status"=>$status,
                                    "first_name" =>$userName,
                                    "is_friend" => 0,
                                    "reservation_status" =>UserReservation::UPCOMING
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                    self::get_user_unread_notification_count($reservation_data->user_id);
                   $updated_data=array("type" => "reservation","msg" => $msg);
                    /**
                     * send to user friends
                     */
                    $invition = UserReservationInvitation::find_all( array (
                            "reservation_id = ? and msg_status =? and to_id is not null",
                            $reservation_id,
                            UserReservationInvitation::ACCEPTED
                    ) );
                    if ($invition) {
                        foreach ($invition as $key => $value) {
                        $attrs = $value->filtered_attributes();
                        $user_id = $attrs['user_id'];
                        $friend_id = $attrs['to_id'];
                        if(!empty($friend_id)){
                        $userName = User::find_user_name ( $user_id );
                        $friend_name = User::find_user_name ( $friend_id );
                        $msg = ucwords ( $restaurant->restaurant_name ) . " had to make a few changes to " . ucwords ( $userName ) . "'s reservation.";
                        if($reservation_data->order_id!=''){
                            $msg = ucwords ($userName)." changed your pre-paid reservation at ".ucwords ( $restaurant->restaurant_name ).". Check it." ; 
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['user_id'] = $friend_id;
                        $data ['channel'] = "mymunchado_" . $friend_id;
                        $data ['pubnub_info'] = json_encode(array("user_id" => $friend_id,  "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name, "reservation_id"=>$reservation_id));
                        $response = PubnubNotification::create ( $data );
                        $pubnub_data = array (
                                "channel" => "mymunchado_" . $friend_id,
                                "message" => array (
                                        "user_id" => $friend_id,
                                        "restaurant_id" => $restaurant_id,
                                        "type" => "reservation",
                                        "msg" => $msg,
                                        "curdate" => $post_date,
                                        "restaurant_name"=>$restaurant->restaurant_name,
                                        "reservation_id"=>$reservation_id,
                                        "reservation_status"=>$status,
                                        "first_name" =>$userName,
                                        "is_friend" => 0,
                                        "reservation_status" =>UserReservation::UPCOMING
                                )
                        );
                       self::post_to_pubnub ( $pubnub_data );
                        }
                       }
                    }
                }
                    if ($status == UserReservation::CANCELED) {
                        /**
                         * send to user
                         */
                        $msg = 'You’ve successfully canceled your reservation at ' . $restaurant->restaurant_name . '. Bummer.';
                        if($reservation_data->order_id!=''){
                           $msg = "We successfully canceled your pre-paid reservation at ". $restaurant->restaurant_name ." for you."; 
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['channel'] = "mymunchado_" . $reservation_data->user_id;
                        $data ['pubnub_info'] = json_encode(array("user_id" => $reservation_data->user_id,  "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name, "reservation_id"=>$reservation_id));
                        $response = PubnubNotification::create ( $data );
                        $pubnub_data = array (
                                "channel" => "mymunchado_" . $reservation_data->user_id,
                                "message" => array (
                                        "user_id" => $reservation_data->user_id,
                                        "restaurant_id" => $restaurant_id,
                                        "type" => "reservation",
                                        "msg" => $msg,
                                        "curdate" => $post_date,
                                        "restaurant_name"=>$restaurant->restaurant_name,
                                        "reservation_id"=>$reservation_id,
                                        "reservation_status"=>$status,
                                        "first_name" =>$userName,
                                        "is_friend" => 0,
                                        "reservation_status" =>UserReservation::CANCELED
                                )
                        );
                        self::post_to_pubnub ( $pubnub_data );
                        /**
                         * send to dashboard
                         */
                        //$msg = $restaurant->receipt_no.' cancelled their reservation. What a dummy.';
                        $msg = 'Your customer cancelled their reservation. Their loss!';
                        if($reservation_data->order_id!=''){
                            $msg = "Your customer had to cancel their pre-paid reservation. Too bad.";
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['channel'] = "dashboard_" . $reservation_data->restaurant_id;
                        $response = PubnubDashboardNotification::create ( $data );
                        $updated_data=array("type" => "reservation","msg" => $msg);
                       
                        /**
                         * send to user friends
                         */
                        $invition = UserReservationInvitation::find_all( array (
                                "reservation_id = ? and msg_status =? and to_id is not null",
                                $reservation_id,
                                UserReservationInvitation::ACCEPTED
                        ) );
                        if ($invition) {
                        foreach ($invition as $key => $value) {
                        $attrs = $value->filtered_attributes();
                            $user_id = $attrs['user_id'];
                            $friend_id = $attrs['to_id'];
                            if(!empty($friend_id)){
                            $userName = User::find_user_name ( $user_id );
                            $friend_name = User::find_user_name ( $friend_id );
                            $msg = "Hey " . ucwords ( $friend_name ) . ", " . ucwords ( $userName ) . " had to cancel the reservation at " . ucwords ( $restaurant->restaurant_name ) . ". Have no fear, Munch Ado has plenty of other places waiting to make you some food.";
                            $data ['notification_msg'] = $msg;
                            $data ['user_id'] = $friend_id;
                            $data ['channel'] = "mymunchado_" . $friend_id;
                            $data ['pubnub_info'] = json_encode(array("user_id" => $user_id, "userName" => $userName, "friend_id" => $friend_id, "friend_name" => $friend_name, "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name));
                            $response = PubnubNotification::create ( $data );
                            $pubnub_data = array (
                                    "channel" => "mymunchado_" . $friend_id,
                                    "message" => array (
                                            "user_id" => $friend_id,
                                            "restaurant_id" => $restaurant_id,
                                            "type" => "reservation",
                                            "msg" => $msg,
                                            "curdate" => $post_date,
                                            "friend_name" => $friend_name,
                                            "first_name" => $userName,
                                            "restaurant_name" => $restaurant->restaurant_name,
                                            "reservation_id"=>$reservation_id,
                                            "reservation_status"=>$status,
                                            "is_friend" => 0,
                                            "reservation_status" =>UserReservation::CANCELED
                                        
                                    )
                            );
                            self::post_to_pubnub ( $pubnub_data );
                        }
                         }
                        }
                    }
                    
                    if($status == UserReservation::CONFIRMED){
                        $msg = '';
                        $msg = "Reservation: officially reserved, at ".$restaurant->restaurant_name." Good get. ";
                        if($reservation_data->order_id!=''){  
                        $msg ="Your pre-paid reservation was successfully reserved at ".$restaurant->restaurant_name.". Way to go!";  
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['channel'] = "mymunchado_" . $reservation_data->user_id;
                        $data ['pubnub_info'] = json_encode(array("user_id" => $reservation_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name));
                        $response = self::create ($data);  
                        $datatopush = array (
                                "channel" => "mymunchado_" .$reservation_data->user_id,
                                "message" => array (
                                        "user_id" => $reservation_data->user_id,
                                        "restaurant_id" => $restaurant_id,
                                        "type" => "reservation",
                                        "msg" => $msg,
                                        "curDate" => $post_date,
                                        "restaurant_name"=> $restaurant->restaurant_name,
                                        "reservation_id"=>$reservation_id,
                                        "reservation_status"=>$status,
                                        "first_name" =>$userName,
                                        "is_friend" => 0,
                                        "reservation_status" =>UserReservation::CONFIRMED
                                )
                        );
                        self::post_to_pubnub($datatopush);
                        
                        /* send to dashboard */
                        $msg = '';
                        $msg = "You've confirmed reservation number: ".$reservation_data->receipt_no;
                        if($reservation_data->order_id!=''){
                            $msg = "You've confirmed pre-paid reservation number: ".$reservation_data->receipt_no;
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['channel'] = "dashboard_" . $reservation_data->restaurant_id;
                        $data ['pubnub_info'] = json_encode(array("user_id" => $reservation_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name));
                       // $response = PubnubDashboardNotification::create ($data);  
                        $datatopush = array (
                                "channel" => "dashboard_" . $reservation_data->restaurant_id,
                                "message" => array (
                                        "user_id" => $reservation_data->user_id,
                                        "restaurant_id" => $restaurant_id,
                                        "type" => "reservation",
                                        "msg" => $msg,
                                        "curDate" => $post_date,
                                        "restaurant_name"=> $restaurant->restaurant_name,
                                        "reservation_id"=>$reservation_id,
                                        "reservation_status"=>$status,
                                        "first_name" =>$userName,
                                        "is_friend" => 0,
                                        "reservation_status" =>UserReservation::CONFIRMED
                                )
                        );
                      //  self::post_to_pubnub($datatopush);
                        $updated_data=$msg;
                    }
                    
                    if ($status == UserReservation::REJECTED) {
                        $msg = '';
                        $msg = "We’re sorry, ".$restaurant->restaurant_name." canceled your reservation. Don't worry, there are plenty of other places around town waiting for you to warm their seats.";
                        if($reservation_data->order_id!=''){
                            $msg = "We’re sorry, ".$restaurant->restaurant_name." canceled your pre-paid reservation. Don't worry, there are plenty of other places around town waiting for you to warm their seats.";
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['user_id'] = $reservation_data->user_id;
                        $data ['channel'] = "mymunchado_".$reservation_data->user_id;
                        $data ['pubnub_info'] = json_encode(array("user_id" => $reservation_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name));
                        $response = PubnubNotification::create ($data);                      
                        $datatopush = array (
                                "channel" => "mymunchado_".$reservation_data->user_id,
                                "message" => array (
                                        "user_id" => $reservation_data->user_id,
                                        "restaurant_id" => $restaurant_id,
                                        "type" => "reservation",
                                        "msg" => $msg,
                                        "curDate" => $post_date,
                                        "restaurant_name"=> $restaurant->restaurant_name,
                                        "reservation_id"=>$reservation_id,
                                        "reservation_status"=>$status,
                                        "first_name" =>$userName,
                                        "is_friend" => 0,
                                        "reservation_status" =>UserReservation::REJECTED
                                )
                        );
                        self::post_to_pubnub($datatopush);
                        $updated_data=$msg;
                          
                        /* send to Dashboard */
                        
                         $msg = '';
                        $msg = "You've successfully rejected reservation No. ".$reservation_data->receipt_no;
                        if($reservation_data->order_id!=''){
                            $msg = "You've successfully rejected pre-paid reservation No. ".$reservation_data->receipt_no;
                        }
                        $data ['notification_msg'] = $msg;
                        $data ['channel'] = "dashboard_" . $reservation_data->restaurant_id;
                        $data ['pubnub_info'] = json_encode(array("user_id" => $reservation_data->user_id, "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name));
                       // $response = PubnubDashboardNotification::create ($data);                      
                        $datatopush = array (
                                "channel" => "dashboard_" . $reservation_data->restaurant_id,
                                "message" => array (
                                        "user_id" => $reservation_data->user_id,
                                        "restaurant_id" => $restaurant_id,
                                        "type" => "reservation",
                                        "msg" => $msg,
                                        "curDate" => $post_date,
                                        "restaurant_name"=> $restaurant->restaurant_name,
                                        "reservation_id"=>$reservation_id,
                                        "reservation_status"=>$status,
                                        "first_name" =>$userName,
                                        "is_friend" => 0,
                                        "reservation_status" =>UserReservation::REJECTED
                                )
                        );
                        //self::post_to_pubnub($datatopush);
                        
                        /* send to user friends */

                        $invition = UserReservationInvitation::find_all ( array (
                                "reservation_id = ? and msg_status =? and to_id is not null",
                                $reservation_id,
                                UserReservationInvitation::ACCEPTED
                        ) );
                        if ($invition) {
                        foreach ($invition as $key => $value) {
                        $attrs = $value->filtered_attributes();
                            $user_id = $attrs['user_id'];
                            $friend_id = $attrs['to_id'];
                            if(!empty($friend_id)){
                            $userName = User::find_user_name ( $user_id );
                            $friend_name = User::find_user_name ( $friend_id );
                            $msg = "How Rood! " . ucwords ( $restaurant->restaurant_name ) . " canceled ." . ucwords ( $userName ) . "'s reservation. Maybe you guys can try a different spot.";
                            $data ['notification_msg'] = $msg;
                            $data ['user_id'] = $friend_id;
                            $data ['channel'] = "mymunchado_" . $friend_id;
                            $data ['pubnub_info'] = json_encode(array("user_id" => $friend_id, "userName"=>$userName , "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name, "reservation_id"=>$reservation_id));
                            $response = PubnubNotification::create ( $data );
                            $pubnub_data = array (
                                    "channel" => "mymunchado_" . $friend_id,
                                    "message" => array (
                                            "user_id" => $friend_id,
                                            "restaurant_id" => $restaurant_id,
                                            "type" => "reservation",
                                            "msg" => $msg,
                                            "curdate" => $post_date,
                                            "restaurant_name"=> $restaurant->restaurant_name,
                                            "first_name"=>$userName,
                                            "reservation_id"=>$reservation_id,
                                            "reservation_status"=>$status,
                                            "is_friend" => 0,
                                            "reservation_status" =>UserReservation::REJECTED
                                    )
                            );
                            self::post_to_pubnub ( $pubnub_data );
                        }
                        }
                        }
                    }
                    return ($updated_data) ? $updated_data : $response;
                }
            }
        }
        public static function review_update_notification($review_id, $status) {
        if (! empty ( $review_id )) {
            $review_data = UserReview::find($review_id);
           
            if (! empty ( $review_data )) {
                $data = array ();
                $restaurant_id = $review_data->restaurant_id;
                $user_id = $review_data->user_id;
                $restaurant = Restaurant::find($restaurant_id);
                $city_id = $restaurant->city_id;
                $city_data = City::find_by_id ( $city_id );
                $userName = User::find_user_name ( $user_id );
                $time_zone = 'America/New_York';
                if ($city_data) {
                    $time_zone = ($time_zone) ? $city_data->time_zone : 'America/New_York';
                } else {
                    $time_zone = 'America/New_York';
                }
                $curr_date = new DateTime ( 'now', new DateTimeZone ( $time_zone ) );
                $post_date = $curr_date->format ( 'Y-m-d H:i:s' );
                $msg_time = "Today,".$curr_date->format ('H:i a');
                $data ['user_id'] = $user_id;
                $data ['created_on'] = $post_date;
                // New Review Posted: Someone reviewed your restaurant. Breathe.
                $data ['type'] = 4;
                $data ['restaurant_id'] = $restaurant_id;
               
             /*   if ($status == UserReview::STATUS_APPROVED) {
                    $msg = 'Someone wrote about you on Munch Ado! Read and respond right now!';
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_".$restaurant_id;
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_".$restaurant_id,
                            "message" => array (
                                    "user_id" => $user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "review",
                                    "msg" => $msg,
                                    "post_date" => $post_date
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                           
               
                }
                if ($status == UserReview::STATUS_DISAPPROVED) {
                    $msg = "Review Posted for " . ucwords ( $restaurant->restaurant_name ) . " have been disapproved.";
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "dashboard_".$restaurant_id;
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "dashboard_".$restaurant_id,
                            "message" => array (
                                    "user_id" => $user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "review",
                                    "msg" => $msg,
                                    "post_date" => $post_date
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                    // This for mymunchaddo //
                    $msg = "Your review for ".ucwords ( $restaurant->restaurant_name ) . " was disapproved.";
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_".$user_id;
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_".$user_id,
                            "message" => array (
                                    "user_id" => $user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "review",
                                    "msg" => $msg,
                                    "post_date" => $post_date
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                }*/
               
                if($status =='replied'){
                        // This for mymunchaddo //
                    $msg = ucwords ( $restaurant->restaurant_name ) . " read and replied to your review. Eeep!";
                    $data ['notification_msg'] = $msg;
                    $data ['channel'] = "mymunchado_".$user_id;
                    $data ['pubnub_info'] = json_encode(array("user_id" => $user_id, "restaurant_id" =>$restaurant_id , "restaurant_name" =>$restaurant->restaurant_name, "review_id" => $review_id));
                    $response = self::create ( $data );
                    $pubnub_data = array (
                            "channel" => "mymunchado_".$user_id,
                            "message" => array (
                                    "user_id" => $user_id,
                                    "restaurant_id" => $restaurant_id,
                                    "type" => "reviews",
                                    "msg" => $msg,
                                    "curDate" => $post_date,
                                    "restaurant_name" => $restaurant->restaurant_name,
                                    "review_id" => $review_id,
                                    "first_name" =>$userName,
                                    "restaurant_exist" => "1",
                                    "msg_time" =>$msg_time,
                                    "is_friend" => "0", 
                                
                            )
                    );
                    self::post_to_pubnub ( $pubnub_data );
                }
            }
            return $response;
        }
    }
    public static function get_user_unread_notification_count($userId){
        $conditions = array("user_id = ? and read_status = 0 and channel=?",$userId,'mymunchado_'.$userId);
        $notification = self::total_count($conditions);
        return $notification;
    }
}
?>