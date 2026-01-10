import { Link, NavLink } from 'react-router-dom';
import { useEffect } from 'react';
import Logo from './Logo';

export default function MobileHeader() {

    useEffect(() => {
        const handleResize = () => {
            if (window.innerWidth >= 768) {
                const el = document.getElementById('offcanvasRight');
                const instance = bootstrap.Offcanvas.getInstance(el);
                if (instance) instance.hide();
            }
        };

        window.addEventListener('resize', handleResize);
        return () => window.removeEventListener('resize', handleResize);
    }, []);

    return (
        <>
            <header className="d-flex d-md-none justify-content-center">
                <nav className="mobile-header-nav my-3">
                    <ul className="list-unstyled d-flex justify-content-between align-items-center px-3 py-2">
                        <li className='d-flex justify-content-center align-items-center'>
                            <Link to='./'>
                                <Logo />
                            </Link>
                        </li>

                        <li>
                            <button
                                className="menu-btn"
                                type="button"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight"
                            >
                                <i className="fa-solid fa-bars-staggered"></i>
                            </button>
                        </li>
                    </ul>
                </nav>
            </header>

            <div
                className="offcanvas offcanvas-end offcanvas-style d-md-none"
                tabIndex="-1"
                id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel"
            >
                <div className="offcanvas-header">
                    <button
                        type="button"
                        className="btn-close btn-close-white"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    />
                </div>

                <div className="offcanvas-body">
                    <ul className="offcanvas-elements list-unstyled">
                        <li>
                            <NavLink to="/topics"><p className="nav-link">Topics</p></NavLink>
                        </li>
                        <li>
                            <NavLink to="/technologies"><p className="nav-link">Technologies</p></NavLink>
                        </li>
                        <li>
                            <NavLink to="/difficulties"><p className="nav-link">Difficulties</p></NavLink>
                        </li>
                        <li>
                            <NavLink to="http://127.0.0.1:8000/login"><p className="nav-link">Login</p></NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </>
    );
}
