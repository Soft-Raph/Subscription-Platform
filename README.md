# Subscription Platform

A simple subscription platform allowing users to subscribe to multiple websites and receive email notifications when new posts are published. This project uses Laravel with MySQL.

## Features

- **Website Management**: Create and manage multiple websites.
- **Post Management**: Publish posts for each website.
- **Subscription**: Users can subscribe to websites and receive email notifications for new posts.
- **Email Notifications**: Subscribers receive emails with post titles and descriptions.

## Requirements

- PHP 8.*
- MySQL
- Composer

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Soft-Raph/Subscription-Platform.git
   cd subscription-platform

2. **Install Dependencies**
    ```bash
   composer install
   
3. **Set Up Environment**

   ```bash
   cp .env.example .env
   Update the .env file with your database credentials:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password



4. **Generate Application Key**
     ```bash
   php artisan key:generate

5. **Run Migrations**
     ```bash
   php artisan migrate
   
6. **Seed the Database**
     ```bash
   php artisan db:seed
   
7. **Set Up Mail Configuration**
     ```bash
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.example.com
   MAIL_PORT=587
   MAIL_USERNAME=your_email@example.com
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email@example.com
   MAIL_FROM_NAME="${APP_NAME}"

8. **Commands**
     ```bash
   Send Emails to Subscribers
   php artisan app:send-post-emails

