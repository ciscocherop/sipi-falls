import AdminLayout from '../../../Layouts/AdminLayout';
import { useState, useEffect } from 'react';
import { router, useForm, usePage } from '@inertiajs/react';

const inputStyle = { width: '100%', padding: '0.75rem 1rem', border: '2px solid #e0e0e0', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', color: '#333', outline: 'none', boxSizing: 'border-box' };
const labelStyle = { fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', color: '#555', display: 'block', marginBottom: '0.5rem' };

function Testimonials({ pageName, testimonials = [] }) {
    const [drawerOpen, setDrawerOpen] = useState(false);
    const [editingItem, setEditingItem] = useState(null);
    const [filter, setFilter] = useState('all');
    const { flash } = usePage().props;
    const [flashMsg, setFlashMsg] = useState(null);
    const safeTestimonials = Array.isArray(testimonials) ? testimonials : [];

    useEffect(() => {
        if (flash?.success) {
            setFlashMsg(flash.success);
            const t = setTimeout(() => setFlashMsg(null), 3000);
            return () => clearTimeout(t);
        }
    }, [flash]);

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '', country: '', message: '', rating: 5, is_active: true, order: 0
    });

    const openDrawer = (item = null) => {
        if (item) {
            setData({ name: item.name || '', country: item.country || '', message: item.message || '', rating: item.rating || 5, is_active: item.is_active ?? true, order: item.order || 0 });
            setEditingItem(item);
        } else {
            reset();
            setEditingItem(null);
        }
        setDrawerOpen(true);
        document.body.style.overflow = 'hidden';
    };

    const closeDrawer = () => {
        setDrawerOpen(false);
        setEditingItem(null);
        reset();
        document.body.style.overflow = '';
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        if (editingItem) {
            post(`/admin/content/testimonials/${editingItem.id}`, { preserveScroll: true, onSuccess: closeDrawer });
        } else {
            post('/admin/content/testimonials', { preserveScroll: true, onSuccess: closeDrawer });
        }
    };

    const handleDelete = (id) => {
        if (confirm('Delete this testimonial?')) {
            router.delete(`/admin/content/testimonials/${id}/delete`, { preserveScroll: true });
        }
    };

    const handleToggleApproval = (id) => {
        router.post(`/admin/content/testimonials/${id}/toggle-approval`, {}, { preserveScroll: true });
    };

    const filtered = safeTestimonials.filter(t => {
        if (filter === 'pending') return !t.is_approved;
        if (filter === 'approved') return t.is_approved;
        return true;
    });

    const pendingCount = safeTestimonials.filter(t => !t.is_approved).length;

    return (
        <AdminLayout title={pageName}>
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Flash */}
                {flashMsg && (
                    <div style={{ background: '#F0FDF4', borderLeft: '4px solid #1a6b1a', borderRadius: '8px', padding: '1rem 1.5rem', marginBottom: '1.5rem', display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#1a6b1a', margin: 0 }}>✓ {flashMsg}</p>
                        <button onClick={() => setFlashMsg(null)} style={{ background: 'none', border: 'none', cursor: 'pointer', color: '#888', fontSize: '1.2rem' }}>×</button>
                    </div>
                )}

                {/* Header */}
                <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '1.5rem', flexWrap: 'wrap', gap: '1rem' }}>
                    <div>
                        <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>Testimonials</h1>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            {safeTestimonials.length} total
                            {pendingCount > 0 && <span style={{ color: '#c9951a', fontWeight: '600' }}> · {pendingCount} pending approval</span>}
                        </p>
                    </div>
                    <button onClick={() => openDrawer()} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', cursor: 'pointer' }}>
                        + Add Testimonial
                    </button>
                </div>

                {/* Filter Tabs */}
                <div style={{ display: 'flex', gap: '0.5rem', marginBottom: '1.5rem' }}>
                    {[
                        { key: 'all', label: `All (${safeTestimonials.length})` },
                        { key: 'pending', label: `Pending (${pendingCount})` },
                        { key: 'approved', label: `Approved (${safeTestimonials.length - pendingCount})` },
                    ].map(f => (
                        <button key={f.key} onClick={() => setFilter(f.key)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer', border: '2px solid', borderColor: filter === f.key ? '#1a6b1a' : '#e0e0e0', background: filter === f.key ? '#1a6b1a' : 'white', color: filter === f.key ? 'white' : '#666', transition: 'all 0.2s' }}>
                            {f.label}
                        </button>
                    ))}
                </div>

                {/* List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>
                            {filter === 'all' ? 'All Testimonials' : filter === 'pending' ? 'Pending Approval' : 'Approved'} ({filtered.length})
                        </h3>
                    </div>
                    {filtered.length === 0 ? (
                        <p style={{ padding: '3rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '14px' }}>No testimonials found</p>
                    ) : (
                        filtered.map((t, i) => (
                            <div key={t.id} style={{ display: 'flex', alignItems: 'flex-start', gap: '1rem', padding: '1.25rem 1.5rem', borderBottom: i < filtered.length - 1 ? '1px solid #f5f5f5' : 'none', transition: 'background 0.15s' }}
                                onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                            >
                                {/* Avatar */}
                                <div style={{ width: '42px', height: '42px', borderRadius: '50%', background: '#1a6b1a', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                                    <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '700', color: 'white' }}>{t.name?.[0]}</span>
                                </div>

                                {/* Content */}
                                <div style={{ flex: 1, minWidth: 0 }}>
                                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', marginBottom: '0.25rem', flexWrap: 'wrap' }}>
                                        <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#333' }}>{t.name}</p>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>{t.country}</span>
                                        <span style={{ color: '#c9951a', fontSize: '13px' }}>{'★'.repeat(t.rating)}{'☆'.repeat(5 - t.rating)}</span>
                                    </div>
                                    <p style={{ margin: '0 0 0.5rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#666', lineHeight: '1.5' }}>
                                        {t.message?.length > 120 ? t.message.substring(0, 120) + '...' : t.message}
                                    </p>
                                    <div style={{ display: 'flex', gap: '0.5rem' }}>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', background: t.is_approved ? '#F0FDF4' : '#FFFBEB', color: t.is_approved ? '#1a6b1a' : '#c9951a', border: `1px solid ${t.is_approved ? '#1a6b1a' : '#c9951a'}`, borderRadius: '999px', padding: '2px 8px' }}>
                                            {t.is_approved ? '✓ Approved' : '⏳ Pending'}
                                        </span>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', background: t.is_active ? '#F0FDF4' : '#f5f5f5', color: t.is_active ? '#1a6b1a' : '#888', border: `1px solid ${t.is_active ? '#1a6b1a' : '#e0e0e0'}`, borderRadius: '999px', padding: '2px 8px' }}>
                                            {t.is_active ? 'Active' : 'Inactive'}
                                        </span>
                                    </div>
                                </div>

                                {/* Actions */}
                                <div style={{ display: 'flex', gap: '0.4rem', flexShrink: 0 }}>
                                    <button onClick={() => handleToggleApproval(t.id)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: t.is_approved ? '#FFFBEB' : '#F0FDF4', color: t.is_approved ? '#c9951a' : '#1a6b1a', border: `1px solid ${t.is_approved ? '#c9951a' : '#1a6b1a'}`, borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                        {t.is_approved ? 'Reject' : 'Approve'}
                                    </button>
                                    <button onClick={() => openDrawer(t)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#EFF6FF', color: '#3B82F6', border: '1px solid #3B82F6', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>Edit</button>
                                    <button onClick={() => handleDelete(t.id)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>🗑️</button>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                {/* Slide-in Drawer */}
                <>
                    {/* Overlay */}
                    <div onClick={closeDrawer} style={{ position: 'fixed', inset: 0, background: 'rgba(0,0,0,0.5)', zIndex: 9998, opacity: drawerOpen ? 1 : 0, pointerEvents: drawerOpen ? 'auto' : 'none', transition: 'opacity 0.3s ease' }} />
                    {/* Drawer */}
                    <div style={{ position: 'fixed', top: 0, right: 0, bottom: 0, width: '100%', maxWidth: '480px', background: 'white', zIndex: 9999, overflowY: 'auto', boxShadow: '-8px 0 32px rgba(0,0,0,0.15)', display: 'flex', flexDirection: 'column', transform: drawerOpen ? 'translateX(0)' : 'translateX(100%)', transition: 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)' }}>
                        <div style={{ padding: '1.5rem 2rem', borderBottom: '1px solid #f0f0f0', display: 'flex', alignItems: 'center', justifyContent: 'space-between', background: '#0d1f0d', flexShrink: 0 }}>
                            <h3 style={{ fontFamily: "'Playfair Display', serif", fontSize: '20px', fontWeight: '700', color: 'white', margin: 0 }}>
                                {editingItem ? 'Edit Testimonial' : 'Add Testimonial'}
                            </h3>
                            <button onClick={closeDrawer} style={{ background: 'rgba(255,255,255,0.15)', border: '2px solid rgba(255,255,255,0.4)', color: 'white', width: '2rem', height: '2rem', borderRadius: '50%', cursor: 'pointer', fontSize: '1.1rem', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>×</button>
                        </div>
                        <div style={{ padding: '2rem', flex: 1 }}>
                            <form onSubmit={handleSubmit}>
                                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem', marginBottom: '1rem' }}>
                                    <div>
                                        <label style={labelStyle}>Name *</label>
                                        <input value={data.name} onChange={e => setData('name', e.target.value)} required placeholder="John Doe" style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                        {errors.name && <p style={{ color: '#dc3545', fontSize: '12px', margin: '0.25rem 0 0' }}>{errors.name}</p>}
                                    </div>
                                    <div>
                                        <label style={labelStyle}>Country *</label>
                                        <input value={data.country} onChange={e => setData('country', e.target.value)} required placeholder="United Kingdom" style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                        {errors.country && <p style={{ color: '#dc3545', fontSize: '12px', margin: '0.25rem 0 0' }}>{errors.country}</p>}
                                    </div>
                                </div>
                                <div style={{ marginBottom: '1rem' }}>
                                    <label style={labelStyle}>Message *</label>
                                    <textarea value={data.message} onChange={e => setData('message', e.target.value)} required rows={4} style={{ ...inputStyle, resize: 'vertical' }}
                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    {errors.message && <p style={{ color: '#dc3545', fontSize: '12px', margin: '0.25rem 0 0' }}>{errors.message}</p>}
                                </div>
                                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem', marginBottom: '1rem' }}>
                                    <div>
                                        <label style={labelStyle}>Rating *</label>
                                        <select value={data.rating} onChange={e => setData('rating', parseInt(e.target.value))} style={inputStyle}>
                                            {[5, 4, 3, 2, 1].map(r => <option key={r} value={r}>{r} Star{r !== 1 ? 's' : ''}</option>)}
                                        </select>
                                    </div>
                                    <div>
                                        <label style={labelStyle}>Display Order</label>
                                        <input type="number" value={data.order} onChange={e => setData('order', parseInt(e.target.value) || 0)} min="0" style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    </div>
                                </div>
                                <div style={{ marginBottom: '1.5rem', display: 'flex', alignItems: 'center', gap: '0.75rem' }}>
                                    <input type="checkbox" id="is_active" checked={data.is_active} onChange={e => setData('is_active', e.target.checked)} style={{ width: '16px', height: '16px', accentColor: '#1a6b1a' }} />
                                    <label htmlFor="is_active" style={{ ...labelStyle, margin: 0 }}>Active</label>
                                </div>
                                <div style={{ display: 'flex', gap: '0.75rem' }}>
                                    <button type="submit" disabled={processing} style={{ flex: 1, fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: processing ? '#aaa' : '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.75rem', cursor: processing ? 'not-allowed' : 'pointer' }}>
                                        {processing ? 'Saving...' : editingItem ? 'Update Testimonial' : 'Add Testimonial'}
                                    </button>
                                    <button type="button" onClick={closeDrawer} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: 'white', color: '#666', border: '2px solid #e0e0e0', borderRadius: '8px', padding: '0.75rem 1.25rem', cursor: 'pointer' }}>Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </>

            </div>
        </AdminLayout>
    );
}

export default Testimonials;
