<?php

/**
 * Sipi Falls Theme Configuration
 * 
 * This file defines the color palette and design tokens for the Sipi Falls tourism website.
 * These colors will be used to configure Tailwind CSS custom colors.
 */

return [
    'colors' => [
        // Primary Brand Colors
        'primary' => [
            'green' => '#228B22',      // Forest Green - Main brand color
            'green-dark' => '#1a6b1a', // Dark Green - Hover states
            'green-deep' => '#0d1f0d', // Deep Green - Footer & dark UI backgrounds
        ],
        
        // Secondary Colors
        'secondary' => [
            'teal' => '#6FCF97',       // Light Teal - Nature accent
        ],
        
        // Accent Colors
        'accent' => [
            'gold' => '#E8B923',       // Warm Gold - Call-to-action buttons
            'coral' => '#FF6F61',      // Coral - Highlights and alerts
        ],
        
        // Neutral Colors
        'neutral' => [
            'gray' => '#333333',       // Dark Gray - Text color
            'offwhite' => '#ffffff',   // Off-white - Background
            'light' => '#F5F6F9',      // Light background alternative
        ],
        
        // Semantic Colors (for forms, alerts, etc.)
        'semantic' => [
            'success' => '#22C55E',    // Green for success messages
            'warning' => '#F59E0B',    // Amber for warnings
            'error' => '#EF4444',      // Red for errors
            'info' => '#3B82F6',       // Blue for information
        ]
    ],
    
    // Typography Scale
    'typography' => [
        'font_family' => [
            'primary' => 'Montserrat, sans-serif',
            'body' => 'system-ui, sans-serif',
        ],
        'font_sizes' => [
            'xs' => '0.75rem',
            'sm' => '0.875rem',
            'base' => '1rem',
            'lg' => '1.125rem',
            'xl' => '1.25rem',
            '2xl' => '1.5rem',
            '3xl' => '1.875rem',
            '4xl' => '2.25rem',
            '5xl' => '3rem',
        ]
    ],
    
    // Spacing Scale (for consistent margins, padding)
    'spacing' => [
        'xs' => '0.5rem',
        'sm' => '1rem',
        'md' => '1.5rem',
        'lg' => '2rem',
        'xl' => '3rem',
        '2xl' => '4rem',
        '3xl' => '6rem',
    ],
    
    // Border Radius
    'border_radius' => [
        'sm' => '0.25rem',
        'md' => '0.5rem',
        'lg' => '1rem',
        'xl' => '1.5rem',
        'full' => '9999px',
    ],
    
    // Shadows
    'shadows' => [
        'sm' => '0 1px 2px 0 rgb(0 0 0 / 0.05)',
        'md' => '0 4px 6px -1px rgb(0 0 0 / 0.1)',
        'lg' => '0 10px 15px -3px rgb(0 0 0 / 0.1)',
        'xl' => '0 20px 25px -5px rgb(0 0 0 / 0.1)',
    ]
];