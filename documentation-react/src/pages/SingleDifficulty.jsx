import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';

export default function SingleDifficulty() {
    
    const params = useParams();
    const navigate = useNavigate();
    const [data, setData] = useState(null);

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    return <>
        <h1>Single Difficulty</h1>
    </>;
}
