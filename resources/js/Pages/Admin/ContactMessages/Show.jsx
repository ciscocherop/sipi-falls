import React from 'react';
import { router, Link } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';

function Show({ message }) {
    const handleToggleRead = () => {
        router.post(`/admin/contact-messages/${message.id}/toggle-read`, {}, { preserveState: true });
    };

    const handleDelete = () => {
        if (confirm('Delete this message?')) {
            router.delete(`/admin/contact-messages/${message.id}`, {
                onSuccess: () => router.visit('/admin/contact-messages'),
            });
        }
    };

    return (
        <AdminLayout title="View Message">
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Back */}
                <Link href="/admin/contact-messages" style={{ display: 'inline-flex', alignItems: 'center', gap: '0.5rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', color: '#1a6b1a', textDecoration: 'none', marginBottom: '1.5rem' }}>
                    ← Back to Messages
                </Link>

                {/* Card */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden', borderTop: '4px solid #1a6b1a' }}>

                    {/* Header */}
                    <div style={{ padding: '1.5rem 2rem', borderBottom: '1px solid #f0f0f0' }}>
                        <div style={{ display: 'flex', alignItems: 'flex-start', justifyContent: 'space-between', gap: '1rem', flexWrap: 'wrap' }}>
                            <div style={{ display: 'flex', alignItems: 'center', gap: '1rem' }}>
                                <div style={{ width: '52px', height: '52px', borderRadius: '50%', background: '#1a6b1a', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                                    <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '18px', fontWeight: '700', color: 'white' }}>
                                        {message.first_name?.[0]}{message.last_name?.[0]}
                                    </span>
                                </div>
                                <div>
                                    <h2 style={{ fontFamily: "'Playfair Display', serif", fontSize: '22px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>
                                        {message.first_name} {message.last_name}
                                    </h2>
                                    <a href={`mailto:${message.email}`} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#3B82F6', textDecoration: 'none' }}>
                                        {message.email}
                                    </a>
                                </div>
                            </div>
                            <div style={{ display: 'flex', gap: '0.5rem', flexWrap: 'wrap', alignItems: 'center' }}>
                                <span style={{
                                    fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600',
                                    background: message.is_read ? '#F0FDF4' : '#EFF6FF',
                                    color: message.is_read ? '#1a6b1a' : '#3B82F6',
                                    border: `1px solid ${message.is_read ? '#1a6b1a' : '#3B82F6'}`,
                                    borderRadius: '999px', padding: '0.3rem 0.75rem',
                                }}>
                                    {message.is_read ? '✓ Read' : '● Unread'}
                                </span>
                                <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>
                                    {new Date(message.created_at).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
                                </span>
                            </div>
                        </div>

                        {/* Subject */}
                        <div style={{ marginTop: '1.25rem', padding: '1rem', background: '#F5F6F9', borderRadius: '8px', borderLeft: '4px solid #c9951a' }}>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', color: '#c9951a', textTransform: 'uppercase', letterSpacing: '0.1em', margin: '0 0 0.25rem' }}>Subject</p>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '15px', fontWeight: '600', color: '#333', margin: 0 }}>{message.subject}</p>
                        </div>
                    </div>

                    {/* Body */}
                    <div style={{ padding: '2rem' }}>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', color: '#aaa', textTransform: 'uppercase', letterSpacing: '0.1em', margin: '0 0 1rem' }}>Message</p>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '15px', color: '#333', lineHeight: '1.8', margin: 0, whiteSpace: 'pre-wrap' }}>
                            {message.message}
                        </p>
                    </div>

                    {/* Actions */}
                    <div style={{ padding: '1.5rem 2rem', borderTop: '1px solid #f0f0f0', background: '#fafafa', display: 'flex', gap: '0.75rem', flexWrap: 'wrap', alignItems: 'center' }}>
                        <a
                            href={`https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(message.email)}&su=${encodeURIComponent('Re: ' + message.subject)}&body=${encodeURIComponent('Hi ' + message.first_name + ',\n\n')}`}
                            target="_blank"
                            rel="noopener noreferrer"
                            style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', textDecoration: 'none', display: 'inline-block', transition: 'all 0.2s' }}
                            onMouseEnter={e => e.currentTarget.style.background = '#c9951a'}
                            onMouseLeave={e => e.currentTarget.style.background = '#1a6b1a'}
                        >
                            ✉️ Reply via Email
                        </a>
                        <button onClick={handleToggleRead} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: 'white', color: '#666', border: '2px solid #e0e0e0', borderRadius: '8px', padding: '0.6rem 1.25rem', cursor: 'pointer' }}>
                            {message.is_read ? 'Mark as Unread' : 'Mark as Read'}
                        </button>
                        <button onClick={handleDelete} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '8px', padding: '0.6rem 1.25rem', cursor: 'pointer' }}>
                            Delete Message
                        </button>
                    </div>

                </div>
            </div>
        </AdminLayout>
    );
}

export default Show;
