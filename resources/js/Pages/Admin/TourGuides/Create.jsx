import { useForm } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Create() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        title: '',
        bio: '',
        phone: '',
        email: '',
        years_experience: 0,
        is_active: true,
        order: 0
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/admin/tour-guides');
    };

    return (
        <AdminLayout title="Add Tour Guide">
            <div className="space-y-6">
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                        Add New Tour Guide
                    </h2>
                </div>

                <div className="bg-white rounded-lg shadow p-6">
                    <form onSubmit={handleSubmit} className="space-y-6">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label className="block text-sm font-medium mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                    Name <span style={{ color: 'var(--accent-coral)' }}>*</span>
                                </label>
                                <input
                                    type="text"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                    style={{ borderColor: errors.name ? 'var(--accent-coral)' : '#d1d5db' }}
                                />
                                {errors.name && <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>{errors.name}</p>}
                            </div>

                            <div>
                                <label className="block text-sm font-medium mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                    Title <span style={{ color: 'var(--accent-coral)' }}>*</span>
                                </label>
                                <input
                                    type="text"
                                    value={data.title}
                                    onChange={(e) => setData('title', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                    placeholder="e.g., Senior Guide, Lead Climbing Instructor"
                                />
                                {errors.title && <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>{errors.title}</p>}
                            </div>
                        </div>

                        <div>
                            <label className="block text-sm font-medium mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                Bio <span style={{ color: 'var(--accent-coral)' }}>*</span>
                            </label>
                            <textarea
                                value={data.bio}
                                onChange={(e) => setData('bio', e.target.value)}
                                rows="4"
                                className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                            />
                            {errors.bio && <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>{errors.bio}</p>}
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label className="block text-sm font-medium mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                    Phone
                                </label>
                                <input
                                    type="text"
                                    value={data.phone}
                                    onChange={(e) => setData('phone', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                />
                            </div>

                            <div>
                                <label className="block text-sm font-medium mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                    Email
                                </label>
                                <input
                                    type="email"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                />
                            </div>

                            <div>
                                <label className="block text-sm font-medium mb-2" style={{ color: 'var(--neutral-dark)' }}>
                                    Years of Experience <span style={{ color: 'var(--accent-coral)' }}>*</span>
                                </label>
                                <input
                                    type="number"
                                    value={data.years_experience}
                                    onChange={(e) => setData('years_experience', parseInt(e.target.value))}
                                    min="0"
                                    className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
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
                                <span className="text-sm" style={{ color: 'var(--neutral-dark)' }}>Active</span>
                            </label>
                        </div>

                        <div className="flex gap-4 pt-4 border-t">
                            <Button type="submit" variant="primary" loading={processing}>
                                💾 Save Tour Guide
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

export default Create;
