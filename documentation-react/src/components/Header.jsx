export default function Header () {

    return <header className="w-100 py-2 px-4 d-flex align-items-center justify-content-between bg-dark text-white">
    
        <div className="d-flex align-items-center gap-4">
            <h1>DocuHub</h1>

            <ul className="list-unstyled d-flex align-items-center gap-4">
                <li>
                    <a href="/topics" className="text-white">Topics</a>
                </li>

                <li>
                    <a href="/technologies" className="text-white">Technologies</a>
                </li>

                <li>
                    <a href="/difficulties" className="text-white">Difficulties</a>
                </li>
            </ul>
        </div>

        <div></div>
    
    </header>
}