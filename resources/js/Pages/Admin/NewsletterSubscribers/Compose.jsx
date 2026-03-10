import { useState, useEffect } from 'react';
import { useForm, usePage } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Compose({ activeCount }) {
    const { data, setData, post, processing, errors } = useForm({
        subject: '',
        content: ''
    });

    // Flash message state
    const { flash } = usePage().props;
    const [showFlash, setShowFlash] = useState(false);

    useEffect(() => {
        if (flash.success || flash.error) {
            setShowFlash(true);
            const timer = setTimeout(() => {
                setShowFlash(false);
            }, 5000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    const handleSubmit = (e) => {
        e.preventDefault();

        const message = activeCount === 0
            ? 'There are no active subscribers to send to. Do you want to continue anyway?'
            : `Are you sure you want to send this newsletter to ${activeCount} active subscriber${activeCount !== 1 ? 's' : ''}?`;

        if (confirm(message)) {
            post('/admin/newsletter-subscribers/send');
        }
    };

    return (
        <AdminLayout title="Send Newsletter">
            <div className="space-y-6">
                {/* Flash Messages */}
                {showFlash && flash.success && (
                    <div className="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
                        <div className="flex items-center justify-between">
                            <div className="flex items-center">
                                <svg className="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" />
                                </svg>
                                <p className="text-green-700 font-medium">{flash.success}</p>
                            </div>
                            <button onClick={() => setShowFlash(false)} className="text-green-500 hover:text-green-700">
                                <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                )}

                {showFlash && flash.error && (
                    <div className="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
                        <div className="flex items-center justify-between">
                            <div className="flex items-center">
                                <svg className="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clipRule="evenodd" />
                                </svg>
                                <p className="text-red-700 font-medium">{flash.error}</p>
                            </div>
                            <button onClick={() => setShowFlash(false)} className="text-red-500 hover:text-red-700">
                                <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                )}

                {/* Header */}
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                                Compose Newsletter
                            </h2>
                            <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                                Send an email to all active subscribers
                            </p>
                        </div>
                        <div className="text-right">
                            <div className="text-3xl font-bold" style={{ color: 'var(--primary-green)' }}>
                                {activeCount}
                            </div>
                            <div className="text-sm" style={{ color: 'var(--neutral-gray)' }}>
                                Active Subscribers
                            </div>
                        </div>
                    </div>
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
