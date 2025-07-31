# 🎛️ Filament Inventory Management System

A demo inventory management system built with **Laravel** and **FilamentPHP** — showcasing modern backend development, UI customization, chart integrations, and basic product management features.

> 🚀 This is a personal project to explore Filament's capabilities and demonstrate my backend and Laravel skills.

---

## 🔧 Features

- ✅ **User Authentication** via Filament
- 🗃️ **Product Management** (CRUD for inventory items)
- 📊 **Sales Chart** integration (daily, weekly view)
- 🏆 **Top-Selling Products** widget
- 🛠️ Custom **Filament Widgets** and resource setup
- ⚙️ Deployment-ready with Render

---

## 🖼️ Screenshots

<img src="screenshots/dashboard.png" width="700" >
<img width="3280" height="1688" alt="image" src="https://github.com/user-attachments/assets/ceebf5c0-7458-406b-859d-4d12031735c5" alt="Dashboard Overview"/>
<img width="3250" height="1688" alt="image" src="https://github.com/user-attachments/assets/e0da8ce4-6b7e-440b-b466-078957b00be4" alt="Product Overview"/>


---

## 🧑‍💻 Tech Stack

- **Backend**: Laravel 11
- **Admin Panel**: FilamentPHP v3
- **Database**: MySQL
- **UI Components**: Filament Widgets & Resources

---

## 🚧 Project Goals

- Get hands-on experience with FilamentPHP's admin UI system
- Learn how to customize dashboards and widgets
- Practice RESTful resource structuring in Laravel
- Explore data visualization with simple analytics

---

## 📂 Setup Instructions

```bash
git clone https://github.com/duytin095/filament-inventory.git
cd filament-inventory
composer install
cp .env.example .env
php artisan key:generate
# Configure your database in .env
php artisan migrate --seed
php artisan serve
