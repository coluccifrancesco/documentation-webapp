import { Link, NavLink } from 'react-router-dom';

export default function Header () {

    return <div className="d-none d-lg-block col-lg-3 p-4 bg-dark text-white">
    
        <div className="">
            <Link to="/"><h1 className='text-white'>DocuHub</h1></Link>

            <ul className="list-unstyled">
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

    </div>
}