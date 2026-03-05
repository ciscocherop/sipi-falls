import React from 'react';
import AdminLayout from '@/Layouts/AdminLayout';
import StatCard from '@/Components/Admin/StatCard';

function Dashboard({ stats, chartData, recentActivity }) {
    return (
        <AdminLayout title="Dashboard">
            <div className="space-y-6">
                {/* Welcome Card */}
                <div className="bg-white rounded-lg shadow p-6">
                    <h2 className="text-xl font-semibold mb-2" style={{ color: 'var(--neutral-gray)' }}>
                        Welcome to Sipi Falls Admin Dashboard! 🎉
                    </h2>
                    <p className="text-gray-600">
                        Here's an overview of your site's activity and performance.
                    </p>
                </div>

                {/* Stats Grid */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <StatCard
                        title="Total Messages"
                        value={stats.totalMessages}
                        icon="✉️"
                        variant="blue"
                        trend={{
                            direction: 'up',
                            percentage: stats.recentMessages,
                            label: 'last 30 days'
                        }}
                    />

                    <StatCard
                        title="Total Bookings"
                        value={stats.totalBookings}
                        icon="📅"
                        variant="green"
                        trend={{
                            direction: 'up',
                            percentage: stats.recentBookings,
                            label: 'last 30 days'
                        }}
                    />

                    <StatCard
                        title="Newsletter Subscribers"
                        value={stats.totalSubscribers}
                        icon="📧"
                        variant="purple"
                    />

                    <StatCard
                        title="Admin Users"
                        value={stats.totalUsers}
                        icon="👥"
                        variant="orange"
                    />
                </div>

                {/* Recent Activity */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {/* Recent Messages */}
                    <div className="bg-white rounded-lg shadow p-6">
                        <h3 className="text-lg font-semibold mb-4" style={{ color: 'var(--neutral-gray)' }}>
                            Recent Messages
                        </h3>
                        {recentActivity.messages.length > 0 ? (
                            <div className="space-y-3">
                                {recentActivity.messages.map((message) => (
                                    <div
                                        key={message.id}
                                        className="flex items-start justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors"
                                    >
                                        <div className="flex-1">
                                            <p className="font-medium" style={{ color: 'var(--neutral-gray)' }}>
                                                {message.fullname}
                                            </p>
                                            <p className="text-sm text-gray-600">{message.subject}</p>
                                            <p className="text-xs text-gray-400 mt-1">
                                                {new Date(message.created_at).toLocaleDateString()}
                                            </p>
                                        </div>
                                        {!message.is_read && (
                                            <span
                                                className="w-2 h-2 rounded-full"
                                                style={{ backgroundColor: 'var(--accent-coral)' }}
                                            />
                                        )}
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <p className="text-gray-500 text-center py-4">No messages yet</p>
                        )}
                    </div>

                    {/* Recent Bookings */}
                    <div className="bg-white rounded-lg shadow p-6">
                        <h3 className="text-lg font-semibold mb-4" style={{ color: 'var(--neutral-gray)' }}>
                            Recent Bookings
                        </h3>
                        {recentActivity.bookings.length > 0 ? (
                            <div className="space-y-3">
                                {recentActivity.bookings.map((booking) => (
                                    <div
                                        key={booking.id}
                                        className="flex items-start justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors"
                                    >
                                        <div className="flex-1">
                                            <p className="font-medium" style={{ color: 'var(--neutral-gray)' }}>
                                                {booking.fullname}
                                            </p>
                                            <p className="text-sm text-gray-600">
                                                Travel Date: {new Date(booking.date_of_travel).toLocaleDateString()}
                                            </p>
                                            <p className="text-xs text-gray-400 mt-1">
                                                Booked: {new Date(booking.created_at).toLocaleDateString()}
                                            </p>
                                        </div>
                                        <span
                                            className="px-2 py-1 text-xs rounded-full"
                                            style={{
                                                backgroundColor: booking.status === 'confirmed'
                                                    ? 'var(--success)'
                                                    : booking.status === 'pending'
                                                        ? 'var(--warning)'
                                                        : 'var(--error)',
                                                color: 'white'
                                            }}
                                        >
                                            {booking.status}
                                        </span>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <p className="text-gray-500 text-center py-4">No bookings yet</p>
                        )}
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}

export default Dashboard;
