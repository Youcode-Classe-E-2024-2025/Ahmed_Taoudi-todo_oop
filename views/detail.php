<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen pt-2">
    <canvas id="bgCanvas"></canvas>

    <div class="container mx-auto px-4 py-8">
        <!-- Header with Navigation -->
        <div class="flex justify-between items-center mb-8">
            <a href="/" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left"></i> Back to Tasks
            </a>
            <div class="flex gap-4">
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </div>
        </div>

        <!-- Task Details Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Design New User Interface</h1>
                    <div class="flex items-center gap-4 text-gray-600">
                        <span><i class="fas fa-calendar"></i> Created: Dec 26, 2024</span>
                        <span><i class="fas fa-clock"></i> Due: Dec 30, 2024</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full">In Progress</span>
                    <div class="relative">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Change Status
                        </button>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Description</h2>
                <p class="text-gray-700 whitespace-pre-line">
                    Create a modern and intuitive user interface for the dashboard section. 
                    The design should follow our brand guidelines and incorporate the following features:

                </p>
            </div>
          
                      <!-- Assigned Users -->
                      <div class="mb-8">
                          <h2 class="text-xl font-bold mb-4">Assigned Users</h2>
                          <div class="bg-gray-100 p-4 rounded-lg">
                              <div class="flex flex-wrap gap-4">
                                  <div class="flex items-center bg-white p-2 rounded-lg shadow-sm justify-between w-1/4">
                                      <div class="flex items-center">
                                          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe" class="w-10 h-10 rounded-full mr-3">
                                          <div>
                                              <p class="font-semibold">John Doe</p>
                                              <p class="text-sm text-gray-500">Frontend Developer</p>
                                          </div>
                                      </div>
                                      <button class="text-red-500 hover:text-red-700 focus:outline-none">
                                          <i class="fas fa-trash-alt"></i>
                                      </button>
                                  </div>
                                  <div class="flex items-center bg-white p-2 rounded-lg shadow-sm justify-between w-1/4">
                                      <div class="flex items-center">
                                          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Jane Smith" class="w-10 h-10 rounded-full mr-3">
                                          <div>
                                              <p class="font-semibold">Jane Smith</p>
                                              <p class="text-sm text-gray-500">UI/UX Designer</p>
                                          </div>
                                      </div>
                                      <button class="text-red-500 hover:text-red-700 focus:outline-none">
                                          <i class="fas fa-trash-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          
              <script src="assets/js/canvas.js"></script>
              </body>
          </html>