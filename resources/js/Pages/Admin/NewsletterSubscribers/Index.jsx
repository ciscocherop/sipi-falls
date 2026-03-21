import React, { useState, useEffect } from 'react';
import { router, Link, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';

function Index({ subscribers, activeCount, filters }) {
    const [search, setSearch] = useState(filters.search || '');
    const { flash } = usePage().props;
    const [flashMsg, setFlashMsg] = useState(null);

    useEffect(() => {
        if (flash.success || flash.error) {
            setFlashMsg({ type: flash.success ? 'success' : 'error', text: flash.success || flash.error });
            const t = setTimeout(() => setFlashMsg(null), 4000);
            return () => clearTimeout(t);
        }
    }, [flash]);

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/admin/newsletter-subscribers', { search }, { preserveState: true, preserveScroll: true });
    };

    const handleToggleStatus = (id) => {
        router.post(`/admin/newsletter-subscribers/${id}/toggle-status`, {}, { preserveState: true, preserveScroll: true });
    };

    const handleDelete = (id) => {
        if (confirm('Delete this subscriber permanently?')) {
            router.delete(`/admin/newsletter-subscribers/${id}`, { preserveState: true, preserveScroll: true });
        }
    };

    return (
        <AdminLayout title="Newsletter Subscribers">
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Flash */}
                {flashMsg && (
                    <div style={{ background: flashMsg.type === 'success' ? '#F0FDF4' : '#FEE2E2', borderLeft: `4px solid ${flashMsg.type === 'success' ? '#1a6b1a' : '#dc3545'}`, borderRadius: '8px', padding: '1rem 1.5rem', marginBottom: '1.5rem', display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: flashMsg.type === 'success' ? '#1a6b1a' : '#dc3545', margin: 0 }}>
                            {flashMsg.type === 'success' ? '✓' : '✕'} {flashMsg.text}
                        </p>
                        <button onClick={() => setFlashMsg(null)} style={{ background: 'none', border: 'none', cursor: 'pointer', color: '#888', fontSize: '1.2rem' }}>×</button>
                    </div>
                )}

                {/* Header */}
                <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '1.5rem', flexWrap: 'wrap', gap: '1rem' }}>
                    <div>
                        <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>
                            Newsletter Subscribers
                        </h1>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            <span style={{ color: '#1a6b1a', fontWeight: '600' }}>{activeCount} active</span> of {subscribers.total} total subscribers
                        </p>
                    </div>
                    <Link href="/admin/newsletter-subscribers/compose" style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', textDecoration: 'none', display: 'inline-block' }}>
                        📧 Send Newsletter
                    </Link>
                </div>

                {/* Stats Strip */}
                <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(160px, 1fr))', gap: '1rem', marginBottom: '1.5rem' }}>
                    {[
                        { label: 'Active', count: activeCount, color: '#1a6b1a', border: '#1a6b1a' },
                        { label: 'Total', count: subscribers.total, color: '#3B82F6', border: '#3B82F6' },
                        { label: 'Unsubscribed', count: subscribers.total - activeCount, color: '#dc3545', border: '#dc3545' },
                    ].map(stat => (
                        <div key={stat.label} style={{ background: 'white', borderRadius: '12px', padding: '1.25rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', borderLeft: `4px solid ${stat.border}` }}>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#888', margin: '0 0 0.25rem', fontWeight: '500' }}>{stat.label}</p>
                            <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '28px', fontWeight: '700', color: stat.color, margin: 0, lineHeight: 1 }}>{stat.count}</p>
                        </div>
                    ))}
                </div>

                {/* Search */}
                <div style={{ background: 'white', borderRadius: '12px', padding: '1.25rem 1.5rem', marginBottom: '1.5rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)' }}>
                    <form onSubmit={handleSearch} style={{ display: 'flex', gap: '0.75rem', flexWrap: 'wrap' }}>
                        <input
                            type="text" value={search} onChange={e => setSearch(e.target.value)}
                            placeholder="Search by email..."
                            style={{ flex: 1, minWidth: '200px', padding: '0.6rem 1rem', border: '2px solid #e0e0e0', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', outline: 'none' }}
                            onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                            onBlur={e => e.target.style.borderColor = '#e0e0e0'}
                        />
                        <button type="submit" style={{ background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.25rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', cursor: 'pointer' }}>
                            Search
                        </button>
                        {filters.search && (
                            <button type="button" onClick={() => { setSearch(''); router.get('/admin/newsletter-subscribers'); }} style={{ background: 'white', color: '#888', border: '2px solid #e0e0e0', borderRadius: '8px', padding: '0.6rem 1rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', cursor: 'pointer' }}>
                                Clear
                            </button>
                        )}
                    </form>
                </div>

                {/* Subscribers List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>
                            All Subscribers
                        </h3>
                    </div>

                    {subscribers.data.length === 0 ? (
                        <p style={{ padding: '3rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '14px' }}>
                            No subscribers found
                        </p>
                    ) : (
                        subscribers.data.map((sub, i) => (
                            <div key={sub.id} style={{
                                display: 'flex', alignItems: 'center', gap: '1rem',
                                padding: '1rem 1.5rem',
                                borderBottom: i < subscribers.data.length - 1 ? '1px solid #f5f5f5' : 'none',
                                transition: 'background 0.15s',
                            }}
                                onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                            >
                                {/* Avatar */}
                                <div style={{ width: '38px', height: '38px', borderRadius: '50%', background: sub.status === 'active' ? '#1a6b1a' : '#e0e0e0', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                                    <span style={{ fontSize: '16px' }}>📧</span>
                                </div>

                                {/* Info */}
                                <div style={{ flex: 1, minWidth: 0 }}>
                                    <p style={{ margin: '0 0 0.2rem', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#333', overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>
                                        {sub.email}
                                    </p>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>
                                        Subscribed {new Date(sub.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                                    </p>
                                </div>

                                {/* Status badge */}
                                <span style={{
                                    fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600',
                                    background: sub.status === 'active' ? '#F0FDF4' : '#f5f5f5',
                                    color: sub.status === 'active' ? '#1a6b1a' : '#888',
                                    border: `1px solid ${sub.status === 'active' ? '#1a6b1a' : '#e0e0e0'}`,
                                    borderRadius: '999px', padding: '0.3rem 0.75rem', flexShrink: 0,
                                }}>
                                    {sub.status === 'active' ? 'Active' : 'Unsubscribed'}
                                </span>

                                {/* Actions */}
                                <div style={{ display: 'flex', gap: '0.4rem', flexShrink: 0 }}>
                                    <button onClick={() => handleToggleStatus(sub.id)} style={{
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                        background: sub.status === 'active' ? '#FFFBEB' : '#F0FDF4',
                                        color: sub.status === 'active' ? '#c9951a' : '#1a6b1a',
                                        border: `1px solid ${sub.status === 'active' ? '#c9951a' : '#1a6b1a'}`,
                                        borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer',
                                    }}>
                                        {sub.status === 'active' ? 'Unsubscribe' : 'Reactivate'}
                                    </button>
                                    <button onClick={() => handleDelete(sub.id)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                        🗑️
                                    </button>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                {/* Pagination */}
                {subscribers.last_page > 1 && (
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: '1.5rem', flexWrap: 'wrap', gap: '1rem' }}>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            Showing {subscribers.from}–{subscribers.to} of {subscribers.total}
                        </p>
                        <div style={{ display: 'flex', gap: '0.5rem', flexWrap: 'wrap' }}>
                            {subscribers.links.map((link, index) => (
                                <button key={index} onClick={() => link.url && router.get(link.url)} disabled={!link.url}
                                    style={{ padding: '0.5rem 1rem', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: link.active ? '#1a6b1a' : 'white', color: link.active ? 'white' : '#666', border: '1px solid', borderColor: link.active ? '#1a6b1a' : '#e0e0e0', cursor: link.url ? 'pointer' : 'default', opacity: link.url ? 1 : 0.4 }}
                                    dangerouslySetInnerHTML={{ __html: link.label }}
                                />
                            ))}
                        </div>
                    </div>
                )}

            </div>
        </AdminLayout>
    );
}

export default Index;
