<div id="ShowMessage">
    <?php
    use yii\bootstrap\Alert;
    $messages = Yii::$app->session->getAllFlashes();
    if (!empty($messages)) {
        foreach ($messages as $type => $message) {
            echo Alert::widget(['options' => ['class' => 'alert-' . $type], 'body' => $message]);
        }
    }
    ?>
</div>
