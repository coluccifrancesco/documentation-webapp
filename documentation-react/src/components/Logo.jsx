import { useId } from 'react';

export default function Logo({ size = 'md', className = '' }) {
    const uniqueId = useId(); 
    
    const sizes = {
        sm: { hex: 40 },
        md: { hex: 55 },
        lg: { hex: 75 },
        xl: { hex: 95 }
    };

    const config = sizes[size];

    return (
        <div className={`inline-block group cursor-pointer ${className} logo`}>
            <div style={{ width: config.hex, height: config.hex }}>
                <svg
                    width={config.hex}
                    height={config.hex}
                    viewBox="0 0 100 100"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    className="transition-transform duration-300 group-hover:scale-110"
                >
                    <defs>
                        <linearGradient id={`hexGrad-${uniqueId}`} x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stopColor="#60aad0" />
                            <stop offset="50%" stopColor="#2b739e" />
                            <stop offset="100%" stopColor="#22506d" />
                        </linearGradient>

                        <linearGradient id={`codeGrad-${uniqueId}`} x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stopColor="#e6f0f8" />
                            <stop offset="100%" stopColor="#f3f8fc" />
                        </linearGradient>
                    </defs>

                    <path
                        d="M 50 8 L 85 28 L 85 72 L 50 92 L 15 72 L 15 28 Z"
                        fill={`url(#hexGrad-${uniqueId})`}
                    />

                    <path
                        d="M 50 8 L 85 28 L 85 72 L 50 92 L 15 72 L 15 28 Z"
                        fill="none"
                        stroke={`url(#codeGrad-${uniqueId})`}
                        strokeWidth="1"
                    />

                    <g className="group-hover:scale-110 transition-transform duration-300" style={{ transformOrigin: '50px 50px' }}>
                        <path
                            d="M 40 35 L 30 50 L 40 65"
                            fill="none"
                            stroke={`url(#codeGrad-${uniqueId})`}
                            strokeWidth="3.5"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        />
                        <path
                            d="M 60 35 L 70 50 L 60 65"
                            fill="none"
                            stroke={`url(#codeGrad-${uniqueId})`}
                            strokeWidth="3.5"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        />
                        <line
                            x1="54"
                            y1="38"
                            x2="46"
                            y2="62"
                            stroke={`url(#codeGrad-${uniqueId})`}
                            strokeWidth="3.5"
                            strokeLinecap="round"
                        />
                    </g>
                </svg>
            </div>
        </div>
    );
}