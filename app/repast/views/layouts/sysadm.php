<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\SysadmAsset;

/* @var $this \yii\web\View */
/* @var $content string */

SysadmAsset::register($this);
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(($this->params['title'] ? $this->params['title'] : '')) ?></title>
    <?php $this->head() ?>
</head>
<body class="sysadm">
<?php $this->beginBody(); 
	echo $this->render('/sysadm/widgets/topbar');
?>
    <div class="wrap">
        <div class="col-lg-2 wrap-layout"><div class="row sidebar"><?= $this->render('/sysadm/widgets/sidebar')?></div></div>
		<div class="col-lg-10 wrap-layout">
			<div class="row content"><?= $content ?></div>
		</div>
    </div>
<?php $this->endBody(); ?>
<?=$this->render('/sysadm/widgets/msg');?>
</body>
</html>
<?php $this->endPage() ?>
