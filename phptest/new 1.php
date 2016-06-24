<body>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
   NAME:<input type='text' name='fname'>
        <input type='submit'>
</form>

 <?php
  if($_SERVER['REQUEST_METHOD'==POST]){
	  $name= $_REQUEST['fname'];
	  if(empty($name)){
		  echo "Name is Empty";
	  }else{
		  echo $name;
	  }
  }
 ?>
</body>