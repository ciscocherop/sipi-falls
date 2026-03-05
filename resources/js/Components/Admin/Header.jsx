import React from 'react';
import { Link, router } from '@inertiajs/react';

function Header({ title, user, onMenuClick }) {
    const handleLogout = () => {
        router.post('/logout');
    };

    return (
        <header
            className="bg-white shadow-sm border-b px-6 py-4"
            style={{ borderColor: 'var(--neutral-light)' }}
        >
            <div className="flex items-center justify-between">
                {/* Left side - Menu button and title */}
                <div className="flex items-center space-x-4">
                    {/* Mobile menu button */}
                    <button
                        onClick={onMenuClick}
                        className="lg:hidden text-2xl transition-colors hover:opacity-80"
                        style={{ color: 'var(--primary-green)' }}
                        aria-label="Open menu"
                    >
                        ☰
                    </button>

                    {/* Page title */}
                    <h1
                        className="text-2xl font-semibold"
                        style={{ color: 'var(--neutral-gray)' }}
                    >
                        {title || 'Admin Dashboard'}
                    </h1>
                </div>

                {/* Right side - User info and logout */}
                <div className="flex items-center space-x-4">
                    {/* Notification icon (placeholder for future feature) */}
                    <button
                        className="relative p-2 rounded-full transition-colors hover:bg-gray-100"
                        style={{ color: 'var(--neutral-gray)' }}
                        title="Notifications (Coming Soon)"
                        disabled
                    >
                        <span className="text-xl">🔔</span>
                        {/* Badge for unread count - will be dynamic later */}
                        {/* <span 
                            className="absolute top-0 right-0 w-5 h-5 text-xs flex items-center justify-center rounded-full text-white"
                            style={{ backgroundColor: 'var(--accent-coral)' }}
                        >
                            3
                        </span> */}
                    </button>

                    {/* User greeting */}
                    <span
                        className="text-sm hidden sm:inline"
                        style={{ color: 'var(--neutral-gray)' }}
                    >
                        Welcome, <span style={{ color: 'var(--primary-green)', fontWeight: '600' }}>
                            {user?.name || 'Admin'}
                        </span>
                    </span>

                    {/* Logout button */}
                    <button
                        onClick={handleLogout}
                        className="px-4 py-2 rounded-md text-sm font-medium text-white transition-all hover:opacity-90"
                        style={{ backgroundColor: 'var(--accent-coral)' }}
                    >
                        Logout
                    </button>
                </div>
            </div>
        </header>
    );
}

export default Header;
