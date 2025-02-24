# Currency Detector Based on User IP Address

## 📌 Project Overview
The **Currency Detector** is a Laravel-based application that automatically detects the user's country based on their **IP address** and fetches the respective **currency details**. This includes the **currency code, currency name, and currency symbol**. 

## 🚀 Features
- 🗺️ **Auto-Detect Country**: Identifies the user's country using their IP address.
- 🏗️ **Optimized for Performance**: Uses caching to minimize database queries and improve response time.
- ⚡ **Livewire 3 Integration**: Provides a seamless, interactive frontend experience.

## 🛠️ Installation Guide
### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-repo/currency-detector.git
cd currency-detector
```

### 2️⃣ Install Dependencies
Make sure you have **Composer** installed, then run:
```bash
composer install
```

### 3️⃣ Set Up Environment
Copy the `.env.example` file and configure your database credentials:
```bash
cp .env.example .env
```

Then, update these values in `.env`:
```ini
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4️⃣ Run Migrations & Seed Data
```bash
php artisan migrate --seed
```

### 5️⃣ Start the Development Server
```bash
php artisan serve
```
Now, visit `http://127.0.0.1:8000` in your browser.

## 🔧 How It Works
1. The system detects the **user's IP address**.
2. It fetches the **country code** associated with the IP.
3. Using the country code, the system retrieves the **currency details** from the database.
4. The currency is then displayed on the frontend or used for further processing.

## 🗄️ Database Structure
The `countries` table stores only relevant fields:
| Column           | Type   | Description |
|-----------------|--------|-------------|
| `id`            | BIGINT | Auto-increment ID |
| `name`          | STRING | Country name |
| `iso2`          | STRING | 2-letter country code (e.g., `US`, `AF`) |
| `currency`      | STRING | Currency code (e.g., `USD`, `AFN`) |
| `currency_name` | STRING | Full currency name (e.g., `US Dollar`, `Afghan Afghani`) |
| `currency_symbol` | STRING | Symbol (e.g., `$`, `؋`) |
| `created_at`    | TIMESTAMP | Timestamp of record creation |
| `updated_at`    | TIMESTAMP | Timestamp of last update |

## 📡 API Endpoints (If Applicable)
| Method | Endpoint | Description |
|--------|----------|-------------|
| `GET`  | `/currency/detect` | Returns currency details based on user's IP |
| `GET`  | `/currency/{country_code}` | Returns currency details for a specific country |

## ⚡ Technologies Used
- **Laravel 11** - Backend Framework
- **Livewire 3** - Interactive frontend components
- **GeoIP API** - IP-based location detection
- **MySQL** - Database for storing currency data
- **TailwindCSS** - Frontend styling (if applicable)


## 📄 License
This project is open-source and available under the **MIT License**.

---

🎯 **Enjoy using the Currency Detector! If you like this project, don't forget to ⭐ it!**

