export default function DifficultyBanner (props) {

    // Prop structure:
    // <DifficultyBanner grade_name={argument.difficulty.grade_name} grade_numerical={argument.difficulty.grade_numerical} />

    const gradeProperties = {
        1: {emojiClasses: 'fa-solid fa-face-laugh-beam', bg_color: 'bg-color-200', font_color: 'text-color-800'},
        2: {emojiClasses: 'fa-solid fa-face-grin-wink', bg_color: 'bg-color-300', font_color: 'text-color-700'},
        3: {emojiClasses: 'fa-solid fa-face-meh', bg_color: 'bg-color-400', font_color: 'text-color-200'},
        4: {emojiClasses: 'fa-solid fa-face-flushed', bg_color: 'bg-color-500', font_color: 'text-color-100'},
        5: {emojiClasses: 'fa-solid fa-face-dizzy', bg_color: 'bg-color-600', font_color: 'text-color-50'}
    };

    const config = gradeProperties[props.grade_numerical];

    return (
        <div className={`difficulty-banner d-flex justify-content-center align-items-center gap-2 py-2 px-3 rounded ${config?.bg_color} ${config?.font_color}`}>
            {props.grade_name? <p>{props.grade_name}</p> : ''}
            <i className={config?.emojiClasses}></i>
        </div>
    )
}