import { Link, NavLink } from 'react-router-dom';

export default function TabletHeader() {
    
    return <header className="d-none d-sm-flex d-lg-none justify-content-center">
        
        <nav className='tablet-header-nav my-3'>
            <ul className="list-unstyled mx-auto d-flex justify-content-center align-items-center gap-4 px-5 py-2">
                <li>
                    <Link to="/"><h1>DocuHub</h1></Link>
                </li>

                <li>
                    <NavLink to="/topics"><p>Topics</p></NavLink>
                </li>

                <li>
                    <NavLink to="/technologies"><p>Technologies</p></NavLink>
                </li>

                <li>
                    <NavLink to="/difficulties"><p>Difficulties</p></NavLink>
                </li>
            </ul>
        </nav>
    
    </header>
}