import AdminLayout from '../../../Layouts/AdminLayout';
import Table from '../../../Components/Admin/Table';
import Button from '../../../Components/Admin/Button';
import { useState, useEffect } from 'react';
import { router, useForm, usePage } from '@inertiajs/react';

function Testimonials({ pageName, testimonials = [] }) {
    const [showAddForm, setShowAddForm] = useState(false);
    const [editingTestimonial, setEditingTestimonial] = useState(null);
    const [showFlash, setShowFlash] = useState(false);
    const safeTestimonials = Array.isArray(testimonials) ? testimonials : [];
    const { flash } = usePage().props;

    // Show flash message when it exists
    useEffect(() => {
        if (flash?.success) {
            setShowFlash(true);
            const timer = setTimeout(() => setShowFlash(false), 3000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    // Form state
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        country: '',
        message: '',
        rating: 5,
        is_active: true,
        order: 0
    });

    // Open add form
    const openAddForm = () => {
        reset();
        setEditingTestimonial(null);
        setShowAddForm(true);
    };

    // Open edit form
    const openEditForm = (testimonial) => {
        setData({
            name: testimonial.name || '',
            country: testimonial.country || '',
            message: testimonial.message || '',
            rating: testimonial.rating || 5,
            is_active: testimonial.is_active ?? true,
            order: testimonial.order || 0
        });
        setEditingTestimonial(testimonial);
        setShowAddForm(true);
    };

    // Close form
    const closeForm = () => {
        setShowAddForm(false);
        setEditingTestimonial(null);
        reset();
    };

    // Submit form
    const handleSubmit = (e) => {
        e.preventDefault();

        if (editingTestimonial) {
            post(`/admin/content/testimonials/${editingTestimonial.id}`, {
                preserveScroll: true,
                onSuccess: () => closeForm()
            });
        } else {
            post('/admin/content/testimonials', {
                preserveScroll: true,
                onSuccess: () => closeForm()
            });
        }
    };

    const columns = [
        {
            key: 'name',
            label: 'Name/Country',
            render: (value, testimonial) => (
                <div>
                    <div className="font-medium">{testimonial.name || 'No name'}</div>
                    <div className="text-sm text-gray-500">{testimonial.country || 'No country'}</div>
                </div>
            )
        },
        {
            key: 'rating',
            label: 'Rating',
            render: (value, testimonial) => {
                const rating = testimonial.rating || 0;
                const stars = [];
                for (let i = 0; i < 5; i++) {
                    stars.push(<span key={i} className={i < rating ? 'text-yellow-400' : 'text-gray-300'}>★</span>);
                }
                return <div className="flex items-center">{stars}</div>;
            }
        },
        {
            key: 'message',
            label: 'Message',
            render: (value, testimonial) => {
                const message = testimonial.message || '';
                const display = message.length > 100 ? message.substring(0, 100) + '...' : message;
                return <div className="text-sm text-gray-600">{display}</div>;
            }
        },
        {
            key: 'status',
            label: 'Status',
            render: (value, testimonial) => {
                const isActive = testimonial.is_active;
                const isApproved = testimonial.is_approved;
                return (
                    <div className="flex flex-col gap-1">
                        <span className={'inline-flex px-2 py-1 text-xs font-semibold rounded-full ' + (isActive ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')}>
                            {isActive ? 'Active' : 'Inactive'}
                        </span>
                        <span className={'inline-flex px-2 py-1 text-xs font-semibold rounded-full ' + (isApproved ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800')}>
                            {isApproved ? 'Approved' : 'Pending'}
                        </span>
                    </div>
                );
            }
        },
        {
            key: 'actions',
            label: 'Actions',
            render: (value, testimonial) => (
                <div className="flex flex-wrap gap-2">
                    <Button
                        variant={testimonial.is_approved ? 'secondary' : 'primary'}
                        size="sm"
                        onClick={() => handleToggleApproval(testimonial.id)}
                    >
                        {testimonial.is_approved ? 'Reject' : 'Approve'}
                    </Button>
                    <Button variant="secondary" size="sm" onClick={() => openEditForm(testimonial)}>Edit</Button>
                    <Button variant="danger" size="sm" onClick={() => handleDelete(testimonial.id)}>Delete</Button>
                </div>
            )
        }
    ];

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this testimonial?')) {
            router.delete(`/admin/content/testimonials/${id}/delete`, {
                preserveScroll: true
            });
        }
    };

    const handleToggleApproval = (id) => {
        router.post(`/admin/content/testimonials/${id}/toggle-approval`, {}, {
            preserveScroll: true
        });
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
                            <p className="text-gray-600">Manage testimonials</p>
                        </div>
                        <Button variant="primary" onClick={() => openAddForm()}>Add Testimonial</Button>
                    </div>
                </div>
                <div className="bg-white rounded-lg shadow">
                    <div className="p-6 border-b">
                        <h3 className="text-lg font-semibold">Current Testimonials ({safeTestimonials.length})</h3>
                    </div>
                    {safeTestimonials.length > 0 ? (
                        <Table data={safeTestimonials} columns={columns} emptyMessage="No testimonials found" />
                    ) : (
                        <div className="p-8 text-center text-gray-500">
                            <p>No testimonials found.</p>
                            <Button variant="primary" className="mt-4" onClick={() => openAddForm()}>Add Your First Testimonial</Button>
                        </div>
                    )}
                </div>

                {/* Add/Edit Form Modal */}
                {(showAddForm || editingTestimonial) && (
                    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
                        <div className="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                            <h3 className="text-lg font-semibold mb-4">
                                {editingTestimonial ? 'Edit Testimonial' : 'Add Testimonial'}
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
                                            Country <span className="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            value={data.country}
                                            onChange={e => setData('country', e.target.value)}
                                            placeholder="e.g., USA"
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                            required
                                        />
                                        {errors.country && <p className="text-red-500 text-sm mt-1">{errors.country}</p>}
                                    </div>
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-1">
                                        Message <span className="text-red-500">*</span>
                                    </label>
                                    <textarea
                                        value={data.message}
                                        onChange={e => setData('message', e.target.value)}
                                        rows="4"
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                        required
                                    />
                                    {errors.message && <p className="text-red-500 text-sm mt-1">{errors.message}</p>}
                                </div>

                                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-1">
                                            Rating <span className="text-red-500">*</span>
                                        </label>
                                        <select
                                            value={data.rating}
                                            onChange={e => setData('rating', parseInt(e.target.value))}
                                            className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                            required
                                        >
                                            <option value="5">5 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="2">2 Stars</option>
                                            <option value="1">1 Star</option>
                                        </select>
                                        {errors.rating && <p className="text-red-500 text-sm mt-1">{errors.rating}</p>}
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
                                        {editingTestimonial ? 'Update' : 'Create'}
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

export default Testimonials;
