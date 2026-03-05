import React from 'react';
import { useForm } from '@inertiajs/react';

function Login() {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/login');
    };

    return React.createElement('div', {
        className: "min-h-screen flex items-center justify-center px-4",
        style: { backgroundColor: '#228B22' }
    },
        React.createElement('div', {
            className: "max-w-md w-full bg-white rounded-lg shadow-md p-8"
        }, [
            React.createElement('div', {
                className: "text-center mb-6",
                key: "header"
            }, [
                React.createElement('h1', {
                    className: "text-3xl font-bold",
                    style: { color: '#228B22' },
                    key: "title"
                }, "Sipi Falls Admin"),
                React.createElement('p', {
                    className: "text-gray-600 mt-2",
                    key: "subtitle"
                }, "Sign in to your account")
            ]),

            React.createElement('form', {
                onSubmit: handleSubmit,
                key: "form"
            }, [
                React.createElement('div', {
                    className: "mb-4",
                    key: "email-field"
                }, [
                    React.createElement('label', {
                        className: "block text-sm font-medium text-gray-700 mb-1",
                        key: "email-label"
                    }, [
                        "Email",
                        React.createElement('span', {
                            className: "text-red-500 ml-1",
                            key: "required"
                        }, "*")
                    ]),
                    React.createElement('input', {
                        type: "email",
                        value: data.email,
                        onChange: (e) => setData('email', e.target.value),
                        className: `w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 ${errors.email ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-green-500'
                            }`,
                        required: true,
                        key: "email-input"
                    }),
                    errors.email && React.createElement('p', {
                        className: "mt-1 text-sm text-red-600",
                        key: "email-error"
                    }, errors.email)
                ]),

                React.createElement('div', {
                    className: "mb-4",
                    key: "password-field"
                }, [
                    React.createElement('label', {
                        className: "block text-sm font-medium text-gray-700 mb-1",
                        key: "password-label"
                    }, [
                        "Password",
                        React.createElement('span', {
                            className: "text-red-500 ml-1",
                            key: "required"
                        }, "*")
                    ]),
                    React.createElement('input', {
                        type: "password",
                        value: data.password,
                        onChange: (e) => setData('password', e.target.value),
                        className: `w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 ${errors.password ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-green-500'
                            }`,
                        required: true,
                        key: "password-input"
                    }),
                    errors.password && React.createElement('p', {
                        className: "mt-1 text-sm text-red-600",
                        key: "password-error"
                    }, errors.password)
                ]),

                React.createElement('div', {
                    className: "mb-6",
                    key: "remember-field"
                },
                    React.createElement('label', {
                        className: "flex items-center"
                    }, [
                        React.createElement('input', {
                            type: "checkbox",
                            checked: data.remember,
                            onChange: (e) => setData('remember', e.target.checked),
                            className: "mr-2",
                            key: "remember-input"
                        }),
                        React.createElement('span', {
                            className: "text-sm text-gray-700",
                            key: "remember-label"
                        }, "Remember me")
                    ])
                ),

                React.createElement('button', {
                    type: "submit",
                    disabled: processing,
                    className: "w-full py-2 px-4 text-white font-medium rounded-md transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed",
                    style: { backgroundColor: '#228B22' },
                    onMouseOver: (e) => e.target.style.backgroundColor = '#6FCF97',
                    onMouseOut: (e) => e.target.style.backgroundColor = '#228B22',
                    key: "submit-button"
                }, processing ? 'Logging in...' : 'Log In')
            ])
        ])
    );
}

export default Login;