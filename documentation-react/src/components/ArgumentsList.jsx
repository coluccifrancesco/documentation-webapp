import { useQuery } from '@tanstack/react-query';
import { getArguments } from '../services/api';
import { Link } from 'react-router-dom';
import DifficultyBanner from './DifficultyBanner';
import { useState } from 'react';

export default function ArgumentsList() {

    const [searchBarValue, setSearchBarValue] = useState('');
    
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
    
    // 3. search bar logic data -> filteredTopics
    const filteredTopics = data.filter(topic =>
        topic.name.toLowerCase().includes(searchBarValue.toLowerCase())
    );

    // 4. topics are read
    return (<section className='pe-lg-4 ps-lg-0'>

        <div className='d-flex justify-content-between align-content-center my-4'>
            {/* Searchbar */}
            <div className='search-bar d-flex align-items-center justify-content-between'>
                <input 
                    type="text" 
                    value={searchBarValue} 
                    onChange={(e) => setSearchBarValue(e.target.value)} 
                    placeholder='Looking for a topic...' 
                    className='ms-1'
                />
                <i class=" ms-2 fa-solid fa-magnifying-glass"></i>
            </div>

            {/* Filters */}
            <div>
                <div class="dropdown filters-btn-and-list">
                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
    
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul className='list-unstyled row'>
            {filteredTopics.map(argument => (
            
                <li key={argument.id} className='col-12 col-sm-6 col-xl-4 my-3'>       
                    
                    <Link to={`/topics/${argument.id}`} className='h-100 p-3 argument-card d-flex justify-content-between align-items-center'>
                        <div>
                            <h2 className='text-color-800'>{argument.name}</h2>

                            <p className='text-color-700 mt-2 mb-4'>{argument.resume}</p>
                            
                            {argument.difficulty.grade_name ? 
                                
                                <div className='d-flex justify-content-end'>
                                    <DifficultyBanner grade_name={argument.difficulty.grade_name} grade_numerical={argument.difficulty.grade_numerical} />
                                </div>
                            
                            : ''}
                        </div>
                    </Link>
                
                </li>
            ))}
            
        </ul>
    </section>
    );
}