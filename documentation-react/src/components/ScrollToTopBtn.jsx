import { useEffect } from "react";

export default function ScrollToTopBtn() {

    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' 
        });
    };

    useEffect(() => {
        scrollToTop()
    }, [])
    
    return  <button onClick={scrollToTop} className='scroll-to-top-btn'>
        
        <i class="fa-solid fa-arrow-up"></i>
    
    </button>
}