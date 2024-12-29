

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
    document.getElementById('modalForm').reset();
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    container.classList.add('blur');
    
});

const cancel_add = document.getElementById('cancel_btn');
cancel_add.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    container.classList.remove('blur');
    clearContributors();

});

// Function to create a new task item with status dropdown
function createTaskItem(task) {
    const newItem = document.createElement("li");
    newItem.classList.add("task-item", `priority-${task.priority}`);
    newItem.setAttribute("id", `task-${task.id}`);
    newItem.setAttribute("draggable", "true");
    
    // Add drag event listeners
    addDragListeners(newItem);


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


initializeTasks();
updateCounters();

// Hide update modal
document.getElementById('cancel_btn_update').addEventListener('click', () => {
    updateModal.classList.add('hidden');
    updateModal.classList.remove('flex');
    container.classList.remove('blur');
});

// Add drop zone event listeners to the cards and tasks
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('dragover', handleDragOver);
    card.addEventListener('dragleave', handleDragLeave);
    card.addEventListener('drop', handleDrop);
});

// Function to filter tasks
function filterTasks() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const statusFilter = document.getElementById('status-filter').value;
    const tasks = document.querySelectorAll('.task-item');

    tasks.forEach(task => {
        const taskName = task.querySelector('h4').textContent.toLowerCase();
        const taskDesc = task.querySelector('.description').textContent.toLowerCase();

        // Search filter
        const matchesSearch = taskName.includes(searchInput) || 
                               taskDesc.includes(searchInput);

        // Status filter
        const matchesStatus = 
            statusFilter === 'ALL' ||
            (statusFilter === 'HIGH' && task.classList.contains('priority-high')) ||
            (statusFilter === 'MEDIUM' && task.classList.contains('priority-medium')) ||
            (statusFilter === 'LOW' && task.classList.contains('priority-low')) ||
            (statusFilter === 'BUG' && task.classList.contains('bug')) ||
            (statusFilter === 'FEATURE' && task.classList.contains('feature'));

        // Show or hide task based on filters
        task.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
    });
}

// Drag and Drop Functionality
document.addEventListener('DOMContentLoaded', () => {
    const lists = document.querySelectorAll('.list-container');
    const tasks = document.querySelectorAll('.task-item');

    tasks.forEach(task => {
        task.addEventListener('dragstart', dragStart);
        task.addEventListener('dragend', dragEnd);
    });

    lists.forEach(list => {
        list.addEventListener('dragover', dragOver);
        list.addEventListener('dragenter', dragEnter);
        list.addEventListener('dragleave', dragLeave);
        list.addEventListener('drop', dragDrop);
    });

    function dragStart(e) {
        e.dataTransfer.setData('text/plain', e.target.id);
        setTimeout(() => {
            e.target.classList.add('dragging');
        }, 0);
    }

    function dragEnd(e) {
        e.target.classList.remove('dragging');
    }

    function dragOver(e) {
        e.preventDefault();
    }

    function dragEnter(e) {
        e.preventDefault();
        e.target.closest('.list-container').classList.add('drag-over');
    }

    function dragLeave(e) {
        e.target.closest('.list-container').classList.remove('drag-over');
    }

    function dragDrop(e) {
        e.preventDefault();
        const list = e.target.closest('.list-container');
        list.classList.remove('drag-over');

        const taskId = e.dataTransfer.getData('text/plain');
        const task = document.getElementById(taskId);

        if (task && list) {
            list.appendChild(task);

            // Determine new status based on list
            let newStatus = '';
            if (list.id === 'todo_list') newStatus = 'TODO';
            else if (list.id === 'in_progress_list') newStatus = 'IN_PROGRESS';
            else if (list.id === 'done_list') newStatus = 'COMPLETED';

            // Send AJAX request to update task status
            if (newStatus) {
                fetch('/task/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${taskId.replace('task-', '')}&status=${newStatus}`
                })
                .then(response => response.json())
                .catch(error => console.error('Error:', error));
            }
        }
    }

    // Add event listeners for filtering
    document.getElementById('search-input').addEventListener('input', filterTasks);
    document.getElementById('status-filter').addEventListener('change', filterTasks);
});