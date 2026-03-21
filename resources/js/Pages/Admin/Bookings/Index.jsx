import React, { useState } from 'react';
import { router, Link } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';

function Index({ bookings, filters, counts }) {
    const [search, setSearch] = useState(filters.search || '');
    const [status, setStatus] = useState(filters.status || 'all');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/admin/bookings', { search, status }, { preserveState: true, replace: true });
    };

    const handleStatusFilter = (newStatus) => {
        setStatus(newStatus);
        router.get('/admin/bookings', { search, status: newStatus }, { preserveState: true, replace: true });
    };

    const handleUpdateStatus = (id, newStatus) => {
        router.post(`/admin/bookings/${id}/update-status`, { status: newStatus }, { preserveState: true });
    };

    const handleDelete = (id) => {
        if (confirm('Delete this booking?')) {
            router.delete(`/admin/bookings/${id}`);
        }
    };

    const statusConfig = {
        confirmed: { bg: '#F0FDF4', color: '#1a6b1a', border: '#1a6b1a', label: 'Confirmed' },
        pending: { bg: '#FFFBEB', color: '#c9951a', border: '#c9951a', label: 'Pending' },
        cancelled: { bg: '#FEE2E2', color: '#dc3545', border: '#dc3545', label: 'Cancelled' },
    };

    const getStatus = (s) => statusConfig[s] || { bg: '#f5f5f5', color: '#888', border: '#888', label: s };

    return (
        <AdminLayout title="Bookings">
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Header */}
                <div style={{ marginBottom: '1.5rem' }}>
                    <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>
                        Bookings
                    </h1>
                    <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                        {counts.total} total bookings
                    </p>
                </div>

                {/* Stats Strip */}
                <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(160px, 1fr))', gap: '1rem', marginBottom: '1.5rem' }}>
                    {[
                        { label: 'Pending', count: counts.pending, emoji: '⏳', color: '#c9951a', border: '#c9951a' },
                        { label: 'Confirmed', count: counts.confirmed, emoji: '✅', color: '#1a6b1a', border: '#1a6b1a' },
                        { label: 'Cancelled', count: counts.cancelled, emoji: '❌', color: '#dc3545', border: '#dc3545' },
                        { label: 'Total', count: counts.total, emoji: '📅', color: '#3B82F6', border: '#3B82F6' },
                    ].map(stat => (
                        <div key={stat.label} style={{
                            background: 'white', borderRadius: '12px', padding: '1.25rem',
                            boxShadow: '0 2px 8px rgba(0,0,0,0.07)', borderLeft: `4px solid ${stat.border}`,
                            display: 'flex', alignItems: 'center', justifyContent: 'space-between',
                        }}>
                            <div>
                                <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#888', margin: '0 0 0.25rem', fontWeight: '500' }}>{stat.label}</p>
                                <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '28px', fontWeight: '700', color: stat.color, margin: 0, lineHeight: 1 }}>{stat.count}</p>
                            </div>
                            <span style={{ fontSize: '28px' }}>{stat.emoji}</span>
                        </div>
                    ))}
                </div>

                {/* Filters */}
                <div style={{
                    background: 'white', borderRadius: '12px', padding: '1.25rem 1.5rem',
                    marginBottom: '1.5rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)',
                    display: 'flex', gap: '1rem', flexWrap: 'wrap', alignItems: 'center',
                }}>
                    <form onSubmit={handleSearch} style={{ display: 'flex', gap: '0.75rem', flex: 1, minWidth: '250px' }}>
                        <input
                            type="text"
                            value={search}
                            onChange={e => setSearch(e.target.value)}
                            placeholder="Search by name or email..."
                            style={{ flex: 1, padding: '0.6rem 1rem', border: '2px solid #e0e0e0', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', outline: 'none' }}
                            onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                            onBlur={e => e.target.style.borderColor = '#e0e0e0'}
                        />
                        <button type="submit" style={{ background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.25rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', cursor: 'pointer' }}>
                            Search
                        </button>
                    </form>
                    <div style={{ display: 'flex', gap: '0.5rem', flexWrap: 'wrap' }}>
                        {['all', 'pending', 'confirmed', 'cancelled'].map(s => (
                            <button key={s} onClick={() => handleStatusFilter(s)} style={{
                                fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600',
                                padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer',
                                border: '2px solid', borderColor: status === s ? '#1a6b1a' : '#e0e0e0',
                                background: status === s ? '#1a6b1a' : 'white',
                                color: status === s ? 'white' : '#666',
                                textTransform: 'capitalize', transition: 'all 0.2s',
                            }}>
                                {s.charAt(0).toUpperCase() + s.slice(1)}
                            </button>
                        ))}
                    </div>
                </div>

                {/* Bookings List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>All Bookings</h3>
                    </div>

                    {bookings.data.length === 0 ? (
                        <p style={{ padding: '3rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '14px' }}>
                            No bookings found
                        </p>
                    ) : (
                        bookings.data.map((booking, i) => {
                            const s = getStatus(booking.status);
                            return (
                                <div key={booking.id} style={{
                                    display: 'flex', alignItems: 'center', gap: '1rem',
                                    padding: '1rem 1.5rem',
                                    borderBottom: i < bookings.data.length - 1 ? '1px solid #f5f5f5' : 'none',
                                    transition: 'background 0.15s',
                                }}
                                    onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                    onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                                >
                                    {/* Avatar */}
                                    <div style={{ width: '42px', height: '42px', borderRadius: '50%', background: '#0d1f0d', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '700', color: 'white' }}>
                                            {booking.fullname?.[0]}
                                        </span>
                                    </div>

                                    {/* Info */}
                                    <div style={{ flex: 1, minWidth: 0 }}>
                                        <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', marginBottom: '0.2rem', flexWrap: 'wrap' }}>
                                            <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#333' }}>{booking.fullname}</p>
                                            <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>{booking.email}</span>
                                        </div>
                                        <div style={{ display: 'flex', gap: '1rem', flexWrap: 'wrap' }}>
                                            <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#666' }}>
                                                🗓️ Travel: <strong>{new Date(booking.date_of_travel).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</strong>
                                            </p>
                                            <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#666' }}>
                                                👥 {booking.num_adults} adults{booking.num_children > 0 ? `, ${booking.num_children} children` : ''}
                                            </p>
                                            {booking.preferred_activities && (
                                                <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#666' }}>
                                                    🏔️ {booking.preferred_activities}
                                                </p>
                                            )}
                                        </div>
                                    </div>

                                    {/* Status badge */}
                                    <span style={{
                                        fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600',
                                        background: s.bg, color: s.color, border: `1px solid ${s.border}`,
                                        borderRadius: '999px', padding: '0.3rem 0.75rem', flexShrink: 0,
                                    }}>
                                        {s.label}
                                    </span>

                                    {/* Actions */}
                                    <div style={{ display: 'flex', gap: '0.4rem', flexShrink: 0, flexWrap: 'wrap' }}>
                                        {booking.status !== 'confirmed' && (
                                            <button onClick={() => handleUpdateStatus(booking.id, 'confirmed')} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#F0FDF4', color: '#1a6b1a', border: '1px solid #1a6b1a', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                                ✓ Confirm
                                            </button>
                                        )}
                                        {booking.status !== 'pending' && (
                                            <button onClick={() => handleUpdateStatus(booking.id, 'pending')} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FFFBEB', color: '#c9951a', border: '1px solid #c9951a', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                                ⏳ Pending
                                            </button>
                                        )}
                                        {booking.status !== 'cancelled' && (
                                            <button onClick={() => handleUpdateStatus(booking.id, 'cancelled')} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                                ✕ Cancel
                                            </button>
                                        )}
                                        <button onClick={() => handleDelete(booking.id)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                            🗑️
                                        </button>
                                    </div>
                                </div>
                            );
                        })
                    )}
                </div>

                {/* Pagination */}
                {bookings.links && bookings.links.length > 3 && (
                    <div style={{ display: 'flex', justifyContent: 'center', gap: '0.5rem', marginTop: '1.5rem', flexWrap: 'wrap' }}>
                        {bookings.links.map((link, index) => (
                            <Link key={index} href={link.url || '#'} style={{
                                padding: '0.5rem 1rem', borderRadius: '8px', textDecoration: 'none',
                                fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600',
                                background: link.active ? '#1a6b1a' : 'white',
                                color: link.active ? 'white' : '#666',
                                border: '1px solid', borderColor: link.active ? '#1a6b1a' : '#e0e0e0',
                            }} dangerouslySetInnerHTML={{ __html: link.label }} />
                        ))}
                    </div>
                )}

            </div>
        </AdminLayout>
    );
}

export default Index;
