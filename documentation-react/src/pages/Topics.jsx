import { useState, useEffect } from 'react';
import ArgumentsList from '../components/ArgumentsList';
import ScrollToTopBtn from '../components/ScrollToTopBtn';

export default function Topics() {

    useEffect(() => {
        
    }, [])

    return <section className='container px-lg-5'>

        <div className='my-4 p-3 p-md-0 page-head'>
            <div className='mb-2 d-flex align-items-center justify-content-start gap-4'>
                <h1>Topics</h1>
                <i className="fa-solid fa-book-open"></i>
            </div>

            <p className='w-75'> Here you will find the main theoretical and practical topics of programming. Understanding these topics allows you to read, write, and interpret code with greater awareness.</p>
        </div>

        <ArgumentsList />

    </section>;
}
