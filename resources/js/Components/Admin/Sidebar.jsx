import React from 'react';
import { Link, usePage } from '@inertiajs/react';

function Sidebar({ isOpen, onClose }) {
    const { url } = usePage();

    const navigationItems = [
        {
            name: 'Dashboard',
            href: '/admin/dashboard',
            icon: '📊'
        },
        {
            name: 'Contact Messages',
            href: '/admin/contact-messages',
            icon: '✉️'
        },
        {
            name: 'Bookings',
            href: '/admin/bookings',
            icon: '📅'
        },
        {
            name: 'Newsletter',
            href: '/admin/newsletter-subscribers',
            icon: '📧'
        },
        {
            name: 'Tour Guides',
            href: '/admin/tour-guides',
            icon: '👨‍🏫'
        },
        {
            name: 'Testimonials',
            href: '/admin/testimonials',
            icon: '⭐'
        },
        {
            name: 'Content',
            href: '/admin/content',
            icon: '📝'
        }
    ];

    const isActive = (href) => {
        return url.startsWith(href);
    };

    return (
        <>
            {/* Mobile backdrop */}
            {isOpen && (
                <div
                    className="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"
                    onClick={onClose}
                />
            )}

            {/* Sidebar */}
            <aside
                style={{ backgroundColor: 'var(--neutral-gray)' }}
                className={`
                    fixed lg:static inset-y-0 left-0 z-30
                    w-64 text-white
                    transform transition-transform duration-300 ease-in-out
                    ${isOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'}
                `}
            >
                {/* Logo/Brand */}
                <div
                    className="flex items-center justify-between p-6 border-b"
                    style={{ borderColor: 'var(--primary-green)' }}
                >
                    <h2 className="text-xl font-bold" style={{ color: 'var(--accent-gold)' }}>
                        Sipi Falls Admin
                    </h2>
                    <button
                        onClick={onClose}
                        className="lg:hidden hover:opacity-80 transition-opacity"
                        style={{ color: 'var(--secondary-teal)' }}
                    >
                        ✕
                    </button>
                </div>

                {/* Navigation */}
                <nav className="p-4 space-y-2">
                    {navigationItems.map((item) => (
                        <Link
                            key={item.href}
                            href={item.href}
                            style={{
                                backgroundColor: isActive(item.href) ? 'var(--primary-green)' : 'transparent',
                                color: isActive(item.href) ? 'white' : 'var(--neutral-offwhite)'
                            }}
                            className={`
                                flex items-center space-x-3 px-4 py-3 rounded-lg
                                transition-all duration-200
                                hover:bg-opacity-80
                                ${isActive(item.href) ? 'font-semibold' : ''}
                            `}
                            onMouseEnter={(e) => {
                                if (!isActive(item.href)) {
                                    e.currentTarget.style.backgroundColor = 'rgba(111, 207, 151, 0.2)';
                                }
                            }}
                            onMouseLeave={(e) => {
                                if (!isActive(item.href)) {
                                    e.currentTarget.style.backgroundColor = 'transparent';
                                }
                            }}
                        >
                            <span className="text-xl">{item.icon}</span>
                            <span>{item.name}</span>
                        </Link>
                    ))}
                </nav>
            </aside>
        </>
    );
}

export default Sidebar;
