export default function DifficultyBanner (props) {

    return (
        <div className="difficulty-banner d-flex justify-content-end align-items-center gap-2">
            <p>{props.grade_name}</p>
            <p>{props.grade_numerical}</p>
        </div>
    )
}