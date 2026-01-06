import { Link, NavLink } from 'react-router-dom';
import { useEffect } from 'react';

export default function MobileHeader() {

    // detects screen width and closes offcanvas if open
    useEffect(() => {
        const handleResize = () => {
            if (window.innerWidth >= 768) { // 768px è il breakpoint md di Bootstrap
                const offcanvasElement = document.getElementById('offcanvasRight');
                const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
                if (offcanvasInstance) {
                    offcanvasInstance.hide();
                }
            }
        };

        window.addEventListener('resize', handleResize);

        return () => window.removeEventListener('resize', handleResize);
    }, []);

    return <header className="d-flex d-md-none justify-content-center">
        <nav className='mobile-header-nav my-3'>
            <ul className='list-unstyled d-flex justify-content-between align-items-center px-3 py-2'>
                <li>
                    <Link to="/"><h1>DocuHub</h1></Link>
                </li>

                <li>
                    <button className="menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>
                </li>
            </ul>
        </nav>

        <div className="d-md-none offcanvas offcanvas-end offcanvas-style" tabIndex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div className="offcanvas-header">
                <button type="button" className="btn-close text-color-50" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div className="offcanvas-body" id="navbarNav">
                <ul className='offcanvas-elements list-unstyled'>
                    <li>
                        <NavLink to="/topics"><p className='nav-link'>Topics</p></NavLink>
                    </li>

                    <li>
                        <NavLink to="/technologies"><p className='nav-link'>Technologies</p></NavLink>
                    </li>

                    <li>
                        <NavLink to="/difficulties"><p className='nav-link'>Difficulties</p></NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </header>
}