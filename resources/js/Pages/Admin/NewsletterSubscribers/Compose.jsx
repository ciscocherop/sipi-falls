import { useState } from 'react';
import { useForm } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Compose() {
    const { data, setData, post, processing, errors } = useForm({
        subject: '',
        content: ''
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        if (confirm('Are you sure you want to send this newsletter to all active subscribers?')) {
            post('/admin/newsletter-subscribers/send');
        }
    };

    return (
        <AdminLayout title="Send Newsletter">
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                        Compose Newsletter
                    </h2>
                    <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                        Send an email to all active subscribers
                    </p>
                </div>

                {/* Compose Form */}
                <div className="bg-white rounded-lg shadow p-6">
                    <form onSubmit={handleSubmit} className="space-y-6">
                        {/* Subject Field */}
                        <div>
                            <label
                                htmlFor="subject"
                                className="block text-sm font-medium mb-2"
                                style={{ color: 'var(--neutral-dark)' }}
                            >
                                Subject <span style={{ color: 'var(--accent-coral)' }}>*</span>
                            </label>
                            <input
                                type="text"
                                id="subject"
                                value={data.subject}
                                onChange={(e) => setData('subject', e.target.value)}
                                className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                style={{
                                    borderColor: errors.subject ? 'var(--accent-coral)' : '#d1d5db',
                                    '--tw-ring-color': 'var(--primary-green)'
                                }}
                                placeholder="Enter email subject..."
                            />
                            {errors.subject && (
                                <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>
                                    {errors.subject}
                                </p>
                            )}
                        </div>

                        {/* Content Field */}
                        <div>
                            <label
                                htmlFor="content"
                                className="block text-sm font-medium mb-2"
                                style={{ color: 'var(--neutral-dark)' }}
                            >
                                Message <span style={{ color: 'var(--accent-coral)' }}>*</span>
                            </label>
                            <textarea
                                id="content"
                                value={data.content}
                                onChange={(e) => setData('content', e.target.value)}
                                rows="12"
                                className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                style={{
                                    borderColor: errors.content ? 'var(--accent-coral)' : '#d1d5db',
                                    '--tw-ring-color': 'var(--primary-green)'
                                }}
                                placeholder="Write your newsletter message here..."
                            />
                            {errors.content && (
                                <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>
                                    {errors.content}
                                </p>
                            )}
                            <p className="mt-2 text-sm" style={{ color: 'var(--neutral-gray)' }}>
                                Your message will be sent with Sipi Falls branding and formatting.
                            </p>
                        </div>

                        {/* Preview Box */}
                        <div className="border rounded-lg p-4" style={{ backgroundColor: 'var(--neutral-light)' }}>
                            <h3 className="text-sm font-semibold mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                Preview
                            </h3>
                            <div className="bg-white rounded p-4 border">
                                <div
                                    className="text-lg font-bold mb-2"
                                    style={{ color: 'var(--primary-green)' }}
                                >
                                    {data.subject || 'Your subject will appear here'}
                                </div>
                                <div
                                    className="text-sm whitespace-pre-wrap"
                                    style={{ color: 'var(--neutral-gray)' }}
                                >
                                    {data.content || 'Your message will appear here'}
                                </div>
                            </div>
                        </div>

                        {/* Action Buttons */}
                        <div className="flex gap-4">
                            <Button
                                type="submit"
                                variant="primary"
                                loading={processing}
                                disabled={!data.subject || !data.content}
                            >
                                📧 Send Newsletter
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
                    </form>
                </div>
            </div>
        </AdminLayout>
    );
}

export default Compose;
