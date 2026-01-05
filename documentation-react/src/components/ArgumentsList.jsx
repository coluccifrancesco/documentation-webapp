import { useQuery } from '@tanstack/react-query';
import { getArguments } from '../services/api';

export default function ArgumentsList() {
    
    // useQuery accepts an object with two properties:
    // 1. queryKey: identifies data in cache
    // 2. queryFn: fetch function
    
    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['arguments'],
        queryFn: getArguments
    });
     
    // 1. Handle loading state
    if (isLoading) return <p>Loading data</p>;

    // 2. Error handler
    if (isError) return <p>Error: {error.message}</p>;

    // 3. data is read
    return (<section className='pe-4'>
        <ul className='list-unstyled row'>
            
            {data.map(argument => (
                <li key={argument.id} className='col-12 col-lg-6 my-3'>       
                    <div className='p-3 border'>
                        <h2>{argument.name}</h2>

                    </div>
                </li>
            ))}
        
        </ul>
    </section>
    );
}