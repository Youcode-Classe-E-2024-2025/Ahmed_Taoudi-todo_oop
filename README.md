# TaskFlow: Collaborative Task Management System

## Project Overview
taskFlow is a modern, object-oriented PHP task management application designed to streamline team collaboration and project tracking.

## Features
- User Authentication
- Task Creation and Management
- Collaborative Task Assignment
- Task Status Tracking (Todo, In Progress, Done)
- User Profile Management
- Responsive Design

## Technologies Used
- PHP (OOP)
- MySQL
- Tailwind CSS
- HTML5
- JavaScript

## Prerequisites
- PHP 7.4+
- MySQL 5.7+
- Composer
- Web Server (Apache/Nginx)

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/Youcode-Classe-E-2024-2025/anouar_elbarry-todo_oop.git
cd taskFlow
```

### 2. Database Setup
1. Create a MySQL database
2. Import the database schema from `database/schema.sql`
3. Configure database connection in `assets/configDB.php`

### 3. Install Dependencies
```bash
composer install
```

### 4. Configure Environment
- Copy `.env.example` to `.env`
- Update database credentials
- Set up application secret keys

## Project Structure
```
project-root/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── configDB.php
│
├── controllers/
│   ├── task/
│   └── user/
│
├── models/
│   ├── Task.php
│   └── User.php
│
├── views/
│   ├── partials/
│   └── ...
│
└── routes.php
```

## Key Features

### Authentication
- Secure user registration and login
- Session management
- CSRF protection

### Task Management
- Create, update, delete tasks
- Assign tasks to team members
- Track task status and priority
- Collaborative task tracking

### User Profile
- View personal task statistics
- Track task progress
- View recent activities

## Security Measures
- Prepared SQL statements
- Input validation
- CSRF token protection
- Password hashing
- XSS prevention

## Contributing
1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Contact
Ahmed Taoudi - []
Anouar Elbarry - [elbarryanwar37@gmail.com]
