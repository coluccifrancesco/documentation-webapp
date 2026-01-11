import { useEffect } from "react";
import Hero from "../components/Hero";
import LastAddedTopicsGrid from "../components/LastAddedTopicsGrid";
import TechCheckHero from "../components/TechCheckHero";
import ScrollToTopBtn from "../components/ScrollToTopBtn";

export default function Home () {

    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' 
        });
    };
    
    useEffect(() => {
        scrollToTop()    
    }, [])
    
    return <section className="my-lg-4 me-lg-5">
    
        <Hero />

        <TechCheckHero />

        <LastAddedTopicsGrid />
    
        <ScrollToTopBtn />
    
    </section>
}