import React, { useState, useEffect } from 'react';
import { router, Link, usePage } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Table from '../../../Components/Admin/Table';
import Button from '../../../Components/Admin/Button';

function Index({ subscribers, activeCount, filters }) {
    const [search, setSearch] = useState(filters.search || '');
    const [loading, setLoading] = useState({});

    // Flash message state
    const { flash } = usePage().props;
    const [showFlash, setShowFlash] = useState(false);

    useEffect(() => {
        if (flash.success || flash.error) {
            setShowFlash(true);
            const timer = setTimeout(() => {
                setShowFlash(false);
            }, 3000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/admin/newsletter-subscribers', { search }, {
            preserveState: true,
            preserveScroll: true
        });
    };

    const handleToggleStatus = (id) => {
        if (confirm('Are you sure you want to change this subscriber\'s status?')) {
            setLoading({ ...loading, [`toggle-${id}`]: true });
            router.post(`/admin/newsletter-subscribers/${id}/toggle-status`, {}, {
                preserveState: true,
                preserveScroll: true,
                onFinish: () => {
                    setLoading({ ...loading, [`toggle-${id}`]: false });
                }
            });
        }
    };

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this subscriber? This action cannot be undone.')) {
            setLoading({ ...loading, [`delete-${id}`]: true });
            router.delete(`/admin/newsletter-subscribers/${id}`, {
                preserveState: true,
                preserveScroll: true,
                onFinish: () => {
                    setLoading({ ...loading, [`delete-${id}`]: false });
                }
            });
        }
    };

    const columns = [
        {
            key: 'email',
            label: 'Email Address',
            render: (email) => (
                <span className="font-medium">{email}</span>
            )
        },
        {
            key: 'created_at',
            label: 'Subscribed Date',
            render: (date) => new Date(date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            })
        },
        {
            key: 'status',
            label: 'Status',
            render: (status) => (
                <span
                    className="px-3 py-1 rounded-full text-xs font-semibold"
                    style={{
                        backgroundColor: status === 'active' ? 'var(--success-light)' : 'var(--neutral-light)',
                        color: status === 'active' ? 'var(--success)' : 'var(--neutral-gray)'
                    }}
                >
                    {status === 'active' ? 'Active' : 'Unsubscribed'}
                </span>
            )
        },
        {
            key: 'actions',
            label: 'Actions',
            render: (_, subscriber) => (
                <div className="flex gap-2">
                    <Button
                        size="sm"
                        variant={subscriber.status === 'active' ? 'secondary' : 'success'}
                        onClick={() => handleToggleStatus(subscriber.id)}
                        loading={loading[`toggle-${subscriber.id}`]}
                    >
                        {subscriber.status === 'active' ? 'Unsubscribe' : 'Reactivate'}
                    </Button>
                    <Button
                        size="sm"
                        variant="danger"
                        onClick={() => handleDelete(subscriber.id)}
                        loading={loading[`delete-${subscriber.id}`]}
                    >
                        Delete
                    </Button>
                </div>
            )
        }
    ];

    return (
        <AdminLayout title="Newsletter Subscribers">
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

                {/* Header with Stats */}
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                                Newsletter Subscribers
                            </h2>
                            <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                                Manage your newsletter subscriber list
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

                {/* Search Bar */}
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between mb-4">
                        <h3 className="text-lg font-semibold" style={{ color: 'var(--neutral-dark)' }}>
                            Manage Subscribers
                        </h3>
                        <Link href="/admin/newsletter-subscribers/compose">
                            <Button variant="primary">
                                📧 Send Newsletter
                            </Button>
                        </Link>
                    </div>

                    <form onSubmit={handleSearch} className="flex gap-4">
                        <input
                            type="text"
                            placeholder="Search by email..."
                            value={search}
                            onChange={(e) => setSearch(e.target.value)}
                            className="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2"
                            style={{ '--tw-ring-color': 'var(--primary-green)' }}
                        />
                        <Button type="submit" variant="primary">
                            Search
                        </Button>
                        {filters.search && (
                            <Button
                                type="button"
                                variant="secondary"
                                onClick={() => {
                                    setSearch('');
                                    router.get('/admin/newsletter-subscribers');
                                }}
                            >
                                Clear
                            </Button>
                        )}
                    </form>
                </div>

                {/* Subscribers Table */}
                <Table
                    columns={columns}
                    data={subscribers.data}
                    emptyMessage="No subscribers found"
                />

                {/* Pagination */}
                {subscribers.last_page > 1 && (
                    <div className="bg-white rounded-lg shadow p-4">
                        <div className="flex justify-between items-center">
                            <div style={{ color: 'var(--neutral-gray)' }}>
                                Showing {subscribers.from} to {subscribers.to} of {subscribers.total} subscribers
                            </div>
                            <div className="flex gap-2">
                                {subscribers.links.map((link, index) => (
                                    <button
                                        key={index}
                                        onClick={() => link.url && router.get(link.url)}
                                        disabled={!link.url}
                                        className="px-3 py-1 rounded-md text-sm font-medium disabled:opacity-50 disabled:cursor-not-allowed"
                                        style={{
                                            backgroundColor: link.active ? 'var(--primary-green)' : 'transparent',
                                            color: link.active ? 'white' : 'var(--neutral-gray)',
                                            border: link.active ? 'none' : '1px solid var(--neutral-light)'
                                        }}
                                        dangerouslySetInnerHTML={{ __html: link.label }}
                                    />
                                ))}
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}

export default Index;
