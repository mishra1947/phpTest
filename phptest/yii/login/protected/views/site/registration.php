<?php 
//print_r($model);die;
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - Register Here';
$this->breadcrumbs = array(
    'Registration',
);
?>
<h1>Register Here</h1>
<p>
    If you are not registered, please register here.
</p>
<div class="form">


<?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registration_form',
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    ));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php //echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'firstName'); ?>
        <?php echo $form->textField($model, 'firstName'); ?>
        <?php echo $form->error($model, 'firstName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lastName'); ?>
        <?php echo $form->textField($model, 'lastName'); ?>
        <?php echo $form->error($model, 'lastName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'gender'); ?>
        <?php echo $form->radioButtonList($model, 'gender', array('0'=>'Male', '1'=>'Female'));?>
        <?php echo $form->error($model, 'gender'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'city'); ?>
        <?php echo $form->dropDownList($model,'city',array("0"=>"Delhi","1"=>"Gurgaon")); ?>
        <?php echo $form->error($model, 'city'); ?>
    </div>
    
    <div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
    </div>
<?php $this->endWidget(); ?>
</div>


