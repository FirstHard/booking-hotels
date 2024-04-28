# Hotel Reservation System - Test Project

This project is a test assignment aimed at implementing a hotel room search and reservation form. The application utilizes demo data and does not integrate with external services or real hotels.

## Description

The goal of this project is to create a web application with the following features:

- **User Interface**:
  - Implement a user-friendly form for searching and reserving hotel rooms.
  - Display available rooms based on search criteria (location, dates, etc.).
  - Allow users to select and reserve a room.

- **Authentication**:
  - The application consists of a user-facing part that does not require authentication.
  - An administrative part where users need to register to gain access.
  - The first registered user is granted administrator privileges to access the admin panel.

## Technologies Used

The project will use the following technologies:

- **Frontend**:
  - Vue.js 3 for building dynamic and interactive user interfaces.
  - Bootstrap 5 for responsive and modern UI design.

- **Backend**:
  - Laravel 10 (or the latest version available) for backend server-side logic.
  - Blade templates for rendering server-side views.

## Installation and Usage

To run this project locally, follow these steps:

1. Clone the repository to your local machine.
2. Install dependencies by running:
```
npm install
composer install
```

3. Set up the database configuration in .env file.
4. Generate the APP_KEY: `php artisan key:generate`.
5. Migrate and seed the database: `php artisan migrate --seed`.
6. Start the development server:
```
php artisan serve
```
and in another terminal window:
```
npm run dev
```
7. Open the application in your web browser and begin using the hotel reservation system.

## License

This project is licensed under the [MIT License](LICENSE) located in the root directory.

Feel free to adjust the content based on your specific project requirements and any additional details you want to include in the README.md file. This template provides a structured overview of the project's purpose, technologies used, and installation instructions to help users understand and use the application.
