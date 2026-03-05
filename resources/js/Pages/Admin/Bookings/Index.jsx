import React, { useState } from 'react';
import { router, Link } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import Table from '@/Components/Admin/Table';
import Button from '@/Components/Admin/Button';

function Index({ bookings, filters, counts }) {
    const [search, setSearch] = useState(filters.search || '');
    const [status, setStatus] = useState(filters.status || 'all');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/admin/bookings', { search, status }, {
            preserveState: true,
            replace: true
        });
    };

    const handleStatusFilter = (newStatus) => {
        setStatus(newStatus);
        router.get('/admin/bookings', { search, status: newStatus }, {
            preserveState: true,
            replace: true
        });
    };

    const handleUpdateStatus = (id, newStatus) => {
        router.post(`/admin/bookings/${id}/update-status`, { status: newStatus }, {
            preserveState: true
        });
    };

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this booking?')) {
            router.delete(`/admin/bookings/${id}`);
        }
    };

    const getStatusColor = (status) => {
        switch (status) {
            case 'confirmed':
                return 'var(--success)';
            case 'pending':
                return 'var(--warning)';
            case 'cancelled':
                return 'var(--error)';
            default:
                return 'var(--neutral-gray)';
        }
    };

    const columns = [
        {
            label: 'Name',
            key: 'fullname'
        },
        {
            label: 'Email',
            key: 'email'
        },
        {
            label: 'Travel Date',
            key: 'date_of_travel',
            render: (value) => new Date(value).toLocaleDateString()
        },
        {
            label: 'Guests',
            key: 'guests',
            render: (_, row) => `${row.num_adults} adults, ${row.num_children} children`
        },
        {
            label: 'Status',
            key: 'status',
            render: (value) => (
                <span
                    className="px-3 py-1 text-xs font-medium rounded-full text-white capitalize"
                    style={{ backgroundColor: getStatusColor(value) }}
                >
                    {value}
                </span>
            )
        },
        {
            label: 'Actions',
            key: 'actions',
            render: (_, row) => (
                <div className="flex flex-wrap gap-2">
                    {row.status !== 'confirmed' && (
                        <Button
                            size="sm"
                            variant="success"
                            onClick={() => handleUpdateStatus(row.id, 'confirmed')}
                        >
                            Confirm
                        </Button>
                    )}
                    {row.status !== 'pending' && (
                        <Button
                            size="sm"
                            variant="secondary"
                            onClick={() => handleUpdateStatus(row.id, 'pending')}
                        >
                            Pending
                        </Button>
                    )}
                    {row.status !== 'cancelled' && (
                        <Button
                            size="sm"
                            variant="danger"
                            onClick={() => handleUpdateStatus(row.id, 'cancelled')}
                        >
                            Cancel
                        </Button>
                    )}
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
        <AdminLayout title="Bookings">
            <div className="space-y-6">
                {/* Header with counts */}
                <div className="flex items-center justify-between">
                    <div>
                        <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-gray)' }}>
                            Bookings
                        </h2>
                        <p className="text-gray-600 mt-1">
                            {counts.total} total bookings
                        </p>
                    </div>
                </div>

                {/* Status badges */}
                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div className="bg-white rounded-lg shadow p-4">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm text-gray-600">Pending</p>
                                <p className="text-2xl font-bold" style={{ color: 'var(--warning)' }}>
                                    {counts.pending}
                                </p>
                            </div>
                            <span className="text-3xl">⏳</span>
                        </div>
                    </div>
                    <div className="bg-white rounded-lg shadow p-4">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm text-gray-600">Confirmed</p>
                                <p className="text-2xl font-bold" style={{ color: 'var(--success)' }}>
                                    {counts.confirmed}
                                </p>
                            </div>
                            <span className="text-3xl">✅</span>
                        </div>
                    </div>
                    <div className="bg-white rounded-lg shadow p-4">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm text-gray-600">Cancelled</p>
                                <p className="text-2xl font-bold" style={{ color: 'var(--error)' }}>
                                    {counts.cancelled}
                                </p>
                            </div>
                            <span className="text-3xl">❌</span>
                        </div>
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
                                    placeholder="Search by name or email..."
                                    className="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2"
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
                                variant={status === 'pending' ? 'primary' : 'secondary'}
                                onClick={() => handleStatusFilter('pending')}
                            >
                                Pending
                            </Button>
                            <Button
                                variant={status === 'confirmed' ? 'primary' : 'secondary'}
                                onClick={() => handleStatusFilter('confirmed')}
                            >
                                Confirmed
                            </Button>
                            <Button
                                variant={status === 'cancelled' ? 'primary' : 'secondary'}
                                onClick={() => handleStatusFilter('cancelled')}
                            >
                                Cancelled
                            </Button>
                        </div>
                    </div>
                </div>

                {/* Bookings Table */}
                <Table
                    columns={columns}
                    data={bookings.data}
                    emptyMessage="No bookings found"
                />

                {/* Pagination */}
                {bookings.links && bookings.links.length > 3 && (
                    <div className="flex justify-center gap-2">
                        {bookings.links.map((link, index) => (
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
