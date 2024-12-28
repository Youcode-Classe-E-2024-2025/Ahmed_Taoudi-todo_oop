
<nav class="bg-blue-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center text-white">
            <a <?php if(isset($_SESSION['userrole']) && $_SESSION['userrole'] =='admin' ) echo 'href="/admin"' ?>  class="text-2xl font-bold">Rento</a>
            
            <div class="space-x-6">
                <a href="/" class="hover:text-gray-300">Home</a>
                <a href="/cars" class="hover:text-gray-300">Cars</a>
                <a href="/#about" class="hover:text-gray-300">About</a>
                <a href="/#contact" class="hover:text-gray-300">Contact</a>
            </div>
           <div>
            <?php if(!isset($_SESSION['username'])) {?>
           <a class=" px-4 py-2 rounded bg-white text-blue-900" href="/login">Log In</a>
           <a class=" px-4 py-2 rounded bg-white text-blue-900" href="/signup">Sign Up</a>
           <?php }else{ ?>
            <a href="/profile">
            <svg class="fill-blue-200 hover:fill-white size-6 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>
            <span class="text-white font-semibold mr-4"><?= $_SESSION['username']  ?> </span>
            </a>

            <a class=" px-4 py-2 rounded bg-white text-blue-900" href="/connecter?mtd=logout">Log Out</a>
            <?php  } ?>
           </div>
        </div>
    </nav>