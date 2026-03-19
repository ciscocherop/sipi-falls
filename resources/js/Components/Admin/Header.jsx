import { useState, useEffect, useRef } from 'react';
import { router } from '@inertiajs/react';

function Header({ title, user, onMenuClick }) {
    const [notifications, setNotifications] = useState({
        pending_testimonials: 0,
        new_bookings: 0,
        new_messages: 0,
        total: 0
    });
    const [showDropdown, setShowDropdown] = useState(false);
    const dropdownRef = useRef(null);

    const fetchNotifications = async () => {
        try {
            const res = await fetch('/admin/notifications');
            const data = await res.json();
            setNotifications(data);
        } catch (e) {
            console.error('Failed to fetch notifications', e);
        }
    };

    useEffect(() => {
        fetchNotifications();
        const interval = setInterval(fetchNotifications, 30000);
        return () => clearInterval(interval);
    }, []);

    // Close dropdown when clicking outside
    useEffect(() => {
        function handleClickOutside(e) {
            if (dropdownRef.current && !dropdownRef.current.contains(e.target)) {
                setShowDropdown(false);
            }
        }
        document.addEventListener('mousedown', handleClickOutside);
        return () => document.removeEventListener('mousedown', handleClickOutside);
    }, []);

    const handleLogout = () => {
        router.post('/logout');
    };

    return (
        <header className="bg-white shadow-sm border-b px-6 py-4" style={{ borderColor: 'var(--neutral-light)' }}>
            <div className="flex items-center justify-between">
                {/* Left side */}
                <div className="flex items-center space-x-4">
                    <button
                        onClick={onMenuClick}
                        className="lg:hidden text-2xl transition-colors hover:opacity-80"
                        style={{ color: 'var(--primary-green)' }}
                        aria-label="Open menu"
                    >
                        ☰
                    </button>
                    <h1 className="text-2xl font-semibold" style={{ color: 'var(--neutral-gray)' }}>
                        {title || 'Admin Dashboard'}
                    </h1>
                </div>

                {/* Right side */}
                <div className="flex items-center space-x-4">

                    {/* Notification Bell */}
                    <div className="relative" ref={dropdownRef}>
                        <button
                            onClick={() => setShowDropdown(!showDropdown)}
                            className="relative p-2 rounded-full transition-colors hover:bg-gray-100"
                            style={{ color: 'var(--neutral-gray)' }}
                            title="Notifications"
                        >
                            <span className="text-xl">🔔</span>
                            {notifications.total > 0 && (
                                <span
                                    className="absolute top-0 right-0 w-5 h-5 text-xs rounded-full text-white font-bold"
                                    style={{
                                        backgroundColor: '#dc3545',
                                        fontSize: '0.65rem',
                                        display: 'flex',
                                        alignItems: 'center',
                                        justifyContent: 'center'
                                    }}
                                >
                                    {notifications.total > 99 ? '99+' : notifications.total}
                                </span>
                            )}
                        </button>

                        {/* Dropdown */}
                        {showDropdown && (
                            <div
                                className="absolute right-0 mt-2 bg-white rounded-lg shadow-lg border z-50"
                                style={{ width: '280px', borderColor: '#e0e0e0' }}
                            >
                                {/* Header */}
                                <div className="px-4 py-3 border-b" style={{ borderColor: '#e0e0e0' }}>
                                    <h6 className="font-semibold m-0" style={{ color: 'var(--primary-green)' }}>
                                        Notifications
                                    </h6>
                                </div>

                                {/* Items */}
                                <div className="py-2">
                                    {notifications.pending_testimonials > 0 && (
                                        <a
                                            href="/admin/content/testimonials"
                                            className="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors no-underline"
                                            style={{ textDecoration: 'none' }}
                                            onClick={() => setShowDropdown(false)}
                                        >
                                            <span className="text-xl mr-3">⭐</span>
                                            <div>
                                                <p className="m-0 text-sm font-medium" style={{ color: 'var(--neutral-gray)' }}>
                                                    {notifications.pending_testimonials} testimonial{notifications.pending_testimonials > 1 ? 's' : ''} pending
                                                </p>
                                                <p className="m-0 text-xs" style={{ color: '#888' }}>Waiting for approval</p>
                                            </div>
                                            <span
                                                className="ml-auto text-xs font-bold px-2 py-1 rounded-full text-white"
                                                style={{ backgroundColor: 'var(--accent-gold)' }}
                                            >
                                                {notifications.pending_testimonials}
                                            </span>
                                        </a>
                                    )}

                                    {notifications.new_bookings > 0 && (
                                        <a
                                            href="/admin/bookings"
                                            className="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors"
                                            style={{ textDecoration: 'none' }}
                                            onClick={() => setShowDropdown(false)}
                                        >
                                            <span className="text-xl mr-3">📅</span>
                                            <div>
                                                <p className="m-0 text-sm font-medium" style={{ color: 'var(--neutral-gray)' }}>
                                                    {notifications.new_bookings} new booking{notifications.new_bookings > 1 ? 's' : ''}
                                                </p>
                                                <p className="m-0 text-xs" style={{ color: '#888' }}>Pending confirmation</p>
                                            </div>
                                            <span
                                                className="ml-auto text-xs font-bold px-2 py-1 rounded-full text-white"
                                                style={{ backgroundColor: 'var(--primary-green)' }}
                                            >
                                                {notifications.new_bookings}
                                            </span>
                                        </a>
                                    )}

                                    {notifications.new_messages > 0 && (
                                        <a
                                            href="/admin/contact-messages"
                                            className="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors"
                                            style={{ textDecoration: 'none' }}
                                            onClick={() => setShowDropdown(false)}
                                        >
                                            <span className="text-xl mr-3">✉️</span>
                                            <div>
                                                <p className="m-0 text-sm font-medium" style={{ color: 'var(--neutral-gray)' }}>
                                                    {notifications.new_messages} unread message{notifications.new_messages > 1 ? 's' : ''}
                                                </p>
                                                <p className="m-0 text-xs" style={{ color: '#888' }}>New contact messages</p>
                                            </div>
                                            <span
                                                className="ml-auto text-xs font-bold px-2 py-1 rounded-full text-white"
                                                style={{ backgroundColor: '#3B82F6' }}
                                            >
                                                {notifications.new_messages}
                                            </span>
                                        </a>
                                    )}

                                    {notifications.total === 0 && (
                                        <div className="px-4 py-6 text-center">
                                            <span className="text-3xl">✅</span>
                                            <p className="m-0 mt-2 text-sm" style={{ color: '#888' }}>All caught up!</p>
                                        </div>
                                    )}
                                </div>

                                {/* Footer */}
                                <div className="px-4 py-2 border-t text-center" style={{ borderColor: '#e0e0e0' }}>
                                    <p className="m-0 text-xs" style={{ color: '#888' }}>Updates every 30 seconds</p>
                                </div>
                            </div>
                        )}
                    </div>

                    {/* User greeting */}
                    <span className="text-sm hidden sm:inline" style={{ color: 'var(--neutral-gray)' }}>
                        Welcome, <span style={{ color: 'var(--primary-green)', fontWeight: '600' }}>
                            {user?.name || 'Admin'}
                        </span>
                    </span>

                    {/* Logout */}
                    <button
                        onClick={handleLogout}
                        className="px-4 py-2 rounded-md text-sm font-medium text-white transition-all hover:opacity-90"
                        style={{ backgroundColor: '#dc3545' }}
                    >
                        Logout
                    </button>
                </div>
            </div>
        </header>
    );
}

export default Header;
