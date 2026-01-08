import { Link } from 'react-router-dom';

export default function DocsBtn(props) {

    // Prop structure:
    // <DocsBtn documentation_link={data.documentation_link} />
    
    return <Link to={props.documentation_link} className='d-flex justify-content-center align-items-center docs-btn'>
        
        <div className='d-flex justify-content-center align-items-center gap-1'>
            <p className='d-none d-md-block'>Documentation</p>
            <p className='d-block d-md-none'>Docs</p>

            <i class="fa-solid fa-globe"></i>
        </div>
        
    </Link> 

}