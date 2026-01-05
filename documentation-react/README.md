# 📂 DocuHub React App
Project Overview: As the second part of my Boolean Master Project, I developed this web application to serve as a high-performance frontend for data served via a Laravel API.

### 📡 Data Fetching Strategy
During development, I analyzed the scalability of the application. I asked myself: <i>“What would happen if the volume of data or the number of users grew exponentially?”</i> To ensure the app remains performant and reliable, I moved away from standard Vanilla JS or Axios fetching patterns in favor of TanStack Query.

### 🚀 Key Advantages
| Feature | Benefit | 
| ------- | ------- |
| Intelligent Caching | Prevents redundant API calls and significantly optimizes performance. |
| Native Loading States | Direct access to isLoading, isError, and isSuccess without manual boilerplate. |
| Auto-Synchronization | Keeps the UI in sync with the database via background fetching. |

### 🛠️ Implementation 
ExampleI decoupled the API logic from the UI components to maintain a clean and maintainable codebase.

1. <b>The API Service</b>: The service handles the raw fetch and ensures errors are properly propagated.
```JavaScript
// services/api.js

export const getArguments = async () => {
    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/arguments`);
    
    // Manual error check: essential for Fetch API 
    // to correctly trigger TanStack Query's error states
    if (!response.ok) {
        throw new Error(`API Error: ${response.status} - ${response.statusText}`);
    }

    const json = await response.json();
    return json.data ? json.data : json;
}
```
2. <b>The UI Component</b>: Using the useQuery hook allows the component to reactively update based on the request status.
```JavaScript
// components/ArgumentsList.jsx

import { useQuery } from '@tanstack/react-query';
import { getArguments } from '../services/api';

export default function ArgumentsList() {
    // Decouples UI from fetching logic & enables powerful caching
    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['arguments'],
        queryFn: getArguments
    });
    
    if (isLoading) return <p>⏳ Loading data...</p>;
    if (isError) return <p>❌ Error: {error.message}</p>;

    return (
        <ul>
            {data.map(argument => (
                <li key={argument.id}>{argument.name}</li>
            ))}
        </ul>
    );
}
```

### 🏗️ Global State Architecture
To ensure a seamless data flow, I wrapped the application in a QueryClientProvider. This serves as the "Single Source of Truth" for all server-side data.

```JavaScript
// App.jsx 

<QueryClientProvider client={queryClient}>
    <BrowserRouter>
        <Routes>
            <Route element={<DefaultLayout />}>
                <Route index element={<Home />} />
                {/* All nested routes share the same cache instance */}
                <Route path="/topics" element={<Topics />} />
                <Route path="/topics/:argumentId" element={<SingleTopic />} />
                <Route path="/technologies" element={<Technologies />} />
                <Route path="/technologies/:technologyId" element={<SingleTechnology />} />
                <Route path="/difficulties" element={<Difficulties />} />
                <Route path="/difficulties/:difficultyId" element={<SingleDifficulty />} />
            </Route>
        </Routes>
    </BrowserRouter>
</QueryClientProvider>
```

<b>Why this architecture?</b>
- Shared Cache: Data fetched in the Topics page is instantly available for SingleTopic, eliminating redundant network requests.
- Decoupled Logic: The UI stays "lean" while the provider handles background sync and garbage collection.
- Performance: It eliminates "prop-drilling" by allowing any component in the tree to hook into the required data independently.