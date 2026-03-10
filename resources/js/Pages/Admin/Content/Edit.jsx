import { useForm, usePage } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Edit({ page, pageName, contents }) {
    const { data, setData, post, processing, errors } = useForm({
        contents: contents.map(c => ({ key: c.key, value: c.value }))
    });

    // State for accordion sections
    const [openSections, setOpenSections] = useState({});

    // Flash message state
    const { flash } = usePage().props;
    const [showFlash, setShowFlash] = useState(false);

    useEffect(() => {
        if (flash.success) {
            setShowFlash(true);
            const timer = setTimeout(() => {
                setShowFlash(false);
            }, 3000);
            return () => clearTimeout(timer);
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
        setOpenSections(prev => ({
            ...prev,
            [section]: !prev[section]
        }));
    };

    // Group contents by category for travel guide
    const groupedContents = () => {
        if (page !== 'travelguide') {
            // For non-travel guide pages, don't group - show all fields normally
            return null;
        }

        const groups = {
            'Essential Tips': [],
            'Activities': []
        };

        contents.forEach((content, index) => {
            if (content.key.includes('activity')) {
                groups['Activities'].push({ content, index });
            } else {
                groups['Essential Tips'].push({ content, index });
            }
        });

        return groups;
    };

    const groups = groupedContents();

    return (
        <AdminLayout title={`Edit ${pageName}`}>
            <div className="space-y-6">
                {/* Flash Message */}
                {showFlash && flash.success && (
                    <div className="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm animate-fade-in">
                        <div className="flex items-center justify-between">
                            <div className="flex items-center">
                                <svg className="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" />
                                </svg>
                                <p className="text-green-700 font-medium">{flash.success}</p>
                            </div>
                            <button
                                onClick={() => setShowFlash(false)}
                                className="text-green-500 hover:text-green-700"
                            >
                                <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                )}

                {/* Header */}
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                        Edit {pageName}
                    </h2>
                    <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                        Update the content that appears on your website
                    </p>
                </div>

                {/* Edit Form */}
                <form onSubmit={handleSubmit} className="space-y-4">
                    {groups ? (
                        // Travel Guide: Show accordion sections
                        Object.entries(groups).map(([groupName, items]) => (
                            <div key={groupName} className="bg-white rounded-lg shadow overflow-hidden">
                                {/* Accordion Header */}
                                <button
                                    type="button"
                                    onClick={() => toggleSection(groupName)}
                                    className="w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 transition-colors"
                                    style={{ borderBottom: openSections[groupName] ? '1px solid #e5e7eb' : 'none' }}
                                >
                                    <div className="flex items-center gap-3">
                                        <span className="text-lg font-semibold" style={{ color: 'var(--primary-green)' }}>
                                            {groupName}
                                        </span>
                                        <span className="text-sm px-2 py-1 rounded-full bg-gray-100" style={{ color: 'var(--neutral-gray)' }}>
                                            {items.length} {items.length === 1 ? 'field' : 'fields'}
                                        </span>
                                    </div>
                                    <svg
                                        className={`w-5 h-5 transition-transform ${openSections[groupName] ? 'rotate-180' : ''}`}
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                {/* Accordion Content */}
                                {openSections[groupName] && (
                                    <div className="p-6 space-y-6">
                                        {items.map(({ content, index }) => (
                                            <div key={content.key} className="pb-6 border-b last:border-b-0">
                                                <label
                                                    htmlFor={content.key}
                                                    className="block text-sm font-medium mb-2"
                                                    style={{ color: 'var(--neutral-dark)' }}
                                                >
                                                    {content.label} <span style={{ color: 'var(--accent-coral)' }}>*</span>
                                                </label>

                                                {content.type === 'textarea' ? (
                                                    <textarea
                                                        id={content.key}
                                                        value={data.contents[index].value}
                                                        onChange={(e) => updateContent(index, e.target.value)}
                                                        rows="4"
                                                        className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                                        style={{
                                                            borderColor: errors[`contents.${index}.value`] ? 'var(--accent-coral)' : '#d1d5db',
                                                            '--tw-ring-color': 'var(--primary-green)'
                                                        }}
                                                    />
                                                ) : (
                                                    <input
                                                        type={content.type}
                                                        id={content.key}
                                                        value={data.contents[index].value}
                                                        onChange={(e) => updateContent(index, e.target.value)}
                                                        className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                                        style={{
                                                            borderColor: errors[`contents.${index}.value`] ? 'var(--accent-coral)' : '#d1d5db',
                                                            '--tw-ring-color': 'var(--primary-green)'
                                                        }}
                                                    />
                                                )}

                                                {errors[`contents.${index}.value`] && (
                                                    <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>
                                                        {errors[`contents.${index}.value`]}
                                                    </p>
                                                )}
                                            </div>
                                        ))}
                                    </div>
                                )}
                            </div>
                        ))
                    ) : (
                        // Other pages: Show regular form
                        <div className="bg-white rounded-lg shadow p-6 space-y-6">
                            {contents.map((content, index) => (
                                <div key={content.key}>
                                    <label
                                        htmlFor={content.key}
                                        className="block text-sm font-medium mb-2"
                                        style={{ color: 'var(--neutral-dark)' }}
                                    >
                                        {content.label} <span style={{ color: 'var(--accent-coral)' }}>*</span>
                                    </label>

                                    {content.type === 'textarea' ? (
                                        <textarea
                                            id={content.key}
                                            value={data.contents[index].value}
                                            onChange={(e) => updateContent(index, e.target.value)}
                                            rows="4"
                                            className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                            style={{
                                                borderColor: errors[`contents.${index}.value`] ? 'var(--accent-coral)' : '#d1d5db',
                                                '--tw-ring-color': 'var(--primary-green)'
                                            }}
                                        />
                                    ) : (
                                        <input
                                            type={content.type}
                                            id={content.key}
                                            value={data.contents[index].value}
                                            onChange={(e) => updateContent(index, e.target.value)}
                                            className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                            style={{
                                                borderColor: errors[`contents.${index}.value`] ? 'var(--accent-coral)' : '#d1d5db',
                                                '--tw-ring-color': 'var(--primary-green)'
                                            }}
                                        />
                                    )}

                                    {errors[`contents.${index}.value`] && (
                                        <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>
                                            {errors[`contents.${index}.value`]}
                                        </p>
                                    )}
                                </div>
                            ))}
                        </div>
                    )}

                    {/* Action Buttons - Sticky at bottom */}
                    <div className="bg-white rounded-lg shadow p-6 sticky bottom-4">
                        <div className="flex gap-4">
                            <Button
                                type="submit"
                                variant="primary"
                                loading={processing}
                            >
                                💾 Save Changes
                            </Button>
                            <Button
                                type="button"
                                variant="secondary"
                                onClick={() => window.history.back()}
                                disabled={processing}
                            >
                                Cancel
                            </Button>
                        </div>
                    </div>
                </form>
            </div>
        </AdminLayout>
    );
}

export default Edit;
