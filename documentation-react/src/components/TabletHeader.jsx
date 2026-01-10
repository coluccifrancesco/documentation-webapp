import { Link, NavLink } from 'react-router-dom';
import Logo from './Logo';

export default function TabletHeader() {

    return <header className="d-none d-md-flex d-lg-none justify-content-center position-sticky">

        <nav className='tablet-header-nav my-3'>
            <ul className="list-unstyled mx-auto d-flex justify-content-between align-items-center gap-4 px-4 py-2">
                
                <li>
                    <Link to='./' className='d-flex justify-content-center align-items-center'>
                        <Logo />
                    </Link>
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