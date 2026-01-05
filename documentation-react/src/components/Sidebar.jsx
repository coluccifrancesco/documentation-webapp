import { Link, NavLink } from 'react-router-dom';

export default function Header () {

    return <div className="d-none d-lg-block col-lg-3 p-2 ps-4 pe-2">
    
        <div className="sidebar">
            <ul className="list-unstyled p-4">
                <li className='sidebar-link px-2 py-1'>
                    <Link to="/"><h1 className='text-color-500'>DocuHub</h1></Link>
                </li>

                <li className='sidebar-link px-3 py-2 my-2'>
                    <NavLink to="/topics"><h5 className='text-color-500'>Topics</h5></NavLink>
                </li>

                <li className='sidebar-link px-3 py-2 my-2'>
                    <NavLink to="/technologies"><h5 className='text-color-500'>Technologies</h5></NavLink>
                </li>

                <li className='sidebar-link px-3 py-2 my-2'>
                    <NavLink to="/difficulties"><h5 className='text-color-500'>Difficulties</h5></NavLink>
                </li>
            </ul>
        </div>

    </div>
}