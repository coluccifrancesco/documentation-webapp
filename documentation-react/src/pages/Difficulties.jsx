import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import DifficultiesList from '../components/DifficultiesList';

export default function Difficulties() {

    const navigate = useNavigate();
    const [data, setData] = useState(null);

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    // <DifficultyBanner grade_name={argument.difficulty.grade_name} grade_numerical={argument.difficulty.grade_numerical} />

    return <section className='container mt-4'>

        <div className='my-4 p-3 p-md-0 page-head'>
            <div className='mb-2 d-flex align-items-center justify-content-start gap-4'>
                <h1>Difficulties</h1>
                <i className="fa-solid fa-dumbbell"></i>
            </div>
            
            <p className='w-75'>This section lists each difficulty category and provides access to the related topics. The goal is to master the fundamentals first, and then move on to more complex concepts.</p>
        </div>

        <DifficultiesList />

    </section>;
}
