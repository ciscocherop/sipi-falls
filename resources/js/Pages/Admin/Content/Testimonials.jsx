import AdminLayout from '../../../Layouts/AdminLayout';
import Table from '../../../Components/Admin/Table';
import Button from '../../../Components/Admin/Button';
import { useState } from 'react';
import { router } from '@inertiajs/react';

function Testimonials({ pageName, testimonials = [] }) {
    const [showAddForm, setShowAddForm] = useState(false);
    const [editingTestimonial, setEditingTestimonial] = useState(null);
    const safeTestimonials = Array.isArray(testimonials) ? testimonials : [];

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
                const className = 'inline-flex px-2 py-1 text-xs font-semibold rounded-full ' + (isActive ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800');
                return <span className={className}>{isActive ? 'Active' : 'Inactive'}</span>;
            }
        },
        {
            key: 'actions',
            label: 'Actions',
            render: (value, testimonial) => (
                <div className="flex space-x-2">
                    <Button variant="secondary" size="sm" onClick={() => setEditingTestimonial(testimonial)}>Edit</Button>
                    <Button variant="danger" size="sm" onClick={() => handleDelete(testimonial.id)}>Delete</Button>
                </div>
            )
        }
    ];

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this testimonial?')) {
            router.delete('/admin/content/testimonials/' + id, { preserveScroll: true });
        }
    };

    return (
        <AdminLayout title={pageName}>
            <div className="space-y-6">
                <div className="bg-white rounded-lg shadow p-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold text-gray-800">{pageName}</h2>
                            <p className="text-gray-600">Manage testimonials</p>
                        </div>
                        <Button variant="primary" onClick={() => setShowAddForm(true)}>Add Testimonial</Button>
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
                            <Button variant="primary" className="mt-4" onClick={() => setShowAddForm(true)}>Add Your First Testimonial</Button>
                        </div>
                    )}
                </div>
                {(showAddForm || editingTestimonial) && (
                    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div className="bg-white rounded-lg p-6 w-full max-w-md">
                            <h3 className="text-lg font-semibold mb-4">{editingTestimonial ? 'Edit Testimonial' : 'Add Testimonial'}</h3>
                            <p className="text-gray-600 mb-4">Form functionality will be implemented in the next phase.</p>
                            <Button variant="secondary" onClick={() => { setShowAddForm(false); setEditingTestimonial(null); }}>Cancel</Button>
                        </div>
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}

export default Testimonials;
