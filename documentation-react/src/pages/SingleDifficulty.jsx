import { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { getSingleDifficulty } from '../services/api';
import GoBackBtn from '../components/GoBackBtn';
import DifficultyBanner from '../components/DifficultyBanner';


export default function SingleDifficulty() {
    
    const { difficultyId } = useParams();
    const [isHover, setIsHover] = useState(false);
    
    const handleMouseEnter = () => {
        setIsHover(true);
    };
       
    const handleMouseLeave = () => {
        setIsHover(false);
    };

    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['difficulty', difficultyId],
        queryFn: () => getSingleDifficulty(difficultyId),
        enabled: !!difficultyId
    });

    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' 
        });
    };

    useEffect(() => {
        scrollToTop()    
    }, [])

    if (isLoading) return <p>Loading data</p>;
    if (isError) return <p>Error: {error.message}</p>;

    return <div className='my-lg-4 my-3 p-md-0 pe-lg-3'>
            
        <div className='d-flex justify-content-between align-items-center px-5 pb-2 pt-4'>
            <div className='difficulty-banner py-2 px-3 rounded text-center'>
                {data.grade_name ? <DifficultyBanner grade_name={data.grade_name} grade_numerical={data.grade_numerical} /> : ''}
            </div>
    
            <GoBackBtn />                
        </div>

    </div>
}
