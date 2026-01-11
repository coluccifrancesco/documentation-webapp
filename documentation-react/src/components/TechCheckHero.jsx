import { Link } from "react-router-dom"

export default function TechCheckHero() {

    return (
        
        <section className="mb-4 hero container">
            <div className="container-fluid p-4 row mx-0">

                <div className="col-12 col-lg-6 row hero-tech-icons mx-auto">
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-html5"></i>
                    </div>
                    
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-css3-alt"></i>
                    </div>
                    
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-js"></i>
                    </div>

                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-bootstrap"></i>
                    </div>
                    
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-node-js"></i>
                    </div>
                    
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-solid fa-database"></i>
                    </div>

                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-react"></i>
                    </div>
                    
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-php"></i>
                    </div>
                    
                    <div className="col-4 d-flex align-items-center justify-content-center my-3">
                        <i class="fa-brands fa-laravel"></i>
                    </div>
                </div>

                <div className="col-12 col-lg-6">
                    <div className="p-3">
                        <h3 className="mt-0 mt-lg-4">Choose what to learn</h3>

                        <p className="mt-4">
                            Take a look at all the 
                            
                            <span className="ms-1">    
                                <Link to="/technologies">
                                    <b className="text-color-600 pointer">
                                        Technologies
                                    </b>
                                </Link>
                            </span>

                            !
                        </p>

                    </div>
                </div>

            </div>
        </section>
    )
}