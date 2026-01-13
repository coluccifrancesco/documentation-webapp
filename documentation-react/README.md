# Documentation Webapp - Frontend (React)

React SPA that displays documentation from the Laravel API.

---

## 🔧 Setup

```bash
npm install
cp .env.example .env

# Ensure .env contains:
# VITE_GENERIC_API_ENDPOINT=http://127.0.0.1:8000/api

npm run dev
```

App available at: `http://localhost:5173`

---

## 📁 Project Structure

```
src/
├── components/     # Reusable UI components
├── pages/          # Page components (routes)
├── services/       # API communication layer
│   └── api.js      # All API calls centralized here
└── layout/         # Headers, footers, etc.
```

---

## 🔌 Service Layer Pattern

All API calls go through `services/api.js`. This keeps components clean and makes API changes easy.

**Example function:**
```javascript
export const getArguments = async() => {
    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/arguments`);
    const json = await response.json();
    return json.data;
}
```

### Adding a New API Call

1. Add function to `services/api.js`:
   ```javascript
   export const getCourses = async() => {
       const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/courses`);
       const json = await response.json();
       return json.data;
   }
   ```

2. Use in component:
   ```javascript
   import { getCourses } from '../services/api';
   
   useEffect(() => {
       getCourses().then(data => setCourses(data));
   }, []);
   ```

---

## 💡 State Management

This app uses **React Hooks** (useState/useEffect) for simplicity.

**Best practices:**
- Initialize state as `null` or `[]`
- Show loading spinner while fetching
- Use try/catch for error handling

**Example:**
```javascript
const [arguments, setArguments] = useState([]);
const [loading, setLoading] = useState(true);

useEffect(() => {
    getArguments()
        .then(data => setArguments(data))
        .catch(err => console.error(err))
        .finally(() => setLoading(false));
}, []);
```