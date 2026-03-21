import { Link } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';

const PAGE_CONFIG = {
    contact: { emoji: '📞', desc: 'Update contact details, phone, email and address', color: '#3B82F6' },
    about: { emoji: 'ℹ️', desc: 'Edit the about page content and description', color: '#1a6b1a' },
    travelguide: { emoji: '🗺️', desc: 'Manage travel tips and visitor information', color: '#c9951a' },
    tourguides: { emoji: '👨‍🏫', desc: 'Manage tour guides shown on the About page', color: '#1a6b1a' },
    testimonials: { emoji: '⭐', desc: 'Manage customer testimonials on the Home page', color: '#c9951a' },
};

function Index({ pages }) {
    return (
        <AdminLayout title="Content Management">
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Header */}
                <div style={{ marginBottom: '1.5rem' }}>
                    <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>
                        Content Management
                    </h1>
                    <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                        Edit content for your website pages
                    </p>
                </div>

                {/* Page Cards */}
                <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))', gap: '1.25rem' }}>
                    {Object.entries(pages).map(([key, name]) => {
                        const config = PAGE_CONFIG[key] || { emoji: '📄', desc: 'Edit page content', color: '#888' };
                        return (
                            <div key={key} style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden', transition: 'all 0.2s' }}
                                onMouseEnter={e => { e.currentTarget.style.transform = 'translateY(-3px)'; e.currentTarget.style.boxShadow = '0 8px 24px rgba(0,0,0,0.12)'; }}
                                onMouseLeave={e => { e.currentTarget.style.transform = 'translateY(0)'; e.currentTarget.style.boxShadow = '0 2px 8px rgba(0,0,0,0.07)'; }}
                            >
                                <div style={{ height: '4px', background: config.color }} />
                                <div style={{ padding: '1.5rem' }}>
                                    <div style={{ display: 'flex', alignItems: 'center', gap: '1rem', marginBottom: '1rem' }}>
                                        <div style={{ width: '48px', height: '48px', borderRadius: '12px', background: `${config.color}15`, display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '24px', flexShrink: 0 }}>
                                            {config.emoji}
                                        </div>
                                        <h3 style={{ fontFamily: "'Playfair Display', serif", fontSize: '18px', fontWeight: '700', color: '#0d1f0d', margin: 0 }}>
                                            {name}
                                        </h3>
                                    </div>
                                    <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', lineHeight: '1.6', margin: '0 0 1.25rem' }}>
                                        {config.desc}
                                    </p>
                                    <Link
                                        href={`/admin/content/${key}/edit`}
                                        style={{ display: 'block', textAlign: 'center', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: config.color, color: 'white', border: 'none', borderRadius: '8px', padding: '0.65rem 1.25rem', textDecoration: 'none', transition: 'opacity 0.2s' }}
                                        onMouseEnter={e => e.currentTarget.style.opacity = '0.85'}
                                        onMouseLeave={e => e.currentTarget.style.opacity = '1'}
                                    >
                                        ✏️ Edit Content
                                    </Link>
                                </div>
                            </div>
                        );
                    })}
                </div>

            </div>
        </AdminLayout>
    );
}

export default Index;
