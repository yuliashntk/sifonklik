<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
                   <!-- Nested Row within Card Body -->
                     <div class="row-center">
                           
                            <div class="col-lg-5-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login terlebih dahulu!</h1>
                                    </div>
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        'options' => ['class' => 'user']
                                    ]); ?>
                    
                                    <?= $form->field($model, 'username', [
                                        'inputOptions' =>[
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Masukkan username Anda',
                                        ]
                                    ])->textInput(['autofocus' => true]) ?>
                                    <?= $form->field($model, 'password', [
                                        'inputOptions' =>[
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Masukkan password Anda',
                                        ]
                                    ])->passwordInput() ?>
                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                       
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
                                        <hr>
                                        
                                    <?php ActiveForm::end(); ?>
                                    <hr>
                                    <div>
                                        <a class="small" href="<?php echo \yii\helpers\Url::to(['/site/forgot-password'])?>">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>