<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if(trim($__env->yieldContent('seo_title'))): ?><?php echo $__env->yieldContent('seo_title'); ?> - <?php echo e(config('seo.title')); ?><?php else: ?><?php echo e(config('seo.title')); ?><?php endif; ?></title>
<meta name="description" content="<?php if(trim($__env->yieldContent('seo_description'))): ?><?php echo $__env->yieldContent('seo_description'); ?><?php else: ?><?php echo e(config('seo.description')); ?><?php endif; ?>">
<meta property="og:title" content="<?php if(trim($__env->yieldContent('seo_title'))): ?><?php echo $__env->yieldContent('seo_title'); ?> - <?php echo e(config('seo.title')); ?><?php else: ?><?php echo e(config('seo.title')); ?><?php endif; ?>">
<meta property="og:description" content="<?php if(trim($__env->yieldContent('seo_description'))): ?><?php echo $__env->yieldContent('seo_description'); ?><?php else: ?><?php echo e(config('seo.description')); ?><?php endif; ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<meta property="og:image" content="<?php if(trim($__env->yieldContent('og_image'))): ?><?php echo $__env->yieldContent('og_image'); ?><?php else: ?><?php echo e(asset('assets/img/sajo-og.png')); ?><?php endif; ?>">
<meta property="og:site_name" content="<?php echo e(config('seo.title')); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#00aba9">
<meta name="theme-color" content="#ffffff">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<meta name="format-detection" content="telephone=no">
<link href="<?php echo e(asset('assets/css/app.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('assets/js/modernizr.min.js')); ?>"></script>
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
<?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/errors/app.blade.php ENDPATH**/ ?>