<?php
if(isset($_FILES['image'])){
    $error = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['temp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$file_name)));
     
    $file_ext_valid = array('jpg', 'jpeg', 'png');
    
    if(in_array($file_ext, $file_ext_valid)=== FALSE){
        $error[]="file type is not allowed";
    }else if($file_size>2097152){
        $error[]="file size is too large";
    }
    
    if(empty($error)==TRUE){
        move_uploaded_file($file_temp, "images/".time().$file_name);
        echo 'success';
    }else{
        print_r($error);
    }
    
}
?>
<html>
    <head>
        <title>Upload a file</title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="image" />
        <input type="submit" />
        
         <ul>
            <li>Sent file: <?php echo $file_name;  ?>
            <li>File size: <?php echo $file_size;  ?>
            <li>File type: <?php echo $file_type; ?>
         </ul>
        </form>
    </body>
</html>

