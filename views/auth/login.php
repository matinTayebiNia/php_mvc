<?php
/**
 * @var User $model
 */

use app\models\User;
use \matintayebi\phpmvc\form\Form;

?>
<div class="col-md-8 mt-5">
    <?php $form = Form::begin("", "POST", "registerForm") ?>
    <?= $form->field($model, "email", "email") ?>
    <?= $form->field($model, "password", "password") ?>
    <button type="submit" name="submit" class="btn btn-danger mt-3">submit</button>
    <?= Form::end() ?>
</div>