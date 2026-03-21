import { useState, useEffect } from 'react';
import { useForm, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';

const inputStyle = {
    width: '100%', padding: '0.75rem 1rem',
    border: '2px solid #e0e0e0', borderRadius: '8px',
    fontFamily: "'Montserrat', sans-serif", fontSize: '14px',
    color: '#333', outline: 'none', boxSizing: 'border-box',
};

const labelStyle = {
    fontFamily: "'Montserrat', sans-serif",
    fontSize: '13px', fontWeight: '600',
    color: '#555', display: 'block', marginBottom: '0.5rem',
};

function Compose({ activeCount }) {
    const { data, setData, post, processing, errors } = useForm({ subject: '', content: '' });
    const { flash } = usePage().props;
    const [flashMsg, setFlashMsg] = useState(null);

    useEffect(() => {
        if (flash.success || flash.error) {
            setFlashMsg({ type: flash.success ? 'success' : 'error', text: flash.success || flash.error });
            const t = setTimeout(() => setFlashMsg(null), 5000);
            return () => clearTimeout(t);
        }
    }, [flash]);

    const handleSubmit = (e) => {
        e.preventDefault();
        const msg = activeCount === 0
            ? 'No active subscribers. Send anyway?'
            : `Send to ${activeCount} subscriber${activeCount !== 1 ? 's' : ''}?`;
        if (confirm(msg)) post('/admin/newsletter-subscribers/send');
    };

    return (
        <AdminLayout title="Send Newsletter">
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
                            Compose Newsletter
                        </h1>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            Send an email to all active subscribers
                        </p>
                    </div>
                    <div style={{ background: 'white', borderRadius: '12px', padding: '1rem 1.5rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', borderLeft: '4px solid #1a6b1a', textAlign: 'center' }}>
                        <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '28px', fontWeight: '700', color: '#1a6b1a', margin: 0, lineHeight: 1 }}>{activeCount}</p>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#888', margin: '0.25rem 0 0' }}>Active Subscribers</p>
                    </div>
                </div>

                <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(320px, 1fr))', gap: '1.5rem' }}>

                    {/* Compose Form */}
                    <div style={{ background: 'white', borderRadius: '12px', padding: '2rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', borderTop: '4px solid #1a6b1a' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: '0 0 1.5rem' }}>
                            Write Your Message
                        </h3>
                        <form onSubmit={handleSubmit}>
                            <div style={{ marginBottom: '1.25rem' }}>
                                <label style={labelStyle}>Subject *</label>
                                <input
                                    type="text" value={data.subject} onChange={e => setData('subject', e.target.value)}
                                    required placeholder="Enter email subject..."
                                    style={{ ...inputStyle, borderColor: errors.subject ? '#dc3545' : '#e0e0e0' }}
                                    onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                                    onBlur={e => e.target.style.borderColor = errors.subject ? '#dc3545' : '#e0e0e0'}
                                />
                                {errors.subject && <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#dc3545', margin: '0.25rem 0 0' }}>{errors.subject}</p>}
                            </div>
                            <div style={{ marginBottom: '1.5rem' }}>
                                <label style={labelStyle}>Message *</label>
                                <textarea
                                    value={data.content} onChange={e => setData('content', e.target.value)}
                                    required rows={10} placeholder="Write your newsletter message here..."
                                    style={{ ...inputStyle, resize: 'vertical', borderColor: errors.content ? '#dc3545' : '#e0e0e0' }}
                                    onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                                    onBlur={e => e.target.style.borderColor = errors.content ? '#dc3545' : '#e0e0e0'}
                                />
                                {errors.content && <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#dc3545', margin: '0.25rem 0 0' }}>{errors.content}</p>}
                                <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#aaa', margin: '0.25rem 0 0' }}>
                                    Your message will be sent with Sipi Falls branding.
                                </p>
                            </div>
                            <div style={{ display: 'flex', gap: '0.75rem' }}>
                                <button type="submit" disabled={processing || !data.subject || !data.content} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: processing ? '#aaa' : '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.75rem 1.5rem', cursor: processing ? 'not-allowed' : 'pointer', transition: 'all 0.2s' }}>
                                    {processing ? 'Sending...' : '📧 Send Newsletter'}
                                </button>
                                <button type="button" onClick={() => window.history.back()} disabled={processing} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: 'white', color: '#666', border: '2px solid #e0e0e0', borderRadius: '8px', padding: '0.75rem 1.25rem', cursor: 'pointer' }}>
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>

                    {/* Live Preview */}
                    <div style={{ background: 'white', borderRadius: '12px', padding: '2rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', borderTop: '4px solid #c9951a' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: '0 0 1.5rem' }}>
                            Live Preview
                        </h3>
                        <div style={{ border: '1px solid #e0e0e0', borderRadius: '8px', overflow: 'hidden' }}>
                            {/* Email header */}
                            <div style={{ background: '#0d1f0d', padding: '1rem 1.5rem', textAlign: 'center' }}>
                                <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '18px', fontWeight: '700', color: 'white', margin: 0 }}>Sipi Falls</p>
                                <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#c9951a', margin: '0.25rem 0 0', letterSpacing: '0.15em', textTransform: 'uppercase' }}>Keep Sipping</p>
                            </div>
                            <div style={{ padding: '1.5rem' }}>
                                <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '18px', fontWeight: '700', color: '#1a6b1a', margin: '0 0 1rem' }}>
                                    {data.subject || 'Your subject will appear here'}
                                </p>
                                <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#555', lineHeight: '1.7', whiteSpace: 'pre-wrap', margin: 0 }}>
                                    {data.content || 'Your message will appear here...'}
                                </p>
                            </div>
                            <div style={{ background: '#f5f5f5', padding: '1rem', textAlign: 'center', borderTop: '1px solid #e0e0e0' }}>
                                <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa', margin: 0 }}>© 2026 Sipi Falls · Kapchorwa, Uganda</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </AdminLayout>
    );
}

export default Compose;
