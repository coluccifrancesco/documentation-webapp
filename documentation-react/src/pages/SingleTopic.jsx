import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { getSingleArgument } from '../services/api';

export default function SingleTopic() {
    
    const { argumentId } = useParams();
    const navigate = useNavigate();
    
    // useState is not necessary for argument data
    // TanStack Query already returns variable: 'data'

    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['argument', argumentId],
        queryFn: () => getSingleArgument(argumentId),
        enabled: !!argumentId
    });
        
    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);
    
    if (isLoading) return <p>Loading data</p>;
    if (isError) return <p>Error: {error.message}</p>;

    // <DifficultyBanner grade_name={argument.difficulty.grade_name} grade_numerical={argument.difficulty.grade_numerical} />

    return <>
        <h1>{data?.name || ''}</h1>
    </>;
}
