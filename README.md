Product Management System

This project implements a simple product management system using PHP and MySQL. It allows users to add products, search for products, and view the product list.
Prerequisites

    Web server (e.g., Apache) with PHP support
    MySQL database server
    PHP version 5.6 or higher
    MySQLi extension enabled

Installation

    Clone or download the repository to your local machine.

    Import the products.sql file into your MySQL database to create the required table.

bash

mysql -u username -p database_name < products.sql

    Update the database connection settings in dbconnection.php file if necessary.

php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "products");

Usage

    Add the product details using the "Create Product" form.
    Search for products using the search form.
    View the list of products in the table.
    Click on "Add Products" in the navigation menu to add more products.

File Structure

    index.php: Main page with product list and search functionality.
    add_product.php: Form to add new products.
    ajaxfile.php: Handles AJAX requests for creating products and searching products.
    dbconnection.php: Database connection class.
    style.css: CSS stylesheet for styling the pages.

Customization

    You can customize the appearance of the pages by modifying the style.css file.
    Extend the functionality by adding features such as product editing, deletion, pagination, etc.

Contributing

Contributions are welcome! Feel free to fork the repository, make changes, and submit a pull request.
License

This project is licensed under the MIT License. See the LICENSE file for details.
