<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<noscript>
		<style>
			article { display:none; }
			.online { display:none; }
		</style>
	</noscript>
	
    <title>6b6t - Gallery</title>

    <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/favicon.png" />

    <link rel="stylesheet" type="text/css" href="/css/global.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/animate.css">
    <?php echo $gallery->getColorboxStyles(1); ?>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/bootstrap.min.js"></script>
    <?php echo $gallery->getColorboxScripts(); ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  	<script src="https://cdn.jsdelivr.net/gh/leonardosnt/mc-player-counter/dist/mc-player-counter.min.js"></script>
	
    <?php file_exists('googleAnalytics.inc') ? include('googleAnalytics.inc') : false; ?>
	
	<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
		new Crate({
			server: '721107715048472607',
			channel: '721107715358720008',
			color: '#000',
			location: ['bottom', 'right']
		})
		crate.notify('Click me to chat on the 6b6t discord server!')
	</script>
</head>

<body style="background-color: black;">
    <header class="header">
        <div class="container">
            <ul style="overflow: hidden; list-style-type: none; margin: 0; padding: 0;">
				<li class="logo"><a href="index.html"><img src="img/logo.png" alt="logo" class="logo hvr-grow" height="64px" width="64px"></a></li>
				<li class="navbutton"><span class="online">Online: <span data-playercounter-ip="6b6t.org">0</span> / 9000</span></li>
				<a class="nav" href="upload.php"><li class="navbutton">Upload</li></a>
				<a class="nav" href="gallery.php"><li class="navbutton">Gallery</li></a>
				<a class="nav" href="index.html"><li class="navbutton">Home</li></a>
            </ul>                     
        </div>
    </header>
	
	<div class="container clearfix"> 
		<div class="content">
			<section class="top-a animated slideInUp">
            
			</section>
			
			<noscript>
				<h1 style="color:white;" class="article animated slideInUp">This page needs JavaScript activated to work. (We dont use any trackers)</h1>
			</noscript>
			
			<article style="opacity: 1; width: 100%;" class="article animated slideInUp">		
				<div class="container" style="margin-top: 20px; margin-left: auto; margin-right: auto;">

        <?php if($gallery->getSystemMessages()): ?>
            <?php foreach($gallery->getSystemMessages() as $message): ?>
                <div class="alert alert-<?php echo $message['type']; ?>">
                    <a class="close" data-dismiss="alert">×</a>
                    <?php echo $message['text']; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Start UberGallery v<?php echo UberGallery::VERSION; ?> - Copyright (c) <?php echo date('Y'); ?> Chris Kankiewicz (http://www.ChrisKankiewicz.com) -->
        <?php if (!empty($galleryArray) && $galleryArray['stats']['total_images'] > 0): ?>
            <ul class="gallery-wrapper thumbnails">
                <?php foreach ($galleryArray['images'] as $image): ?>
                    <li class="">
                        <a href="<?php echo html_entity_decode($image['file_path']); ?>" title="<?php echo $image['file_title']; ?>" class="thumbnail" rel="colorbox">
                            <img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!-- End UberGallery - Distributed under the MIT license: http://www.opensource.org/licenses/mit-license.php -->

        <hr/>


        <?php if ($galleryArray['stats']['total_pages'] > 1): ?>

            <div class="pagination pagination-centered">
                <ul>
                    <?php foreach ($galleryArray['paginator'] as $item): ?>

                        <?php

                            switch ($item['class']) {

                                case 'title':
                                    $class = 'disabled';
                                    break;

                                case 'inactive':
                                    $class = 'disabled';
                                    break;

                                case 'current':
                                    $class = 'active';
                                    break;

                                case 'active':
                                    $class = NULL;
                                    break;

                            }

                        ?>

                        <li class="<?php echo $class; ?>">
                            <a href="<?php echo empty($item['href']) ? '#' : $item['href']; ?>"><?php echo $item['text']; ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
				</div>
			</article>
		</div>
	</div>
	
</body>

<!-- Page template by, Chris Kankiewicz <http://www.chriskankiewicz.com> -->

</html>
