import { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { getSingleTechnology } from '../services/api';
import GoBackBtn from '../components/GoBackBtn';
import DocsBtn from '../components/DocsBtn';

export default function SingleTechnology() {
    
    const { technologyId } = useParams();

    const [isHover, setIsHover] = useState(false);
    
    const handleMouseEnter = () => {
        setIsHover(true);
    };
       
    const handleMouseLeave = () => {
        setIsHover(false);
    };
        
    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['technology', technologyId],
        queryFn: () => getSingleTechnology(technologyId),
        enabled: !!technologyId
    });

    const bannerStyle = {
        transition: '0.3s ease-in-out',
        backgroundColor: isHover ? `${data?.font_color}` : `${data?.bg_color}`, 
        color: isHover ? `${data?.bg_color}` : `${data?.font_color}`,
        boxShadow: isHover ? 'rgba(0, 0, 0, 0.2) -5px 4px 3px' : `none`,
    };

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    if (isLoading) return <p>Loading data</p>;
    if (isError) return <p>Error: {error.message}</p>;

    return  <div className='my-lg-4 my-3 p-md-0 pe-lg-3'>
        
        <div className='d-flex justify-content-between align-items-center px-5 pb-2 pt-4'>
            <div
                className='difficulty-banner py-2 px-3 rounded text-center' 
                style={bannerStyle}
                onMouseEnter={handleMouseEnter}
                onMouseLeave={handleMouseLeave}
            >
                <h1 >{data?.name || ''}</h1>
            </div>

            <GoBackBtn />                
        </div>

        <div className='my-3 px-5 d-flex justify-content-between align-items-center' style={{ backgroundColor:'{data.font_color}' }}>
            <p className='w-50'>{data?.resume || ''}</p>

            {data.official_page_link ? <DocsBtn documentation_link={data.official_page_link} /> : ''}
        </div>

    </div>
}
