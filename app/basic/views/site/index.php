<?php
//echo $this->render('widgets/siteinfo');

$list_today = [
	'name'	=>	'热门推荐',
	'url'	=>	'/topic/hot',
	'list'	=>	Yii::$app->blog->getListByAddtime(10)['list']
];

$newList = Yii::$app->blog->newList(10);
?>
<div class="index">
	<div class="container">
		<div class="row">
		<div class="col-lg-9">
					<?php foreach ($newList as $k=>$row): ?>
					<div class="blog-row <?php if($k+1==count($newList)){?>noborder<?php }?>">
				<div class="col-lg-2 text-right">
					<h1><?=date('d', $row['uptime'])?></h1>
					<p><?=date('m / Y', $row['uptime'])?></p>
					<p>分类: <a class="primary" href="<?=$row['c_url']?>"><?= $row['name']?></a><p>
					<p>阅读: <?= $row['read'] ?></p>
					<p>回复: <?= $row['comment'] ?></p>
				</div>
				<div class="col-lg-10">
					<div>
						<h5><a href="<?= $row['url']?>"><?= $row['title'] ?></a></h5>
						<p class="info">
						</p>
						<?php if($row['image']): ?>
							<div class="image"><a href="<?= $row['image']?>" title=""><img alt="" title="" src="<?= $row['image'] ?>"></a></div>
						<?php endif; ?>
						<div class="description <?php if($row['image']): echo 'des-has-image';endif; ?>">
							<?= $row['description'] ?>...
						</div>
						<p class="text-right"><a class="primary" href="<?=$row['url']?>" class="more">阅读更多</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
					<?php endforeach; ?>	
		</div>
		<div class="col-lg-3">
			<?=$this->render('/site/widgets/sidebar')?>
		</div>
		</div>
	</div>
</div>
<?php
$this->registerJsFile('/js/index.js', ['depends'=>['app\assets\AppAsset']]);
?>
