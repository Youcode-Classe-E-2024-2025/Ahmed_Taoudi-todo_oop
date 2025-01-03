<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Your Personal Task Management Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html, body {
            overflow-x: hidden;
            overflow-y: auto;
            height: 100%;
        }
        #bgCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        }
    </style>
</head>
<body class="min-h-screen pt-2 bg-no-repeat bg-cover bg-center bg-indigo-950">
    <canvas id="bgCanvas"></canvas>
    
    <div class="container mx-auto px-4 py-8 relative z-10">
        <nav class="flex justify-between items-center mb-12">
            <div class="flex items-center">
                <i class="fas fa-tasks text-3xl text-blue-600 mr-3"></i>
                <h1 class="text-2xl font-bold text-white">Task Flow</h1>
            </div>
            <div>
                <a href="/login" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                    Login
                </a>
            </div>
        </nav>

        <main class="grid md:grid-cols-2 gap-8 items-center">
            <div class="space-y-6">
                <h2 class="text-5xl font-extrabold leading-tight">
                    <span class="text-white">Organize Your Tasks,</span> 
                    <span class="block text-cyan-400">Boost Your Productivity</span>
                </h2>
                <p class="text-xl text-gray-200">
                    TaskMaster helps you manage your tasks efficiently, track your progress, 
                    and stay focused on what matters most.
                </p>
                <div class="flex space-x-4">
                    <a href="/signup" class="px-8 py-3 bg-cyan-500 text-indigo-950 rounded-lg text-lg font-semibold 
                        hover:bg-cyan-400 transform transition duration-300 shadow-lg hover:shadow-xl flex items-center">
                        <i class="fas fa-rocket mr-3"></i>
                        Get Started
                    </a>
                    <a href="#features" class="px-8 py-3 border-2 border-cyan-500 text-cyan-500 rounded-lg text-lg font-semibold 
                        hover:bg-cyan-500/10 transition duration-300 flex items-center">
                        <i class="fas fa-info-circle mr-3"></i>
                        Learn More
                    </a>
                </div>
            </div>
            <div class="md:block relative h-96 flex items-center justify-center">
                <div class="absolute w-full h-full bg-cyan-500/10 rounded-full opacity-50 animate-blob"></div>
                <div class="relative h-full z-10 flex items-center justify-center space-x-4">
                    <div class="bg-white/20 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <div class="bg-white/20 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="bg-white/20 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                </div>
            </div>
        </main>

        <section id="features" class="mt-20 text-center">
            <h3 class="text-4xl font-bold mb-12 text-white">Why Choose Task Faster?</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white/20 backdrop-blur-lg p-8 rounded-xl shadow-2xl hover:shadow-3xl transition duration-300 border border-cyan-500/30 hover:border-cyan-500/50">
                    <i class="fas fa-list-check text-5xl text-cyan-400 mb-6"></i>
                    <h4 class="text-2xl font-bold mb-4 text-white">Organize Tasks</h4>
                    <p class="text-gray-200">Create, categorize, and prioritize tasks with precision and ease.</p>
                </div>
                <div class="bg-white/20 backdrop-blur-lg p-8 rounded-xl shadow-2xl hover:shadow-3xl transition duration-300 border border-cyan-500/30 hover:border-cyan-500/50">
                    <i class="fas fa-chart-line text-5xl text-cyan-400 mb-6"></i>
                    <h4 class="text-2xl font-bold mb-4 text-white">Track Progress</h4>
                    <p class="text-gray-200">Visualize your productivity and monitor task completion in real-time.</p>
                </div>
                <div class="bg-white/20 backdrop-blur-lg p-8 rounded-xl shadow-2xl hover:shadow-3xl transition duration-300 border border-cyan-500/30 hover:border-cyan-500/50">
                    <i class="fas fa-clock text-5xl text-cyan-400 mb-6"></i>
                    <h4 class="text-2xl font-bold mb-4 text-white">Time Management</h4>
                    <p class="text-gray-200">Optimize your workflow with intelligent due date and priority tracking.</p>
                </div>
            </div>
        </section>

        <footer class="mt-20 text-center text-gray-400 pb-10">
            <p class="text-cyan-300">&copy; 2024 Task Flow. All rights reserved.</p>
        </footer>
    </div>

    <style>
        @keyframes blob {
            0% { transform: scale(1) translate(0, 0); }
            33% { transform: scale(1.1) translate(-10px, 20px); }
            66% { transform: scale(0.9) translate(10px, -20px); }
            100% { transform: scale(1) translate(0, 0); }
        }
        .animate-blob {
            animation: blob 10s infinite;
        }
    </style>

    <script src="assets/js/canvas.js"></script>
</body>
</html>