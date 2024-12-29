document.addEventListener('DOMContentLoaded', function() {
    const modalForm = document.getElementById('modalForm');
    const cancel_btn = document.getElementById('cancel_btn');
    const messageError = modalForm.querySelector(".messageError");
    const nameError = modalForm.querySelector(".nameError");
    const dateError = modalForm.querySelector(".dateError");
    const descriptionError = modalForm.querySelector(".descriptionError");

    // Input elements
    const taskNameInput = document.getElementById('title_add');
    const taskDescInput = document.getElementById('description');
    const dueDateInput = document.getElementById('due_date');
    const taskstatus = document.getElementById('taskstatus');
    const priority = document.getElementById('priority');
    const category = document.getElementById('category');

    const errors = [
        messageError,
        nameError,
        dateError,
        descriptionError
    ];

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
            nameError.textContent = 'Task name must be 3-50 characters long and contain valid characters.';
            nameError.classList.remove('hidden');
        } else {
            this.classList.remove('border-red-500');
            nameError.textContent = '';
            nameError.classList.add('hidden');
        }
    });

    taskDescInput.addEventListener('input', function() {
        if (!validateTaskDescription(this.value)) {
            this.classList.add('border-red-500');
            descriptionError.textContent = 'Description must be 10-300 characters long and contain valid characters.';
            descriptionError.classList.remove('hidden');
        } else {
            this.classList.remove('border-red-500');
            descriptionError.textContent = '';
            descriptionError.classList.add('hidden');
        }
    });

    dueDateInput.addEventListener('change', function() {
        if (!validateDueDate(this.value)) {
            this.classList.add('border-red-500');
            dateError.textContent = 'Due date cannot be in the past.';
            dateError.classList.remove('hidden');
        } else {
            this.classList.remove('border-red-500');
            dateError.textContent = '';
            dateError.classList.add('hidden');
        }
    });

    // Form submission validation
    modalForm.addEventListener('submit', function(event) {
        let isValid = true;
        messageError.textContent = "";
        messageError.classList.add('hidden');

        // Validate task name
        if (!validateTaskName(taskNameInput.value)) {
            taskNameInput.classList.add('border-red-500');
            nameError.textContent = 'Invalid task name.';
            nameError.classList.remove('hidden');
            isValid = false;
        }

        // Validate description
        if (!validateTaskDescription(taskDescInput.value)) {
            taskDescInput.classList.add('border-red-500');
            descriptionError.textContent = 'Invalid description.';
            descriptionError.classList.remove('hidden');
            isValid = false;
        }

        // Validate due date
        if (!validateDueDate(dueDateInput.value)) {
            dueDateInput.classList.add('border-red-500');
            dateError.textContent = 'Invalid due date.';
            dateError.classList.remove('hidden');
            isValid = false;
        }

        // Validate empty fields
        if (taskNameInput.value.trim() === "") {
            taskNameInput.classList.add('border-red-500');
            nameError.textContent = 'Please enter a task name.';
            nameError.classList.remove('hidden');
            isValid = false;
        }

        if (taskDescInput.value.trim() === "") {
            taskDescInput.classList.add('border-red-500');
            descriptionError.textContent = 'Please enter a description.';
            descriptionError.classList.remove('hidden');
            isValid = false;
        }

        if (dueDateInput.value === "") {
            dueDateInput.classList.add('border-red-500');
            dateError.textContent = 'Please select a due date.';
            dateError.classList.remove('hidden');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    cancel_btn.addEventListener("click", () => {
        messageError.textContent = "";
        messageError.classList.add('hidden');
        
        errors.forEach(error => {
            error.textContent = "";
            error.classList.add('hidden');
        });

        // Reset input styles
        taskNameInput.classList.remove('border-red-500');
        taskDescInput.classList.remove('border-red-500');
        dueDateInput.classList.remove('border-red-500');
    });
});