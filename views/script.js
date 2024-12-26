// Data
const tasks = [
    {
        id: 0,
        title: "amrabet",
        priority: "P3",
        status: "Todo",
        dueDate: "2024-04-12", 
        description: "this is the description"
    },
    {
        id: 1,
        title: "web",
        priority: "P2",
        status: "Todo",
        dueDate: "2024-12-24",
        description: "this is the description"
    },
    {
        id: 2,
        title: "loop",
        priority: "P1",
        status: "In progress",
        dueDate: "2020-03-03", 
        description: "this is the description"
    },
    {
        id: 3,
        title: "task brook",
        priority: "P3",
        status: "In progress",
        dueDate: "2024-03-13", 
        description: "this is the description"
    },
    {
        id: 4,
        title: "gym",
        priority: "P2",
        status: "In progress",
        dueDate: "2024-07-05",
        description: "this is the description"
    },
    {
        id: 5,
        title: "change icons",
        priority: "P2",
        status: "Done",
        dueDate: "2028-01-23",
        description: "this is the description this is the description this is the description this is the description this is the descriptionthis is the description"
    }
];

// Select DOM elements
const addTask = document.querySelector('#add_one');
const container = document.querySelector('.container');
const updateModal = document.querySelector('.task-modal');
const modal = document.querySelector('.modal');
const todoList = document.getElementById("todo_list");
const progressList = document.getElementById("in_progress_list");
const doneList = document.getElementById("done_list");
const todoCounter = document.getElementById("todo_counter");
const progressCounter = document.getElementById("progress_counter");
const doneCounter = document.getElementById("done_counter");

// Show modal (add task)
addTask.addEventListener('click', () => {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    container.classList.add('blur');
});

const cancel_add = document.getElementById('cancel_btn');
cancel_add.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    container.classList.remove('blur');
});

// Function to create a new task item with status dropdown
function createTaskItem(task) {
    const newItem = document.createElement("li");
    newItem.classList.add("task-item", `priority-${task.priority}`);
    newItem.setAttribute("id", `task-${task.id}`);
    newItem.setAttribute("draggable", "true");
    
    // Add drag event listeners
    addDragListeners(newItem);

    newItem.innerHTML = `
        <div class="flex justify-between"> <h4>${task.title}</h4> <i data-id="${task.id}" class="fa-solid fa-info" style="color: #0041b3;"></i> </div> 
        <p class="description hidden">${task.description}</p>
        <div class="app_footer">
            <p id="date">${task.dueDate}</p>
            <span class="del_edi">
                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                <i data-id="${task.id}" class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
            </span>
        </div>
    `;

    // Set initial color based on task status
    if (task.status === "Todo") {
        newItem.style.borderColor = "#ef4444"; // Red
    } else if (task.status === "In progress") {
        newItem.style.borderColor = "#facc15"; // Yellow
    } else if (task.status === "Done") {
        newItem.style.borderColor = "#22c55e"; // Green
    }

    addHoverEffect(newItem);
    return newItem;
}

// Function to add drag listeners to task items
function addDragListeners(taskItem) {
    taskItem.addEventListener('dragover', handleDragOver);
    taskItem.addEventListener('dragleave', handleDragLeave);
    taskItem.addEventListener('dragstart', handleDragStart);
    taskItem.addEventListener('dragend', handleDragEnd);
}

// Add hover effects
function addHoverEffect(listItem) {
    const description = listItem.querySelector('.description');
    
    listItem.addEventListener('mouseover', () => {
        description.classList.remove('hidden');
        description.classList.add('show');
    });
    
    listItem.addEventListener('mouseout', () => {
        description.classList.remove('show');
        description.classList.add('hidden');
    });
}

// Function to handle drag start
function handleDragStart(e) {
    e.target.classList.add('dragging');
    e.dataTransfer.setData('text/plain', e.target.id);
    e.dataTransfer.effectAllowed = 'move';
}

// Function to handle drag end
function handleDragEnd(e) {
    e.target.classList.remove('dragging');
    // Remove drag-over class from all cards and tasks
    document.querySelectorAll('.card, .task-item').forEach(element => {
        element.classList.remove('drag-over');
    });
}

// Function to handle drag over
function handleDragOver(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'move';
    
    const taskItem = e.target.closest('.task-item');
    const card = e.target.closest('.card');

    // Remove drag-over from all elements first
    document.querySelectorAll('.card, .task-item').forEach(element => {
        if (element !== taskItem && element !== card) {
            element.classList.remove('drag-over');
        }
    });

    // If hovering over a task item that's not being dragged
    if (taskItem && !taskItem.classList.contains('dragging')) {
        taskItem.classList.add('drag-over');
    }
    // If hovering over a card
    else if (card) {
        card.classList.add('drag-over');
    }
}

// Function to handle drag leave
function handleDragLeave(e) {
    const taskItem = e.target.closest('.task-item');
    const card = e.target.closest('.card');

    if (taskItem) {
        taskItem.classList.remove('drag-over');
    }
    if (card && !card.contains(e.relatedTarget)) {
        card.classList.remove('drag-over');
    }
}

// Function to get priority weight (for sorting)
function getPriorityWeight(priority) {
    switch(priority) {
        case 'P1': return 1;
        case 'P2': return 2;
        case 'P3': return 3;
        default: return 999; // For any unknown priority
    }
}

// Function to sort tasks by priority
function sortTasksByPriority(listElement) {
    const tasks = Array.from(listElement.children);
    tasks.sort((a, b) => {
        const priorityA = a.classList.toString().match(/priority-P(\d)/)?.[1] || '999';
        const priorityB = b.classList.toString().match(/priority-P(\d)/)?.[1] || '999';
        return priorityA - priorityB;
    });
    
    tasks.forEach(task => listElement.appendChild(task));
}

// Function to handle drop with sorting
function handleDrop(e) {
    e.preventDefault();
    const draggedTaskId = e.dataTransfer.getData('text/plain');
    const draggedElement = document.getElementById(draggedTaskId);
    const dropZone = e.target.closest('.card');
    const dropTask = e.target.closest('.task-item');
    
    if (dropZone && draggedElement) {
        const taskId = parseInt(draggedTaskId.split('-')[1]);
        const task = tasks.find(t => t.id === taskId);
        
        if (task) {
            const todoList = dropZone.querySelector('#todo_list');
            const inProgressList = dropZone.querySelector('#in_progress_list');
            const doneList = dropZone.querySelector('#done_list');
            let targetList;
            let newStatus;
            
            // Determine which list we're dropping into
            if (todoList && (dropZone.querySelector('#todo_list') === e.target || dropZone.contains(todoList))) {
                targetList = todoList;
                task.status = 'Todo';
                newStatus = 'Todo';
            } else if (inProgressList && (dropZone.querySelector('#in_progress_list') === e.target || dropZone.contains(inProgressList))) {
                targetList = inProgressList;
                task.status = 'In progress';
                newStatus = 'In progress';
            } else if (doneList && (dropZone.querySelector('#done_list') === e.target || dropZone.contains(doneList))) {
                targetList = doneList;
                task.status = 'Done';
                newStatus = 'Done';
            }

            if (targetList) {
                // Reset any existing animations
                draggedElement.style.animation = 'none';
                draggedElement.offsetHeight; // Trigger reflow
                draggedElement.style.animation = null;
                
                // Update task color based on new status
                updateTaskColor(draggedElement, newStatus);
                
                // Add to target list
                targetList.appendChild(draggedElement);
                
                // Sort the target list by priority
                sortTasksByPriority(targetList);
                
                // Add slide-in animation
                draggedElement.style.animation = 'slideIn 0.3s ease-out';
                
                updateCounters();
            }
        }
    }

    // Remove all drag-over classes
    document.querySelectorAll('.card, .task-item').forEach(element => {
        element.classList.remove('drag-over');
    });
}

// Function to update task color based on its status
function updateTaskColor(taskElement, status) {
    if (status === "Todo") {
        taskElement.style.borderColor = "#ef4444"; // Red
    } else if (status === "In progress") {
        taskElement.style.borderColor = "#facc15"; // Yellow
    } else if (status === "Done") {
        taskElement.style.borderColor = "#22c55e"; // Green
    }
}

// Update counters
function updateCounters() {
    const todoCounter = document.getElementById('todo_counter');
    const progressCounter = document.getElementById('progress_counter');
    const doneCounter = document.getElementById('done_counter');
    
    const todoCount = document.getElementById('todo_list').children.length;
    const progressCount = document.getElementById('in_progress_list').children.length;
    const doneCount = document.getElementById('done_list').children.length;
    
    // Animate counter updates
    [todoCounter, progressCounter, doneCounter].forEach(counter => {
        counter.classList.add('update');
        setTimeout(() => counter.classList.remove('update'), 500);
    });

    todoCounter.textContent = todoCount;
    progressCounter.textContent = progressCount;
    doneCounter.textContent = doneCount;
}

// Function to move task to the correct list based on status
function moveTaskToCorrectList(listItem, task) {
    const todoList = document.getElementById('todo_list');
    const inProgressList = document.getElementById('in_progress_list');
    const doneList = document.getElementById('done_list');

    if (task.status === "Todo") {
        todoList.appendChild(listItem);
    } else if (task.status === "In progress") {
        inProgressList.appendChild(listItem);
    } else if (task.status === "Done") {
        doneList.appendChild(listItem);
    }
}

// Initialize tasks with sorting
function initializeTasks() {
    const todoList = document.getElementById('todo_list');
    const inProgressList = document.getElementById('in_progress_list');
    const doneList = document.getElementById('done_list');

    // Sort each list
    sortTasksByPriority(todoList);
    sortTasksByPriority(inProgressList);
    sortTasksByPriority(doneList);
}

// Add tasks to DOM initially
tasks.forEach(task => {
    const newItem = createTaskItem(task);
    if (task.status === "Todo") {
        document.getElementById('todo_list').appendChild(newItem);
    } else if (task.status === "In progress") {
        document.getElementById('in_progress_list').appendChild(newItem);
    } else if (task.status === "Done") {
        document.getElementById('done_list').appendChild(newItem);
    }
});

initializeTasks();
updateCounters();

// Event delegation for delete functionality
container.addEventListener('click', function(event) {
    if (event.target.classList.contains('fa-trash')) {
        event.target.closest('li').remove();
        updateCounters();
        alert("Task deleted successfully!");
    }
});

// Add new task
document.getElementById("submit_btn").addEventListener("click", function(event) {
    event.preventDefault();
    
    const title = document.getElementById("title_add").value.trim();
    const description = document.getElementById("description").value.trim();
    const priority = document.getElementById("priority").value;
    const status = document.getElementById("status").value;
    const dueDate = document.getElementById("due_date").value.trim();

    if (!title || !description || !priority || !status || !dueDate) {
        alert("Please fill out all fields.");
        return;
    }

    const newTask = {
        id: tasks.length,
        title,
        priority,
        status,
        dueDate,
        description
    };
    tasks.push(newTask);

    const newItem = createTaskItem(newTask);
    if (status === "Todo") {
        todoList.appendChild(newItem);
    } else if (status === "In progress") {
        progressList.appendChild(newItem);
    } else if (status === "Done") {
        doneList.appendChild(newItem);
    }
    updateCounters();
    alert("Task added successfully!");
    document.getElementById("modalForm").reset();
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    container.classList.remove('blur');
});

// Handle task edit
let itemId;
container.addEventListener('click', function(event) {
    if (event.target.classList.contains('fa-pen-to-square')) {
        updateModal.classList.remove('hidden');
        updateModal.classList.add('flex');
        container.classList.add('blur');
        
        itemId = parseInt(event.target.dataset.id, 10);
        const taskToEdit = tasks.find(task => task.id === itemId);
        
        if (taskToEdit) {
            document.getElementById("description_update").value = taskToEdit.description;
            document.getElementById("priority_update").value = taskToEdit.priority;
            document.getElementById("due_date_update").value = taskToEdit.dueDate;
        }
    }
});

// Update task
document.getElementById('submit_btn_update').addEventListener('click', function() {
    const description = document.getElementById("description_update").value.trim();
    const priority = document.getElementById("priority_update").value;
    const dueDate = document.getElementById("due_date_update").value.trim();

    if (!description || !priority || !dueDate) {
        alert('Please fill out all fields');
        return;
    }

    const taskToUpdate = tasks.find(task => task.id === itemId);
    if (taskToUpdate) {
        taskToUpdate.description = description;
        taskToUpdate.priority = priority;
        taskToUpdate.dueDate = dueDate;

        const updatedItem = createTaskItem(taskToUpdate);
        document.querySelector(`[data-id="${itemId}"]`).closest('li').replaceWith(updatedItem);
        updateCounters();
    }

    updateModal.classList.add('hidden');
    updateModal.classList.remove('flex');
    container.classList.remove('blur');
    
});

// Hide update modal
document.getElementById('cancel_btn_update').addEventListener('click', () => {
    updateModal.classList.add('hidden');
    updateModal.classList.remove('flex');
    container.classList.remove('blur');
});

// task information
const infoModal = document.querySelector('.information_modal');
const titleInfo = document.getElementById('title_info');
const descriptionInfo = document.getElementById('description_info');
const dateInfo = document.getElementById('date_info');
const statusInfo = document.getElementById('status_info');
const taskInfo = document.querySelector('.info_task')
container.addEventListener('click' , function(event) {
    if(event.target.classList.contains('fa-info')){
       infoModal.classList.remove('hidden');
       infoModal.classList.add('flex');
       container.classList.add('blur');

       itemId = parseInt(event.target.dataset.id, 10);
        const taskToShow = tasks.find(task => task.id === itemId);
      
        if(taskToShow){
            titleInfo.textContent = taskToShow.title;
            descriptionInfo.textContent = taskToShow.description;
            dateInfo.textContent = taskToShow.dueDate;
            statusInfo.textContent = taskToShow.status;

           
        }
        if(taskToShow.priority === "P1"){
            taskInfo.classList.add('p1_info')
          }
          else if(taskToShow.priority === "P2"){
            taskInfo.classList.add('p2_info')
          }
          else{
            taskInfo.classList.add('p3_info')
          }


    }
});
const xMark = document.querySelector('.fa-xmark');
xMark.addEventListener('click', () => {
    infoModal.classList.add('hidden');
       infoModal.classList.remove('flex');
       container.classList.remove('blur');

       taskInfo.classList.remove('p1_info', 'p2_info', 'p3_info');
});

// Add drop zone event listeners to the cards and tasks
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('dragover', handleDragOver);
    card.addEventListener('dragleave', handleDragLeave);
    card.addEventListener('drop', handleDrop);
});