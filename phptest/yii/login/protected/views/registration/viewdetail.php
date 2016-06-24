<?php
//echo "<pre>";
//print_r($data); die;
/* @var $this RegistrationController */
/* @var $data Registration */
?>

<div class="view">
    <?php 
   //foreach ($model as $data):
       ?>
    <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::encode($model->id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('firstName')); ?>:</b>
    <?php echo CHtml::encode($model->firstName); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('lastName')); ?>:</b>
    <?php echo CHtml::encode($model->lastName); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::encode($model->username); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?>:</b>
    <?php echo CHtml::encode($model->gender); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($model->email); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('password')); ?>:</b>
    <?php echo CHtml::encode($model->password); ?>
    <br />

    
    <b><?php echo CHtml::encode($model->getAttributeLabel('city')); ?>:</b>
    <?php echo CHtml::encode($model->city); ?>
    <br />

   <?php  //    endforeach;?>
</div>

