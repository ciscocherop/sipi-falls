import React from 'react';

function Button({
    children,
    onClick,
    type = 'button',
    variant = 'primary',
    size = 'md',
    loading = false,
    disabled = false,
    className = ''
}) {
    const variants = {
        primary: {
            bg: 'var(--primary-green)',
            hover: 'opacity-90'
        },
        secondary: {
            bg: 'var(--secondary-teal)',
            hover: 'opacity-90'
        },
        danger: {
            bg: 'var(--accent-coral)',
            hover: 'opacity-90'
        },
        success: {
            bg: 'var(--success)',
            hover: 'opacity-90'
        }
    };

    const sizes = {
        sm: 'px-3 py-1.5 text-sm',
        md: 'px-4 py-2 text-base',
        lg: 'px-6 py-3 text-lg'
    };

    const variantStyle = variants[variant] || variants.primary;
    const sizeClass = sizes[size] || sizes.md;

    return (
        <button
            type={type}
            onClick={onClick}
            disabled={disabled || loading}
            className={`
                ${sizeClass}
                rounded-md font-medium text-white
                transition-all
                disabled:opacity-50 disabled:cursor-not-allowed
                ${className}
            `}
            style={{
                backgroundColor: variantStyle.bg
            }}
            onMouseEnter={(e) => {
                if (!disabled && !loading) {
                    e.currentTarget.style.opacity = '0.9';
                }
            }}
            onMouseLeave={(e) => {
                if (!disabled && !loading) {
                    e.currentTarget.style.opacity = '1';
                }
            }}
        >
            {loading ? (
                <span className="flex items-center justify-center">
                    <svg className="animate-spin h-5 w-5 mr-2" viewBox="0 0 24 24">
                        <circle
                            className="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            strokeWidth="4"
                            fill="none"
                        />
                        <path
                            className="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        />
                    </svg>
                    Loading...
                </span>
            ) : children}
        </button>
    );
}

export default Button;
