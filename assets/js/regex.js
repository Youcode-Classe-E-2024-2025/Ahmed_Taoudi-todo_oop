document.addEventListener('DOMContentLoaded', function() {
    const modalForm = document.getElementById('modalForm');
    const cancel_btn = document.getElementById('cancel_btn');
    const messageError = modalForm.querySelector(".messageError");

    // Input elements
    const taskNameInput = document.getElementById('title_add');
    const taskDescInput = document.getElementById('description');
    const dueDateInput = document.getElementById('due_date');
    const taskstatus = document.getElementById('taskstatus');
    const priority = document.getElementById('priority');
    const category = document.getElementById('category');

    // Validation functions
    function validateTaskName(name) {
        // Task name: 3-50 characters, letters, numbers, spaces, and some punctuation
        const taskNameRegex = /^[a-zA-Z0-9\s\-_.,!?]{3,50}$/;
        return taskNameRegex.test(name.trim());
    }

    function validateTaskDescription(desc) {
        // Description: 10-300 characters, allows letters, numbers, spaces, and basic punctuation
        const descRegex = /^[a-zA-Z0-9\s\-_.,!?()]{10,300}$/;
        return descRegex.test(desc.trim());
    }

    function validateDueDate(date) {
        // Ensure date is not in the past
        const selectedDate = new Date(date);
        const today = new Date();
        today.setHours(0, 0, 0, 0);  // Reset time for accurate comparison
        return selectedDate >= today;
    }

    // Real-time validation
    taskNameInput.addEventListener('input', function() {
        if (!validateTaskName(this.value)) {
            this.classList.add('border-red-500');
            messageError.textContent = 'Task name must be 3-50 characters long and contain valid characters.';
        } else {
            this.classList.remove('border-red-500');
            messageError.textContent = '';
        }
    });

    taskDescInput.addEventListener('input', function() {
        if (!validateTaskDescription(this.value)) {
            this.classList.add('border-red-500');
            messageError.textContent = 'Description must be 10-300 characters long and contain valid characters.';
        } else {
            this.classList.remove('border-red-500');
            messageError.textContent = '';
        }
    });

    dueDateInput.addEventListener('change', function() {
        if (!validateDueDate(this.value)) {
            this.classList.add('border-red-500');
            messageError.textContent = 'Due date cannot be in the past.';
        } else {
            this.classList.remove('border-red-500');
            messageError.textContent = '';
        }
    });

    // Form submission validation
    modalForm.addEventListener('submit', function(event) {
        let isValid = true;
        messageError.textContent = '';

        // Validate task name
        if (!validateTaskName(taskNameInput.value)) {
            taskNameInput.classList.add('border-red-500');
            messageError.textContent += 'Invalid task name. ';
            isValid = false;
        }

        // Validate description
        if (!validateTaskDescription(taskDescInput.value)) {
            taskDescInput.classList.add('border-red-500');
            messageError.textContent += 'Invalid description. ';
            isValid = false;
        }

        // Validate due date
        if (!validateDueDate(dueDateInput.value)) {
            dueDateInput.classList.add('border-red-500');
            messageError.textContent += 'Invalid due date. ';
            isValid = false;
        }

        // Validate other fields
        if (taskstatus.value == "") {
            messageError.textContent += 'Please select a task status. ';
            isValid = false;
        }

        if (priority.value == "") {
            messageError.textContent += 'Please select a priority. ';
            isValid = false;
        }

        if (category.value == "") {
            messageError.textContent += 'Please select a category. ';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    cancel_btn.addEventListener("click",() =>{
        modalForm.querySelector(".messageError").textContent = "";
    })
});