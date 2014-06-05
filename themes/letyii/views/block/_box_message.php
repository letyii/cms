<div id="ShowMessage">
    <?php
    use yii\bootstrap\Alert;
    $this->params['messages'] = isset($this->params['messages']) ? $this->params['messages'] : [];
    $messages = array_replace_recursive(Yii::$app->session->getAllFlashes(), $this->params['messages']);
    if (!empty($messages)) {
        foreach ($messages as $type => $message) {
            echo Alert::widget(['options' => ['class' => 'alert-' . $type], 'body' => $message]);
        }
    }
    ?>
</div>
