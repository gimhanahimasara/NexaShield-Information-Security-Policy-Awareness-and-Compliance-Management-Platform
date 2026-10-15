<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'NexaShield')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-nexa-dark">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center bg-fixed bg-no-repeat" style="background-image: linear-gradient(rgba(34, 38, 41, 0.75), rgba(34, 38, 41, 0.95)), url('<?php echo e(asset('images/bg-main.jpg')); ?>');">
            
            <!-- Logo -->
            <div>
                <a href="/">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="NexaShield Logo" class="block h-20 w-auto transform scale-125" />
                </a>
            </div>

            <!-- Login / Register Form Container -->
            <div class="w-full sm:max-w-md mt-10 px-6 py-8 bg-nexa-gray-dark shadow-2xl overflow-hidden sm:rounded-lg border border-nexa-gray-light z-10">
                <?php echo e($slot); ?>

            </div>

        </div>
    </body>
</html><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/layouts/guest.blade.php ENDPATH**/ ?>