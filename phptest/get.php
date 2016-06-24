<body>
<form method="get" action="<?php $_SERVER['PHP_SELF']?>">
   NAME:<input type='text' name='fname'>
        <input type='submit'>
</form>

 <?php
  if($_SERVER['REQUEST_METHOD']==GET){
	  $name= $_GET['fname'];
	  if(empty($name)){
		  echo "Name is Empty";
	  }else{
		  echo $name;
	  }
  }
 ?>
</body>