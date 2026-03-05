import { useState } from 'react';
import { router, Link } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Table from '../../../Components/Admin/Table';
import Button from '../../../Components/Admin/Button';

function Index({ guides }) {
    const [loading, setLoading] = useState({});

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this tour guide?')) {
            setLoading({ ...loading, [`delete-${id}`]: true });
            router.delete(`/admin/tour-guides/${id}`, {
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
            key: 'name',
            label: 'Name',
            render: (name) => <span className="font-medium">{name}</span>
        },
        {
            key: 'title',
            label: 'Title'
        },
        {
            key: 'years_experience',
            label: 'Experience',
            render: (years) => `${years} years`
        },
        {
            key: 'phone',
            label: 'Phone'
        },
        {
            key: 'is_active',
            label: 'Status',
            render: (isActive) => (
                <span
                    className="px-3 py-1 rounded-full text-xs font-semibold"
                    style={{
                        backgroundColor: isActive ? 'var(--success-light)' : 'var(--neutral-light)',
                        color: isActive ? 'var(--success)' : 'var(--neutral-gray)'
                    }}
                >
                    {isActive ? 'Active' : 'Inactive'}
                </span>
            )
        },
        {
            key: 'actions',
            label: 'Actions',
            render: (_, guide) => (
                <div className="flex gap-2">
                    <Link href={`/admin/tour-guides/${guide.id}/edit`}>
                        <Button size="sm" variant="secondary">
                            Edit
                        </Button>
                    </Link>
                    <Button
                        size="sm"
                        variant="danger"
                        onClick={() => handleDelete(guide.id)}
                        loading={loading[`delete-${guide.id}`]}
                    >
                        Delete
                    </Button>
                </div>
            )
        }
    ];

    return (
        <AdminLayout title="Tour Guides">
            <div className="space-y-6">
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                                Tour Guides
                            </h2>
                            <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                                Manage your tour guide team
                            </p>
                        </div>
                        <Link href="/admin/tour-guides/create">
                            <Button variant="primary">
                                ➕ Add Tour Guide
                            </Button>
                        </Link>
                    </div>
                </div>

                <Table
                    columns={columns}
                    data={guides.data}
                    emptyMessage="No tour guides found"
                />

                {guides.last_page > 1 && (
                    <div className="bg-white rounded-lg shadow p-4">
                        <div className="flex justify-between items-center">
                            <div style={{ color: 'var(--neutral-gray)' }}>
                                Showing {guides.from} to {guides.to} of {guides.total} guides
                            </div>
                            <div className="flex gap-2">
                                {guides.links.map((link, index) => (
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
