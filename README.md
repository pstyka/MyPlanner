# MyPlanner

## Project Description

MyPlanner is an application designed for managing your day. You can set activities that you want to accomplish throughout the day and draw quests for which you earn experience points and advance your profile level.

## Technologies

-HTML
-CSS
-JavaScript, FetchAPI
-PHP
-PostgreSQL
-Docker

## How to run a project?

-In the terminal, navigate to the directory where you want the project to be    located.
-Enter the command: git clone https://github.com/pstyka/WDPAI
-Start Docker.
-In the project terminal, type: docker-compose up
-Open your browser and go to: http://localhost:8080
-Start using the application.

## Aplication Features

### Registration, Login and Logout

#### Registration
Users can register by providing their email, name, password, and password confirmation. The password is securely hashed before storing it in the database.

#### Login
Users can log in using their email and password. A user session is set upon successful login.

#### Logout
Users can log out, terminating their current session and returning to the login page.

### Profile Management

#### Profile
Users can view their profile.

#### Fetching Nickname:
Users can retrieve their nickname.

#### Fetching Level:
Users can retrieve their current level.

#### Fetching Points:
Users can retrieve the number of experience points.

### Drawing and completing quests

#### Drawing Quests
Users can draw quests, which are associated with experience points and profile levels.

#### Completing Quests
Users can complete quests, resulting in an increase in the number of completed quests and potential advancement to a higher level.

### Day Planning

#### Adding Tasks
Users can add tasks to their daily plan, providing a name, description, start time, and end time.

#### Fetching Tasks: 
Users can retrieve tasks scheduled for the current day.
