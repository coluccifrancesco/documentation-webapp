export default function TechnologyBanner (props) {

    // Prop structure:
    // <TechnologyBanner name={tech.name} bg_color={tech.bg_color} font_color={tech.font_color} />

    return (
        <div 
            className='difficulty-banner py-2 px-3 rounded text-center' 
            style={{ 
                backgroundColor:`${props.bg_color}`, 
                color:`${props.font_color}` 
            }}
        >
            <p>{props?.name}</p>
        </div>
    )
}