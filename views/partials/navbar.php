<nav class="fixed top-0 left-0 w-full bg-white rounded-b-lg shadow-md p-2 z-50">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center gap-2">
                <i class="fas fa-tasks text-blue-500 text-xl"></i>
                <a href="/" class="text-xl font-bold text-blue-900">Task Flow</a>
            </div>
            
            <div class="flex items-center gap-3">
                <?php if(!isset($_SESSION['username'])): ?>
                    <div class="flex gap-2">
                        <a href="/login" class="flex items-center gap-2 px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 text-sm">
                            <i class="fas fa-sign-in-alt"></i> Log In
                        </a>
                        <a href="/signup" class="flex items-center gap-2 px-3 py-1 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 text-sm">
                            <i class="fas fa-user-plus"></i> Sign Up
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex items-center gap-3">
                        <div class="relative group">
                            <a href="/" class="flex items-center gap-1 text-blue-900 hover:text-blue-600 transition-colors duration-300 text-sm">
                                <i class="fas fa-list-check"></i>
                                <span class="group-hover:pl-1 transition-all duration-300">Tasks</span>
                            </a>
                        </div>
                        <div class="relative group">
                            <a href="/profile" class="flex items-center gap-1 text-blue-900 hover:text-blue-600 transition-colors duration-300">
                                <i class="fas fa-user"></i>
                            </a>
                        </div>
                        <form action="/logout" method="POST">
                        <button type="submit" name="logout" class="flex items-center gap-2 px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-all duration-300 text-sm">
                            <i class="fas fa-sign-out-alt"></i> Log Out 
                        </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<style>
body {
    font-family: 'Poppins', sans-serif;
    padding-top: 60px; /* Reduced padding to match smaller navbar */
}
</style>