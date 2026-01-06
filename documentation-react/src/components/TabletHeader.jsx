import { Link, NavLink } from 'react-router-dom';

export default function TabletHeader() {
    
    return <header className="d-none d-sm-flex d-lg-none py-2 px-5 align-items-center justify-content-between tablet-header">
        
        <nav className="d-flex align-items-center gap-4">
            <Link to="/"><h1>DocuHub</h1></Link>

            <ul className="list-unstyled d-flex align-items-center gap-4">
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