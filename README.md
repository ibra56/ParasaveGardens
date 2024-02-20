# farmLink

farmLink is a web-based system designed to connect farmers with urban markets. It aims to streamline the process of selling agricultural products by providing a platform where farmers can showcase their produce and urban consumers can easily access and purchase them.

## Features

- **User Authentication**: Secure authentication system for farmers and consumers.
- **Product Listings**: Farmers can list their products with details such as name, description, price, and availability.
- **Search and Filter**: Consumers can search and filter products based on various criteria like category, price range, and location.
- **Order Management**: Consumers can place orders for products they want to purchase, and farmers can manage these orders.
- **Payment Integration**: Integration with payment gateways for secure online transactions.
- **Messaging System**: Communication channel between farmers and consumers for inquiries and order updates.
- **Admin Dashboard**: Admin panel to manage users, products, orders, and other system settings.

## Installation

### Prerequisites

- PHP (>= 8.1)
- Composer
- Node.js (>= 14.x)
- MySQL or any compatible database system

### Clone the Repository

git clone https://github.com/GP10DevHTS/farmLink.git
cd farmLink

### Backend Setup

1. Install PHP dependencies:
composer install

2. Create a copy of the .env.example file and rename it to .env:

    - On Linux:
        cp .env.example .env
    - On Windows (using Command Prompt):
        copy .env.example .env
    - On Windows (using PowerShell):
        Copy-Item .env.example .env

3. Generate an application key:
php artisan key:generate

4. Configure your .env file with your database credentials and other necessary settings.

5. Run migrations and seeders:
php artisan migrate --seed

### Frontend Setup

1. Install Node.js dependencies:
npm install

### Serve the Application

1. Start the Laravel development server:
php artisan serve

2. Compile assets and start the frontend development server:
npm run dev

The application should now be accessible at http://localhost:8000.

## Support

For any issues or questions, please open an issue on the GitHub repository: https://github.com/GP10DevHTS/farmLink/issues

## License

This project is licensed under the MIT License. See the LICENSE file for details.
