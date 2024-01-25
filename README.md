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

![image](https://github.com/pstyka/WDPAI/assets/107481814/a3c2524e-df0c-46c5-992c-1bf1b7d86824)


#### Login
Users can log in using their email and password. A user session is set upon successful login.

![image](https://github.com/pstyka/WDPAI/assets/107481814/212ba689-2d43-4347-947e-c15cf8464ce2)


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

![image](https://github.com/pstyka/WDPAI/assets/107481814/1c1dbc23-38e6-49f9-8fe9-81ba961afb7a)


### Drawing and completing quests

#### Drawing Quests
Users can draw quests, which are associated with experience points and profile levels.

#### Completing Quests
Users can complete quests, resulting in an increase in the number of completed quests and potential advancement to a higher level.

![image](https://github.com/pstyka/WDPAI/assets/107481814/a86cbe27-6eae-4421-b710-333be9c275aa)


### Day Planning

#### Adding Tasks
Users can add tasks to their daily plan, providing a name, description, start time, and end time.

#### Fetching Tasks: 
Users can retrieve tasks scheduled for the current day.

![image](https://github.com/pstyka/WDPAI/assets/107481814/dff7f882-e5db-439b-917b-693e87028c3f)
