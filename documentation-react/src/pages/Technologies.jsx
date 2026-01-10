import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import TechnologiesList from '../components/TechnologiesList';

export default function Technologies() {

    const navigate = useNavigate();
    const [data, setData] = useState(null);

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    return <section className='container my-lg-4'>

        <div className='my-4 p-3 p-md-0 page-head'>
            <div className='mb-2 d-flex align-items-center justify-content-start gap-4'>
                <h1>Technologies</h1>
                <i className="fa-solid fa-microchip"></i>
            </div>
            
            <p className='w-75'>In this section you will find the main technologies used in software development: what they do, how they work, and the scenarios in which they are applied.</p>
        </div>

        <TechnologiesList />

    </section>;
}
