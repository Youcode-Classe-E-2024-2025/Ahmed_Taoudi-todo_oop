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
    <title>to do list</title>
</head>

<body class="min-h-screen pt-2 bg-no-repeat bg-cover">
    <canvas id="bgCanvas"></canvas>
    <!-- container -->
    <!-- blur -->
    
    <div class="container h-full bg-center bg-cover flex flex-col justify-center  ">
    <?php require_once "views/partials/navbar.php" ;?>
        <!-- header of the app -->
        <div class="app_row mt-28 flex flex-col md:flex-row items-center justify-between gap-4 p-4 bg-white rounded-lg shadow-md">
            <div class="flex flex-wrap gap-3 items-center">
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-300"
                    id="add_one">
                    <i class="fas fa-plus"></i> Add Task
                </button>
            </div>

            <!-- Search Bar with Enhanced Design -->
            <div class="flex-grow max-w-md mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input 
                        type="search" 
                        id="default-search"
                        placeholder="Search tasks..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                    />
                    <button 
                        type="button" 
                        class="absolute right-1 top-1/2 -translate-y-1/2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors duration-300"
                    >
                        Search
                    </button>
                </div>
            </div>

            <!-- Quick Stats or Additional Actions -->
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg">
                    <i class="fas fa-tasks text-gray-600"></i>
                    <span class="text-sm text-gray-700">Total Tasks: <span class="font-bold"><?php echo count($allTask)?>  </span></span>
                </div>
                <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg">
                    <i class="fas fa-chart-pie text-gray-600"></i>
                    <span class="text-sm text-gray-700">Completed: <span class="font-bold text-green-600"><?php echo count($completed)?> </span></span>
                </div>
            </div>
        </div>
        <div class="cards flex-wrap flex  gap-12 px-12 justify-evenly h-full">
            <!-- modal -->
            <!-- todo card -->
            <div class="card todo border-red-700">
                <div class="card_head border-b-red-700">
                    <h2>to do</h2>
                    <span class="counter" id="todo_counter">2</span>
                </div>
                <ul id="todo_list" class="list-container">
                    <?php foreach($todo as $task) :?>
                      
                    <li draggable="true" id="task-" class="task-item priority-<?= $task['taskpriority']?>">
                        <div class="flex justify-between"> <h4><?=$task['taskname']?></h4> 
                                <a href="/task?id=<?= $task['id'] ?>">
                                <i class="fa-solid fa-circle-info " style="color: #447;"></i>
                                </a>
                        </div> 
                        <p class="description hidden"><?=$task['taskdesc']?></p>
                        <div class="app_footer">
                            <p id="date"><?=$task['taskfin']?></p>
                            <span class="del_edi">
                            <form action="/task" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                   <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> 
                                   <button type="submit">
                                   <i  class="fa-solid fa-trash" style="color: #000000;"></i>
                                   </button>

                                   
                                </form>
                            </span>
                        </div>
                    </li>
                   
                    <?php endforeach ;?>
                </ul>
            </div>
            <!-- in progress card -->
            <div class="card progress border-yellow-400">
                <div class="card_head border-b-yellow-400">
                    <h2>in progress</h2>
                    <span class="counter" id="progress_counter">3</span>
                </div>
                <ul id="in_progress_list" class="list-container">
                <?php foreach($doing as $task) :?>
                       
                    <li draggable="true" id="task-" class="task-item priority-<?= $task['taskpriority']  ?>">
                        <div class="flex justify-between"> <h4><?=$task['taskname']?></h4> 
                        <a href="/task?id=<?= $task['id'] ?>">
                                <i class="fa-solid fa-circle-info " style="color: #447;"></i>
                                </a>
                        </div> 
                        <p class="description hidden"><?=$task['taskdesc']?></p>
                        <div class="app_footer">
                            <p id="date"><?=$task['taskfin']?></p>
                            <span class="del_edi">
                            <form action="/task" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                   <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> 
                                   <button type="submit">
                                   <i  class="fa-solid fa-trash" style="color: #000000;"></i>
                                   </button>

                                   
                                </form>
                            </span>
                        </div>
                    </li>
                    <?php endforeach ;?>
                </ul>
            </div>
            <!-- done_card -->
            <div class="card done border-green-500">
                <div class="card_head border-b-green-500">
                    <h2>done</h2>
                    <span class="counter" id="done_counter">1</span>
                </div>
                <ul id="done_list" class="list-container">
                <?php foreach($completed as $task) :?>
                    <li draggable="true" id="task-" class="task-item priority-<?= $task['taskpriority']  ?>">
                        <div class="flex justify-between"> <h4><?=$task['taskname']?></h4>
                         <a href="/task?id=<?= $task['id'] ?>">
                                <i class="fa-solid fa-circle-info " style="color: #447;"></i>
                                </a>
                        </div> 
                        <p class="description hidden"><?=$task['taskdesc']?></p>
                        <div class="app_footer">
                            <p id="date"><?=$task['taskfin']?></p>
                            <span class="del_edi">
                                <form action="/task" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                   <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> 
                                   <button type="submit">
                                   <i  class="fa-solid fa-trash" style="color: #000000;"></i>
                                   </button>

                                   
                                </form>
                                
                            </span>
                        </div>
                    </li>
                    <?php endforeach ;?>
                </ul>
            </div>
        </div>

    </div>
    <!-- modal task start -->
    <div class="modal absolute left-0 top-0 items-center justify-center w-full h-full hidden">
        <form action="/task" method="POST"  id="modalForm" class="conf-modal min-w-96 bg-white p-4 rounded-sm md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <h1 class="text-center font-bold text-blue-900">Add Task</h1>
                    <!-- CSRF -->
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> 
                    <label for="title_add"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="taskname" id="title_add"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type task Title" >
                        <div class="hidden nameError text-red-600 text-xs p-2"></div>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="taskstatus"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="taskstatus" name="taskstatus"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="TODO">Todo</option>
                        <option value="DOING">In Progress</option>
                        <option value="DONE">Done</option>
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="priority"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">priority</label>
                    <select id="priority" name="taskpriority"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="tasktype"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">category</label>
                    <select id="category" name="tasktype"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="basic">basic</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">due
                        date</label>
                    <input type="date" name="taskfin" id="due_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type task Title" >
                        <div class="hidden dateError text-red-600 text-xs p-2"></div>
                </div>
                <div class="col-span-2">

                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Description</label>
                    <textarea id="description" name="taskdesc" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write the description here..."></textarea>
                    <div class="hidden descriptionError text-red-600 text-xs p-2"></div>
                </div>

            </div>
            <div>
                <p class="hidden messageError text-red-600 text-xs p-2"></p>
            </div>
            <div class="footer_drop flex justify-between">
                <button type="submit"
                   
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add new Task
                </button>
                <!-- cencel btn -->
                <button type="button"
                    class="text-white inline-flex items-center bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    id="cancel_btn">

                    cancel
                </button>
            </div>

        </form>
    </div>
    <!-- modal end -->
    <!-- update task -->
    <div class="task-modal hidden absolute left-0 top-0 items-center justify-center w-full h-full">
        <form id="modalForm_update" class="conf-modal w-96 bg-white p-4 rounded-sm md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <h1 class="text-center font-bold text-blue-900">Update Task</h1>

                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="priority_update"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">priority</label>
                    <select id="priority_update"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">priority</option>
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P3">P3</option>
                    </select>
                </div>

                <div class="col-span-1">
                    <label for="due_date_update" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">due
                        date</label>
                    <input type="date" name="date" id="due_date_update"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type task Title" required="">
                </div>
                <div class="col-span-2">

                    <label for="description_update" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Description</label>
                    <textarea id="description_update" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write the description here..."></textarea>

                </div>

            </div>
            <div class="footer_drop flex justify-between">
                <!-- update_btn -->
                <button type="button"
                    id="submit_btn_update"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    update Task
                </button>
                <!-- cencel btn -->
                <button type="button"
                    class="text-white inline-flex items-center bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    id="cancel_btn_update">

                    cancel
                </button>
            </div>

        </form>
    </div>
    <!-- end update task -->

    <!-- task information -->
    <div class="information_modal absolute hidden items-center justify-center h-full w-full top-0">
        <div class="info_task flex flex-col max-w-96 p-6 min-h-fit bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <i class="fa-solid fa-xmark self-end" style="color: #000000;"></i>
            <h5 id="title_info" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                technology acquisitions 2021</h5>
            <p id="description_info" class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-wrap">Here are the
                biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <div class="info_footer flex justify-between">
                <p id="date_info" class="mb-3 font-normal text-gray-400 text-sm">03/13/2024</p>
                <p id="status_info" class="mb-3 font-bold text-black-400 text-sm">Done</p>
            </div>

        </div>

    </div>
    <script src="assets/js/regex.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/canvas.js"></script>
</body>

</html>
