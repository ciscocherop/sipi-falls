import React, { useState } from 'react';
import { router, Link } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import Table from '@/Components/Admin/Table';
import Button from '@/Components/Admin/Button';

function Index({ messages, filters, counts }) {
    const [search, setSearch] = useState(filters.search || '');
    const [status, setStatus] = useState(filters.status || 'all');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/admin/contact-messages', { search, status }, {
            preserveState: true,
            replace: true
        });
    };

    const handleStatusFilter = (newStatus) => {
        setStatus(newStatus);
        router.get('/admin/contact-messages', { search, status: newStatus }, {
            preserveState: true,
            replace: true
        });
    };

    const handleToggleRead = (id) => {
        router.post(`/admin/contact-messages/${id}/toggle-read`, {}, {
            preserveState: true
        });
    };

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this message?')) {
            router.delete(`/admin/contact-messages/${id}`);
        }
    };

    const columns = [
        {
            label: 'Name',
            key: 'full_name',
            render: (value, row) => (
                <div className="flex items-center">
                    {!row.is_read && (
                        <span
                            className="w-2 h-2 rounded-full mr-2"
                            style={{ backgroundColor: 'var(--accent-coral)' }}
                        />
                    )}
                    <span className={!row.is_read ? 'font-semibold' : ''}>
                        {row.first_name} {row.last_name}
                    </span>
                </div>
            )
        },
        {
            label: 'Email',
            key: 'email'
        },
        {
            label: 'Subject',
            key: 'subject'
        },
        {
            label: 'Date',
            key: 'created_at',
            render: (value) => new Date(value).toLocaleDateString()
        },
        {
            label: 'Actions',
            key: 'actions',
            render: (_, row) => (
                <div className="flex space-x-2">
                    <Link href={`/admin/contact-messages/${row.id}`}>
                        <Button size="sm" variant="primary">
                            View
                        </Button>
                    </Link>
                    <Button
                        size="sm"
                        variant="secondary"
                        onClick={() => handleToggleRead(row.id)}
                    >
                        {row.is_read ? 'Mark Unread' : 'Mark Read'}
                    </Button>
                    <Button
                        size="sm"
                        variant="danger"
                        onClick={() => handleDelete(row.id)}
                    >
                        Delete
                    </Button>
                </div>
            )
        }
    ];

    return (
        <AdminLayout title="Contact Messages">
            <div className="space-y-6">
                {/* Header with counts */}
                <div className="flex items-center justify-between">
                    <div>
                        <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-gray)' }}>
                            Contact Messages
                        </h2>
                        <p className="text-gray-600 mt-1">
                            {counts.unread} unread of {counts.total} total messages
                        </p>
                    </div>
                </div>

                {/* Filters */}
                <div className="bg-white rounded-lg shadow p-4">
                    <div className="flex flex-col md:flex-row gap-4">
                        {/* Search */}
                        <form onSubmit={handleSearch} className="flex-1">
                            <div className="flex gap-2">
                                <input
                                    type="text"
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                    placeholder="Search by name, email, or subject..."
                                    className="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2"
                                    style={{ focusRing: 'var(--primary-green)' }}
                                />
                                <Button type="submit" variant="primary">
                                    Search
                                </Button>
                            </div>
                        </form>

                        {/* Status filter */}
                        <div className="flex gap-2">
                            <Button
                                variant={status === 'all' ? 'primary' : 'secondary'}
                                onClick={() => handleStatusFilter('all')}
                            >
                                All
                            </Button>
                            <Button
                                variant={status === 'unread' ? 'primary' : 'secondary'}
                                onClick={() => handleStatusFilter('unread')}
                            >
                                Unread ({counts.unread})
                            </Button>
                            <Button
                                variant={status === 'read' ? 'primary' : 'secondary'}
                                onClick={() => handleStatusFilter('read')}
                            >
                                Read
                            </Button>
                        </div>
                    </div>
                </div>

                {/* Messages Table */}
                <Table
                    columns={columns}
                    data={messages.data}
                    emptyMessage="No messages found"
                />

                {/* Pagination */}
                {messages.links && messages.links.length > 3 && (
                    <div className="flex justify-center gap-2">
                        {messages.links.map((link, index) => (
                            <Link
                                key={index}
                                href={link.url || '#'}
                                className={`px-4 py-2 rounded-md ${link.active
                                        ? 'text-white'
                                        : 'bg-white text-gray-700 hover:bg-gray-50'
                                    }`}
                                style={link.active ? { backgroundColor: 'var(--primary-green)' } : {}}
                                dangerouslySetInnerHTML={{ __html: link.label }}
                            />
                        ))}
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}

export default Index;
