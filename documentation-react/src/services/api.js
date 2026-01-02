export const getArguments = async() => {

    const response = await fetch(`${import.meta.env.VITE_GENERIC_API_ENDPOINT}/arguments`);
    
    if (!response.ok) {
        throw new Error("Couldn't get data");
    }

    const json = await response.json();

    return json.data ? json.data : json;
}