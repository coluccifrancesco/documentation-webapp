import { Link, NavLink } from 'react-router-dom';

export default function Header () {

    return <div className="d-none d-lg-block col-lg-3 py-4 px-5 text-white bg-dark">
    
        <div className="">
            <Link to="/"><h1 className='text-white'>DocuHub</h1></Link>

            <ul className="list-unstyled">
                <li className='my-3'>
                    <NavLink to="/topics"><h5 className='text-white'>Topics</h5></NavLink>
                </li>

                <li className='my-3'>
                    <NavLink to="/technologies"><h5 className='text-white'>Technologies</h5></NavLink>
                </li>

                <li className='my-3'>
                    <NavLink to="/difficulties"><h5 className='text-white'>Difficulties</h5></NavLink>
                </li>
            </ul>
        </div>

    </div>
}