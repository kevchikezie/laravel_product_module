# Laravel Product Module

A Laravel-based module for managing products.

## Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL or other supported database
- Node.js & npm (for frontend assets)

### Installation

1. **Clone the repository:**
```bash
git clone https://github.com/kevchikezie/laravel_product_module.git
cd laravel_product_module
```

2. **Install PHP dependencies:**
```bash
composer install
```

3. **Install Node dependencies for frontend:**
```bash
npm install
```

4. **Copy .env and set up environment:**
```bash
cp .env.example .env
```
Edit `.env` to set your database and other credentials.
```bash
DB_DATABASE=YOUR_DATEBASE_NAME
DB_USERNAME=YOUR_DATEBASE_USERNAME
DB_PASSWORD=YOUR_DATEBASE_PASSWORD
```

5. **Generate application key:**
```bash
php artisan key:generate
```

6. **Run migration and seeder at the same time:**
```bash
php artisan migrate --seed
```

### Run the App
1. **Start the local development server:**
```bash
composer run dev
```
Visit link displayed in your terminal on your browser. It might look like this 
`Server running on [http://127.0.0.1:8000]`

2. **Registration (Optional):**
You may decide to register a new user by clicking on the `Register` link. However, if you wish to log in without creating a user, you can use the credential of the seeded test user.
```
Email: test@example.com
Password: password
```

3. **Log in:**
Click on the login link and provide your login credential and you will be redirected to the dashboard.

### Run Test
```bash
php artisan test
```

## What can be improved
- **Cloud-Based Storage:** The current implementation relies on local storage. An improvement will be to transition to cloud-based storage (e.g. AWS S3, Cloudinary, etc) to improve asset availability and security.

- **Asynchronous Processing:** To prevent blocking the UI and ensure a responsive user experience, we can offload resource-intensive tasks like image processing and uploading to a background queue using a Laravel Job. This will allow the system to remain fast and efficient.

- **Polymorphic Relationships:** We can refactor the data model to centralize image management. By using a single `Image` model with a polymorphic relationship, it can be associated with any other model (`Product`, `User`, etc.). This eliminates redundant code and simplifies the database schema.

- **Streamline Data with DTOs:** To enhance type safety and improve code predictability, we can introduce Data Transfer Objects (DTOs). This practice formalizes the data contract for service methods, making the code more robust and easier to test.

- **Universally Unique Identifiers (UUIDs):** The primary keys can be transitioned from auto-incrementing integers to UUIDs. This simplifies database management in distributed environments and provides a decentralized, collision-resistant primary key system that improves security against enumeration attacks.

- **More Unit and Feature Testing:** We can write more unit and feature tests for more usecases and edge-cases for the controller and service methods. This is a critical step to create a reliable safety net for future development.