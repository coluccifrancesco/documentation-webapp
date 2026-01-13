# Documentation Webapp

A full-stack web application for managing technical documentation. Built with **Laravel** (backend API) and **React** (frontend SPA).

---

## 📋 What Does This App Do?

This is a **documentation management system** that organizes technical content by:
- **Arguments** (topics/articles)
- **Technologies** (tags like PHP, JavaScript, etc.)
- **Difficulties** (beginner, intermediate, advanced)

The backend provides a REST API, and the frontend displays the content in a user-friendly interface.

---

## 🚀 Quick Start

You need both servers running simultaneously.

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL

### 1. Backend Setup

```bash
cd documentation-laravel
composer install
cp .env.example .env
php artisan key:generate

# Configure database in .env, then:
php artisan migrate --seed
php artisan serve
```

**API runs at:** `http://127.0.0.1:8000`

### 2. Frontend Setup

Open a new terminal:

```bash
cd documentation-react
npm install
cp .env.example .env

# Ensure .env has: VITE_GENERIC_API_ENDPOINT=http://127.0.0.1:8000/api
npm run dev
```

**App runs at:** `http://localhost:5173`

---

## 🔄 How It Works

```
User visits page → React calls api.js → Fetch to Laravel API → 
Controller queries DB → JSON response → React updates UI
```

### Example: Fetching Arguments

**Backend** (`ArgumentsController.php`):
```php
public function index() {
    $arguments = Argument::with('difficulty', 'technologies')->get();
    return response()->json([
        "success" => true,
        "data" => $arguments
    ]);
}
```

**Frontend** (`api.js`):
```javascript
export const getArguments = async() => {
    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/arguments`);
    const json = await response.json();
    return json.data;
}
```

---

## � More Information

- [Backend Documentation](./documentation-laravel/README.md) - API endpoints, database, extending
- [Frontend Documentation](./documentation-react/README.md) - Components, services, state management

---

## 📄 License

MIT License
