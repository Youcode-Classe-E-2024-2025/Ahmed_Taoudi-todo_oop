<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Your Personal Task Management Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8">
        <nav class="flex justify-between items-center mb-12">
            <div class="flex items-center">
                <i class="fas fa-tasks text-3xl text-purple-600 mr-3"></i>
                <h1 class="text-2xl font-bold text-gray-800">TaskMaster</h1>
            </div>
            <div>
                <a href="/login" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition duration-300">
                    Login
                </a>
            </div>
        </nav>

        <main class="grid md:grid-cols-2 gap-8 items-center">
            <div class="space-y-6">
                <h2 class="text-5xl font-extrabold text-gray-900 leading-tight">
                    Organize Your Tasks, 
                    <span class="block text-purple-600">Boost Your Productivity</span>
                </h2>
                <p class="text-xl text-gray-600">
                    TaskMaster helps you manage your tasks efficiently, track your progress, 
                    and stay focused on what matters most.
                </p>
                <div class="flex space-x-4">
                    <a href="/register" class="px-8 py-3 gradient-bg text-white rounded-lg text-lg font-semibold 
                        hover:scale-105 transform transition duration-300 shadow-lg hover:shadow-xl flex items-center">
                        <i class="fas fa-rocket mr-3"></i>
                        Get Started
                    </a>
                    <a href="#features" class="px-8 py-3 border-2 border-purple-600 text-purple-600 rounded-lg text-lg font-semibold 
                        hover:bg-purple-50 transition duration-300 flex items-center">
                        <i class="fas fa-info-circle mr-3"></i>
                        Learn More
                    </a>
                </div>
            </div>
            <div class="hidden md:block">
                <img src="assets/images/productivity-illustration.svg" 
                     alt="Task Management Illustration" 
                     class="w-full h-auto"
                     onerror="this.style.display='none'"
                >
            </div>
        </main>

        <section id="features" class="mt-20 text-center">
            <h3 class="text-3xl font-bold mb-12 text-gray-800">Why Choose TaskMaster?</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-list-check text-4xl text-purple-600 mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Organize Tasks</h4>
                    <p class="text-gray-600">Create, categorize, and prioritize tasks with ease.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-chart-line text-4xl text-purple-600 mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Track Progress</h4>
                    <p class="text-gray-600">Monitor your tasks and visualize your productivity.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-clock text-4xl text-purple-600 mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Time Management</h4>
                    <p class="text-gray-600">Set due dates and manage your time effectively.</p>
                </div>
            </div>
        </section>

        <footer class="mt-20 text-center text-gray-600">
            <p>&copy; 2024 TaskMaster. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>