# PHP FakeStoreAPI Integration

This is a simple PHP project that interacts with the [Fake Store API](https://fakestoreapi.com/) to demonstrate how to make HTTP requests (GET, POST, DELETE) and display product data in a clean frontend interface using only pure PHP and HTML/CSS.

## 🛠 Features

- **GET** all products from the API
- **POST** new product data
- **UPDATE** product details
- **DELETE** a product
- Simple, clean frontend to display the product list
- Uses `cURL` for API requests

## 🚀 How to Run

1. Make sure you have **PHP 8+** and a local server like **XAMPP**, **Laragon**, or **MAMP**.
2. Place the project folder inside your server’s root directory (`htdocs` or `www`).
3. Open the browser and go to:  
   `http://localhost/your-project-folder/`

## 🌐 API Endpoints Used

This project interacts with the following endpoints of the [Fake Store API](https://fakestoreapi.com/):

| Method | Endpoint         | Description             |
|--------|------------------|-------------------------|
| GET    | /products        | Fetch all products      |
| POST   | /products        | Create a new product    |
| POST   | /products/{id}   | Update a product        |
| DELETE | /products/{id}   | Delete a product        |

