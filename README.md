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
git clone https://github.com/laxmi-ux/codeigniter4-ecommerce-project.git

Navigate to the project:

cd codeginter4-ecommerce-project
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






### Home Page
<img width="1365" height="637" alt="image" src="https://github.com/user-attachments/assets/11f0706a-a2ee-4dcf-bff0-d83c10e37e43" />



### Product Page
<img width="1360" height="631" alt="image" src="https://github.com/user-attachments/assets/5b1fcbff-83d2-4d4d-bae9-dda317c876c3" />


### Cart
<img width="1365" height="635" alt="image" src="https://github.com/user-attachments/assets/e496b56a-9c9d-4478-85ee-8a93d0a98db4" />

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
GitHub: https://github.com/laxmi-ux/
LinkedIn: https://www.linkedin.com/in/laxmi-pal-13a738267/
Portfolio: https://laxmi-pal-portfolio.netlify.app/
📄 License

This project is created for learning and portfolio purposes.
