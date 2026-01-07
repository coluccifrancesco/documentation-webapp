import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import ArgumentsList from '../components/ArgumentsList';

export default function Topics() {

    const navigate = useNavigate();
    const [data, setData] = useState(null);

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    return <section className='container'>

        <div className='my-4 p-3 p-md-0 page-head'>
            <div className='mb-2 d-flex align-items-center justify-content-start gap-4'>
                <h1>Topics</h1>
                <i className="fa-solid fa-book-open"></i>
            </div>

            {/* Searchbar e ordini vari (alfabetico, difficolta, argomento, ecc) */}
            
            <p className='w-75'> Here you will find the main theoretical and practical topics of programming. Understanding these topics allows you to read, write, and interpret code with greater awareness.</p>
        </div>

        <ArgumentsList />

    </section>;
}
