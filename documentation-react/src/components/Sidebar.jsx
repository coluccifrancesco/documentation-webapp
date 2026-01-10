import { Link, NavLink } from 'react-router-dom';
import Logo from './Logo';

export default function Header() {

    return <section>

        <div className='sidebar p-2'>
            <ul className="list-unstyled mt-3">
                <li className='sidebar-link'>
                    <Link to='./' className='py-1 px-2 d-flex justify-content-start align-items-center'>
                        <Logo />

                        <h1>DocuHub</h1>
                    </Link>
                </li>

                <li className='sidebar-link px-3 py-2 my-2'>
                    <NavLink to="/topics">
                        <div className='d-flex align-items-center justify-content-start gap-3'>
                            <h5>Topics</h5>
                            <i className="fa-solid fa-book-open"></i>
                        </div>
                    </NavLink>
                </li>

                <li className='sidebar-link px-3 py-2 my-2'>
                    <NavLink to="/technologies">
                        <div className='d-flex align-items-center justify-content-start gap-3'>
                            <h5>Technologies</h5>
                            <i className="fa-solid fa-microchip"></i>
                        </div>
                    </NavLink>
                </li>

                <li className='sidebar-link px-3 py-2 my-2'>
                    <NavLink to="/difficulties">
                        <div className='d-flex align-items-center justify-content-start gap-3'>
                            <h5>Difficulties</h5>
                            <i className="fa-solid fa-dumbbell"></i>
                        </div>
                    </NavLink>
                </li>

                <li className="sidebar-link px-3 py-2 my-2">
                    <Link to='http://127.0.0.1:8000/login'>
                        <div className='d-flex align-items-center justify-content-start gap-3'>
                            <h5>Login</h5>

                            <i class="fa-brands fa-laravel"></i>
                        </div>
                    </Link>
                </li>
            </ul>
        </div>

    </section>
}