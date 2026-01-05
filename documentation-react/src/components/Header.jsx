import { Link, NavLink } from 'react-router-dom';

export default function Header() {

    return <>

        <header className="d-flex d-lg-none w-100 py-2 px-4 align-items-center justify-content-between bg-dark text-white">
            <nav className="d-flex align-items-center gap-4">
                <Link to="/"><h1 className='text-white'>DocuHub</h1></Link>

                <ul className="d-none d-md-flex list-unstyled d-flex align-items-center gap-4">
                    <li>
                        <NavLink to="/topics"><p className='text-white'>Topics</p></NavLink>
                    </li>

                    <li>
                        <NavLink to="/technologies"><p className='text-white'>Technologies</p></NavLink>
                    </li>

                    <li>
                        <NavLink to="/difficulties"><p className='text-white'>Difficulties</p></NavLink>
                    </li>
                </ul>
            </nav>

            <button class="text-white bg-white navbar-toggler d-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </header>

        <div class="d-md-none collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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

    </>
}