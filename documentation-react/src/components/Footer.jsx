import { Link } from "react-router-dom"

export default function Footer() {

    return <footer className="mt-5 w-50 mx-auto">

        <section className="row footer-links">
            <Link to='https://github.com/coluccifrancesco' className="col-12 col-sm-4 my-2 my-sm-0">
                <div className="text-center">
                    <i class="fa-brands fa-github"></i>
                </div>
            </Link>

            <Link to='https://www.linkedin.com/in/francesco-colucci-589414290/' className="col-12 col-sm-4 my-2 my-sm-0">
                <div className="text-center">
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </Link>

            <Link to='http://127.0.0.1:8000/' className="col-12 col-sm-4 my-2 my-sm-0">
                <div className="text-center">
                    <i class="fa-brands fa-laravel"></i>
                </div>
            </Link>
        </section>

        <div className="p-3 text-center">
            <p>Created by: <b className="text-color-800">Francesco Colucci</b></p>

            <Link to='https://boolean.careers/' >
                <p><i className="text-color-500">Boolean Coding Academy</i></p>
            </Link>

            <i>2025 - 2026</i>
        </div>

    </footer>
}