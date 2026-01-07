import { useNavigate } from 'react-router-dom';

export default function GoBackBtn() {

    const navigate = useNavigate();
    
    const goBack = () => {
        navigate(-1)
    };
    
    return  <button onClick={goBack} className='go-back-btn'>
        
        <i class="fa-solid fa-arrow-left"></i>
    
    </button>
}