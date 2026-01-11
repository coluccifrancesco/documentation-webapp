import { useQuery } from '@tanstack/react-query';
import { getArguments } from '../services/api';
import { Link } from 'react-router-dom';
import DifficultyBanner from './DifficultyBanner';

export default function LastAddedTopicsGrid() {

    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['arguments'],
        queryFn: getArguments,
        
        // Selects only the last three updated topics
        select: (data) => data
        .sort((a, b) => new Date(b.updated_at) - new Date(a.updated_at))
        .slice(0, 3)
    });
    
    // 1. Handle loading state
    if (isLoading) return <p>Loading data</p>;
    
    // 2. Error handler
    if (isError) return <p>Error: {error.message}</p>;


    return (

        <section className="mb-4 hero container bg-color-200">
            <div className="container-fluid p-4">
    
                <h3 className="text-center">Our Latest uploads!</h3>

                <ul className="mt-4 row">

                    {data.map(topic => (
                        <div className='col-12 col-md-6 mx-auto col-xl-4 my-3'>
                            <Link to={`/topics/${topic.id}`} className='last-three-topics h-100 p-4 rounded-4 bg-color-600 topic-card d-flex justify-content-between align-items-center'>
                                <div className='h-100 d-flex flex-column justify-content-between'>
                                    <h2 className='text-color-100'>{topic.name}</h2>

                                    <p className='mt-2 mb-2'>{topic.resume}</p>
                                </div>
                            </Link>
                        </div>
                    ))}

                </ul>
                        
            </div>
        </section>
    )
}