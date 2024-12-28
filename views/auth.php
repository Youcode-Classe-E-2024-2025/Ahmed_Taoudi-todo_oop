<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/input.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login / Register</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .gradient-border {
            position: relative;
            border: 2px solid transparent;
            border-radius: 10px;
            background-image: linear-gradient(white, white), 
                              linear-gradient(to right, #3b82f6, #10b981);
            background-origin: border-box;
            background-clip: padding-box, border-box;
        }
        .input-glow:focus {
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
            border-color: #3b82f6;
        }
    </style>
</head>
<body class="min-h-screen pt-2 bg-no-repeat bg-cover">
    <canvas id="bgCanvas"></canvas>
    <div class="container h-full bg-center bg-cover flex flex-col justify-center items-center">
        <div class="w-full max-w-md" x-data="{ isLogin: true }">
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden gradient-border">
                <!-- Toggle Buttons -->
                <div class="flex border-b">
                    <button 
                        @click="isLogin = true" 
                        :class="{'bg-blue-500 text-white': isLogin, 'bg-gray-100 text-gray-600': !isLogin}" 
                        class="w-1/2 py-4 transition-colors duration-300 ease-in-out hover:bg-blue-50 focus:outline-none"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>
                    <button 
                        @click="isLogin = false" 
                        :class="{'bg-blue-500 text-white': !isLogin, 'bg-gray-100 text-gray-600': isLogin}" 
                        class="w-1/2 py-4 transition-colors duration-300 ease-in-out hover:bg-blue-50 focus:outline-none"
                    >
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </button>
                </div>

                <!-- Login Form -->
                <form 
                    x-show="isLogin" 
                    method="POST" 
                    class="p-8 space-y-6"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                >
                    <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Welcome Back</h2>
                    <div class="bg-red-100 hidden border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                       <!-- CSRF -->
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> 
                    </div>
                    <div class="space-y-4">
                        <div class="relative">
                            <label for="login-email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="login-email" 
                                    required 
                                    class="input-glow w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-300"
                                    placeholder="Enter your email"
                                >
                            </div>
                        </div>
                        <div class="relative">
                            <label for="login-password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="login-password" 
                                    required 
                                    class="input-glow w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-300"
                                    placeholder="Enter your password"
                                >
                            </div>
                        </div>
                    </div>
                    <button 
                        type="submit" 
                        name="login" 
                        class="w-full bg-gradient-to-r from-blue-500 to-green-500 text-white py-3 rounded-lg hover:from-blue-600 hover:to-green-600 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                    >
                        Login
                    </button>
                    <div class="text-center text-sm text-gray-600">
                        Don't have an account? 
                        <a href="#" @click.prevent="isLogin = false" class="text-blue-600 hover:underline font-semibold">Register here</a>
                    </div>
                </form>

                <!-- Register Form -->
                <form 
                    action="/signup"
                    x-show="!isLogin" 
                    method="POST" 
                    class="p-8 space-y-6"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                >
                     <!-- CSRF -->
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> 
                    <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Create Account</h2>
                    <div class="bg-red-100 hidden border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                      
                    </div>
                    <div class="space-y-4">
                        <div class="relative">
                            <label for="register-username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input 
                                    type="text" 
                                    name="username" 
                                    id="register-username" 
                                    required 
                                    class="input-glow w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-300"
                                    placeholder="Choose a username"
                                >
                            </div>
                        </div>
                        <div class="relative">
                            <label for="register-email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="register-email" 
                                    required 
                                    class="input-glow w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-300"
                                    placeholder="Enter your email"
                                >
                            </div>
                        </div>
                        <div class="relative">
                            <label for="register-password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="register-password" 
                                    required 
                                    class="input-glow w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-300"
                                    placeholder="Create a password"
                                >
                            </div>
                        </div>
                        <div class="relative">
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input 
                                    type="password" 
                                    name="confirm_password" 
                                    id="confirm-password" 
                                    required 
                                    class="input-glow w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-300"
                                    placeholder="Confirm your password"
                                >
                            </div>
                        </div>
                    </div>
                    <button 
                        type="submit" 
                        name="register" 
                        class="w-full bg-gradient-to-r from-green-500 to-blue-500 text-white py-3 rounded-lg hover:from-green-600 hover:to-blue-600 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                    >
                        Register
                    </button>
                    <div class="text-center text-sm text-gray-600">
                        Already have an account? 
                        <a href="#" @click.prevent="isLogin = true" class="text-blue-600 hover:underline font-semibold">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="views/canvas.js"></script>
</body>
</html>
