import { Link, NavLink } from 'react-router-dom';

export default function Header () {

    return <header className="w-100 py-2 px-4 d-flex align-items-center justify-content-between bg-dark text-white">
    
        <div className="d-flex align-items-center gap-4">
            <Link to="/"><h1 className='text-white'>DocuHub</h1></Link>

            <ul className="list-unstyled d-flex align-items-center gap-4">
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
        </div>

        <div></div>
    
    </header>
}