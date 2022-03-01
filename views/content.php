<?php
/**
 * @var $model Contact
*/

use matintayebi\phpmvc\form\Form;
use app\models\Contact;

?>
<div class="col-md-8 mt-5">
    <?php $form = Form::begin("", "POST","contact-us") ?>
    <?= $form->field($model,"subject","text"); ?>
    <?= $form->field($model,"email","email"); ?>
    <?= $form->textareaField($model,"description"); ?>
    <div class="form-group mt-2 ">
        <button class="btn btn-sm btn-primary" type="submit" name="submit">
            submit
        </button>
    </div>
    <?= $form = Form::end() ?>
</div>