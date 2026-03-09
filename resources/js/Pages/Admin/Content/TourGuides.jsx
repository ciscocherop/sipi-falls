import AdminLayout from '../../../Layouts/AdminLayout';
import Table from '../../../Components/Admin/Table';
import Button from '../../../Components/Admin/Button';
import { useState } from 'react';

function TourGuides({ pageName, tourGuides = [] }) {
    const [showAddForm, setShowAddForm] = useState(false);
    const [editingGuide, setEditingGuide] = useState(null);

    // Ensure tourGuides is an array
    const safeGuides = Array.isArray(tourGuides) ? tourGuides : [];

    const columns = [
        {
            key: 'name',
            label: 'Name',
            render: (value, guide) => (
                <div>
                    <div className="font-medium">{guide.name || 'No name'}</div>
                    <div className="text-sm text-gray-500">{guide.title || 'No title'}</div>
                </div>
            )
        },
        {
            key: 'experience',
            label: 'Experience',
            render: (value, guide) => {
                const years = guide.years_experience || 0;
                return years > 0 ? `${years} years` : 'N/A';
            }
        },
        {
            key: 'contact',
            label: 'Contact',
            render: (value, guide) => (
                <div className="text-sm">
                    {guide.phone && <div>📞 {guide.phone}</div>}
                    {guide.email && <div>✉️ {guide.email}</div>}
                </div>
            )
        },
        {
            key: 'status',
            label: 'Status',
            render: (value, guide) => (
                <span className={`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${guide.is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                    }`}>
                    {guide.is_active ? 'Active' : 'Inactive'}
                </span>
            )
        },
        {
            key: 'actions',
            label: 'Actions',
            render: (value, guide) => (
                <div className="flex space-x-2">
                    <Button
                        variant="secondary"
                        size="sm"
                        onClick={() => setEditingGuide(guide)}
                    >
                        Edit
                    </Button>
                    <Button
                        variant="danger"
                        size="sm"
                        onClick={() => handleDelete(guide.id)}
                    >
                        Delete
                    </Button>
                </div>
            )
        }
    ];

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this tour guide?')) {
            // Handle delete logic here
            console.log('Delete tour guide:', id);
        }
    };

    return (
        <AdminLayout title={pageName}>
            <div className="space-y-6">
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold text-gray-800">{pageName}</h2>
                            <p className="text-gray-600">Manage tour guides</p>
                        </div>
                        <Button
                            variant="primary"
                            onClick={() => setShowAddForm(true)}
                        >
                            Add Tour Guide
                        </Button>
                    </div>
                </div>

                <div className="bg-white rounded-lg shadow">
                    <div className="p-6 border-b">
                        <h3 className="text-lg font-semibold">
                            Current Tour Guides ({safeGuides.length})
                        </h3>
                    </div>

                    {safeGuides.length > 0 ? (
                        <Table
                            data={safeGuides}
                            columns={columns}
                            emptyMessage="No tour guides found"
                        />
                    ) : (
                        <div className="p-8 text-center text-gray-500">
                            <p>No tour guides found.</p>
                            <Button
                                variant="primary"
                                className="mt-4"
                                onClick={() => setShowAddForm(true)}
                            >
                                Add Your First Tour Guide
                            </Button>
                        </div>
                    )}
                </div>

                {/* Add/Edit Form Modal - Placeholder for now */}
                {(showAddForm || editingGuide) && (
                    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div className="bg-white rounded-lg p-6 w-full max-w-md">
                            <h3 className="text-lg font-semibold mb-4">
                                {editingGuide ? 'Edit Tour Guide' : 'Add Tour Guide'}
                            </h3>
                            <p className="text-gray-600 mb-4">
                                Form functionality will be implemented in the next phase.
                            </p>
                            <div className="flex space-x-2">
                                <Button
                                    variant="secondary"
                                    onClick={() => {
                                        setShowAddForm(false);
                                        setEditingGuide(null);
                                    }}
                                >
                                    Cancel
                                </Button>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}

export default TourGuides;