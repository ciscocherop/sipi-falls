import AdminLayout from '../../../Layouts/AdminLayout';
import { useState, useEffect } from 'react';
import { router, useForm, usePage } from '@inertiajs/react';

const inputStyle = { width: '100%', padding: '0.75rem 1rem', border: '2px solid #e0e0e0', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', color: '#333', outline: 'none', boxSizing: 'border-box' };
const labelStyle = { fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', color: '#555', display: 'block', marginBottom: '0.5rem' };

function TourGuides({ pageName, tourGuides = [] }) {
    const [drawerOpen, setDrawerOpen] = useState(false);
    const [editingGuide, setEditingGuide] = useState(null);
    const { flash } = usePage().props;
    const [flashMsg, setFlashMsg] = useState(null);
    const safeGuides = Array.isArray(tourGuides) ? tourGuides : [];

    useEffect(() => {
        if (flash?.success) {
            setFlashMsg(flash.success);
            const t = setTimeout(() => setFlashMsg(null), 3000);
            return () => clearTimeout(t);
        }
    }, [flash]);

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '', title: '', bio: '', phone: '', email: '', years_experience: 0, is_active: true, order: 0
    });

    const openDrawer = (guide = null) => {
        if (guide) {
            setData({ name: guide.name || '', title: guide.title || '', bio: guide.bio || '', phone: guide.phone || '', email: guide.email || '', years_experience: guide.years_experience || 0, is_active: guide.is_active ?? true, order: guide.order || 0 });
            setEditingGuide(guide);
        } else {
            reset();
            setEditingGuide(null);
        }
        setDrawerOpen(true);
        document.body.style.overflow = 'hidden';
    };

    const closeDrawer = () => {
        setDrawerOpen(false);
        setEditingGuide(null);
        reset();
        document.body.style.overflow = '';
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        if (editingGuide) {
            post(`/admin/content/tour-guides/${editingGuide.id}`, { preserveScroll: true, onSuccess: closeDrawer });
        } else {
            post('/admin/content/tour-guides', { preserveScroll: true, onSuccess: closeDrawer });
        }
    };

    const handleDelete = (id) => {
        if (confirm('Delete this tour guide?')) {
            router.delete(`/admin/content/tour-guides/${id}/delete`, { preserveScroll: true });
        }
    };

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
                        <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>Tour Guides</h1>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            {safeGuides.length} guide{safeGuides.length !== 1 ? 's' : ''} · {safeGuides.filter(g => g.is_active).length} active
                        </p>
                    </div>
                    <button onClick={() => openDrawer()} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', cursor: 'pointer' }}>
                        + Add Tour Guide
                    </button>
                </div>

                {/* Guides List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>All Guides ({safeGuides.length})</h3>
                    </div>
                    {safeGuides.length === 0 ? (
                        <div style={{ padding: '3rem', textAlign: 'center' }}>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '14px', color: '#aaa', margin: '0 0 1rem' }}>No tour guides yet</p>
                            <button onClick={() => openDrawer()} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', cursor: 'pointer' }}>Add First Guide</button>
                        </div>
                    ) : (
                        safeGuides.map((guide, i) => (
                            <div key={guide.id} style={{ display: 'flex', alignItems: 'center', gap: '1rem', padding: '1rem 1.5rem', borderBottom: i < safeGuides.length - 1 ? '1px solid #f5f5f5' : 'none', transition: 'background 0.15s' }}
                                onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                            >
                                {/* Photo */}
                                <div style={{ width: '52px', height: '52px', borderRadius: '50%', overflow: 'hidden', flexShrink: 0, border: '3px solid #c9951a' }}>
                                    {guide.photo ? (
                                        <img src={`/${guide.photo}`} alt={guide.name} style={{ width: '100%', height: '100%', objectFit: 'cover' }} />
                                    ) : (
                                        <div style={{ width: '100%', height: '100%', background: '#0d1f0d', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                                            <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '18px', fontWeight: '700', color: 'white' }}>{guide.name?.[0]}</span>
                                        </div>
                                    )}
                                </div>

                                {/* Info */}
                                <div style={{ flex: 1, minWidth: 0 }}>
                                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', marginBottom: '0.2rem' }}>
                                        <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#333' }}>{guide.name}</p>
                                        {!guide.is_active && <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', background: '#FEE2E2', color: '#dc3545', borderRadius: '999px', padding: '2px 8px' }}>Inactive</span>}
                                    </div>
                                    <p style={{ margin: '0 0 0.2rem', fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#c9951a', fontWeight: '600' }}>{guide.title}</p>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#888' }}>
                                        {guide.years_experience} yrs experience
                                        {guide.phone && ` · 📞 ${guide.phone}`}
                                        {guide.email && ` · ✉️ ${guide.email}`}
                                    </p>
                                </div>

                                {/* Actions */}
                                <div style={{ display: 'flex', gap: '0.4rem', flexShrink: 0 }}>
                                    <button onClick={() => openDrawer(guide)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#EFF6FF', color: '#3B82F6', border: '1px solid #3B82F6', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>Edit</button>
                                    <button onClick={() => handleDelete(guide.id)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>🗑️</button>
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
                                {editingGuide ? `Edit — ${editingGuide.name}` : 'Add Tour Guide'}
                            </h3>
                            <button onClick={closeDrawer} style={{ background: 'rgba(255,255,255,0.15)', border: '2px solid rgba(255,255,255,0.4)', color: 'white', width: '2rem', height: '2rem', borderRadius: '50%', cursor: 'pointer', fontSize: '1.1rem', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>×</button>
                        </div>
                        <div style={{ padding: '2rem', flex: 1 }}>
                            <form onSubmit={handleSubmit}>
                                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem', marginBottom: '1rem' }}>
                                    <div>
                                        <label style={labelStyle}>Name *</label>
                                        <input value={data.name} onChange={e => setData('name', e.target.value)} required style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                        {errors.name && <p style={{ color: '#dc3545', fontSize: '12px', margin: '0.25rem 0 0' }}>{errors.name}</p>}
                                    </div>
                                    <div>
                                        <label style={labelStyle}>Title *</label>
                                        <input value={data.title} onChange={e => setData('title', e.target.value)} required placeholder="Senior Guide" style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                        {errors.title && <p style={{ color: '#dc3545', fontSize: '12px', margin: '0.25rem 0 0' }}>{errors.title}</p>}
                                    </div>
                                </div>
                                <div style={{ marginBottom: '1rem' }}>
                                    <label style={labelStyle}>Bio *</label>
                                    <textarea value={data.bio} onChange={e => setData('bio', e.target.value)} required rows={4} style={{ ...inputStyle, resize: 'vertical' }}
                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    {errors.bio && <p style={{ color: '#dc3545', fontSize: '12px', margin: '0.25rem 0 0' }}>{errors.bio}</p>}
                                </div>
                                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem', marginBottom: '1rem' }}>
                                    <div>
                                        <label style={labelStyle}>Phone</label>
                                        <input type="tel" value={data.phone} onChange={e => setData('phone', e.target.value)} style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    </div>
                                    <div>
                                        <label style={labelStyle}>Email</label>
                                        <input type="email" value={data.email} onChange={e => setData('email', e.target.value)} style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    </div>
                                </div>
                                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem', marginBottom: '1rem' }}>
                                    <div>
                                        <label style={labelStyle}>Years Experience *</label>
                                        <input type="number" value={data.years_experience} onChange={e => setData('years_experience', parseInt(e.target.value) || 0)} min="0" required style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    </div>
                                    <div>
                                        <label style={labelStyle}>Display Order</label>
                                        <input type="number" value={data.order} onChange={e => setData('order', parseInt(e.target.value) || 0)} min="0" style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    </div>
                                </div>
                                <div style={{ marginBottom: '1.5rem', display: 'flex', alignItems: 'center', gap: '0.75rem' }}>
                                    <input type="checkbox" id="guide_active" checked={data.is_active} onChange={e => setData('is_active', e.target.checked)} style={{ width: '16px', height: '16px', accentColor: '#1a6b1a' }} />
                                    <label htmlFor="guide_active" style={{ ...labelStyle, margin: 0 }}>Active</label>
                                </div>
                                <div style={{ display: 'flex', gap: '0.75rem' }}>
                                    <button type="submit" disabled={processing} style={{ flex: 1, fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: processing ? '#aaa' : '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.75rem', cursor: processing ? 'not-allowed' : 'pointer' }}>
                                        {processing ? 'Saving...' : editingGuide ? 'Update Guide' : 'Add Guide'}
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

export default TourGuides;
