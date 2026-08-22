CodeIgniter 4 ecommerce Application

A simple and responsive CRUD (Create, Read, Update, Delete) web application built using CodeIgniter 4, PHP, MySQL, HTML, CSS, and Bootstrap/CSS.

This project demonstrates how to build a basic web application with database integration, product management, authentication, and CRUD functionality using the CodeIgniter 4 framework.

🚀 Features
User Registration & Login
User Authentication
Product Management
Add Products
View Products
Edit Products
Delete Products
Product Details Page
Add to Cart
Buy Now functionality
MySQL Database Integration
Responsive User Interface
CodeIgniter 4 MVC Architecture
🛠️ Technologies Used
PHP 8.2+
CodeIgniter 4
MySQL
HTML5
CSS3
JavaScript
XAMPP
Git & GitHub
📁 Project Structure
crudapp/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   ├── Config/
│   └── Database/
│
├── public/
│   ├── css/
│   ├── images/
│   └── index.php
│
├── writable/
├── tests/
├── .env
├── composer.json
└── README.md
⚙️ Installation & Setup
1. Clone the Repository
git clone https://github.com/YOUR-USERNAME/YOUR-REPOSITORY.git

Navigate to the project:

cd YOUR-REPOSITORY
2. Install Dependencies

Make sure Composer is installed, then run:

composer install
3. Configure Environment

Copy the environment file:

cp env .env

For Windows, you can also manually rename:

env

to:

.env
4. Configure Database

Create a MySQL database using phpMyAdmin.

Example:

Database Name: crudapp

Update the .env file:

database.default.hostname = localhost
database.default.database = crudapp
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
5. Run Database Migrations

If migrations are included in the project:

php spark migrate
6. Start the Development Server

Run:

php spark serve

The application will be available at:

http://localhost:8080
🗄️ Database

The project uses MySQL for storing application data.

Main data may include:

Users
Products
Cart
Orders

Database tables can be created using the CodeIgniter migration system or imported through phpMyAdmin.

🧩 MVC Architecture

This project follows the CodeIgniter 4 MVC architecture.

Model

Handles database operations and data management.

app/Models/
View

Contains the application's frontend pages.

app/Views/
Controller

Handles application logic and connects Models with Views.

app/Controllers/
🔐 Authentication

The application includes user authentication functionality such as:

Registration
Login
Logout
Session management

Protected functionality can be accessed only by authenticated users.

🛒 Product & Cart Flow

The basic product flow is:

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
📸 Screenshots

Add screenshots of your application here.

Example:

## Screenshots

### Home Page
![Home Page](screenshots/home.png)

### Product Page
![Product Page](screenshots/product.png)

### Cart
![Cart Page](screenshots/cart.png)
🎯 Purpose of the Project

This project was developed to practice and demonstrate:

CodeIgniter 4 framework
PHP MVC architecture
CRUD operations
MySQL database integration
Authentication
Routing
Controllers and Models
Frontend and backend integration
Git and GitHub workflow
🔮 Future Improvements
Payment Gateway Integration
Order Management
Admin Dashboard
Product Search
Product Categories
Product Filtering
Wishlist
User Profile
Email Notifications
Improved Security
API Integration
👩‍💻 Developer

Laxmi Pal

Full Stack Developer Intern

Connect
GitHub: Add your GitHub profile link
LinkedIn: Add your LinkedIn profile link
Portfolio: Add your portfolio link
📄 License

This project is created for learning and portfolio purposes.
