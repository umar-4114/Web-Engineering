document.getElementById('addTaskButton').addEventListener('click', function() {
    const taskInput = document.getElementById('taskInput');
    const taskText = taskInput.value.trim();

    if (taskText !== "") {
        const taskList = document.getElementById('taskList');

        // Create a new list item
        const li = document.createElement('li');
        li.textContent = taskText;

        // Create a delete button
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.classList.add('delete-btn');
        deleteBtn.addEventListener('click', function() {
            taskList.removeChild(li);
        });

        // Toggle completed state on click
        li.addEventListener('click', function() {
            li.classList.toggle('completed');
        });

        // Append delete button to list item
        li.appendChild(deleteBtn);
        
        // Append list item to task list
        taskList.appendChild(li);

        // Clear input field after adding task
        taskInput.value = "";
    }
});
