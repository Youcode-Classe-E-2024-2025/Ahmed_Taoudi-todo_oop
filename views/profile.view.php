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
                        <img class="rounded-full w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?= $username ?>&background=0D8ABC&color=fff" alt="Profile Picture">
                    </div>
                    <h2 class="text-2xl font-bold mb-2"></h2>
                    <p class="text-gray-600 mb-4"><?= "@$username" ?></p>
                    <p class="text-gray-600 mb-4"><?= $userEmail ?></p>
                    <div class="flex justify-center space-x-4 mb-4">
                        <span class="text-gray-600"><i class="fas fa-tasks"></i> <?= $taskCount ?> Tasks</span>
                        <span class="text-gray-600"><i class="fas fa-check-circle"></i> <?= $Completedtasks ?> Completed</span>
                    </div>
                </div>
            </div>

            <!-- Middle Column - Task Statistics -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Task Statistics</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <span class="font-medium">Todo</span>
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full"> <?= $Todotasks ?></span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <span class="font-medium">In Progress</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full"><?= $inprogresstasks ?></span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <span class="font-medium">Completed</span>
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full"><?= $Completedtasks ?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/canvas.js"></script>
</body>
</html>