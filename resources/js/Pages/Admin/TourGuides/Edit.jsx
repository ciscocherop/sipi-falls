import { useForm } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Edit({ guide }) {
    const { data, setData, post, processing, errors } = useForm({
        name: guide.name || '',
        title: guide.title || '',
        bio: guide.bio || '',
        phone: guide.phone || '',
        email: guide.email || '',
        years_experience: guide.years_experience || 0,
        is_active: guide.is_active ?? true,
        order: guide.order || 0
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(`/admin/tour-guides/${guide.id}`);
    };

    return (
        <AdminLayout title="Edit Tour Guide">
            <div className="space-y-6">
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                        Edit Tour Guide
                    </h2>
                </div>

                <div className="bg-white rounded-lg shadow p-6">
                    <form onSubmit={handleSubmit} className="space-y-6">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label className="block text-sm font-medium mb-2">Name *</label>
                                <input
                                    type="text"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md"
                                />
                                {errors.name && <p className="mt-1 text-sm text-red-600">{errors.name}</p>}
                            </div>

                            <div>
                                <label className="block text-sm font-medium mb-2">Title *</label>
                                <input
                                    type="text"
                                    value={data.title}
                                    onChange={(e) => setData('title', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md"
                                />
                            </div>
                        </div>

                        <div>
                            <label className="block text-sm font-medium mb-2">Bio *</label>
                            <textarea
                                value={data.bio}
                                onChange={(e) => setData('bio', e.target.value)}
                                rows="4"
                                className="w-full px-4 py-2 border rounded-md"
                            />
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label className="block text-sm font-medium mb-2">Phone</label>
                                <input
                                    type="text"
                                    value={data.phone}
                                    onChange={(e) => setData('phone', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md"
                                />
                            </div>

                            <div>
                                <label className="block text-sm font-medium mb-2">Email</label>
                                <input
                                    type="email"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md"
                                />
                            </div>

                            <div>
                                <label className="block text-sm font-medium mb-2">Years of Experience *</label>
                                <input
                                    type="number"
                                    value={data.years_experience}
                                    onChange={(e) => setData('years_experience', parseInt(e.target.value))}
                                    min="0"
                                    className="w-full px-4 py-2 border rounded-md"
                                />
                            </div>
                        </div>

                        <div className="flex items-center gap-4">
                            <label className="flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    checked={data.is_active}
                                    onChange={(e) => setData('is_active', e.target.checked)}
                                    className="w-4 h-4"
                                />
                                <span className="text-sm">Active</span>
                            </label>
                        </div>

                        <div className="flex gap-4 pt-4 border-t">
                            <Button type="submit" variant="primary" loading={processing}>
                                💾 Update Tour Guide
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

export default Edit;
