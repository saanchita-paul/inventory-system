# Inventory & Financial Reporting System

This is a simple inventory management and financial reporting system built with **Laravel 10**, **PHP 8.2**, and **MySQL**. It supports product entry, sales processing with VAT and discount handling, stock deduction, auto-generated accounting journal entries, and financial reports with profit and expense tracking.

---

## Features

### Inventory Module
- Product entry with purchase price, sell price, and opening stock
- Product listing
- Automatic stock updates on sale

### Sale Module
- Sale creation with:
    - Quantity entry per product
    - Discount input
    - VAT calculation (5%)
    - Real-time total and due calculations
- Auto deduction from inventory

### Accounting Journal
Automatically records:
- Sales
- Discounts
- VAT
- Payment (Cash/Due)

### Financial Report
- Filter by date range
- View total sales, expenses, and optional profit
- Breakdown of all sales with discount, VAT, and due info

### Frontend
- Clean Bootstrap-based UI
- Sections:
    - Auth (Login/Register)
    - Product Entry/List
    - Sales Entry
    - Report View

---

## Tech Stack

- **PHP 8.2**
- **Laravel 12**
- **Laravel Breeze** (for authentication)
- **Bootstrap 5**
- **MySQL**

---

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/saanchita-paul/inventory-system.git
cd inventory-system
```

### Step 2: Install Dependencies
```bash
composer install
npm install && npm run dev
```


### Step 3: Setup Environment
Copy the example .env file:
```bash
cp .env.example .env
```
Update your database credentials in .env.


### Step 4: Generate Key & Run Migrations
Copy the example .env file:
```bash
php artisan key:generate
php artisan migrate --seed
```
This will also create a default admin user.

### Step 5: Serve the Application
```bash
php artisan serve

```
Visit http://localhost:8000

##  Default Admin Credentials

```bash
Email: admin@gmail.com
Password: password

```
