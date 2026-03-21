import React, { useState } from 'react';
import AdminLayout from '@/Layouts/AdminLayout';
import { router } from '@inertiajs/react';

const TYPES = ['Resort', 'Lodge', 'Hotel', 'Campsite', 'Guesthouse'];

const inputStyle = {
    width: '100%', padding: '0.6rem 0.875rem',
    border: '2px solid #e0e0e0', borderRadius: '8px',
    fontFamily: "'Montserrat', sans-serif", fontSize: '14px',
    color: '#333', outline: 'none', boxSizing: 'border-box',
};

const labelStyle = {
    fontFamily: "'Montserrat', sans-serif",
    fontSize: '13px', fontWeight: '600',
    color: '#555', display: 'block', marginBottom: '0.4rem',
};

const EMPTY_FORM = {
    name: '', type: 'Hotel', description: '',
    location: '', image: '', website_url: '', whatsapp_number: '',
};

function AccommodationsIndex({ accommodations }) {
    const [showForm, setShowForm] = useState(false);
    const [editing, setEditing] = useState(null);
    const [form, setForm] = useState(EMPTY_FORM);

    const resetForm = () => setForm(EMPTY_FORM);

    const handleSubmit = (e) => {
        e.preventDefault();
        if (editing) {
            router.put(`/admin/accommodations/${editing.id}`, form, {
                onSuccess: () => { setEditing(null); setShowForm(false); resetForm(); }
            });
        } else {
            router.post('/admin/accommodations', form, {
                onSuccess: () => { setShowForm(false); resetForm(); }
            });
        }
    };

    const handleEdit = (acc) => {
        setEditing(acc);
        setForm({
            name: acc.name, type: acc.type, description: acc.description,
            location: acc.location, image: acc.image || '',
            website_url: acc.website_url || '', whatsapp_number: acc.whatsapp_number || '',
        });
        setShowForm(true);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    const handleDelete = (acc) => {
        if (confirm(`Delete "${acc.name}"?`)) {
            router.delete(`/admin/accommodations/${acc.id}`);
        }
    };

    const handleToggle = (acc) => {
        router.patch(`/admin/accommodations/${acc.id}/toggle`);
    };

    return (
        <AdminLayout title="Accommodations">
            <div style={{ padding: '2rem', background: '#F5F6F9', minHeight: '100%' }}>

                {/* Hero Header */}
                <div style={{
                    background: 'linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(/images/gallery/falls/waterfall-base.jpg) center/cover no-repeat',
                    borderRadius: '16px',
                    padding: '2.5rem',
                    marginBottom: '1.5rem',
                    color: 'white',
                }}>
                    <div style={{ display: 'flex', alignItems: 'flex-start', justifyContent: 'space-between', flexWrap: 'wrap', gap: '1.5rem' }}>
                        <div>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', letterSpacing: '0.25em', textTransform: 'uppercase', color: '#c9951a', margin: '0 0 0.5rem' }}>Contact Page</p>
                            <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '32px', fontWeight: '700', color: 'white', margin: '0 0 0.5rem' }}>Where to Stay</h1>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: 'rgba(255,255,255,0.65)', margin: 0 }}>Manage accommodation listings shown to visitors on the contact page</p>
                        </div>
                        <button
                            onClick={() => { setShowForm(!showForm); setEditing(null); resetForm(); }}
                            style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: showForm && !editing ? 'rgba(255,255,255,0.15)' : '#c9951a', color: 'white', border: `2px solid ${showForm && !editing ? 'rgba(255,255,255,0.4)' : '#c9951a'}`, borderRadius: '8px', padding: '0.7rem 1.5rem', cursor: 'pointer', transition: 'all 0.2s' }}
                        >
                            {showForm && !editing ? '✕ Cancel' : '+ Add Accommodation'}
                        </button>
                    </div>
                    {/* Stats Strip */}
                    <div style={{ display: 'flex', gap: '2rem', marginTop: '2rem', flexWrap: 'wrap' }}>
                        <div>
                            <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '2rem', fontWeight: '700', color: '#c9951a', margin: 0, lineHeight: 1 }}>{accommodations.length}</p>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: 'rgba(255,255,255,0.6)', margin: '0.25rem 0 0', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Total Listed</p>
                        </div>
                        <div style={{ width: '1px', background: 'rgba(255,255,255,0.2)' }} />
                        <div>
                            <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '2rem', fontWeight: '700', color: '#c9951a', margin: 0, lineHeight: 1 }}>{accommodations.filter(a => a.is_active).length}</p>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: 'rgba(255,255,255,0.6)', margin: '0.25rem 0 0', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Active</p>
                        </div>
                        <div style={{ width: '1px', background: 'rgba(255,255,255,0.2)' }} />
                        <div>
                            <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '2rem', fontWeight: '700', color: '#c9951a', margin: 0, lineHeight: 1 }}>{accommodations.filter(a => !a.is_active).length}</p>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: 'rgba(255,255,255,0.6)', margin: '0.25rem 0 0', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Hidden</p>
                        </div>
                        <div style={{ width: '1px', background: 'rgba(255,255,255,0.2)' }} />
                        <div>
                            <p style={{ fontFamily: "'Playfair Display', serif", fontSize: '2rem', fontWeight: '700', color: '#c9951a', margin: 0, lineHeight: 1 }}>{[...new Set(accommodations.map(a => a.type))].length}</p>
                            <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: 'rgba(255,255,255,0.6)', margin: '0.25rem 0 0', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Types</p>
                        </div>
                    </div>
                </div>

                {/* Form */}
                {showForm && (
                    <div style={{ background: 'white', borderRadius: '12px', padding: '2rem', marginBottom: '1.5rem', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', borderTop: '4px solid #c9951a' }}>
                        <h3 style={{ fontFamily: "'Playfair Display', serif", fontSize: '20px', color: '#0d1f0d', margin: '0 0 1.5rem' }}>
                            {editing ? `Edit — ${editing.name}` : 'Add New Accommodation'}
                        </h3>
                        <form onSubmit={handleSubmit}>
                            <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(240px, 1fr))', gap: '1rem', marginBottom: '1rem' }}>
                                <div>
                                    <label style={labelStyle}>Name *</label>
                                    <input style={inputStyle} value={form.name} onChange={e => setForm({ ...form, name: e.target.value })} required placeholder="Sipi Valley Resort" />
                                </div>
                                <div>
                                    <label style={labelStyle}>Type *</label>
                                    <select style={inputStyle} value={form.type} onChange={e => setForm({ ...form, type: e.target.value })}>
                                        {TYPES.map(t => <option key={t} value={t}>{t}</option>)}
                                    </select>
                                </div>
                                <div>
                                    <label style={labelStyle}>Location *</label>
                                    <input style={inputStyle} value={form.location} onChange={e => setForm({ ...form, location: e.target.value })} required placeholder="Sipi, Kapchorwa" />
                                </div>
                                <div>
                                    <label style={labelStyle}>WhatsApp Number</label>
                                    <input style={inputStyle} value={form.whatsapp_number} onChange={e => setForm({ ...form, whatsapp_number: e.target.value })} placeholder="256703558174" />
                                </div>
                                <div>
                                    <label style={labelStyle}>Website URL</label>
                                    <input style={inputStyle} value={form.website_url} onChange={e => setForm({ ...form, website_url: e.target.value })} placeholder="https://example.com" />
                                </div>
                                <div>
                                    <label style={labelStyle}>Image path</label>
                                    <input style={inputStyle} value={form.image} onChange={e => setForm({ ...form, image: e.target.value })} placeholder="images/hotels/sipi-valley-resort.jpg" />
                                </div>
                            </div>
                            <div style={{ marginBottom: '1.5rem' }}>
                                <label style={labelStyle}>Description *</label>
                                <textarea style={{ ...inputStyle, resize: 'vertical' }} rows={3} value={form.description} onChange={e => setForm({ ...form, description: e.target.value })} required placeholder="Brief description of the accommodation..." />
                            </div>
                            <div style={{ display: 'flex', gap: '0.75rem' }}>
                                <button type="submit" style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', cursor: 'pointer' }}>
                                    {editing ? 'Update Accommodation' : 'Add Accommodation'}
                                </button>
                                <button type="button" onClick={() => { setShowForm(false); setEditing(null); resetForm(); }} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: 'transparent', color: '#888', border: '2px solid #e0e0e0', borderRadius: '8px', padding: '0.6rem 1.5rem', cursor: 'pointer' }}>
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                )}

                {/* List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>
                            All Accommodations ({accommodations.length})
                        </h3>
                    </div>

                    {accommodations.length === 0 ? (
                        <p style={{ padding: '3rem', textAlign: 'center', color: '#aaa', fontFamily: "'Montserrat', sans-serif", fontSize: '14px' }}>
                            No accommodations yet. Add your first one above!
                        </p>
                    ) : (
                        accommodations.map((acc, i) => (
                            <div key={acc.id} style={{
                                display: 'flex', alignItems: 'center', gap: '1rem',
                                padding: '1rem 1.5rem',
                                borderBottom: i < accommodations.length - 1 ? '1px solid #f5f5f5' : 'none',
                                transition: 'background 0.15s',
                            }}
                                onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                                onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                            >
                                {/* Image */}
                                <div style={{ width: '60px', height: '60px', borderRadius: '8px', overflow: 'hidden', flexShrink: 0, background: '#f0f0f0' }}>
                                    {acc.image ? (
                                        <img src={`/${acc.image}`} alt={acc.name} style={{ width: '100%', height: '100%', objectFit: 'cover' }} />
                                    ) : (
                                        <div style={{ width: '100%', height: '100%', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '24px' }}>🏨</div>
                                    )}
                                </div>

                                {/* Info */}
                                <div style={{ flex: 1, minWidth: 0 }}>
                                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', marginBottom: '0.25rem', flexWrap: 'wrap' }}>
                                        <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#333' }}>{acc.name}</p>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', background: '#F0FDF4', color: '#1a6b1a', borderRadius: '999px', padding: '2px 8px' }}>{acc.type}</span>
                                        {!acc.is_active && <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', borderRadius: '999px', padding: '2px 8px' }}>Hidden</span>}
                                    </div>
                                    <p style={{ margin: '0 0 2px', fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#888' }}>📍 {acc.location}</p>
                                    <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '12px', color: '#aaa', overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>{acc.description}</p>
                                </div>

                                {/* Actions */}
                                <div style={{ display: 'flex', gap: '0.5rem', flexShrink: 0 }}>
                                    <button onClick={() => handleToggle(acc)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: acc.is_active ? '#FFFBEB' : '#F0FDF4', color: acc.is_active ? '#c9951a' : '#1a6b1a', border: `1px solid ${acc.is_active ? '#c9951a' : '#1a6b1a'}`, borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                        {acc.is_active ? 'Hide' : 'Show'}
                                    </button>
                                    <button onClick={() => handleEdit(acc)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#EFF6FF', color: '#3B82F6', border: '1px solid #3B82F6', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                        Edit
                                    </button>
                                    <button onClick={() => handleDelete(acc)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        ))
                    )}
                </div>

            </div>
        </AdminLayout>
    );
}

export default AccommodationsIndex;
