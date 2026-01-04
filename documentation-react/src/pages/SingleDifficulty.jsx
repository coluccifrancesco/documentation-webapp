import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { getSingleDifficulty } from '../services/api';

export default function SingleDifficulty() {
    
    const { difficultyId } = useParams();
    const navigate = useNavigate();

    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['difficulty', difficultyId],
        queryFn: () => getSingleDifficulty(difficultyId),
        enabled: !!difficultyId
    });

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    if (isLoading) return <p>Loading data</p>;
    if (isError) return <p>Error: {error.message}</p>;

    console.log(data);
    return <>
        <h1>{data?.grade_name || ''}</h1>
    </>;
}
