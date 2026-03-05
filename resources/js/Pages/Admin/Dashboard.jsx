import React from 'react';
import AdminLayout from '@/Layouts/AdminLayout';

function Dashboard() {
    return React.createElement(AdminLayout, {
        title: "Dashboard"
    },
        React.createElement('div', {
            className: "space-y-6"
        }, [
            React.createElement('div', {
                key: "welcome-card",
                className: "bg-white rounded-lg shadow p-6"
            }, [
                React.createElement('h2', {
                    key: "welcome-title",
                    className: "text-xl font-semibold text-gray-900 mb-2"
                }, "Welcome to Sipi Falls Admin Dashboard! 🎉"),

                React.createElement('p', {
                    key: "welcome-text",
                    className: "text-gray-600"
                }, "You've successfully built your first React admin dashboard with Inertia.js!")
            ]),

            React.createElement('div', {
                key: "stats-grid",
                className: "grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
            }, [
                React.createElement('div', {
                    key: "stat-1",
                    className: "bg-white rounded-lg shadow p-6"
                }, [
                    React.createElement('h3', {
                        key: "stat-title-1",
                        className: "text-sm font-medium text-gray-500"
                    }, "Total Messages"),
                    React.createElement('p', {
                        key: "stat-value-1",
                        className: "text-2xl font-bold text-gray-900"
                    }, "0")
                ]),

                React.createElement('div', {
                    key: "stat-2",
                    className: "bg-white rounded-lg shadow p-6"
                }, [
                    React.createElement('h3', {
                        key: "stat-title-2",
                        className: "text-sm font-medium text-gray-500"
                    }, "Total Bookings"),
                    React.createElement('p', {
                        key: "stat-value-2",
                        className: "text-2xl font-bold text-gray-900"
                    }, "0")
                ]),

                React.createElement('div', {
                    key: "stat-3",
                    className: "bg-white rounded-lg shadow p-6"
                }, [
                    React.createElement('h3', {
                        key: "stat-title-3",
                        className: "text-sm font-medium text-gray-500"
                    }, "Newsletter Subscribers"),
                    React.createElement('p', {
                        key: "stat-value-3",
                        className: "text-2xl font-bold text-gray-900"
                    }, "0")
                ]),

                React.createElement('div', {
                    key: "stat-4",
                    className: "bg-white rounded-lg shadow p-6"
                }, [
                    React.createElement('h3', {
                        key: "stat-title-4",
                        className: "text-sm font-medium text-gray-500"
                    }, "Admin Users"),
                    React.createElement('p', {
                        key: "stat-value-4",
                        className: "text-2xl font-bold text-gray-900"
                    }, "1")
                ])
            ])
        ])
    );
}

export default Dashboard;