import { useState } from "react";

export default function TechnologyBanner (props) {

    // Prop structure:
    // <TechnologyBanner name={tech.name} bg_color={tech.bg_color} font_color={tech.font_color} />

    const [isHover, setIsHover] = useState(false);

    const handleMouseEnter = () => {
        setIsHover(true);
    };
   
    const handleMouseLeave = () => {
        setIsHover(false);
    };

    const bannerStyle = {
        transition: '0.3s ease-in-out',
        backgroundColor: isHover ? `${props?.font_color}` : `${props?.bg_color}`, 
        color: isHover ? `${props?.bg_color}` : `${props?.font_color}`,
        boxShadow: isHover ? 'rgba(0, 0, 0, 0.2) -5px 4px 3px' : `none`,
    };

    return (
        <div 
            className='difficulty-banner py-2 px-3 rounded text-center' 
            style={bannerStyle}
            onMouseEnter={handleMouseEnter}
            onMouseLeave={handleMouseLeave}
        >
            <p>{props?.name}</p>
        </div>
    )
}