<?php
session_start();
?>

<!doctype html>
<head>
    <title>plan your day</title>
    <link rel="stylesheet" type="text/css" href="public/css/plan.css">
    <script type="text/javascript" src="public/js/calendar.js"></script>
</head>
<body>
    <?php if(!empty($_SESSION['user_id'])) : ?>
        <div class="hero">

            <div class="left-side">
                <div class="calendar">
                    <div class="left">
                        <p id="date"></p>
                        <p id="day"></p>
                    </div>
                    <div class="right">
                        <p id="month"></p>
                        <p id="year"></p>
                    </div>
                </div>
                <div class="calendar-logo">
                    Make your plan
                    <img src="public/img/MyPlanner.svg">
                </div>
                <form class="back" action="menu" method="GET">
                    <button type="submit">Back</button>
                </form>
            </div>

            <div class="right-side">
                <div class="todo">
                    <section class="task-list"></section>
                </div>

                <form class="add-button">
                    <button type="button" onclick="openForm()">Add Task</button>
                </form>
            </div>
            <div class="popup" id="popup">
                <form class="task-form" id="task-form" action="saveTask" method="post">
                    <h2>Add task</h2>
                    Task Name
                    <input name="name" type="text">
                    Task Description
                    <input name="description" type="text">
                    Task Start
                    <input name="start-hour" type="time">
                    Task End
                    <input name="end-hour" type="time">
                    <button type="submit" onclick="closeForm()">Save</button>
                </form>


            </div>
        </div>

    <script>
        const date = document.getElementById("date");
        const day = document.getElementById("day");
        const month = document.getElementById("month");
        const year = document.getElementById("year");

        const today = new Date();
        const weekDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday",
        "Saturday"];
        const allMonths = ["January", "February","March","April","May","June",
        "July","August","September","October","November","December"];


        date.innerHTML = today.getDate();
        day.innerHTML = weekDays[today.getDay()];
        month.innerHTML = allMonths[today.getMonth()];
        year.innerHTML = today.getFullYear();

        const popup = document.getElementById("popup");

        function openForm(){
            popup.classList.add("open-popup");
        }
        function closeForm(){
            popup.classList.remove("open-popup");
        }
        function loadTasks(taskList) {
            console.log("Received tasks:", taskList);

            // Sprawdź, czy taskList jest tablicą
            if (!Array.isArray(taskList)) {
                console.error("Task list is not an array.");
                return;
            }
            const taskListSection = document.querySelector(".task-list");
            taskListSection.innerHTML = "";

            taskList.forEach(task => {
                const taskElement = document.createElement("div");
                taskElement.classList.add("task");
                const upperTask = document.createElement("div");
                upperTask.classList.add("upper-task");
                const nameElement = document.createElement("h2");
                nameElement.textContent = task.name;
                const startTimeElement = document.createElement("p");
                startTimeElement.textContent = task.start_time;
                const endTimeElement = document.createElement("p");
                endTimeElement.textContent = task.end_time;
                const descriptionElement = document.createElement("p");
                descriptionElement.textContent = task.description;

                upperTask.appendChild(nameElement);
                upperTask.appendChild(startTimeElement);
                upperTask.appendChild(endTimeElement);
                taskElement.appendChild(upperTask);
                taskElement.appendChild(descriptionElement);
                taskListSection.appendChild(taskElement);
            });
        }
        function readTasks() {
            fetch("/getAllTasks")
                .then(response => response.json())
                .then(data => {
                    loadTasks(data);
                })
                .catch(error => {
                    console.error('Błąd podczas pobierania zadań:', error);
                });
        }
        window.onload = function() {
            readTasks();
        };
    </script>
    <?php endif;?>
</body>

