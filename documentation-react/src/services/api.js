// all arguments
export const getArguments = async() => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/arguments`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}

// single argument
export const getSingleArgument = async(argumentId) => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/arguments/${argumentId}`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}


// all technologies
export const getTechnologies = async() => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/technologies`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}

// single technology
export const getSingleTechnology = async(technologyId) => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/technologies/${technologyId}`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}


// all difficulties
export const getDifficulties = async() => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/difficulties`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}

// single difficulty
export const getSingleDifficulty = async(difficultyId) => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/difficulties/${difficultyId}`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}