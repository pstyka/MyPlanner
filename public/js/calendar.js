//
// function openTaskModal() {
//     document.getElementById('taskModal').style.display = 'block';
// }
// function closeTaskModal() {
//     document.getElementById('taskModal').style.display = 'none';
// }
// function saveTask(event) {
//     event.preventDefault();
//     const taskName = document.getElementById('taskName').value;
//     const taskDescription = document.getElementById('taskDescription').value;
//     const taskHour = document.getElementById('taskHour').value;
//
//     fetch('/saveTask', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({
//             name: taskName,
//             description: taskDescription,
//             hour: taskHour,
//         }),
//     })
//         .then(response => response.json())
//         .then(data => {
//             closeTaskModal();
//             fetchTasks();
//         })
//         .catch(error => {
//             console.error('There was a problem with the fetch operation:', error);
//         });
// }
//
// function fetchTasks() {
//     fetch('/getAllTasks')
//         .then(response => response.json())
//         .then(data => {
//             const taskList = document.querySelector('.task-list');
//             taskList.innerHTML = '';
//
//             data.tasks.forEach(task => {
//                 const taskItem = document.createElement('div');
//                 taskItem.textContent = `${task.name} - ${task.description} - ${task.hour}`;
//                 taskList.appendChild(taskItem);
//             });
//         })
//         .catch(error => {
//             console.error('There was a problem with the fetch operation:', error);
//         });
// }
// document.addEventListener('DOMContentLoaded', fetchTasks);
//
// document.addEventListener('DOMContentLoaded', function () {
//     const addTaskButton = document.getElementById('addTaskButton');
//     const taskModal = document.getElementById('taskModal');
//
//     addTaskButton.addEventListener('click', function () {
//         taskModal.style.display = 'block';
//     });
//
//     function closeTaskModal() {
//         taskModal.style.display = 'none';
//     }
//
//     window.closeTaskModal = closeTaskModal;
//
//     // Dodaj resztę skryptu tutaj do obsługi formularza dodawania zadania
//     // ...
//
//     // function saveTask(event) {
//         // Obsługa zapisywania zadania
//         // ...
//         // Po zapisaniu zadania możesz zamknąć modal za pomocą closeTaskModal()
//         closeTaskModal();
//         event.preventDefault(); // Zapobiegaj domyślnej akcji formularza
//     }
//
//     window.saveTask = saveTask;
// });

function openTaskForm() {
    const taskFormModal = document.getElementById("taskFormModal");
    taskFormModal.style.display = "block";
}

// Function to close the task form
function closeTaskForm() {
    const taskFormModal = document.getElementById("taskFormModal");
    taskFormModal.style.display = "none";
}