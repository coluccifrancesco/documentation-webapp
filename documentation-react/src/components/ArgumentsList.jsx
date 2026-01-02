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
    return (
        <ul>
            {data.map(argument => (
                <li key={argument.id}>{argument.name}</li>
            ))}
        </ul>
    );
}