# CodeIgniter 4 E-commerce Application

A simple and responsive **E-commerce web application** built using **CodeIgniter 4, PHP, MySQL, HTML, CSS, and JavaScript**.

This project demonstrates product management, user authentication, CRUD operations, product details, cart functionality, and checkout flow using the CodeIgniter 4 MVC framework.

## 🚀 Features

* User Registration & Login
* User Authentication
* Product Management
* Add Products
* View Products
* Edit Products
* Delete Products
* Product Details Page
* Add to Cart
* Buy Now functionality
* Checkout Page
* User Profile
* MySQL Database Integration
* Responsive User Interface
* CodeIgniter 4 MVC Architecture

## 🛠️ Technologies Used

* PHP 8.2+
* CodeIgniter 4
* MySQL
* HTML5
* CSS3
* JavaScript
* XAMPP
* Git & GitHub

## 📁 Project Structure

```text
crudapp/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   ├── Config/
│   └── Database/
│
├── database/
│   └── crudapp.sql
│
├── public/
│   ├── css/
│   ├── images/
│   └── index.php
│
├── writable/
├── tests/
├── .env.example
├── composer.json
└── README.md
```

## ⚙️ Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/laxmi-ux/codeigniter4-ecommerce-project.git
```

Navigate to the project directory:

```bash
cd codeigniter4-ecommerce-project
```

### 2. Install Dependencies

Make sure **Composer** is installed on your system.

Run:

```bash
composer install
```

### 3. Configure Environment

Copy the environment file:

```bash
cp env .env
```

On Windows, you can also manually copy the `env` file and rename it to:

```text
.env
```

Update the `.env` file according to your local configuration.



### 4. Database Setup

The project includes a MySQL database export file:

```text
database/crudapp.sql
```

#### Create the Database

1. Start **Apache** and **MySQL** from XAMPP.
2. Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

3. Create a new database named:

```text
crudapp
```

#### Import the Database

1. Select the `crudapp` database in phpMyAdmin.
2. Click **Import**.
3. Choose the database file:

```text
database/crudapp.sql
```

4. Click **Import**.

The required tables and sample data will be created automatically.

### 5. Configure Database Connection

Open the `.env` file and configure your MySQL connection:

```env
database.default.hostname = localhost
database.default.database = crudapp
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

If your MySQL installation uses a password, update:

```env
database.default.password = your_password
```

### 6. Run Database Migrations

If migrations are included in the project, run:

```bash
php spark migrate
```

> **Note:** If you have already imported `database/crudapp.sql`, running migrations may not be required unless the project contains additional migrations that have not been imported.

### 7. Start the Development Server

Run:

```bash
php spark serve
```

The application will be available at:

```text
http://localhost:8080
```

## 🗄️ Database

The application uses **MySQL** for storing application data.

Main data includes:

* Users
* Products
* Cart
* Orders

The database export file is available at:

```text
database/crudapp.sql
```

You can import this file through **phpMyAdmin** to set up the database quickly.

## 🧩 MVC Architecture

This project follows the **CodeIgniter 4 MVC architecture**.

### Model

Handles database operations and data management.

```text
app/Models/
```

### View

Contains the application's frontend pages.

```text
app/Views/
```

### Controller

Handles application logic and connects Models with Views.

```text
app/Controllers/
```

## 🔐 Authentication

The application includes user authentication functionality such as:

* Registration
* Login
* Logout
* Session Management
* User Profile

Protected functionality can be accessed only by authenticated users.

## 🛒 Product & Cart Flow

The basic e-commerce flow is:

```text
User
  ↓
View Products
  ↓
Product Details
  ↓
Add to Cart / Buy Now
  ↓
Cart
  ↓
Checkout
  ↓
Order
```

## 📸 Screenshots

### Home Page

<img width="1365" height="637" alt="Home Page" src="https://github.com/user-attachments/assets/11f0706a-a2ee-4dcf-bff0-d83c10e37e43" />

### Product Page

<img width="1360" height="631" alt="Product Page" src="https://github.com/user-attachments/assets/5b1fcbff-83d2-4d4d-bae9-dda317c876c3" />

### Product Details Page

<img width="1361" height="632" alt="Product Details Page" src="https://github.com/user-attachments/assets/8a504b32-97d4-4022-9e65-7e99c5ee94d8" />

### Cart

<img width="1365" height="635" alt="Cart Page" src="https://github.com/user-attachments/assets/e496b56a-9c9d-4478-85ee-8a93d0a98db4" />

### Checkout Page

<img width="1365" height="637" alt="Checkout Page" src="https://github.com/user-attachments/assets/d9d19838-6cfa-471f-ba08-92a44160daa5" />

### Profile Page

<img width="1360" height="640" alt="Profile Page" src="https://github.com/user-attachments/assets/475c7f11-1bee-4c64-b8cc-e12db256d2ad" />

## 🎯 Purpose of the Project

This project was developed to practice and demonstrate:

* CodeIgniter 4 Framework
* PHP MVC Architecture
* CRUD Operations
* MySQL Database Integration
* User Authentication
* Session Management
* Routing
* Controllers and Models
* Frontend and Backend Integration
* E-commerce Functionality
* Git and GitHub Workflow

## 🔮 Future Improvements

* Payment Gateway Integration
* Complete Order Management
* Admin Dashboard
* Product Search
* Product Categories
* Product Filtering
* Wishlist
* Email Notifications
* Improved Security
* REST API Integration

## 👩‍💻 Developer

**Laxmi Pal**

Full Stack Developer Intern

### Connect With Me

* **GitHub:** https://github.com/laxmi-ux/
* **LinkedIn:** https://www.linkedin.com/in/laxmi-pal-13a738267/
* **Portfolio:** https://laxmirpal1.netlify.app/

## 📄 License

This project is created for **learning and portfolio purposes**.
