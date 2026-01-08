import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { getSingleArgument } from '../services/api';
import { Prism as SyntaxHighlighter } from 'react-syntax-highlighter';
import { vscDarkPlus } from 'react-syntax-highlighter/dist/esm/styles/prism';
import ReactMarkdown from 'react-markdown';
import DifficultyBanner from '../components/DifficultyBanner';
import TechnologyBanner from '../components/TechnologyBanner';
import GoBackBtn from '../components/GoBackBtn';
import DocsBtn from '../components/DocsBtn';
import ScrollToTopBtn from '../components/ScrollToTopBtn';

export default function SingleTopic() {

    const { argumentId } = useParams();

    // useState is not necessary for argument data
    // TanStack Query already returns variable: 'data'

    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['argument', argumentId],
        queryFn: () => getSingleArgument(argumentId),
        enabled: !!argumentId
    });

    useEffect(() => {
        // placeholder for fetching or reacting to params
    }, []);

    if (isLoading) return <p>Loading data</p>;
    if (isError) return <p>Error: {error.message}</p>;

    let markdownContent;

    if (data.md_text != null) {
        markdownContent = data.md_text;
    }

    return <section className='container'>

        <div className='my-lg-4 my-3 p-3 p-md-0 pe-lg-3'>
            <div className='d-flex justify-content-between align-items-center'>
                <h1>{data?.name || ''}</h1>

                <GoBackBtn />                
            </div>

            <div className='d-flex justify-content-between align-items-center my-3'>
                <p className='w-50'>{data?.resume || ''}</p>

                <div className='d-flex flex-column gap-3'>
                    {data.documentation_link ? <DocsBtn documentation_link={data.documentation_link} /> : ''}

                    <div className='d-md-flex justify-content-center align-items-center gap-4'>
                        {data.technologies? <ul className='list-unstyled mb-3 mb-md-0'>

                            {data.technologies.map(tech => (
                                <li key={tech.id}>
                                    <Link to={`/technologies/${tech.id}`}>
                                        <TechnologyBanner name={tech.name} bg_color={tech.bg_color} font_color={tech.font_color} />
                                    </Link>
                                </li>
                            ))}

                        </ul> : ''}
                        
                        <DifficultyBanner grade_name={data.difficulty.grade_name} grade_numerical={data.difficulty.grade_numerical} />
                    </div>
                </div>
            </div>

            <div className='react-markdown p-4 mt-5 mt-md-5'>
                {data.md_text ? <ReactMarkdown
                    components={{
                        code({ node, inline, className, children, ...props }) {
                            const match = /language-(\w+)/.exec(className || '');
                            return !inline && match ? (
                                <SyntaxHighlighter
                                    style={vscDarkPlus}
                                    language={match[1]}
                                    PreTag="div"
                                    wrapLongLines={false}
                                    customStyle={{
                                        borderRadius: '15px',
                                        textAlign: 'start',
                                        margin: '1rem 0',
                                        whiteSpace: 'pre'
                                    }}
                                >
                                    {String(children).replace(/\n$/, '')}
                                </SyntaxHighlighter>
                            ) : (
                                <code className={className} {...props}>
                                    {children}
                                </code>
                            );
                        }
                    }}
                >
                    {markdownContent}
                </ReactMarkdown> : ''}
            </div>
        </div>

        <ScrollToTopBtn />

    </section>;
}
