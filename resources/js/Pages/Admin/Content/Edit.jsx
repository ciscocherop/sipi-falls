import { useForm, usePage } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import AdminLayout from '../../../Layouts/AdminLayout';

function Edit({ page, pageName, contents }) {
    const { data, setData, post, processing, errors } = useForm({
        contents: contents.map(c => ({ key: c.key, value: c.value }))
    });

    const [openSections, setOpenSections] = useState({});
    const { flash } = usePage().props;
    const [flashMsg, setFlashMsg] = useState(null);

    useEffect(() => {
        if (flash.success) {
            setFlashMsg(flash.success);
            const t = setTimeout(() => setFlashMsg(null), 3000);
            return () => clearTimeout(t);
        }
    }, [flash]);

    const handleSubmit = (e) => {
        e.preventDefault();
        post(`/admin/content/${page}`);
    };

    const updateContent = (index, value) => {
        const newContents = [...data.contents];
        newContents[index].value = value;
        setData('contents', newContents);
    };

    const toggleSection = (section) => {
        setOpenSections(prev => ({ ...prev, [section]: !prev[section] }));
    };

    const groupedContents = () => {
        if (page !== 'travelguide') return null;
        const groups = { 'Essential Tips': [], 'Activities': [] };
        contents.forEach((content, index) => {
            if (content.key.includes('activity')) groups['Activities'].push({ content, index });
            else groups['Essential Tips'].push({ content, index });
        });
        return groups;
    };

    const groups = groupedContents();

    const inputStyle = {
        width: '100%', padding: '0.75rem 1rem',
        border: '2px solid #e0e0e0', borderRadius: '8px',
        fontFamily: "'Montserrat', sans-serif", fontSize: '14px',
        color: '#333', outline: 'none', boxSizing: 'border-box',
    };

    const labelStyle = {
        fontFamily: "'Montserrat', sans-serif", fontSize: '13px',
        fontWeight: '600', color: '#555', display: 'block', marginBottom: '0.5rem',
    };

    return (
        <AdminLayout title={`Edit ${pageName}`}>
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
                        <button onClick={() => window.history.back()} style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', color: '#1a6b1a', background: 'none', border: 'none', cursor: 'pointer', padding: 0, marginBottom: '0.5rem', display: 'block' }}>
                            ← Back to Content
                        </button>
                        <h1 style={{ fontFamily: "'Playfair Display', serif", fontSize: '26px', fontWeight: '700', color: '#0d1f0d', margin: 0 }}>
                            Edit {pageName}
                        </h1>
                    </div>
                    <button type="button" onClick={handleSubmit} disabled={processing}
                        style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '13px', fontWeight: '600', background: processing ? '#aaa' : '#1a6b1a', color: 'white', border: 'none', borderRadius: '8px', padding: '0.7rem 1.5rem', cursor: processing ? 'not-allowed' : 'pointer' }}>
                        {processing ? 'Saving...' : '💾 Save Changes'}
                    </button>
                </div>

                <form onSubmit={handleSubmit}>
                    {groups ? (
                        Object.entries(groups).map(([groupName, items]) => (
                            <div key={groupName} style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', marginBottom: '1rem', overflow: 'hidden' }}>
                                <button type="button" onClick={() => toggleSection(groupName)}
                                    style={{ width: '100%', padding: '1.25rem 1.5rem', display: 'flex', justifyContent: 'space-between', alignItems: 'center', background: 'none', border: 'none', cursor: 'pointer', borderBottom: openSections[groupName] ? '1px solid #f0f0f0' : 'none' }}>
                                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.75rem' }}>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '15px', fontWeight: '600', color: '#1a6b1a' }}>{groupName}</span>
                                        <span style={{ fontFamily: "'Montserrat', sans-serif", fontSize: '12px', background: '#f0f0f0', color: '#888', borderRadius: '999px', padding: '2px 10px' }}>{items.length} fields</span>
                                    </div>
                                    <span style={{ color: '#888', transition: 'transform 0.2s', display: 'inline-block', transform: openSections[groupName] ? 'rotate(180deg)' : 'rotate(0)' }}>▼</span>
                                </button>
                                {openSections[groupName] && (
                                    <div style={{ padding: '1.5rem' }}>
                                        {items.map(({ content, index }) => (
                                            <div key={content.key} style={{ marginBottom: '1.5rem', paddingBottom: '1.5rem', borderBottom: '1px solid #f5f5f5' }}>
                                                <label style={labelStyle}>{content.label} *</label>
                                                {content.type === 'textarea' ? (
                                                    <textarea value={data.contents[index].value} onChange={e => updateContent(index, e.target.value)} rows={4}
                                                        style={{ ...inputStyle, resize: 'vertical' }}
                                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                                                        onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                                ) : (
                                                    <input type={content.type} value={data.contents[index].value} onChange={e => updateContent(index, e.target.value)}
                                                        style={inputStyle}
                                                        onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                                                        onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                                )}
                                            </div>
                                        ))}
                                    </div>
                                )}
                            </div>
                        ))
                    ) : (
                        <div style={{ background: 'white', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)', padding: '2rem' }}>
                            {contents.map((content, index) => (
                                <div key={content.key} style={{ marginBottom: '1.5rem', paddingBottom: '1.5rem', borderBottom: index < contents.length - 1 ? '1px solid #f5f5f5' : 'none' }}>
                                    <label style={labelStyle}>{content.label} *</label>
                                    {content.type === 'textarea' ? (
                                        <textarea value={data.contents[index].value} onChange={e => updateContent(index, e.target.value)} rows={4}
                                            style={{ ...inputStyle, resize: 'vertical' }}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                                            onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    ) : (
                                        <input type={content.type} value={data.contents[index].value} onChange={e => updateContent(index, e.target.value)}
                                            style={inputStyle}
                                            onFocus={e => e.target.style.borderColor = '#1a6b1a'}
                                            onBlur={e => e.target.style.borderColor = '#e0e0e0'} />
                                    )}
                                </div>
                            ))}
                        </div>
                    )}
                </form>

            </div>
        </AdminLayout>
    );
}

export default Edit;
