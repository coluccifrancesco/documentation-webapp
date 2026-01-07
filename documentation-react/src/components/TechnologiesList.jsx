import { useQuery } from '@tanstack/react-query';
import { getTechnologies } from '../services/api';
import { Link } from 'react-router-dom';
import { useState } from 'react';
import TechnologyBanner from '../components/TechnologyBanner';

export default function ArgumentsList() {

    const [searchBarValue, setSearchBarValue] = useState('');
    const [sortBy, setSortBy] = useState('standard')
    
    // useQuery accepts an object with two properties:
    // 1. queryKey: identifies data in cache
    // 2. queryFn: fetch function
    
    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['technologies'],
        queryFn: getTechnologies
    });
    
    // 1. Handle loading state
    if (isLoading) return <p>Loading data</p>;
    
    // 2. Error handler
    if (isError) return <p>Error: {error.message}</p>;
    
    // 3. search bar logic data -> filteredTechnologies
    let filteredTechnologies = data.filter(tech =>
        tech.name.toLowerCase().includes(searchBarValue.toLowerCase())
    );

    // 4. filters logic 
    if (sortBy === 'standard') {
    
        filteredTechnologies = filteredTechnologies.sort((a, b) => a.id - b.id)
    
    } else if (sortBy === 'alhpabeticalAZ') {
    
        filteredTechnologies = filteredTechnologies.sort((a, b) => a.name.localeCompare(b.name))
    
    } else if (sortBy === 'alhpabeticalZA') {
    
        filteredTechnologies = filteredTechnologies.sort((a, b) => b.name.localeCompare(a.name))
    
    }

    // 5. technologies are read
    return (<section className='pe-lg-4 ps-lg-0'>

        <div className='d-flex justify-content-between align-content-center my-4 gap-5'>
            {/* Searchbar */}
            <div className='search-bar d-flex align-items-center justify-content-center'>
                <input 
                    type="text" 
                    value={searchBarValue} 
                    onChange={(e) => setSearchBarValue(e.target.value)} 
                    placeholder='Looking for a technology...' 
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
                </select>
            </div>
        </div>

        <ul className='list-unstyled row mt-5'>
            {filteredTechnologies.map(tech => (
            
                <li key={tech.id} className='col-12 col-md-6 col-xl-4 my-2'>       
                    
                    <Link to={`/technologies/${tech.id}`} className='h-100'>
                        <TechnologyBanner name={tech.name} bg_color={tech.bg_color} font_color={tech.font_color} className='p-3' />
                    </Link>
                
                </li>
            ))}
            
        </ul>
    </section>
    );
}