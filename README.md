# TodoList App using Laravel and Vue.js

## Introduction

This is a to-do list App built using Laravel and Vue.js. The app allows users to manage their tasks by creating, viewing, updating, and deleting to-do lists. It utilizes additional libraries such as jQuery, Axios, and Bootstrap for enhanced functionality and styling. This app is made to learn how to integrate Laravel and Vue.js.

## Technologies Used

- Laravel 10: The PHP framework used to build the backend API for the TodoList App.
- Vue.js: The JavaScript framework used for building interactive user interfaces.
- Database: MySQL.
- Additional Library:
  - Axios
  - Bootstrap
  - jQuery

## API Structure

1. **View TodoLists**
    - Endpoint: GET `/todolist`
    - Description: Displays the main page where users can view all their to-do lists.
    - Request: none
    - Response: return the view of the main page.

2. **Get TodoLists**
    - Endpoint: GET `/todolist/get`
    - Description: Retrieves all the to-do lists from the server.
    - Request: none
    - Response: Returns an object of all to-do lists.

3. **Get TodoList Detail**
    - Endpoint: POST `/todolist/getdetail/{id}`
    - Description: Retrieves the details of a specific to-do list based on its ID.
    - Request: id
    - Response: Returns specific to-do lists object with the given ID.

4. **Create TodoList**
    - Endpoint: POST `/todolist/create`
    - Description: Allows users to create a new to-do list.
    - Request: none
    - Response: return success response.

5. **Update TodoList**
    - Endpoint: POST `/todolist/update/{id}`
    - Description: Allows users to update the title and content of a to-do list.
    - Request: id
    - Response: return success response.

6. **Delete TodoList**
    - Endpoint: POST `/todolist/delete/{id}`
    - Description: Allows users to delete a to-do list.
    - Request: id
    - Response: return success response.

## Installation

1. Clone this repository.
2. Install dependencies: `composer install`.
3. create a new database.
4. Run migrations: `php artisan migrate`.
5. copy `.env.example` and rename to `.env`.
6. run `php artisan key:generate`.
7. configure database name in `.env` file.
8. Start the development server: `php artisan serve`

## Usage

1. Access the app in your browser by visiting `http://localhost:8000/todolist`.
2. View and manage your to-do lists by creating, updating, and deleting tasks.

## Contribution

Contributions are welcome! If you find any issues or have suggestions for improvement, please feel free to submit a pull request or fork the repository for any purpose.

## License

This project is licensed under the [MIT License](LICENSE). You are free to use and modify the code as per the terms of the license.
