import React, { useState } from 'react';
import { usePage } from '@inertiajs/react';
import Sidebar from '../Components/Admin/Sidebar';
import Header from '../Components/Admin/Header';

function AdminLayout({ children, title }) {
    const { auth } = usePage().props;
    const [sidebarOpen, setSidebarOpen] = useState(false);

    return React.createElement('div', {
        className: "flex h-screen bg-gray-100"
    }, [
        // Sidebar
        React.createElement(Sidebar, {
            key: "sidebar",
            isOpen: sidebarOpen,
            onClose: () => setSidebarOpen(false)
        }),

        // Main Content Area
        React.createElement('div', {
            key: "main-content",
            className: "flex-1 flex flex-col overflow-hidden"
        }, [
            // Header
            React.createElement(Header, {
                key: "header",
                title: title,
                user: auth.user,
                onMenuClick: () => setSidebarOpen(true)
            }),

            // Main Content
            React.createElement('main', {
                key: "main",
                className: "flex-1 overflow-y-auto p-6"
            }, children)
        ])
    ]);
}

export default AdminLayout;