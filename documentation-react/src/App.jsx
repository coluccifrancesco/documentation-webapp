import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import DefaultLayout from './layout/DefaultLayout';
import Home from './pages/Home'
import Topics from './pages/Topics';
import Technologies from './pages/Technologies';
import Difficulties from './pages/Difficulties';
import SingleTopic from './pages/SingleTopic';
import SingleTechnology from './pages/SingleTechnology';
import SingleDifficulty from './pages/SingleDifficulty';

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
                        <Route path="/topics/:argumentId" element={<SingleTopic />} />
                        <Route path="/technologies" element={<Technologies />} />
                        <Route path="/technologies/:technologyId" element={<SingleTechnology />} />
                        <Route path="/difficulties" element={<Difficulties />} />
                        <Route path="/difficulties/:difficultyId" element={<SingleDifficulty />} />
                    </Route>
                </Routes>
            </BrowserRouter>
        </QueryClientProvider>       
    )
}

export default App