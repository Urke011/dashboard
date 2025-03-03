# Laravel Dashboard

This is a **Laravel & Vue.js** powered dashboard that integrates various APIs, including a **Stock API**, **Weather API**, and a **Music Player**. The dashboard provides real-time stock price tracking, a **To-Do list with CRUD operations**, and caching mechanisms to optimize API calls. Vue.js is used for frontend interactions, especially for managing the To-Do list.

## Features

- **Stock API Integration:** Fetches and displays stock prices, volumes, and market data.
- **Weather API:** Displays weather information for different cities.
- **To-Do List (CRUD with Vue + Laravel):** Vue.js manages the frontend requests, while Laravel handles task creation, updating, and deletion.
- **Music Player:** Allows users to play, pause, and browse songs.
- **Caching System:** Prevents excessive API calls due to request limits.
- **Docker Support:** Run the app using Docker for easy setup.

## Prerequisites

Ensure you have the following installed:

- **Docker & Docker Compose** (for containerized setup)
- **PHP** (8.0 or higher) (if running locally)
- **Laravel** (10.x or higher)
- **Composer**
- **Node.js & npm**
- **MySQL** or any supported database

## Getting Started

You can run this project **with or without Docker**.

### Running with Docker (Recommended)

1. **Clone the repository**  

    ```bash
    git clone https://github.com/yourusername/laravel-dashboard.git
    cd laravel-dashboard
    ```

2. **Copy the `.env` file and update variables**  

    ```bash
    cp .env.example .env
    ```

    Ensure that your database settings match the Docker service:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

3. **Run Docker containers**  

    ```bash
    docker-compose up -d
    ```

4. **Run migrations**  

    ```bash
    docker-compose exec app php artisan migrate
    ```

5. **Run frontend build**  

    ```bash
    docker-compose exec app npm run dev
    ```

## API Integrations

### Stock API

- Fetches stock market data and displays price trends and trading volumes.
- Cached to avoid excessive API requests.

### Weather API

- Retrieves and displays weather conditions for different cities.
- Uses caching for efficiency.

## To-Do List (Vue + Laravel)

- **Vue.js** sends AJAX requests to the Laravel backend.
- **CRUD operations** for tasks (Add, Edit, Delete, Mark as Complete).
- Tasks are managed only in PHP, with Vue handling UI updates.

## Music Player

- Allows users to play/pause music.
- Supports track browsing.

## Caching

The app caches API data to prevent excessive requests. You can manually clear the cache using:

```bash
php artisan cache:clear
