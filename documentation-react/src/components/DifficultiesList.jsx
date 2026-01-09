import { useQuery } from '@tanstack/react-query';
import { getDifficulties } from '../services/api';
import { Link } from 'react-router-dom';
import { useState } from 'react';
import DifficultyBanner from '../components/DifficultyBanner';

export default function ArgumentsList() {

    const [searchBarValue, setSearchBarValue] = useState('');
    const [sortBy, setSortBy] = useState('standard')
    
    // useQuery accepts an object with two properties:
    // 1. queryKey: identifies data in cache
    // 2. queryFn: fetch function
    
    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['difficulties'],
        queryFn: getDifficulties
    });
    
    // 1. Handle loading state
    if (isLoading) return <p>Loading data</p>;
    
    // 2. Error handler
    if (isError) return <p>Error: {error.message}</p>;
    
    // 3. search bar logic data -> filteredDifficulties
    let filteredDifficulties = data.filter(difficulty =>
        difficulty.grade_name.toLowerCase().includes(searchBarValue.toLowerCase())
    );

    // 4. filters logic 
    if (sortBy === 'standard') {
    
        filteredDifficulties = filteredDifficulties.sort((a, b) => a.id - b.id)
    
    } else if (sortBy === 'alhpabeticalAZ') {
    
        filteredDifficulties = filteredDifficulties.sort((a, b) => a.grade_name.localeCompare(b.grade_name))
    
    } else if (sortBy === 'alhpabeticalZA') {
    
        filteredDifficulties = filteredDifficulties.sort((a, b) => b.grade_name.localeCompare(a.grade_name))
    } else if (sortBy === 'difficultyEasyToHard') {
    
        filteredDifficulties = filteredDifficulties.sort((a, b) => {
            
            // by increasing difficulty order data is sorted from A to Z
            const differenceInDifficulty = a.grade_numerical - b.grade_numerical;

            if (differenceInDifficulty === 0) {
                return a.grade_name.localeCompare(b.grade_name)
            }

            return differenceInDifficulty
        })
    
    } else if (sortBy === 'difficultyHardToEasy') {
        
        filteredDifficulties = filteredDifficulties.sort((a, b) => {
            
            // by increasing difficulty order data is sorted from Z to A
            const differenceInDifficulty = b.grade_numerical - a.grade_numerical;

            if (differenceInDifficulty === 0) {
                return b.grade_name.localeCompare(a.grade_name)
            }

            return differenceInDifficulty
        })
    }

    // 5. difficulties are read
    return (<section className='pe-lg-4 ps-lg-0'>

        <div className='d-flex justify-content-between align-content-center my-4 gap-5'>
            {/* Searchbar */}
            <div className='search-bar d-flex align-items-center justify-content-center'>
                <input 
                    type="text" 
                    value={searchBarValue} 
                    onChange={(e) => setSearchBarValue(e.target.value)} 
                    placeholder='Looking for a difficulty...' 
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

        <ul className='list-unstyled row mt-4'>
            {filteredDifficulties.map(diff => (
            
                <li key={diff.id} className='col-12 col-md-6 col-xl-4 my-2'>       
                    
                    <Link to={`/difficulties/${diff.id}`} className='h-100'>
                        <DifficultyBanner grade_name={diff.grade_name} grade_numerical={diff.grade_numerical} />
                    </Link>
                
                </li>
            ))}
            
        </ul>
    </section>
    );
}