import { Link } from "react-router-dom"

export default function Footer () {

    return <footer className="mt-5 row">
    
        <div className="col-12 col-md-6">
            <div className="p-3 border">
                <h1>Footer</h1>
            </div>
        </div>

        <div className="col-12 col-md-6">
            <div className="p-3 border row footer-links">
                <Link to='https://www.linkedin.com/in/francesco-colucci-589414290/' className="col-4">
                    <div className="text-center">
                        <i class="fa-brands fa-github"></i>
                    </div>        
                </Link>
                
                <Link to='https://github.com/coluccifrancesco' className="col-4">
                    <div className="text-center">
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                </Link>
                
                <Link to='http://127.0.0.1:8000/' className="col-4">
                    <div className="text-center">
                        <i class="fa-brands fa-laravel"></i>
                    </div>    
                </Link>
            </div>
        </div>

        <div className="col-12">
            <div className="p-3 border text-center">
                <p>Created by: <b>Francesco Colucci</b></p>
                
                <Link to='https://boolean.careers/' >
                    <p><i>Boolean Coding Academy</i></p>
                </Link>
                
                <i>2025 - 2026</i>
            </div>
        </div>
    
    </footer>
}