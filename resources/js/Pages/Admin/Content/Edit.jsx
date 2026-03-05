import { useForm } from '@inertiajs/react';
import AdminLayout from '../../../Layouts/AdminLayout';
import Button from '../../../Components/Admin/Button';

function Edit({ page, pageName, contents }) {
    const { data, setData, post, processing, errors } = useForm({
        contents: contents.map(c => ({ key: c.key, value: c.value }))
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(`/admin/content/${page}`);
    };

    const updateContent = (index, value) => {
        const newContents = [...data.contents];
        newContents[index].value = value;
        setData('contents', newContents);
    };

    return (
        <AdminLayout title={`Edit ${pageName}`}>
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-2xl font-bold" style={{ color: 'var(--neutral-dark)' }}>
                        Edit {pageName}
                    </h2>
                    <p className="mt-1" style={{ color: 'var(--neutral-gray)' }}>
                        Update the content that appears on your website
                    </p>
                </div>

                {/* Edit Form */}
                <div className="bg-white rounded-lg shadow p-6">
                    <form onSubmit={handleSubmit} className="space-y-6">
                        {contents.map((content, index) => (
                            <div key={content.key}>
                                <label
                                    htmlFor={content.key}
                                    className="block text-sm font-medium mb-2"
                                    style={{ color: 'var(--neutral-dark)' }}
                                >
                                    {content.label} <span style={{ color: 'var(--accent-coral)' }}>*</span>
                                </label>

                                {content.type === 'textarea' ? (
                                    <textarea
                                        id={content.key}
                                        value={data.contents[index].value}
                                        onChange={(e) => updateContent(index, e.target.value)}
                                        rows="4"
                                        className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                        style={{
                                            borderColor: errors[`contents.${index}.value`] ? 'var(--accent-coral)' : '#d1d5db',
                                            '--tw-ring-color': 'var(--primary-green)'
                                        }}
                                    />
                                ) : (
                                    <input
                                        type={content.type}
                                        id={content.key}
                                        value={data.contents[index].value}
                                        onChange={(e) => updateContent(index, e.target.value)}
                                        className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2"
                                        style={{
                                            borderColor: errors[`contents.${index}.value`] ? 'var(--accent-coral)' : '#d1d5db',
                                            '--tw-ring-color': 'var(--primary-green)'
                                        }}
                                    />
                                )}

                                {errors[`contents.${index}.value`] && (
                                    <p className="mt-1 text-sm" style={{ color: 'var(--accent-coral)' }}>
                                        {errors[`contents.${index}.value`]}
                                    </p>
                                )}
                            </div>
                        ))}

                        {/* Action Buttons */}
                        <div className="flex gap-4 pt-4 border-t">
                            <Button
                                type="submit"
                                variant="primary"
                                loading={processing}
                            >
                                💾 Save Changes
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
