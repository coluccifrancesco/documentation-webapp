import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { getSingleTechnology } from '../services/api';

export default function SingleTechnology() {
    
    const { technologyId } = useParams();
    const navigate = useNavigate();

    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['technology', technologyId],
        queryFn: () => getSingleTechnology(technologyId),
        enabled: !!technologyId
    });

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    if (isLoading) return <p>Loading data</p>;
    if (isError) return <p>Error: {error.message}</p>;

    return <>
        <h1>{data?.name || ''}</h1>
    </>;
}
