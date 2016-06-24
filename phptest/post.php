<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
   NAME:<input type='text' name='fname'>
        <input type='submit'>
</form>

 <?php
 session_start();
 //$_SESSION['username'] = $_POST['fname'];

  if(!empty($_POST['fname'])){
      $_SESSION['username'] = $_POST['fname'];
  }
  echo $_SESSION['username'];
  print_r($_SESSION);
  if($_SERVER['REQUEST_METHOD']==POST){
	  $name= $_POST['fname'];
	  if(empty($name)){
		  echo "Name is Empty";
	  }else{
		  echo $name;
	  }
  }
 
  unset($_SESSION['username1']);
  session_destroy();
 ?>
</body>