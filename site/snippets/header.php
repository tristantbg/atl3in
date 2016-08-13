<!-- Website developed by Tristan Bagot -->

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="canonical" href="<?php echo html($page->url()) ?>" />
	<?php if($page->isHomepage()): ?>
		<title><?php echo $site->title()->html() ?></title>
	<?php else: ?>
		<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<?php endif ?>
	<?php if($page->isHomepage()): ?>
		<meta name="description" content="<?php echo $site->description()->html() ?>">
	<?php else: ?>
		<?php if(!$page->description()->empty()): ?>
			<meta name="description" content="<?php echo $page->description()->excerpt(250) ?>">
		<?php endif ?>
	<?php endif ?>
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
	<meta name="DC.Title" content="<?php echo $page->title()->html() ?>" />
	<meta name="DC.Description" content="<?php echo $page->description()->html() ?>"/ >
	<?php if($page->isHomepage()): ?>
		<meta property="og:title" content="<?php echo $site->title()->html() ?>" />
	<?php else: ?>
		<meta property="og:title" content="<?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?>" />
	<?php endif ?>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo html($page->url()) ?>" />
	<?php if(!$site->ogimage()->empty()): ?>
		<meta property="og:image" content="<?= $site->ogimage()->toFile()->width(1200)->url() ?>"/>
	<?php endif ?>
	<meta property="og:description" content="<?php echo $page->description()->html() ?>" />
	<?php if($page->isHomepage()): ?>
		<meta itemprop="name" content="<?php echo $site->title()->html() ?>">
	<?php else: ?>
		<meta itemprop="name" content="<?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?>">
	<?php endif ?>
	<meta itemprop="description" content="<?php echo $site->description()->html() ?>">
	<link rel="shortcut icon" href="<?= url('assets/images/favicon.ico') ?>">
	<link rel="icon" href="<?= url('assets/images/favicon.ico') ?>" type="image/x-icon">

	<?php 
	echo css('assets/css/app.min.css');
	echo js('assets/js/vendor/modernizr.min.js');
	?>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= url('assets/js/vendor/jquery.min.js') ?>">\x3C/script>')</script>

	<?php if(!$site->customcss()->empty()): ?>
		<style type="text/css">
			<?php echo $site->customcss()->html() ?>
		</style>
	<?php endif ?>

</head>

<?php 
	$collectionsPage = $pages->find('collections');
    $collections = $collectionsPage->children()->visible();
    $info = $pages->find('information');
?>

<body <?php if($page->content()->name() == 'collection'): echo ' class="collection"'; else: echo ' class="page"'; endif?>>

	<div class="loader"></div>

	<div id="intro">
		<span><?php echo $site->title()->html() ?></span>
		<span><?php echo $site->subtitle()->html() ?></span>
	</div>

<header>

		<nav id="menu">
			<span id="menu_title"><?php echo $collectionsPage->title()->html() ?></span>
			<ul>
				<?php foreach ($collections as $collection): ?>
					<li<?php e($collection->isOpen(), ' class="active"'); e($collection->isHomepage(), ' data-home') ?>>
					<a href="<?php echo $collection->url() ?>" data-title="<?php echo $collection->title()->html() ?>" data-target="collection">
						<?php echo $collection->title()->html() ?>
					</a>
					</li>
				<?php endforeach ?>
			</ul>
		</nav>

		<span id="site_title"><a href="<?php echo $site->homePage()->url() ?>" data-target="index"><h1><?php echo $site->title()->html() ?></h1></a></span>

		<span id="info_menu"><a href="<?php echo $info->url() ?>" data-title="<?php echo $info->title()->html() ?>" data-target="page"><?php echo $info->title()->html() ?></a></span>

		<span class="close"><a href="<?php echo $site->homePage()->url() ?>" data-target="collection">×</a></span>
			
		</header>

	<div id="container">

	<div class="inner">