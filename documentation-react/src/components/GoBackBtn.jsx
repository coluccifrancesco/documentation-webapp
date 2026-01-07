import { useNavigate } from 'react-router-dom';

export default function GoBackBtn() {

    const navigate = useNavigate();
    
    const goBack = () => {
        navigate(-1);

        setTimeout(() => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth', 
            })
        })
    };
    
    return  <button onClick={goBack} className='go-back-btn'>
        
        <i class="fa-solid fa-arrow-left"></i>
    
    </button>
}