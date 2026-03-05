import React from 'react';

function StatCard({ title, value, icon, trend, variant = 'blue' }) {
    const variantColors = {
        blue: {
            bg: 'var(--info)',
            light: 'rgba(59, 130, 246, 0.1)'
        },
        green: {
            bg: 'var(--primary-green)',
            light: 'rgba(34, 139, 34, 0.1)'
        },
        purple: {
            bg: '#9333EA',
            light: 'rgba(147, 51, 234, 0.1)'
        },
        orange: {
            bg: 'var(--warning)',
            light: 'rgba(245, 158, 11, 0.1)'
        },
        teal: {
            bg: 'var(--secondary-teal)',
            light: 'rgba(111, 207, 151, 0.1)'
        }
    };

    const colors = variantColors[variant] || variantColors.blue;

    return (
        <div
            className="bg-white rounded-lg shadow p-6 transition-transform hover:scale-105"
            style={{ borderLeft: `4px solid ${colors.bg}` }}
        >
            <div className="flex items-center justify-between">
                <div className="flex-1">
                    <p
                        className="text-sm font-medium mb-1"
                        style={{ color: 'var(--neutral-gray)' }}
                    >
                        {title}
                    </p>
                    <p
                        className="text-3xl font-bold"
                        style={{ color: colors.bg }}
                    >
                        {value}
                    </p>

                    {trend && (
                        <div className="flex items-center mt-2 text-sm">
                            <span
                                className={trend.direction === 'up' ? 'text-green-600' : 'text-red-600'}
                            >
                                {trend.direction === 'up' ? '↑' : '↓'} {trend.percentage}%
                            </span>
                            <span className="text-gray-500 ml-2">{trend.label}</span>
                        </div>
                    )}
                </div>

                {icon && (
                    <div
                        className="w-16 h-16 rounded-full flex items-center justify-center text-3xl"
                        style={{ backgroundColor: colors.light }}
                    >
                        {icon}
                    </div>
                )}
            </div>
        </div>
    );
}

export default StatCard;
