import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

export default function Technologies() {
	
    const navigate = useNavigate();
	const [data, setData] = useState(null);

	useEffect(() => {
		// placeholder for fetching or reacting to params
	}, []);

	return <>
		<h1>Technologies</h1>
	</>;
}
