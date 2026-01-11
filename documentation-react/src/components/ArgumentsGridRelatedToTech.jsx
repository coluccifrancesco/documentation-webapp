import { Link } from "react-router-dom";
import DifficultyBanner from "./DifficultyBanner";

export default function ArgumentsGridRelatedToTech(props){

    const data = props.arguments;

    return (
        <section className="container my-5 related-topics me-4">

            <h2>Related topics:</h2>

            <ul className="list-unstyled row">
                
                {data.map(arg => (
                    <li key={arg.id} className="col-12 col-sm-6 col-lg-4 mx-auto my-3">
                        <Link to={`/topics/${arg.id}`}>
                            <div className="h-100 arguments-related-to-tech-card d-flex align-items-center justify-content-center">
                                <h3 className="text-center">{arg.name}</h3>
                            </div>
                        </Link>
                    </li>
                ))}
            
            </ul>
        </section>
    )
}