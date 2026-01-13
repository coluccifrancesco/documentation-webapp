# Documentation Webapp - Backend (Laravel)

Laravel REST API that provides documentation data to the React frontend.

---

## 🔧 Setup

```bash
composer install
cp .env.example .env
php artisan key:generate

# Create a database, configure .env with your DB credentials
php artisan migrate --seed
php artisan serve
```

API available at: `http://127.0.0.1:8000`

---

## 📡 API Endpoints

All endpoints return JSON with format: `{"success": true, "data": [...]}`

### Arguments (Topics)
- `GET /api/arguments` - List all arguments with technologies and difficulty
- `GET /api/arguments/{id}` - Get single argument

### Technologies (Tags)
- `GET /api/technologies` - List all technologies
- `GET /api/technologies/{id}` - Get single technology

### Difficulties (Levels)
- `GET /api/difficulties` - List all difficulty levels
- `GET /api/difficulties/{id}` - Get single difficulty

---

## 🗂️ Project Structure

- **`routes/api.php`** - API route definitions
- **`app/Http/Controllers/Api/`** - Request handlers
- **`app/Models/`** - Database models (Argument, Technology, Difficulty)

---

## ⚡ Performance Note

We use **Eager Loading** (`Argument::with('difficulty', 'technologies')`) to avoid N+1 query problems. This loads all related data in one efficient query.

---

## ➕ Adding a New Resource

Example: Adding "Courses"

1. Create migration: `php artisan make:migration create_courses_table`
2. Create model: `php artisan make:model Course`
3. Create controller: `php artisan make:controller Api/CoursesController`
4. Add routes in `routes/api.php`:
   ```php
   Route::get('/courses', [CoursesController::class, 'index']);
   Route::get('/courses/{course}', [CoursesController::class, 'show']);
   ```

**Tip:** Keep controllers thin. For complex logic, create service classes.
