export default function Hero() {

    return (

        <section className="mb-4 hero container bg-color-200">
            <div className="container-fluid p-4 row">

                <div className="col-12 col-lg-8">
                    <div className="p-4">
                        <h1>Your Coding Learning Tool!</h1>

                        <p className="mt-4">
                            Here <b>you will find </b> structured <b>documentation</b> that <b>turns complex concepts into</b> accessible <b>knowledge</b>, whether you are just starting out or refining your skills.
                        </p>

                        <p className="mt-3">
                            Each topic is broken down <b><i>step by step</i></b>: from fundamental principles to advanced patterns, with a strong focus on how and <b><i>why things work</i></b>. 
                        </p>
                        
                        <p className="mt-3">
                            The goal is to help you <b>reason like a developer</b>!
                        </p>

                        <p className="mt-3">
                            Think of this site as a constantly evolving reference: where <i>theory meets practice, and <b>learning is driven by understanding</b></i>.
                        </p>
                    </div>
                </div>

                <div className="d-none d-lg-flex col-lg-4 d-flex justify-content-center align-items-center order-md-2 order-1">
                    <img src="../../public/images/imgOne.jpeg" alt="hero image" className="hero-img" />
                </div>

            </div>
        </section>
    )
}