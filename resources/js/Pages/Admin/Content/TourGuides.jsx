import AdminLayout from '../../../Layouts/AdminLayout';
import Table from '../../../Components/Admin/Table';
import Button from '../../../Components/Admin/Button';
import { useState, useEffect } from 'react';
import { router, useForm, usePage } from '@inertiajs/react';

function TourGuides({ pageName, tourGuides = [] }) {
    const [showAddForm, setShowAddForm] = useState(false);
    const [editingGuide, setEditingGuide] = useState(null);
    const [showFlash, setShowFlash] = useState(false);
    const { flash } = usePage().props;

    // Show flash message when it exists
    useEffect(() => {
        if (flash?.success) {
            setShowFlash(true);
            const timer = setTimeout(() => setShowFlash(false), 3000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    // Ensure tourGuides is an array
    const safeGuides = Array.isArray(tourGuides) ? tourGuides : [];

    // Form state
    const { data, setData, post, put, processing, errors, reset } = useForm({
        name: '',
        title: '',
        bio: '',
        phone: '',
        email: '',
        years_experience: 0,
        is_active: true,
        order: 0
    });

    // Open add form
    const openAddForm = () => {
        reset();
        setEditingGuide(null);
        setShowAddForm(true);
    };

    // Open edit form
    const openEditForm = (guide) => {
        setData({
            name: guide.name || '',
            title: guide.title || '',
            bio: guide.bio || '',
            phone: guide.phone || '',
            email: guide.email || '',
            years_experience: guide.years_experience || 0,
            is_active: guide.is_active ?? true,
            order: guide.order || 0
        });
        setEditingGuide(guide);
        setShowAddForm(true);
    };

    // Close form
    const closeForm = () => {
        setShowAddForm(false);
        setEditingGuide(null);
        reset();
    };

    // Submit form
    const handleSubmit = (e) => {
        e.preventDefault();

        if (editingGuide) {
            post(`/admin/content/tour-guides/${editingGuide.id}`, {
                preserveScroll: true,
                onSuccess: () => closeForm()
            });
        } else {
            post('/admin/content/tour-guides', {
                preserveScroll: true,
                onSuccess: () => closeForm()
            });
        }
    };

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
                        onClick={() => openEditForm(guide)}
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
            router.delete(`/admin/content/tour-guides/${id}/delete`, {
                preserveScroll: true
            });
        }
    };

    return (
        <AdminLayout title={pageName}>
            {/* Flash Message */}
            {showFlash && flash?.success && (
                <div className="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span className="block sm:inline">{flash.success}</span>
                    <button
                        onClick={() => setShowFlash(false)}
                        className="absolute top-0 bottom-0 right-0 px-4 py-3"
                    >
                        <span className="text-2xl">&times;</span>
                    </button>
                </div>
            )}

            <div className="space-y-6">
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold text-gray-800">{pageName}</h2>
                            <p className="text-gray-600">Manage tour guides</p>
                        </div>
                        <Button
                            variant="primary"
                            onClick={() => openAddForm()}
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
                                onClick={() => openAddForm()}
                            >
                                Add Your First Tour Guide
                            </Button>
                        </div>
                    )}
                </div>

                {/* Add/Edit Form Modal */}
                {(showAddForm || editingGuide) && (
                    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
                        <div className="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                            <h3 className="text-lg font-semibold mb-4">
                                {editingGuide ? 'Edit Tour Guide' : 'Add Tour Guide'}
                            </h3>

                            <form onSubmit={handleSubmit} className="space-y-4">
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Name <span className="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            value={data.name}
                                            onChange={e => setData('name', e.target.value)}
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                            required
                                        />
                                        {errors.name && <p className="text-red-500 text-sm mt-1">{errors.name}</p>}
                                    </div>

                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Title <span className="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            value={data.title}
                                            onChange={e => setData('title', e.target.value)}
                                            placeholder="e.g., Senior Guide"
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                            required
                                        />
                                        {errors.title && <p className="text-red-500 text-sm mt-1">{errors.title}</p>}
                                    </div>
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-1">
                                        Bio <span className="text-red-500">*</span>
                                    </label>
                                    <textarea
                                        value={data.bio}
                                        onChange={e => setData('bio', e.target.value)}
                                        rows="4"
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                        required
                                    />
                                    {errors.bio && <p className="text-red-500 text-sm mt-1">{errors.bio}</p>}
                                </div>

                                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Phone
                                        </label>
                                        <input
                                            type="tel"
                                            value={data.phone}
                                            onChange={e => setData('phone', e.target.value)}
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                        />
                                        {errors.phone && <p className="text-red-500 text-sm mt-1">{errors.phone}</p>}
                                    </div>

                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Email
                                        </label>
                                        <input
                                            type="email"
                                            value={data.email}
                                            onChange={e => setData('email', e.target.value)}
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                        />
                                        {errors.email && <p className="text-red-500 text-sm mt-1">{errors.email}</p>}
                                    </div>
                                </div>

                                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Years of Experience <span className="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="number"
                                            value={data.years_experience}
                                            onChange={e => setData('years_experience', parseInt(e.target.value) || 0)}
                                            min="0"
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                            required
                                        />
                                        {errors.years_experience && <p className="text-red-500 text-sm mt-1">{errors.years_experience}</p>}
                                    </div>

                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Display Order
                                        </label>
                                        <input
                                            type="number"
                                            value={data.order}
                                            onChange={e => setData('order', parseInt(e.target.value) || 0)}
                                            min="0"
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                        />
                                        {errors.order && <p className="text-red-500 text-sm mt-1">{errors.order}</p>}
                                    </div>

                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Status
                                        </label>
                                        <div className="flex items-center h-10">
                                            <input
                                                type="checkbox"
                                                checked={data.is_active}
                                                onChange={e => setData('is_active', e.target.checked)}
                                                className="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                                            />
                                            <label className="ml-2 text-sm text-gray-700">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div className="flex justify-end space-x-2 pt-4 border-t">
                                    <Button
                                        type="button"
                                        variant="secondary"
                                        onClick={closeForm}
                                        disabled={processing}
                                    >
                                        Cancel
                                    </Button>
                                    <Button
                                        type="submit"
                                        variant="primary"
                                        loading={processing}
                                        disabled={processing}
                                    >
                                        {editingGuide ? 'Update' : 'Create'}
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}

export default TourGuides;