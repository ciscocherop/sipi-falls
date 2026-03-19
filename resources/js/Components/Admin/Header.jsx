import { useState, useEffect, useRef } from 'react';
import { router } from '@inertiajs/react';
import { Bell } from 'lucide-react';

function Header({ title, user, onMenuClick }) {
    const [notifications, setNotifications] = useState({
        pending_testimonials: 0,
        new_bookings: 0,
        new_messages: 0,
        total: 0
    });
    const [showDropdown, setShowDropdown] = useState(false);
    const [logoutHover, setLogoutHover] = useState(false);
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

    useEffect(() => {
        function handleClickOutside(e) {
            if (dropdownRef.current && !dropdownRef.current.contains(e.target)) {
                setShowDropdown(false);
            }
        }
        document.addEventListener('mousedown', handleClickOutside);
        return () => document.removeEventListener('mousedown', handleClickOutside);
    }, []);

    // Derive initials from user name
    const initials = (user?.name || 'Admin')
        .split(' ')
        .map(w => w[0])
        .join('')
        .substring(0, 2)
        .toUpperCase();

    return (
        <header style={{
            background: 'white',
            borderBottom: '1px solid #e5e7eb',
            height: '64px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'space-between',
            padding: '0 1.5rem',
            flexShrink: 0,
        }}>
            {/* Left — mobile menu + page title */}
            <div style={{ display: 'flex', alignItems: 'center', gap: '1rem' }}>
                <button
                    onClick={onMenuClick}
                    className="lg:hidden"
                    style={{ background: 'none', border: 'none', cursor: 'pointer', color: '#228B22', fontSize: '1.4rem', lineHeight: 1 }}
                    aria-label="Open menu"
                >
                    ☰
                </button>
                <h1 style={{
                    fontFamily: "'Playfair Display', serif",
                    fontSize: '22px',
                    fontWeight: '600',
                    color: '#333333',
                    margin: 0,
                }}>
                    {title || 'Admin Dashboard'}
                </h1>
            </div>

            {/* Right — bell, avatar, username, logout */}
            <div style={{ display: 'flex', alignItems: 'center', gap: '1rem' }}>

                {/* Notification Bell */}
                <div style={{ position: 'relative' }} ref={dropdownRef}>
                    <button
                        onClick={() => setShowDropdown(!showDropdown)}
                        style={{
                            background: 'none',
                            border: 'none',
                            cursor: 'pointer',
                            color: '#555',
                            padding: '0.4rem',
                            borderRadius: '50%',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            position: 'relative',
                        }}
                        title="Notifications"
                    >
                        <Bell size={20} strokeWidth={1.8} />
                        {notifications.total > 0 && (
                            <span style={{
                                position: 'absolute',
                                top: '0',
                                right: '0',
                                width: '18px',
                                height: '18px',
                                backgroundColor: '#dc3545',
                                borderRadius: '50%',
                                fontSize: '0.6rem',
                                fontWeight: '700',
                                color: 'white',
                                display: 'flex',
                                alignItems: 'center',
                                justifyContent: 'center',
                                fontFamily: "'Montserrat', sans-serif",
                            }}>
                                {notifications.total > 99 ? '99+' : notifications.total}
                            </span>
                        )}
                    </button>

                    {/* Dropdown */}
                    {showDropdown && (
                        <div style={{
                            position: 'absolute',
                            right: 0,
                            top: 'calc(100% + 8px)',
                            width: '280px',
                            background: 'white',
                            border: '1px solid #e5e7eb',
                            borderRadius: '8px',
                            boxShadow: '0 8px 24px rgba(0,0,0,0.12)',
                            zIndex: 50,
                        }}>
                            <div style={{ padding: '0.75rem 1rem', borderBottom: '1px solid #e5e7eb' }}>
                                <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '13px', color: '#228B22' }}>
                                    Notifications
                                </p>
                            </div>

                            <div>
                                {notifications.pending_testimonials > 0 && (
                                    <a href="/admin/content/testimonials"
                                        onClick={() => setShowDropdown(false)}
                                        style={{ display: 'flex', alignItems: 'center', padding: '0.75rem 1rem', textDecoration: 'none', gap: '0.75rem' }}
                                        onMouseEnter={e => e.currentTarget.style.background = '#f9fafb'}
                                        onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                                    >
                                        <span style={{ fontSize: '1.1rem' }}>⭐</span>
                                        <div style={{ flex: 1 }}>
                                            <p style={{ margin: 0, fontSize: '13px', fontWeight: '500', color: '#333', fontFamily: "'Montserrat', sans-serif" }}>
                                                {notifications.pending_testimonials} testimonial{notifications.pending_testimonials > 1 ? 's' : ''} pending
                                            </p>
                                            <p style={{ margin: 0, fontSize: '11px', color: '#888', fontFamily: "'Montserrat', sans-serif" }}>Waiting for approval</p>
                                        </div>
                                        <span style={{ background: '#E8B923', color: 'white', borderRadius: '999px', fontSize: '11px', fontWeight: '700', padding: '2px 7px', fontFamily: "'Montserrat', sans-serif" }}>
                                            {notifications.pending_testimonials}
                                        </span>
                                    </a>
                                )}

                                {notifications.new_bookings > 0 && (
                                    <a href="/admin/bookings"
                                        onClick={() => setShowDropdown(false)}
                                        style={{ display: 'flex', alignItems: 'center', padding: '0.75rem 1rem', textDecoration: 'none', gap: '0.75rem' }}
                                        onMouseEnter={e => e.currentTarget.style.background = '#f9fafb'}
                                        onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                                    >
                                        <span style={{ fontSize: '1.1rem' }}>📅</span>
                                        <div style={{ flex: 1 }}>
                                            <p style={{ margin: 0, fontSize: '13px', fontWeight: '500', color: '#333', fontFamily: "'Montserrat', sans-serif" }}>
                                                {notifications.new_bookings} new booking{notifications.new_bookings > 1 ? 's' : ''}
                                            </p>
                                            <p style={{ margin: 0, fontSize: '11px', color: '#888', fontFamily: "'Montserrat', sans-serif" }}>Pending confirmation</p>
                                        </div>
                                        <span style={{ background: '#228B22', color: 'white', borderRadius: '999px', fontSize: '11px', fontWeight: '700', padding: '2px 7px', fontFamily: "'Montserrat', sans-serif" }}>
                                            {notifications.new_bookings}
                                        </span>
                                    </a>
                                )}

                                {notifications.new_messages > 0 && (
                                    <a href="/admin/contact-messages"
                                        onClick={() => setShowDropdown(false)}
                                        style={{ display: 'flex', alignItems: 'center', padding: '0.75rem 1rem', textDecoration: 'none', gap: '0.75rem' }}
                                        onMouseEnter={e => e.currentTarget.style.background = '#f9fafb'}
                                        onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                                    >
                                        <span style={{ fontSize: '1.1rem' }}>✉️</span>
                                        <div style={{ flex: 1 }}>
                                            <p style={{ margin: 0, fontSize: '13px', fontWeight: '500', color: '#333', fontFamily: "'Montserrat', sans-serif" }}>
                                                {notifications.new_messages} unread message{notifications.new_messages > 1 ? 's' : ''}
                                            </p>
                                            <p style={{ margin: 0, fontSize: '11px', color: '#888', fontFamily: "'Montserrat', sans-serif" }}>New contact messages</p>
                                        </div>
                                        <span style={{ background: '#3B82F6', color: 'white', borderRadius: '999px', fontSize: '11px', fontWeight: '700', padding: '2px 7px', fontFamily: "'Montserrat', sans-serif" }}>
                                            {notifications.new_messages}
                                        </span>
                                    </a>
                                )}

                                {notifications.total === 0 && (
                                    <div style={{ padding: '1.5rem 1rem', textAlign: 'center' }}>
                                        <p style={{ margin: 0, fontSize: '13px', color: '#888', fontFamily: "'Montserrat', sans-serif" }}>All caught up ✅</p>
                                    </div>
                                )}
                            </div>

                            <div style={{ padding: '0.5rem 1rem', borderTop: '1px solid #e5e7eb', textAlign: 'center' }}>
                                <p style={{ margin: 0, fontSize: '11px', color: '#aaa', fontFamily: "'Montserrat', sans-serif" }}>Updates every 30 seconds</p>
                            </div>
                        </div>
                    )}
                </div>

                {/* Divider */}
                <div style={{ width: '1px', height: '28px', background: '#e5e7eb' }} />

                {/* Avatar + username */}
                <div style={{ display: 'flex', alignItems: 'center', gap: '0.6rem' }}>
                    <div style={{
                        width: '34px',
                        height: '34px',
                        borderRadius: '50%',
                        backgroundColor: '#228B22',
                        color: 'white',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontFamily: "'Montserrat', sans-serif",
                        fontWeight: '700',
                        fontSize: '13px',
                        flexShrink: 0,
                    }}>
                        {initials}
                    </div>
                    <span style={{
                        fontFamily: "'Montserrat', sans-serif",
                        fontSize: '14px',
                        fontWeight: '500',
                        color: '#333333',
                        whiteSpace: 'nowrap',
                    }} className="hidden sm:inline">
                        {user?.name || 'Admin'}
                    </span>
                </div>

                {/* Ghost logout button */}
                <button
                    onClick={() => router.post('/logout')}
                    onMouseEnter={() => setLogoutHover(true)}
                    onMouseLeave={() => setLogoutHover(false)}
                    style={{
                        fontFamily: "'Montserrat', sans-serif",
                        fontSize: '13px',
                        fontWeight: '500',
                        border: '1px solid #ef4444',
                        color: logoutHover ? 'white' : '#ef4444',
                        background: logoutHover ? '#ef4444' : 'transparent',
                        padding: '0.4rem 1rem',
                        borderRadius: '6px',
                        cursor: 'pointer',
                        transition: 'all 0.2s',
                        whiteSpace: 'nowrap',
                    }}
                >
                    Logout
                </button>
            </div>
        </header>
    );
}

export default Header;
