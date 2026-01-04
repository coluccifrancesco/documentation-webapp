import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import ArgumentsList from '../components/ArgumentsList';

export default function Topics() {
	
    const navigate = useNavigate();
	const [data, setData] = useState(null);

	useEffect(() => {
		// placeholder for fetching or reacting to params
	}, []);

	return <>
		<h1>Topics</h1>
        <ArgumentsList />
	</>;
}
