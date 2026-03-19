import { Link, usePage } from '@inertiajs/react';
import { LayoutDashboard, Mail, CalendarCheck, Newspaper, FileText, Hotel } from 'lucide-react';
import { colors } from '@/theme';

const navigationItems = [
    { name: 'Dashboard', href: '/admin/dashboard', icon: LayoutDashboard },
    { name: 'Contact Messages', href: '/admin/contact-messages', icon: Mail },
    { name: 'Bookings', href: '/admin/bookings', icon: CalendarCheck },
    { name: 'Newsletter', href: '/admin/newsletter-subscribers', icon: Newspaper },
    { name: 'Accommodations', href: '/admin/accommodations', icon: Hotel },
    { name: 'Content', href: '/admin/content', icon: FileText },
];

function Sidebar({ isOpen, onClose }) {
    const { url } = usePage();

    const isActive = (href) => url.startsWith(href);

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
                className={`
                    fixed lg:static inset-y-0 left-0 z-30
                    w-64 flex flex-col
                    transform transition-transform duration-300 ease-in-out
                    ${isOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'}
                `}
                style={{
                    background: colors.primaryGreenDeep,
                }}
            >
                {/* Brand */}
                <div
                    className="flex items-center justify-between px-6 py-5 border-b"
                    style={{ borderColor: 'rgba(255,255,255,0.12)' }}
                >
                    <h2 style={{
                        fontFamily: "'Playfair Display', serif",
                        color: '#E8B923',
                        fontSize: '1.2rem',
                        fontWeight: '700',
                        margin: 0,
                        lineHeight: 1.3,
                    }}>
                        Sipi Falls Admin
                    </h2>
                    <button
                        onClick={onClose}
                        className="lg:hidden transition-opacity hover:opacity-70"
                        style={{ color: 'rgba(255,255,255,0.7)', fontSize: '1.1rem', background: 'none', border: 'none', cursor: 'pointer' }}
                        aria-label="Close menu"
                    >
                        ✕
                    </button>
                </div>

                {/* Navigation */}
                <nav className="flex-1 px-3 py-4" style={{ overflowY: 'auto' }}>
                    {navigationItems.map((item) => {
                        const active = isActive(item.href);
                        const Icon = item.icon;
                        return (
                            <Link
                                key={item.href}
                                href={item.href}
                                className="flex items-center space-x-3 px-4 py-3 mb-1 rounded-md transition-all duration-200"
                                style={{
                                    fontFamily: "'Montserrat', sans-serif",
                                    fontSize: '15px',
                                    fontWeight: active ? '600' : '400',
                                    color: active ? '#E8B923' : 'white',
                                    backgroundColor: active ? 'rgba(255,255,255,0.12)' : 'transparent',
                                    borderLeft: active ? '3px solid #E8B923' : '3px solid transparent',
                                    textDecoration: 'none',
                                }}
                                onMouseEnter={(e) => {
                                    if (!active) e.currentTarget.style.backgroundColor = 'rgba(255,255,255,0.08)';
                                }}
                                onMouseLeave={(e) => {
                                    if (!active) e.currentTarget.style.backgroundColor = 'transparent';
                                }}
                            >
                                <Icon size={18} strokeWidth={1.8} />
                                <span>{item.name}</span>
                            </Link>
                        );
                    })}
                </nav>

                {/* Footer */}
                <div
                    className="px-6 py-4 border-t"
                    style={{ borderColor: 'rgba(255,255,255,0.12)' }}
                >
                    <p style={{
                        fontFamily: "'Montserrat', sans-serif",
                        fontSize: '11px',
                        color: 'rgba(255,255,255,0.4)',
                        margin: 0,
                    }}>
                        Sipi Falls © 2026
                    </p>
                </div>
            </aside>
        </>
    );
}

export default Sidebar;
