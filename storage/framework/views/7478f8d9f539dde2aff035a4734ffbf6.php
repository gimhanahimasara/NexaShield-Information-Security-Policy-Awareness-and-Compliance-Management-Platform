<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NexaShield - Information Security Policy Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS (Vite) -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Custom Theme Styles based on NexaShield Palette -->
    <style>
        body {
            background-color: #222629; /* Dark Background */
            color: #D1D5DB; /* Light Gray Text */
            font-family: 'Figtree', sans-serif;
        }
        .text-nexa-green { color: #86C232; }
        .text-nexa-white { color: #ffffff; }
        
        .bg-nexa-green { 
            background-color: #86C232; 
            color: #222629; 
            transition: all 0.3s ease;
        }
        .bg-nexa-green:hover { 
            background-color: #61892F; /* Darker Green Hover */
            color: #ffffff; 
        }

        .glass-nav {
            background-color: #222629;
            border-bottom: 1px solid #474B4F;
        }
        
        .glass-card {
            background-color: #474B4F; /* Card Background */
            border: 1px solid #6B6E70; /* Card Border */
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-5px);
            border-color: #86C232;
        }
        
        .connector-line { background-color: #474B4F; }
    </style>
</head>
<body class="antialiased selection:bg-[#86C232] selection:text-[#222629] flex flex-col min-h-screen">
    
    <!-- Navigation Bar -->
    <nav class="glass-nav sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <!-- Custom Actual Image Logo (Enlarged, Text Removed) -->
                <div class="flex items-center flex-shrink-0">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="NexaShield Logo" class="h-20 sm:h-24 w-auto transition-transform hover:scale-200 duration-300">
                </div>

                <!-- Login / Register / Dashboard Links -->
                <div class="flex items-center space-x-6">
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/dashboard')); ?>" class="text-sm font-bold text-[#D1D5DB] hover:text-[#86C232] transition">Go to Dashboard</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="text-sm font-bold text-[#D1D5DB] hover:text-[#86C232] transition">Log in</a>

                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>" class="px-5 py-2.5 text-sm font-bold rounded-lg bg-nexa-green shadow-[0_0_15px_rgba(134,194,50,0.3)]">
                                    Register
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Hero Section -->
    <main class="relative flex-grow flex items-center justify-center pt-24 pb-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            
            <div class="inline-flex items-center px-4 py-2 rounded-full border border-[#86C232] bg-[#474B4F] text-nexa-green text-xs font-bold uppercase tracking-wider mb-8 shadow-sm">
                <span class="flex w-2 h-2 rounded-full bg-[#86C232] mr-2 animate-pulse"></span>
                Next-Gen Security Policy Platform
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-nexa-white tracking-tight mb-6 leading-tight">
                Secure Your Enterprise with <br>
                <span class="text-nexa-green">Intelligent Policy Management</span>
            </h1>
            
            <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-xl text-[#D1D5DB] mb-10 leading-relaxed">
                NexaShield is a comprehensive Information Security platform designed to educate employees, enforce security guidelines, and track organizational compliance with dynamic knowledge assessments.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="px-8 py-4 font-extrabold text-lg rounded-lg bg-nexa-green shadow-[0_0_20px_rgba(134,194,50,0.2)] w-full sm:w-auto">
                        Access Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="px-8 py-4 font-extrabold text-lg rounded-lg bg-nexa-green shadow-[0_0_20px_rgba(134,194,50,0.2)] w-full sm:w-auto">
                        Get Started Now
                    </a>
                    <a href="#features" class="px-8 py-4 bg-transparent border-2 border-[#D1D5DB] text-[#D1D5DB] font-bold text-lg rounded-lg hover:border-[#86C232] hover:text-[#86C232] transition w-full sm:w-auto">
                        Explore Features
                    </a>
                <?php endif; ?>
            </div>
            
        </div>
    </main>

    <!-- Key Features Section -->
    <div id="features" class="py-20 relative z-10" style="background-color: #222629;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-nexa-white mb-4">Core Capabilities</h2>
                <p class="text-[#D1D5DB] max-w-2xl mx-auto">Everything you need to ensure your workforce understands and follows your security protocols.</p>
            </div>

            <!-- Forced Grid Layout for Features -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                
                <!-- Feature 1 -->
                <div class="glass-card p-8 rounded-xl">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6" style="background-color: #222629; border: 1px solid #86C232;">
                        <svg class="w-7 h-7 text-nexa-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-nexa-white mb-3">Policy Management</h3>
                    <p class="text-[#D1D5DB] text-sm leading-relaxed">Create, update, and manage Information Security policies using our integrated rich-text editor. Keep track of versions and policy statuses easily.</p>
                </div>

                <!-- Feature 2 -->
                <div class="glass-card p-8 rounded-xl">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6" style="background-color: #222629; border: 1px solid #86C232;">
                        <svg class="w-7 h-7 text-nexa-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-nexa-white mb-3">Dynamic Knowledge Quizzes</h3>
                    <p class="text-[#D1D5DB] text-sm leading-relaxed">Test employee comprehension with customizable quizzes. Allow multiple attempts and provide feedback while securing correct answers.</p>
                </div>

                <!-- Feature 3 -->
                <div class="glass-card p-8 rounded-xl">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6" style="background-color: #222629; border: 1px solid #86C232;">
                        <svg class="w-7 h-7 text-nexa-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-nexa-white mb-3">Compliance Tracking</h3>
                    <p class="text-[#D1D5DB] text-sm leading-relaxed">Visual analytics dashboards displaying real-time compliance metrics. Generate and download PDF reports for internal audits and management reviews.</p>
                </div>

                <!-- Feature 4 -->
                <div class="glass-card p-8 rounded-xl">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6" style="background-color: #222629; border: 1px solid #86C232;">
                        <svg class="w-7 h-7 text-nexa-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-nexa-white mb-3">Role-Based Access</h3>
                    <p class="text-[#D1D5DB] text-sm leading-relaxed">Secure environment with specialized roles (Admin, Editor, Supervisor, Employee), ensuring data integrity and proper permission management.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="py-20 relative z-10" style="border-top: 1px solid #474B4F;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-nexa-white mb-12">How NexaShield Works</h2>
            
            <div class="flex flex-col md:flex-row justify-center items-center space-y-8 md:space-y-0 md:space-x-12">
                <!-- Step 1 -->
                <div class="flex flex-col items-center max-w-xs">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold text-nexa-white mb-4" style="background-color: #474B4F; border: 2px solid #86C232;">1</div>
                    <h4 class="text-lg font-bold text-nexa-white mb-2">Publish Policies</h4>
                    <p class="text-sm text-[#D1D5DB]">Admins draft and publish security guidelines using the Rich Text Editor.</p>
                </div>
                <!-- Connector Line -->
                <div class="hidden md:block w-16 h-0.5 connector-line"></div>
                <!-- Step 2 -->
                <div class="flex flex-col items-center max-w-xs">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold text-nexa-white mb-4" style="background-color: #474B4F; border: 2px solid #86C232;">2</div>
                    <h4 class="text-lg font-bold text-nexa-white mb-2">Employees Learn</h4>
                    <p class="text-sm text-[#D1D5DB]">Staff members read policies, acknowledge them, and participate in quizzes.</p>
                </div>
                <!-- Connector Line -->
                <div class="hidden md:block w-16 h-0.5 connector-line"></div>
                <!-- Step 3 -->
                <div class="flex flex-col items-center max-w-xs">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold text-nexa-white mb-4" style="background-color: #474B4F; border: 2px solid #86C232;">3</div>
                    <h4 class="text-lg font-bold text-nexa-white mb-2">Track Compliance</h4>
                    <p class="text-sm text-[#D1D5DB]">Supervisors monitor real-time dashboards and export compliance PDF reports.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-12 text-center mt-auto" style="background-color: #222629; border-top: 1px solid #474B4F;">
        
        <!-- Custom Actual Image Logo (Enlarged, Text Removed) -->
        <div class="flex justify-center items-center mb-6">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="NexaShield Logo" class="h-16 sm:h-20 w-auto opacity-90 hover:opacity-100 transition-opacity">
        </div>
        
        <p class="text-[#9CA3AF] text-sm">
            &copy; <?php echo e(date('Y')); ?> NexaShield. All rights reserved. <br>
            <span class="text-xs mt-2 inline-block">Information Security Policy Management System</span>
        </p>
    </footer>

</body>
</html><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/welcome.blade.php ENDPATH**/ ?>