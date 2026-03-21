import { Link, usePage } from '@inertiajs/react';
import { LayoutDashboard, Mail, CalendarCheck, Newspaper, FileText, Hotel, Users } from 'lucide-react';

const NAV_GROUPS = [
    {
        label: null,
        items: [
            { name: 'Dashboard', href: '/admin/dashboard', icon: LayoutDashboard },
        ]
    },
    {
        label: 'Manage',
        items: [
            { name: 'Contact Messages', href: '/admin/contact-messages', icon: Mail },
            { name: 'Bookings', href: '/admin/bookings', icon: CalendarCheck },
            { name: 'Newsletter', href: '/admin/newsletter-subscribers', icon: Newspaper },
            { name: 'Accommodations', href: '/admin/accommodations', icon: Hotel },
        ]
    },
    {
        label: 'Site',
        items: [
            { name: 'Content', href: '/admin/content', icon: FileText },
        ]
    },
];

function Sidebar({ isOpen, onClose }) {
    const { url } = usePage();
    const isActive = (href) => url.startsWith(href);

    return (
        <>
            {/* Mobile backdrop */}
            {isOpen && (
                <div
                    style={{ position: 'fixed', inset: 0, background: 'rgba(0,0,0,0.5)', zIndex: 20 }}
                    className="lg:hidden"
                    onClick={onClose}
                />
            )}

            {/* Sidebar */}
            <aside
                className={`fixed lg:static inset-y-0 left-0 z-30 w-64 flex flex-col transform transition-transform duration-300 ease-in-out ${isOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'}`}
                style={{ background: '#0d1f0d', minHeight: '100vh' }}
            >
                {/* Brand */}
                <div style={{ padding: '1.5rem 1.5rem 1.25rem', borderBottom: '1px solid rgba(255,255,255,0.08)' }}>
                    <div style={{ display: 'flex', alignItems: 'flex-start', justifyContent: 'space-between' }}>
                        <div>
                            <h2 style={{ fontFamily: "'Playfair Display', serif", color: 'white', fontSize: '1.2rem', fontWeight: '700', margin: '0 0 0.15rem', lineHeight: 1.3 }}>
                                Sipi Falls
                            </h2>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '10px', color: '#c9951a', letterSpacing: '0.2em', textTransform: 'uppercase', margin: '0 0 0.75rem' }}>
                                Keep Sipping
                            </p>
                            <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', background: 'rgba(201,149,26,0.15)', color: '#c9951a', border: '1px solid rgba(201,149,26,0.3)', borderRadius: '999px', padding: '2px 10px', fontWeight: '600' }}>
                                Admin Panel
                            </span>
                        </div>
                        <button onClick={onClose} className="lg:hidden"
                            style={{ color: 'rgba(255,255,255,0.5)', fontSize: '1.1rem', background: 'none', border: 'none', cursor: 'pointer', marginTop: '0.25rem' }}
                            aria-label="Close menu">
                            ✕
                        </button>
                    </div>
                </div>

                {/* Navigation */}
                <nav style={{ flex: 1, padding: '1rem 0.75rem', overflowY: 'auto' }}>
                    {NAV_GROUPS.map((group, gi) => (
                        <div key={gi} style={{ marginBottom: '0.5rem' }}>
                            {group.label && (
                                <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '10px', fontWeight: '700', color: 'rgba(255,255,255,0.3)', letterSpacing: '0.15em', textTransform: 'uppercase', padding: '0.5rem 1rem', margin: gi > 0 ? '0.5rem 0 0.25rem' : '0 0 0.25rem' }}>
                                    {group.label}
                                </p>
                            )}
                            {group.items.map((item) => {
                                const active = isActive(item.href);
                                const Icon = item.icon;
                                return (
                                    <Link key={item.href} href={item.href}
                                        style={{ display: 'flex', alignItems: 'center', gap: '0.75rem', padding: '0.7rem 1rem', marginBottom: '0.15rem', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: active ? '600' : '400', color: active ? '#c9951a' : 'rgba(255,255,255,0.75)', backgroundColor: active ? 'rgba(201,149,26,0.12)' : 'transparent', borderLeft: `3px solid ${active ? '#c9951a' : 'transparent'}`, textDecoration: 'none', transition: 'all 0.2s' }}
                                        onMouseEnter={e => { if (!active) { e.currentTarget.style.backgroundColor = 'rgba(255,255,255,0.06)'; e.currentTarget.style.color = 'white'; } }}
                                        onMouseLeave={e => { if (!active) { e.currentTarget.style.backgroundColor = 'transparent'; e.currentTarget.style.color = 'rgba(255,255,255,0.75)'; } }}
                                    >
                                        <Icon size={17} strokeWidth={1.8} />
                                        <span>{item.name}</span>
                                    </Link>
                                );
                            })}
                            {gi < NAV_GROUPS.length - 1 && group.label && (
                                <div style={{ height: '1px', background: 'rgba(255,255,255,0.06)', margin: '0.5rem 1rem' }} />
                            )}
                        </div>
                    ))}
                </nav>

                {/* Footer */}
                <div style={{ padding: '1rem 1.5rem', borderTop: '1px solid rgba(255,255,255,0.08)' }}>
                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', marginBottom: '0.5rem' }}>
                        <div style={{ width: '6px', height: '6px', borderRadius: '50%', background: '#1a6b1a' }} />
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: 'rgba(255,255,255,0.4)', margin: 0 }}>
                            System Online
                        </p>
                    </div>
                    <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: 'rgba(255,255,255,0.25)', margin: 0 }}>
                        Sipi Falls © 2026
                    </p>
                </div>
            </aside>
        </>
    );
}

export default Sidebar;
