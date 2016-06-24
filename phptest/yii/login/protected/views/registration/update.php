<h1>Update Profile</h1>
<div class="form">
      <?php $form=$this->beginWidget('CActiveForm', array(
         'id'=>'update-form',
          'enableClientValidation'=>true,
         )); ?>
      
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
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    
      <div class="row buttons">
         <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
         <?php echo CHtml::link('Cancel',array('registration/edit'), array('class'=>'btn btn-primary')); ?>
      </div>
      <?php $this->endWidget(); ?>
   </div>
</div>