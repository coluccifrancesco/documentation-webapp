import { useQuery } from '@tanstack/react-query';
import { getArguments } from '../services/api';
import { Link } from 'react-router-dom';
import DifficultyBanner from './DifficultyBanner';
import { useState } from 'react';

export default function ArgumentsList() {

    const [searchBarValue, setSearchBarValue] = useState('');
    const [sortBy, setSortBy] = useState('standard')
    
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
    let filteredTopics = data.filter(topic =>
        topic.name.toLowerCase().includes(searchBarValue.toLowerCase())
    );

    // 4. filters logic 
    if (sortBy === 'standard') {
    
        filteredTopics = filteredTopics.sort((a, b) => a.id - b.id)
    
    } else if (sortBy === 'alhpabeticalAZ') {
    
        filteredTopics = filteredTopics.sort((a, b) => a.name.localeCompare(b.name))
    
    } else if (sortBy === 'alhpabeticalZA') {
    
        filteredTopics = filteredTopics.sort((a, b) => b.name.localeCompare(a.name))
    
    } else if (sortBy === 'difficultyEasyToHard') {
    
        filteredTopics = filteredTopics.sort((a, b) => {
            
            // by increasing difficulty order data is sorted from A to Z
            const differenceInDifficulty = a.difficulty.grade_numerical - b.difficulty.grade_numerical;

            if (differenceInDifficulty === 0) {
                return a.name.localeCompare(b.name)
            }

            return differenceInDifficulty
        })
    
    } else if (sortBy === 'difficultyHardToEasy') {
        
        filteredTopics = filteredTopics.sort((a, b) => {
            
            // by increasing difficulty order data is sorted from Z to A
            const differenceInDifficulty = b.difficulty.grade_numerical - a.difficulty.grade_numerical;

            if (differenceInDifficulty === 0) {
                return b.name.localeCompare(a.name)
            }

            return differenceInDifficulty
        })
    }

    // 5. topics are read
    return (<section className='pe-lg-4 ps-lg-0'>

        <div className='d-flex justify-content-between align-content-center my-4 gap-5'>
            {/* Searchbar */}
            <div className='search-bar d-flex align-items-center justify-content-center'>
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
            <div className='d-flex justify-content-center align-content-center'>
                <select 
                    value={sortBy} 
                    onChange={(e) => setSortBy(e.target.value)} 
                    class="form-select filters-list"
                >
                    <option value="standard">Standard</option>
                    <option value="alhpabeticalAZ">A to Z</option>
                    <option value="alhpabeticalZA">Z to A</option>
                    <option value="difficultyEasyToHard">Easier to Harder</option>
                    <option value="difficultyHardToEasy">Harder to Easier</option>
                </select>
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