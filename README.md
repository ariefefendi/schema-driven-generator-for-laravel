# Schema-Driven CRUD Generator for Laravel

> 🚀 **Build production-ready Laravel CRUD modules from a single JSON schema.**

**Schema-Driven CRUD Generator for Laravel** is a developer productivity tool designed to eliminate repetitive CRUD development. By defining your database structure in a simple JSON schema, the generator automatically scaffolds **Migrations**, **Eloquent Models**, **Controllers**, **Blade Views**, **Routes**, **Validation Rules**, and **KnockoutJS** components—allowing you to build consistent, maintainable, and scalable Laravel applications in minutes.

> **Define your data once. Generate everything else.**

---

## ✨ Features

- 🚀 Generate complete CRUD modules with a single Artisan command
- 📄 JSON Schema as the single source of truth
- 🏗 Generate Migration files automatically
- 📦 Generate Eloquent Models
- 🎯 Generate Resource Controllers
- 🎨 Generate Blade Views
- 🛣 Generate Web Routes
- ✅ Generate Validation Rules
- 🔄 Automatically run database migrations
- ⚡ KnockoutJS ready
- 📊 DataTables ready
- 🧩 Easily customizable through stub templates
- 📂 Clean and organized project structure

---

## 🏛 Architecture

```mermaid
flowchart TD

A["JSON Schema"]

A --> B["Schema Parser"]

B --> C["CRUD Generator Engine"]

C --> D["Migration Generator"]

C --> E["Model Generator"]

C --> F["Controller Generator"]

C --> G["View Generator"]

C --> H["Route Generator"]

C --> I["Validation Generator"]

D --> J["Laravel Application"]

E --> J

F --> J

G --> J

H --> J

I --> J
```

---

## 🔄 Workflow

```mermaid
sequenceDiagram

participant Developer
participant Schema
participant Generator
participant Laravel

Developer->>Schema: Create products.json

Developer->>Generator: php artisan make:crud products

Generator->>Schema: Parse JSON Schema

Generator->>Laravel: Generate Migration

Generator->>Laravel: Generate Model

Generator->>Laravel: Generate Controller

Generator->>Laravel: Generate Views

Generator->>Laravel: Generate Routes

Generator->>Laravel: Generate Validation

Generator->>Laravel: Run Migration

Laravel-->>Developer: CRUD Module Ready
```

---

# 🚀 Getting Started

## Requirements

- PHP 8.2+
- Laravel 11
- Composer
- MySQL / MariaDB

---

## Installation

Clone the repository.

```bash
git clone https://github.com/your-username/laravel-schema-crud-generator.git
```

Install dependencies.

```bash
composer install
```

Create environment file.

```bash
cp .env.example .env
```

Generate application key.

```bash
php artisan key:generate
```

Configure your database inside `.env`.

Run initial migration.

```bash
php artisan migrate
```

---

# 📄 Create a JSON Schema

Create a schema file inside the `schemas` directory.

Example:

```json
{
    "table": "products",
    "columns": [
        {
            "name": "name",
            "type": "string",
            "required": true
        },
        {
            "name": "price",
            "type": "decimal"
        },
        {
            "name": "stock",
            "type": "integer"
        }
    ]
}
```

---

# ⚡ Generate CRUD

Generate an entire CRUD module using one command.

```bash
php artisan make:crud products
```

or

```bash
php artisan make:crud products --schema=schemas/products.json
```

---

# 📦 Generated Files

Running the command will automatically generate:

- Migration
- Eloquent Model
- Resource Controller
- Blade Views
- Web Routes
- Validation Rules
- Database Migration

---

# 📂 Generated Structure

```
app/
├── Http/
│   └── Controllers/
├── Models/

database/
└── migrations/

resources/
└── views/

routes/
└── web.php

schemas/
└── products.json
```

---

# 📁 Project Structure

```
app/
bootstrap/
config/
database/
resources/
routes/
schemas/
stubs/
```

---

# 💡 Development Flow

```mermaid
flowchart LR

A["Design Database"]

--> B["Create JSON Schema"]

--> C["Run Artisan Generator"]

--> D["CRUD Generated"]

--> E["Run Application"]
```

---

# 🎯 Why Schema-Driven?

Traditional Laravel CRUD development usually requires creating multiple files manually.

```text
Migration
Model
Controller
Views
Routes
Validation
```

With **Schema-Driven CRUD Generator**, you only define your schema once.

```text
JSON Schema
      │
      ▼
CRUD Generator
      │
      ▼
Production-ready CRUD Module
```

This approach significantly reduces repetitive coding while keeping your project consistent and maintainable.

---

# 🛣 Roadmap

- [x] JSON Schema Support
- [x] CRUD Generator
- [x] Migration Generator
- [x] Model Generator
- [x] Controller Generator
- [x] Blade View Generator
- [x] Route Generator
- [x] Validation Generator
- [x] KnockoutJS Integration
- [x] DataTables Integration
- [ ] API Resource Generator
- [ ] Form Request Generator
- [ ] Seeder Generator
- [ ] Factory Generator
- [ ] Relationship Generator
- [ ] Policy Generator
- [ ] Unit Testing Generator
- [ ] REST API Generator

---

# 🤝 Contributing

Contributions are always welcome!

If you have ideas, improvements, or bug fixes, feel free to fork this repository and submit a Pull Request.

---

# 📄 License

This project is licensed under the **MIT License**.

---

# ❤️ Author

Developed with ❤️ using Laravel.

If this project helps you, don't forget to ⭐ star the repository.
