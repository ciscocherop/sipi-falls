import React, { useState } from 'react';
import { router, Link } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';

function Index({ messages, filters, counts }) {
    const [search, setSearch] = useState(filters.search || '');
    const [status, setStatus] = useState(filters.status || 'all');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/admin/contact-messages', { search, status }, { preserveState: true, replace: true });
    };

    const handleStatusFilter = (newStatus) => {
        setStatus(newStatus);
        router.get('/admin/contact-messages', { search, status: newStatus }, { preserveState: true, replace: true });
    };

    const handleToggleRead = (id) => {
        router.post(`/admin/contact-messages/${id}/toggle-read`, {}, { preserveState: true });
    };

    const handleDelete = (id) => {
        if (confirm('Delete this message?')) {
            router.delete(`/admin/contact-messages/${id}`);
        }
    };

    return (
        <AdminLayout title="Contact Messages">
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Header */}
                <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '1.5rem', flexWrap: 'wrap', gap: '1rem' }}>
                    <div>
                        <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>
                            Contact Messages
                        </h1>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            <span style={{ color: '#3B82F6', fontWeight: '600' }}>{counts.unread} unread</span> of {counts.total} total messages
                        </p>
                    </div>
                </div>

                {/* Filters */}
                <div style={{ background: 'white', borderRadius: '12px', padding: '1.25rem 1.5rem', marginBottom: '1.5rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', display: 'flex', gap: '1rem', flexWrap: 'wrap', alignItems: 'center' }}>
                    <form onSubmit={handleSearch} style={{ display: 'flex', gap: '0.75rem', flex: 1, minWidth: '250px' }}>
                        <input
                            type="text"
                            value={search}
                            onChange={e => setSearch(e.target.value)}
                            placeholder="Search by name, email or subject..."
                            style={{ flex: 1, padding: '0.6rem 1rem', border: '2px solid #e0e0e0', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', outline: 'none' }}
                            onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                            onBlur={e => e.target.style.borderColor = '#e0e0e0'}
                        />
                        <button type="submit" style={{ background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.25rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', cursor: 'pointer' }}>
                            Search
                        </button>
                    </form>
                    <div style={{ display: 'flex', gap: '0.5rem' }}>
                        {['all', 'unread', 'read'].map(s => (
                            <button key={s} onClick={() => handleStatusFilter(s)} style={{
                                fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer',
                                border: '2px solid', borderColor: status === s ? '#1a6b1a' : '#e0e0e0',
                                background: status === s ? '#1a6b1a' : 'white',
                                color: status === s ? 'white' : '#666',
                                textTransform: 'capitalize', transition: 'all 0.2s',
                            }}>
                                {s === 'unread' ? `Unread (${counts.unread})` : s.charAt(0).toUpperCase() + s.slice(1)}
                            </button>
                        ))}
                    </div>
                </div>

                {/* Messages List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>
                            All Messages
                        </h3>
                    </div>

                    {messages.data.length === 0 ? (
                        <p style={{ padding: '3rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '14px' }}>
                            No messages found
                        </p>
                    ) : (
                        messages.data.map((msg, i) => (
                            <div key={msg.id} style={{
                                display: 'flex', alignItems: 'center', gap: '1rem',
                                padding: '1rem 1.5rem',
                                borderBottom: i < messages.data.length - 1 ? '1px solid #f5f5f5' : 'none',
                                background: !msg.is_read ? 'rgba(59,130,246,0.04)' : 'transparent',
                                transition: 'background 0.15s',
                            }}
                                onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                onMouseLeave={e => e.currentTarget.style.background = !msg.is_read ? 'rgba(59,130,246,0.04)' : 'transparent'}
                            >
                                {/* Unread dot */}
                                <div style={{ width: '10px', height: '10px', borderRadius: '50%', background: !msg.is_read ? '#3B82F6' : 'transparent', flexShrink: 0 }} />

                                {/* Avatar */}
                                <div style={{ width: '42px', height: '42px', borderRadius: '50%', background: '#1a6b1a', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                                    <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '700', color: 'white' }}>
                                        {msg.first_name?.[0]}{msg.last_name?.[0]}
                                    </span>
                                </div>

                                {/* Content */}
                                <div style={{ flex: 1, minWidth: 0 }}>
                                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', marginBottom: '0.2rem', flexWrap: 'wrap' }}>
                                        <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: !msg.is_read ? '700' : '500', color: '#333' }}>
                                            {msg.first_name} {msg.last_name}
                                        </p>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>
                                            {msg.email}
                                        </span>
                                    </div>
                                    <p style={{ margin: '0 0 0.2rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: !msg.is_read ? '600' : '400', color: '#555', overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>
                                        {msg.subject}
                                    </p>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>
                                        {new Date(msg.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                                    </p>
                                </div>

                                {/* Actions */}
                                <div style={{ display: 'flex', gap: '0.5rem', flexShrink: 0 }}>
                                    <Link href={`/admin/contact-messages/${msg.id}`} style={{
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                        background: '#EFF6FF', color: '#3B82F6', border: '1px solid #3B82F6',
                                        borderRadius: '6px', padding: '0.4rem 0.75rem', textDecoration: 'none',
                                        display: 'inline-block',
                                    }}>
                                        View
                                    </Link>
                                    <button onClick={() => handleToggleRead(msg.id)} style={{
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                        background: msg.is_read ? '#FFFBEB' : '#F0FDF4',
                                        color: msg.is_read ? '#c9951a' : '#1a6b1a',
                                        border: `1px solid ${msg.is_read ? '#c9951a' : '#1a6b1a'}`,
                                        borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer',
                                    }}>
                                        {msg.is_read ? 'Mark Unread' : 'Mark Read'}
                                    </button>
                                    <button onClick={() => handleDelete(msg.id)} style={{
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                        background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545',
                                        borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer',
                                    }}>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                {/* Pagination */}
                {messages.links && messages.links.length > 3 && (
                    <div style={{ display: 'flex', justifyContent: 'center', gap: '0.5rem', marginTop: '1.5rem', flexWrap: 'wrap' }}>
                        {messages.links.map((link, index) => (
                            <Link key={index} href={link.url || '#'}
                                style={{
                                    padding: '0.5rem 1rem', borderRadius: '8px', textDecoration: 'none',
                                    fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600',
                                    background: link.active ? '#1a6b1a' : 'white',
                                    color: link.active ? 'white' : '#666',
                                    border: '1px solid', borderColor: link.active ? '#1a6b1a' : '#e0e0e0',
                                    pointerEvents: link.url ? 'auto' : 'none', opacity: link.url ? 1 : 0.4,
                                }}
                                dangerouslySetInnerHTML={{ __html: link.label }}
                            />
                        ))}
                    </div>
                )}

            </div>
        </AdminLayout>
    );
}

export default Index;
