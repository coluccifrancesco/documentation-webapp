import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import DefaultLayout from './layout/DefaultLayout';
import Home from './pages/Home'
import Topics from './pages/Topics';
import Technologies from './pages/Technologies';
import Difficulties from './pages/Difficulties';

// creates an instance of the client (cache's ruler)
const queryClient = new QueryClient();

function App() {

    return (
        <QueryClientProvider client={queryClient}>
            <BrowserRouter>
                <Routes >
                    <Route element={<DefaultLayout />}>
                        <Route index element={<Home />} />
                        <Route path="/topics" element={<Topics />} />
                        <Route path="/technologies" element={<Technologies />} />
                        <Route path="/difficulties" element={<Difficulties />} />
                    </Route>
                </Routes>
            </BrowserRouter>
        </QueryClientProvider>       
    )
}

export default App