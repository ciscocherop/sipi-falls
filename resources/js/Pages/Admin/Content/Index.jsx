import { Link } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Index({ pages }) {
    return (
        <AdminLayout title="Content Management">
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                        Content Management
                    </h2>
                    <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                        Edit content for your website pages
                    </p>
                </div>

                {/* Page Cards */}
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {Object.entries(pages).map(([key, name]) => (
                        <div key={key} className="bg-white rounded-lg shadow p-6">
                            <div className="flex items-center mb-4">
                                <span className="text-4xl mr-3">
                                    {key === 'contact' && '📞'}
                                    {key === 'about' && 'ℹ️'}
                                    {key === 'travelguide' && '🗺️'}
                                </span>
                                <h3 className="text-xl font-semibold" style={{ color: 'var(--neutral-dark)' }}>
                                    {name}
                                </h3>
                            </div>
                            <p className="mb-4 text-sm" style={{ color: 'var(--neutral-gray)' }}>
                                {key === 'contact' && 'Update contact details, phone, email, and address'}
                                {key === 'about' && 'Edit the about page content and description'}
                                {key === 'travelguide' && 'Manage travel tips and visitor information'}
                            </p>
                            <Link href={`/admin/content/${key}/edit`}>
                                <Button variant="primary" className="w-full">
                                    Edit Content
                                </Button>
                            </Link>
                        </div>
                    ))}
                </div>
            </div>
        </AdminLayout>
    );
}

export default Index;
