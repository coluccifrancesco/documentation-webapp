import { Link, NavLink } from 'react-router-dom';

export default function Header () {

    return <section className="sidebar h-100">
           
        <ul className="list-unstyled p-4">
            <li className='sidebar-link px-2 py-1'>
                <Link to="/"><h1 className='text-color-500'>DocuHub</h1></Link>
            </li>

            <li className='sidebar-link px-3 py-2 my-2'>
                <NavLink to="/topics">
                    <div className='d-flex align-items-center justify-content-start gap-3'>
                        <h5 className='text-color-500'>Topics</h5>
                        <i className="text-color-500 fa-solid fa-book-open"></i>
                    </div>
                </NavLink>
            </li>

            <li className='sidebar-link px-3 py-2 my-2'>
                <NavLink to="/technologies">
                    <div className='d-flex align-items-center justify-content-start gap-3'>
                        <h5 className='text-color-500'>Technologies</h5>
                        <i className="text-color-500 fa-solid fa-microchip"></i>
                    </div>
                </NavLink>
            </li>

            <li className='sidebar-link px-3 py-2 my-2'>
                <NavLink to="/difficulties">
                    <div className='d-flex align-items-center justify-content-start gap-3'>
                        <h5 className='text-color-500'>Difficulties</h5>
                        <i className="text-color-500 fa-solid fa-dumbbell"></i>
                    </div>
                </NavLink>
            </li>
        </ul>
    </section>
}