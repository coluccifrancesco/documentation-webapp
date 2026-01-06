import { Link, NavLink } from 'react-router-dom';

export default function MobileHeader() {

    return <>

        <header className="d-flex d-sm-none py-2 px-5 align-items-center justify-content-between mobile-header mobile-header">

            <Link to="/"><h1>DocuHub</h1></Link>

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