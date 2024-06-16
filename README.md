Github: https://github.com/soumyasavarn/GSIMS/tree/main

# Grocery Management System

This is a simple Grocery Management System implemented in PHP and MySQL. It allows users to manage grocery products, add them to a shopping cart, and perform various operations like adding, updating, and deleting products.

## Features

- User authentication: Users can register, login, and logout.
- Admin panel: Admins can manage products (add, update, delete), view orders, and manage users.
- Product management: Add, update, delete grocery products.
- Shopping cart: Add products to the shopping cart and proceed to checkout.
- Order management: View orders and update their status.

## Screenshots

![Home Page](/images/1.jpg)
*Home Page*

![Product Management](/images/4.jpg)
*Product Management Page*

![Shopping Cart](/images/6.jpg)
*Shopping Cart Page*

## Installation

1. Clone the repository:

```bash
git clone https://github.com/soumyasavarn/GSIMS.git
```

2. Import the `grocery.sql` file into your MySQL database.

3. Update the database configuration in `config.php` with your MySQL credentials:

```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_grocery');
```

4. Start your web server (e.g., Apache, Nginx) and MySQL server.

5. Open the project in your web browser. Entry file is index1.html

## Usage

- Register as a new user or login if you already have an account.
- As an admin, you can manage products, view orders, and manage users from the admin panel.
- As a regular user, you can browse products, add them to the cart, and place orders.

## Contributors

- Soumya Savarn

## Acknowledgements

- This project was inspired by the need for a simple and efficient grocery management system.
- Special thanks to [Bootstrap](https://getbootstrap.com/) for the responsive front-end design.
- Thanks to [PHP](https://www.php.net/) and [MySQL](https://www.mysql.com/) for powering the backend.
- Images used in the screenshots are for illustrative purposes only and are not included in the repository.
