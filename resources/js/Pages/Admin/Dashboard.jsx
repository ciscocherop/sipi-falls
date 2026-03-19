import AdminLayout from '@/Layouts/AdminLayout';
import { usePage } from '@inertiajs/react';
import { Mail, CalendarCheck, Users, Newspaper, Star, AlertCircle } from 'lucide-react';
import { colors } from '@/theme';

const CARD_CONFIG = [
    {
        key: 'totalMessages',
        label: 'Total Messages',
        border: '#3B82F6',
        iconBg: '#EFF6FF',
        iconColor: '#3B82F6',
        Icon: Mail,
        trendKey: 'recentMessages',
        link: '/admin/contact-messages',
    },
    {
        key: 'totalBookings',
        label: 'Total Bookings',
        border: '#1a6b1a',
        iconBg: '#F0FDF4',
        iconColor: '#1a6b1a',
        Icon: CalendarCheck,
        trendKey: 'recentBookings',
        link: '/admin/bookings',
    },
    {
        key: 'totalSubscribers',
        label: 'Newsletter Subscribers',
        border: '#c9951a',
        iconBg: '#FFFBEB',
        iconColor: '#c9951a',
        Icon: Newspaper,
        trendKey: null,
        link: '/admin/newsletter-subscribers',
    },
    {
        key: 'totalUsers',
        label: 'Admin Users',
        border: '#1a6b1a',
        iconBg: '#F0FFF4',
        iconColor: '#1a6b1a',
        Icon: Users,
        trendKey: null,
        link: null,
    },
];

function statusStyle(status) {
    if (status === 'confirmed') return { background: '#1a6b1a', color: 'white' };
    if (status === 'pending') return { background: '#c9951a', color: 'white' };
    return { background: '#ef4444', color: 'white' };
}

function getGreeting() {
    const hour = new Date().getHours();
    if (hour < 12) return 'Good morning';
    if (hour < 17) return 'Good afternoon';
    return 'Good evening';
}

function Dashboard({ stats, recentActivity }) {
    const { auth } = usePage().props;
    const userName = auth?.user?.name || 'Admin';
    const pendingTestimonials = stats?.pendingTestimonials ?? 0;
    const pendingBookings = stats?.pendingBookings ?? 0;

    return (
        <AdminLayout title="Dashboard">
            <div style={{ background: '#F5F6F9', minHeight: '100%', padding: '2rem' }}>

                {/* Greeting Banner */}
                <div style={{
                    background: colors.primaryGreenDeep,
                    borderRadius: '16px',
                    padding: '2rem 2.5rem',
                    marginBottom: '1.5rem',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'space-between',
                    flexWrap: 'wrap',
                    gap: '1rem',
                }}>
                    <div>
                        <h1 style={{
                            fontFamily: "'Playfair Display', serif",
                            fontSize: '28px',
                            fontWeight: '700',
                            color: 'white',
                            margin: '0 0 0.35rem',
                        }}>
                            {getGreeting()}, {userName}! 👋
                        </h1>
                        <p style={{
                            fontFamily: "'Montserrat', sans-serif",
                            fontSize: '14px',
                            color: 'rgba(255,255,255,0.75)',
                            margin: 0,
                        }}>
                            Here's what's happening at Sipi Falls today.
                        </p>
                    </div>
                    <div style={{ textAlign: 'right' }}>
                        <p style={{
                            fontFamily: "'Montserrat', sans-serif",
                            fontSize: '13px',
                            color: 'rgba(255,255,255,0.7)',
                            margin: '0 0 0.25rem',
                        }}>
                            {new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
                        </p>
                        <p style={{
                            fontFamily: "'Playfair Display', serif",
                            fontSize: '22px',
                            fontWeight: '700',
                            color: '#c9951a',
                            margin: 0,
                        }}>
                            Sipi Falls 🌊
                        </p>
                    </div>
                </div>

                {/* Pending Alerts */}
                {(pendingTestimonials > 0 || pendingBookings > 0) && (
                    <div style={{ display: 'flex', gap: '1rem', marginBottom: '1.5rem', flexWrap: 'wrap' }}>
                        {pendingTestimonials > 0 && (
                            <a href="/admin/content/testimonials" style={{
                                display: 'flex', alignItems: 'center', gap: '0.75rem',
                                background: '#FFFBEB', border: '1px solid #c9951a',
                                borderRadius: '10px', padding: '0.875rem 1.25rem',
                                textDecoration: 'none', flex: '1', minWidth: '200px', transition: 'all 0.2s',
                            }}
                                onMouseEnter={e => e.currentTarget.style.background = '#FEF3C7'}
                                onMouseLeave={e => e.currentTarget.style.background = '#FFFBEB'}
                            >
                                <Star size={20} color="#c9951a" />
                                <div>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '700', color: '#c9951a' }}>
                                        {pendingTestimonials} testimonial{pendingTestimonials > 1 ? 's' : ''} pending approval
                                    </p>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#888' }}>
                                        Click to review and approve
                                    </p>
                                </div>
                                <AlertCircle size={16} color="#c9951a" style={{ marginLeft: 'auto' }} />
                            </a>
                        )}
                        {pendingBookings > 0 && (
                            <a href="/admin/bookings" style={{
                                display: 'flex', alignItems: 'center', gap: '0.75rem',
                                background: '#F0FDF4', border: '1px solid #1a6b1a',
                                borderRadius: '10px', padding: '0.875rem 1.25rem',
                                textDecoration: 'none', flex: '1', minWidth: '200px', transition: 'all 0.2s',
                            }}
                                onMouseEnter={e => e.currentTarget.style.background = '#DCFCE7'}
                                onMouseLeave={e => e.currentTarget.style.background = '#F0FDF4'}
                            >
                                <CalendarCheck size={20} color="#1a6b1a" />
                                <div>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '700', color: '#1a6b1a' }}>
                                        {pendingBookings} booking{pendingBookings > 1 ? 's' : ''} need confirmation
                                    </p>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#888' }}>
                                        Click to review and confirm
                                    </p>
                                </div>
                                <AlertCircle size={16} color="#1a6b1a" style={{ marginLeft: 'auto' }} />
                            </a>
                        )}
                    </div>
                )}

                {/* Stat Cards */}
                <div style={{
                    display: 'grid',
                    gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))',
                    gap: '1.25rem',
                    marginBottom: '1.5rem',
                }}>
                    {CARD_CONFIG.map(({ key, label, border, iconBg, iconColor, Icon, trendKey, link }) => {
                        const card = (
                            <div style={{
                                background: 'white',
                                borderRadius: '12px',
                                boxShadow: '0 2px 8px rgba(0,0,0,0.07)',
                                borderLeft: `4px solid ${border}`,
                                padding: '1.25rem 1.5rem',
                                display: 'flex',
                                flexDirection: 'column',
                                gap: '0.75rem',
                                transition: 'all 0.2s',
                                cursor: link ? 'pointer' : 'default',
                            }}
                                onMouseEnter={link ? e => { e.currentTarget.style.transform = 'translateY(-2px)'; e.currentTarget.style.boxShadow = '0 6px 20px rgba(0,0,0,0.12)'; } : undefined}
                                onMouseLeave={link ? e => { e.currentTarget.style.transform = 'translateY(0)'; e.currentTarget.style.boxShadow = '0 2px 8px rgba(0,0,0,0.07)'; } : undefined}
                            >
                                <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                                    <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#666', margin: 0, fontWeight: '500' }}>
                                        {label}
                                    </p>
                                    <div style={{
                                        width: '38px', height: '38px', borderRadius: '50%',
                                        background: iconBg, display: 'flex', alignItems: 'center',
                                        justifyContent: 'center', flexShrink: 0,
                                    }}>
                                        <Icon size={18} color={iconColor} strokeWidth={1.8} />
                                    </div>
                                </div>
                                <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '32px', fontWeight: '700', color: '#333', margin: 0, lineHeight: 1 }}>
                                    {stats[key] ?? 0}
                                </p>
                                {trendKey && stats[trendKey] > 0 && (
                                    <span style={{
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                        color: '#1a6b1a', background: '#F0FDF4', borderRadius: '999px',
                                        padding: '2px 10px', alignSelf: 'flex-start',
                                    }}>
                                        ↑ {stats[trendKey]} last 30 days
                                    </span>
                                )}
                            </div>
                        );
                        return link
                            ? <a key={key} href={link} style={{ textDecoration: 'none' }}>{card}</a>
                            : <div key={key}>{card}</div>;
                    })}
                </div>

                {/* Quick Actions */}
                <div style={{
                    background: 'white', borderRadius: '12px',
                    boxShadow: '0 2px 8px rgba(0,0,0,0.07)',
                    padding: '1.25rem 1.5rem', marginBottom: '1.5rem',
                }}>
                    <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: '0 0 1rem' }}>
                        Quick Actions
                    </h3>
                    <div style={{ display: 'flex', gap: '0.75rem', flexWrap: 'wrap' }}>
                        {[
                            { label: '+ Add Tour Guide', link: '/admin/content/tour-guides', color: '#1a6b1a' },
                            { label: '+ Add Testimonial', link: '/admin/content/testimonials', color: '#c9951a' },
                            { label: '📧 View Messages', link: '/admin/contact-messages', color: '#3B82F6' },
                            { label: '📅 View Bookings', link: '/admin/bookings', color: '#1a6b1a' },
                            { label: '✏️ Edit Content', link: '/admin/content', color: '#888' },
                        ].map(action => (
                            <a key={action.label} href={action.link} style={{
                                fontFamily: "'Montserrat', sans-serif",
                                fontSize: '13px', fontWeight: '600',
                                color: action.color, border: `2px solid ${action.color}`,
                                borderRadius: '8px', padding: '0.5rem 1.25rem',
                                textDecoration: 'none', transition: 'all 0.2s', display: 'inline-block',
                            }}
                                onMouseEnter={e => { e.currentTarget.style.background = action.color; e.currentTarget.style.color = 'white'; }}
                                onMouseLeave={e => { e.currentTarget.style.background = 'transparent'; e.currentTarget.style.color = action.color; }}
                            >
                                {action.label}
                            </a>
                        ))}
                    </div>
                </div>

                {/* Recent Activity */}
                <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(320px, 1fr))', gap: '1.25rem' }}>

                    {/* Recent Messages */}
                    <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                        <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0', display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                            <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>Recent Messages</h3>
                            <a href="/admin/contact-messages" style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#1a6b1a', textDecoration: 'none', fontWeight: '600' }}>View all →</a>
                        </div>
                        <div>
                            {recentActivity.messages.length > 0 ? recentActivity.messages.map((msg) => (
                                <div key={msg.id} style={{
                                    display: 'flex', alignItems: 'center', justifyContent: 'space-between',
                                    padding: '0.875rem 1.5rem', borderBottom: '1px solid #f9f9f9', transition: 'background 0.15s',
                                }}
                                    onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                    onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                                >
                                    <div>
                                        <p style={{ margin: '0 0 2px', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '500', color: '#333' }}>{msg.fullname}</p>
                                        <p style={{ margin: '0 0 2px', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#666' }}>{msg.subject}</p>
                                        <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>{new Date(msg.created_at).toLocaleDateString()}</p>
                                    </div>
                                    {!msg.is_read && (
                                        <span style={{ width: '8px', height: '8px', borderRadius: '50%', background: '#3B82F6', flexShrink: 0, marginLeft: '1rem' }} title="Unread" />
                                    )}
                                </div>
                            )) : (
                                <p style={{ padding: '2rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '13px' }}>No messages yet</p>
                            )}
                        </div>
                    </div>

                    {/* Recent Bookings */}
                    <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                        <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0', display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                            <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>Recent Bookings</h3>
                            <a href="/admin/bookings" style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#1a6b1a', textDecoration: 'none', fontWeight: '600' }}>View all →</a>
                        </div>
                        <div>
                            {recentActivity.bookings.length > 0 ? recentActivity.bookings.map((booking) => (
                                <div key={booking.id} style={{
                                    display: 'flex', alignItems: 'center', justifyContent: 'space-between',
                                    padding: '0.875rem 1.5rem', borderBottom: '1px solid #f9f9f9', transition: 'background 0.15s',
                                }}
                                    onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                    onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                                >
                                    <div>
                                        <p style={{ margin: '0 0 2px', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '500', color: '#333' }}>{booking.fullname}</p>
                                        <p style={{ margin: '0 0 2px', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#666' }}>Travel: {new Date(booking.date_of_travel).toLocaleDateString()}</p>
                                        <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>Booked: {new Date(booking.created_at).toLocaleDateString()}</p>
                                    </div>
                                    <span style={{
                                        ...statusStyle(booking.status),
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600',
                                        padding: '3px 10px', borderRadius: '999px', textTransform: 'capitalize',
                                        flexShrink: 0, marginLeft: '1rem',
                                    }}>
                                        {booking.status}
                                    </span>
                                </div>
                            )) : (
                                <p style={{ padding: '2rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '13px' }}>No bookings yet</p>
                            )}
                        </div>
                    </div>

                </div>
            </div>
        </AdminLayout>
    );
}

export default Dashboard;
