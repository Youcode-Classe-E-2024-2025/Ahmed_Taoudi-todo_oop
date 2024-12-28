<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen pt-2">
    <canvas id="bgCanvas"></canvas>

    <div class="container mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="flex justify-between items-center mb-8">
            <a href="/" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left"></i> Back to Tasks
            </a>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Profile
            </button>
        </div>

        <!-- Profile Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Left Column - Profile Info -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto mb-4 relative">
                        <img class="rounded-full w-full h-full object-cover" src="https://ui-avatars.com/api/?name=John+Doe" alt="Profile Picture">
                        <button class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-2 hover:bg-blue-600">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <h2 class="text-2xl font-bold mb-2">John Doe</h2>
                    <p class="text-gray-600 mb-4">@johndoe</p>
                    <div class="flex justify-center space-x-4 mb-4">
                        <span class="text-gray-600"><i class="fas fa-tasks"></i> 24 Tasks</span>
                        <span class="text-gray-600"><i class="fas fa-check-circle"></i> 18 Completed</span>
                    </div>
                </div>
            </div>

            <!-- Middle Column - Task Statistics -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Task Statistics</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <span class="font-medium">Todo</span>
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full">6</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <span class="font-medium">In Progress</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full">4</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <span class="font-medium">Completed</span>
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full">14</span>
                    </div>
                </div>
            </div>

            <!-- Right Column - Recent Activity -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-blue-500"></i>
                        </div>
                        <div>
                            <p class="font-medium">Completed task "Update Documentation"</p>
                            <p class="text-sm text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-500"></i>
                        </div>
                        <div>
                            <p class="font-medium">Started task "Design New Features"</p>
                            <p class="text-sm text-gray-500">5 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-plus text-green-500"></i>
                        </div>
                        <div>
                            <p class="font-medium">Created new task "Review Pull Requests"</p>
                            <p class="text-sm text-gray-500">1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4">Settings</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" value="john@example.com" disabled>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" value="johndoe" disabled>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/canvas.js"></script>
</body>
</html>