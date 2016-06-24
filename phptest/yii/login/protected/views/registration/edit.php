<style>
    th,td{
        text-align: center;
    }
    table{
         border-collapse: collapse;
         width: 100%;
         border: 2px solid black;
    }
</style>
<div class="view">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Option</th>
            </tr>
        </thead>
        <?php
        foreach ($data as $model ):
        ?>
        <tbody>
            <tr width="100%" style="border: 2px solid black;">
                <td><?php echo $model->id;?></td>
                <td><?php echo $model->firstName; ?></td>
                <td><?php echo $model->lastName; ?></td>
                <td><?php echo $model->username; ?></td>
                <td><?php echo $model->email; ?></td>
                <td><span class="row buttons"><?php echo CHtml::link('Edit',array('registration/update&id='.$model->id)); ?></span>
                    <span class="row buttons"><?php echo CHtml::link('View','#',array('onclick'=>'dialogbox('.$model->id.')',)); ?></span>
                    <span class="row buttons"><?php echo CHtml::link('Log','#',array('onclick'=>'logdialogbox('.$model->id.')',)); ?></span>
                    <span class="row buttons"><?php echo CHtml::link('Delete',array('registration/delete&id='.$model->id),array('confirm'=>"Are you really want to delete")); ?></span></td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table> 
</div>
<?php 
   $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
       'id'=>'mydialog',
       'options'=>array(
           'title'=>'View Details',
           'autoOpen'=>false,
           'modal'=>true,  
      'width'=>400,  
      'height'=>280,  
       ),
   ));
   ?>
<div id="data-view"></div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>  

<?php
   $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
       'id'=>'mylogdiallog',
       'options'=>array(
           'title'=>'View Log',
           'autoOpen'=>false,
           'modal'=>true,
           'width'=>400,
           'height'=>400,
       ),
   ));
?>
<><div id="view-log"></div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
<script src="protected/js/viewDetail.js"></script>  




