import React, { useState } from 'react';
import { usePage } from '@inertiajs/react';

function AdminLayout({ children, title }) {
    const { auth } = usePage().props;
    const [sidebarOpen, setSidebarOpen] = useState(false);

    return React.createElement('div', {
        className: "flex h-screen bg-gray-100"
    }, [
        // Sidebar (we'll create this next)
        React.createElement('div', {
            key: "sidebar-placeholder",
            className: "w-64 bg-gray-800 text-white p-4"
        }, "Sidebar will go here"),

        // Main Content Area
        React.createElement('div', {
            key: "main-content",
            className: "flex-1 flex flex-col overflow-hidden"
        }, [
            // Header (we'll create this next)
            React.createElement('header', {
                key: "header",
                className: "bg-white shadow-sm border-b border-gray-200 px-6 py-4"
            }, [
                React.createElement('div', {
                    key: "header-content",
                    className: "flex items-center justify-between"
                }, [
                    React.createElement('h1', {
                        key: "page-title",
                        className: "text-2xl font-semibold text-gray-900"
                    }, title || 'Admin Dashboard'),

                    React.createElement('div', {
                        key: "user-info",
                        className: "flex items-center space-x-4"
                    }, [
                        React.createElement('span', {
                            key: "welcome-text",
                            className: "text-sm text-gray-600"
                        }, `Welcome, ${auth.user?.name || 'Admin'}`),

                        React.createElement('button', {
                            key: "logout-btn",
                            className: "bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm",
                            onClick: () => {
                                // We'll implement logout later
                                alert('Logout functionality coming soon!');
                            }
                        }, 'Logout')
                    ])
                ])
            ]),

            // Main Content
            React.createElement('main', {
                key: "main",
                className: "flex-1 overflow-y-auto p-6"
            }, children)
        ])
    ]);
}

export default AdminLayout;