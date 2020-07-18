<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="<?php echo e(theme('css/all.css')); ?>" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="<?php echo e(theme('js/all.js')); ?>"></script>
    </head>
    <body>

        <?php echo $__env->yieldContent('content'); ?>

        <script src="/js/app.js"></script>
    </body>
    </html>
