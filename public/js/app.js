// Select the form and the input field for creating new ToDo items
const todoForm = document.querySelector('#todo-form');
const todoInput = document.querySelector('#todo-input');

// Add an event listener to the form to create new ToDo items
todoForm.addEventListener('submit', (event) => {
    // Prevent the form from submitting
    event.preventDefault();

    // Get the value of the input field
    const todoText = todoInput.value.trim();

    // Check if the input field is not empty
    if (todoText !== '') {
        // Create a new ToDo item
        const todoItem = createTodoItem(todoText);

        // Add the ToDo item to the list
        const todoList = document.querySelector('#todo-list');
        todoList.appendChild(todoItem);

        // Clear the input field
        todoInput.value = '';
    }
});

// Function to create a new ToDo item
function createTodoItem(text) {
    // Create the HTML for the ToDo item
    const todoItem = document.createElement('div');
    todoItem.className = 'todo-item';
    todoItem.innerHTML = `
        <div class="form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label">${text}</label>
        </div>
        <div class="actions">
            <button class="btn btn-primary edit-btn">Edit</button>
            <button class="btn btn-danger delete-btn">Delete</button>
        </div>
    `;

    // Add event listeners to the edit and delete buttons
    const editBtn = todoItem.querySelector('.edit-btn');
    editBtn.addEventListener('click', () => {
        // Get the text of the ToDo item
        const label = todoItem.querySelector('.form-check-label');
        const todoText = label.textContent.trim();

        // Show the edit form and hide the ToDo item
        const editForm = document.querySelector('#edit-form');
        editForm.classList.remove('d-none');
        editForm.querySelector('#edit-input').value = todoText;
        todoItem.classList.add('d-none');

        // Add an event listener to the edit form to save changes
        editForm.addEventListener('submit', (event) => {
            // Prevent the form from submitting
            event.preventDefault();

            // Get the new value of the input field
            const newTodoText = editForm.querySelector('#edit-input').value.trim();

            // Check if the input field is not empty
            if (newTodoText !== '') {
                // Update the text of the ToDo item
                label.textContent = newTodoText;

                // Show the ToDo item and hide the edit form
                editForm.classList.add('d-none');
                todoItem.classList.remove('d-none');
            }
        });
    });

    const deleteBtn = todoItem.querySelector('.delete-btn');
    deleteBtn.addEventListener('click', () => {
        // Remove the ToDo item from the list
        todoItem.remove();
    });

    // Return the new ToDo item
    return todoItem;
}
