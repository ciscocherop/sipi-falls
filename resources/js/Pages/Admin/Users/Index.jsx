import React, { useState, useEffect } from 'react';
import { router, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';

const inputStyle = { width: '100%', padding: '0.75rem 1rem', border: '2px solid #e0e0e0', borderRadius: '8px', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', color: '#333', outline: 'none', boxSizing: 'border-box' };
const labelStyle = { fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', color: '#555', display: 'block', marginBottom: '0.5rem' };

function Index({ users }) {
    const [drawerOpen, setDrawerOpen] = useState(false);
    const [editingUser, setEditingUser] = useState(null);
    const [form, setForm] = useState({ name: '', email: '', password: '', password_confirmation: '' });
    const [processing, setProcessing] = useState(false);
    const { flash } = usePage().props;
    const [flashMsg, setFlashMsg] = useState(null);

    useEffect(() => {
        if (flash?.success || flash?.error) {
            setFlashMsg({ type: flash.success ? 'success' : 'error', text: flash.success || flash.error });
            const t = setTimeout(() => setFlashMsg(null), 4000);
            return () => clearTimeout(t);
        }
    }, [flash]);

    const openDrawer = (user = null) => {
        if (user) {
            setForm({ name: user.name, email: user.email, password: '', password_confirmation: '' });
            setEditingUser(user);
        } else {
            setForm({ name: '', email: '', password: '', password_confirmation: '' });
            setEditingUser(null);
        }
        setDrawerOpen(true);
        document.body.style.overflow = 'hidden';
    };

    const closeDrawer = () => {
        setDrawerOpen(false);
        setEditingUser(null);
        setForm({ name: '', email: '', password: '', password_confirmation: '' });
        document.body.style.overflow = '';
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        setProcessing(true);
        if (editingUser) {
            router.put(`/admin/users/${editingUser.id}`, form, {
                onSuccess: () => { closeDrawer(); setProcessing(false); },
                onError: () => setProcessing(false),
            });
        } else {
            router.post('/admin/users', form, {
                onSuccess: () => { closeDrawer(); setProcessing(false); },
                onError: () => setProcessing(false),
            });
        }
    };

    const handleDelete = (user) => {
        if (confirm(`Delete user "${user.name}"? This cannot be undone.`)) {
            router.delete(`/admin/users/${user.id}`);
        }
    };

    return (
        <AdminLayout title="Admin Users">
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
                        <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: '0 0 0.25rem' }}>Admin Users</h1>
                        <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888', margin: 0 }}>
                            {users.length} admin {users.length === 1 ? 'user' : 'users'} with dashboard access
                        </p>
                    </div>
                    <button onClick={() => openDrawer()} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.6rem 1.5rem', cursor: 'pointer' }}>
                        + Add Admin User
                    </button>
                </div>

                {/* Warning */}
                <div style={{ background: '#FFFBEB', border: '1px solid #c9951a', borderRadius: '8px', padding: '0.875rem 1.25rem', marginBottom: '1.5rem', display: 'flex', alignItems: 'center', gap: '0.75rem' }}>
                    <span style={{ fontSize: '16px' }}>⚠️</span>
                    <p style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#c9951a', margin: 0, fontWeight: '500' }}>
                        Admin users have full access to the dashboard. Only add trusted people.
                    </p>
                </div>

                {/* Users List */}
                <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', overflow: 'hidden' }}>
                    <div style={{ padding: '1.25rem 1.5rem', borderBottom: '1px solid #f0f0f0' }}>
                        <h3 style={{ fontFamily: "'Montserrat', sans-serif", fontWeight: '600', fontSize: '15px', color: '#333', margin: 0 }}>
                            All Admin Users ({users.length})
                        </h3>
                    </div>
                    {users.map((user, i) => (
                        <div key={user.id} style={{ display: 'flex', alignItems: 'center', gap: '1rem', padding: '1rem 1.5rem', borderBottom: i < users.length - 1 ? '1px solid #f5f5f5' : 'none', transition: 'background 0.15s' }}
                            onMouseEnter={e => e.currentTarget.style.background = '#F5F6F9'}
                            onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
                        >
                            {/* Avatar */}
                            <div style={{ width: '46px', height: '46px', borderRadius: '50%', background: '#0d1f0d', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                                <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '16px', fontWeight: '700', color: '#c9951a' }}>
                                    {user.name?.[0]?.toUpperCase()}
                                </span>
                            </div>

                            {/* Info */}
                            <div style={{ flex: 1, minWidth: 0 }}>
                                <p style={{ margin: '0 0 0.2rem', fontFamily: "'Montserrat', sans-serif", fontSize: '14px', fontWeight: '600', color: '#333' }}>{user.name}</p>
                                <p style={{ margin: '0 0 0.2rem', fontFamily: "'Montserrat', sans-serif", fontSize: '13px', color: '#888' }}>{user.email}</p>
                                <p style={{ margin: 0, fontFamily: "'Montserrat', sans-serif", fontSize: '11px', color: '#aaa' }}>
                                    Joined {new Date(user.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                                </p>
                            </div>

                            {/* Badge */}
                            <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '11px', fontWeight: '600', background: '#F0FDF4', color: '#1a6b1a', border: '1px solid #1a6b1a', borderRadius: '999px', padding: '0.3rem 0.75rem', flexShrink: 0 }}>
                                Admin
                            </span>

                            {/* Actions */}
                            <div style={{ display: 'flex', gap: '0.4rem', flexShrink: 0 }}>
                                <button onClick={() => openDrawer(user)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#EFF6FF', color: '#3B82F6', border: '1px solid #3B82F6', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>Edit</button>
                                {users.length > 1 && (
                                    <button onClick={() => handleDelete(user)} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', fontWeight: '600', background: '#FEE2E2', color: '#dc3545', border: '1px solid #dc3545', borderRadius: '6px', padding: '0.4rem 0.75rem', cursor: 'pointer' }}>🗑️</button>
                                )}
                            </div>
                        </div>
                    ))}
                </div>

                {/* Slide-in Drawer */}
                <>
                    <div onClick={closeDrawer} style={{ position: 'fixed', inset: 0, background: 'rgba(0,0,0,0.5)', zIndex: 9998, opacity: drawerOpen ? 1 : 0, pointerEvents: drawerOpen ? 'auto' : 'none', transition: 'opacity 0.3s ease' }} />
                    <div style={{ position: 'fixed', top: 0, right: 0, bottom: 0, width: '100%', maxWidth: '440px', background: 'white', zIndex: 9999, overflowY: 'auto', boxShadow: '-8px 0 32px rgba(0,0,0,0.15)', display: 'flex', flexDirection: 'column', transform: drawerOpen ? 'translateX(0)' : 'translateX(100%)', transition: 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)' }}>
                        <div style={{ background: '#0d1f0d', padding: '1.5rem 2rem', display: 'flex', alignItems: 'center', justifyContent: 'space-between', flexShrink: 0 }}>
                            <h3 style={{ fontFamily: "'Playfair Display', serif", fontSize: '20px', fontWeight: '700', color: 'white', margin: 0 }}>
                                {editingUser ? `Edit — ${editingUser.name}` : 'Add Admin User'}
                            </h3>
                            <button onClick={closeDrawer} style={{ background: 'rgba(255,255,255,0.15)', border: '2px solid rgba(255,255,255,0.4)', color: 'white', width: '2rem', height: '2rem', borderRadius: '50%', cursor: 'pointer', fontSize: '1.1rem', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>×</button>
                        </div>
                        <div style={{ padding: '2rem', flex: 1 }}>
                            <form onSubmit={handleSubmit}>
                                <div style={{ marginBottom: '1rem' }}>
                                    <label style={labelStyle}>Full Name *</label>
                                    <input value={form.name} onChange={e => setForm({ ...form, name: e.target.value })} required placeholder="John Doe" style={inputStyle}
                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                </div>
                                <div style={{ marginBottom: '1rem' }}>
                                    <label style={labelStyle}>Email Address *</label>
                                    <input type="email" value={form.email} onChange={e => setForm({ ...form, email: e.target.value })} required placeholder="admin@sipifalls.com" style={inputStyle}
                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                </div>
                                <div style={{ marginBottom: '1rem' }}>
                                    <label style={labelStyle}>{editingUser ? 'New Password (leave blank to keep current)' : 'Password *'}</label>
                                    <input type="password" value={form.password} onChange={e => setForm({ ...form, password: e.target.value })} required={!editingUser} placeholder="Min 8 characters" style={inputStyle}
                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                </div>
                                <div style={{ marginBottom: '1.5rem' }}>
                                    <label style={labelStyle}>Confirm Password {!editingUser && '*'}</label>
                                    <input type="password" value={form.password_confirmation} onChange={e => setForm({ ...form, password_confirmation: e.target.value })} required={!editingUser} placeholder="Repeat password" style={inputStyle}
                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'} onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                </div>
                                <div style={{ display: 'flex', gap: '0.75rem' }}>
                                    <button type="submit" disabled={processing} style={{ flex: 1, fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: processing ? '#aaa' : '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.75rem', cursor: processing ? 'not-allowed' : 'pointer' }}>
                                        {processing ? 'Saving...' : editingUser ? 'Update User' : 'Create User'}
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

export default Index;
