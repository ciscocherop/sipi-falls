# Implementation Plan: React Admin Dashboard

## Overview

This implementation plan breaks down the React Admin Dashboard feature into discrete, actionable coding tasks. The plan follows a phased approach: setup and configuration, authentication, core components, dashboard page, and CRUD pages. Each task builds incrementally on previous work, with checkpoints to validate progress. Tasks marked with `*` are optional and can be skipped for faster MVP delivery.

The implementation uses Laravel 11 with React 18 and Inertia.js, targeting a beginner-friendly approach with clear, manageable steps.

## Tasks

- [x] 1. Setup and Configuration
  - [x] 1.1 Install and configure Inertia.js server-side
    - Run `composer require inertiajs/inertia-laravel`
    - Run `php artisan inertia:middleware`
    - Register HandleInertiaRequests middleware in `bootstrap/app.php`
    - _Requirements: 10.1_

  - [x] 1.2 Install React and Inertia.js client-side dependencies
    - Run `npm install @inertiajs/react react react-dom`
    - Run `npm install --save-dev @vitejs/plugin-react`
    - _Requirements: 10.1_

  - [x] 1.3 Configure Vite for React
    - Update `vite.config.js` to include React plugin
    - Rename `resources/js/app.js` to `app.jsx`
    - Configure Inertia app initialization in `app.jsx`
    - _Requirements: 10.1_

  - [x] 1.4 Create Inertia root template
    - Create `resources/views/app.blade.php` with @inertia directive
    - Include Vite directives for CSS and JS
    - _Requirements: 10.1, 10.2_

  - [x] 1.5 Create database migrations for status fields
    - Create migration to add `is_read` boolean field to `contact_messages` table
    - Create migration to add `status` enum field to `bookings` table (pending, confirmed, cancelled)
    - Create migration to add `status` enum field to `newsletter_subscribers` table (active, unsubscribed)
    - Run migrations with `php artisan migrate`
    - _Requirements: 2.4, 3.4, 4.3_

  - [x] 1.6 Create database migration for admin role
    - Create migration to add `is_admin` boolean field to `users` table
    - Add database seeder to create default admin user (admin@sipifalls.com)
    - Run migration and seeder
    - _Requirements: 1.3_

  - [ ]* 1.7 Write property test for Inertia props passing
    - **Property 15: Inertia Props Passing**
    - **Validates: Requirements 10.2**
    - Create test file `resources/js/__tests__/properties/InertiaPropsTest.js`
    - Use fast-check to verify all data passed to Inertia::render() appears as props in React component

- [ ] 2. Authentication Setup
  - [x] 2.1 Create AdminMiddleware
    - Create `app/Http/Middleware/AdminMiddleware.php`
    - Implement authentication check (redirect to login if not authenticated)
    - Implement admin authorization check (403 if not admin)
    - Add `isAdmin()` method to User model
    - Register middleware alias in `bootstrap/app.php`
    - _Requirements: 1.2, 1.3_

  - [ ]* 2.2 Write property test for unauthenticated access redirect
    - **Property 1: Unauthenticated Access Redirect**
    - **Validates: Requirements 1.2**
    - Create test file `tests/Feature/Admin/AuthenticationTest.php`
    - Use PHPUnit data providers to test all admin routes redirect unauthenticated users to login

  - [ ]* 2.3 Write property test for admin authorization
    - **Property 2: Admin Authorization**
    - **Validates: Requirements 1.3**
    - Add test to `tests/Feature/Admin/AuthenticationTest.php`
    - Verify non-admin authenticated users receive 403 error on admin routes

  - [x] 2.4 Create Login page component
    - Create `resources/js/Pages/Auth/Login.jsx`
    - Implement login form with email and password fields using Inertia useForm hook
    - Add "Remember me" checkbox
    - Display validation errors inline
    - _Requirements: 1.4, 13.1, 13.2_

  - [x] 2.5 Create LoginController
    - Create `app/Http/Controllers/Auth/LoginController.php`
    - Implement `show()` method to render login page
    - Implement `login()` method to authenticate user
    - Implement `logout()` method to destroy session
    - Add auth routes to `routes/web.php`
    - _Requirements: 1.4, 1.5_

  - [x] 2.6 Configure Inertia shared data for authenticated user
    - Update `app/Http/Middleware/HandleInertiaRequests.php`
    - Add `auth.user` to shared data
    - Add flash messages to shared data
    - _Requirements: 1.6, 11.8, 11.9_


- [-] 3. Build Core Components
  - [x] 3.1 Create AdminLayout component
    - Create `resources/js/Layouts/AdminLayout.jsx`
    - Implement flex layout with sidebar and main content area
    - Add responsive behavior (mobile sidebar toggle)
    - Integrate Sidebar and Header components
    - _Requirements: 12.1, 12.7, 9.1_

  - [x] 3.2 Create Sidebar component
    - Create `resources/js/Components/Admin/Sidebar.jsx`
    - Define navigation items array (Dashboard, Contact Messages, Bookings, Newsletter, Content)
    - Implement active route highlighting using Inertia's usePage hook
    - Add mobile slide-out behavior with backdrop
    - _Requirements: 12.1, 12.2, 12.3, 9.2, 9.3_

  - [ ]* 3.3 Write property test for sidebar presence
    - **Property 24: Sidebar Presence**
    - **Validates: Requirements 12.1**
    - Create test file `resources/js/__tests__/properties/NavigationTest.js`
    - Verify sidebar is present in rendered output for all admin pages

  - [ ]* 3.4 Write property test for active navigation highlighting
    - **Property 25: Active Navigation Highlighting**
    - **Validates: Requirements 12.2**
    - Add test to `resources/js/__tests__/properties/NavigationTest.js`
    - Verify current page navigation item has active state

  - [x] 3.5 Create Header component
    - Create `resources/js/Components/Admin/Header.jsx`
    - Display page title/breadcrumb
    - Display logged-in user name
    - Add hamburger menu button for mobile
    - Add logout button
    - _Requirements: 1.6, 12.4, 12.6_

  - [ ]* 3.6 Write property test for breadcrumb accuracy
    - **Property 26: Breadcrumb Accuracy**
    - **Validates: Requirements 12.6**
    - Add test to `resources/js/__tests__/properties/NavigationTest.js`
    - Verify breadcrumb reflects current page location

  - [x] 3.7 Create Button component
    - Create `resources/js/Components/Admin/Button.jsx`
    - Implement variants (primary, secondary, danger, success)
    - Implement sizes (sm, md, lg)
    - Add loading state with disabled button and loading text
    - _Requirements: 14.2, 14.3_

  - [ ]* 3.8 Write property test for form submission loading state
    - **Property 23: Form Submission Loading State**
    - **Validates: Requirements 14.2, 14.3, 14.7**
    - Create test file `resources/js/__tests__/properties/LoadingStateTest.js`
    - Verify submit buttons are disabled and show loading text during form submission

  - [ ] 3.9 Create Input component
    - Create `resources/js/Components/Admin/Input.jsx`
    - Add label with required indicator
    - Display validation error message below input
    - Apply error styling (red border) when error present
    - _Requirements: 11.6, 13.1_

  - [ ]* 3.10 Write property test for validation error display
    - **Property 17: Validation Error Display**
    - **Validates: Requirements 10.7, 11.6**
    - Create test file `resources/js/__tests__/properties/ValidationTest.js`
    - Verify error messages appear inline next to form fields

  - [ ] 3.11 Create Select component
    - Create `resources/js/Components/Admin/Select.jsx`
    - Implement dropdown with options
    - Add label and error display
    - _Requirements: 6.5, 6.6_

  - [x] 3.12 Create Table component
    - Create `resources/js/Components/Admin/Table.jsx`
    - Accept columns and data as props
    - Implement sortable columns
    - Add row click handler
    - Add actions column for buttons
    - Implement responsive horizontal scroll
    - Display empty state message when no data
    - _Requirements: 2.1, 3.1, 4.1, 9.4_

  - [ ]* 3.13 Write property test for table data completeness
    - **Property 3: Table Data Completeness**
    - **Validates: Requirements 2.2, 3.2, 4.2**
    - Add test to `resources/js/__tests__/properties/TableTest.js`
    - Verify all required fields for each record are present in rendered table output

  - [ ] 3.14 Create Pagination component
    - Create `resources/js/Components/Admin/Pagination.jsx`
    - Display page numbers and next/previous buttons
    - Show "Showing X-Y of Z" text
    - Use Inertia Link to preserve query parameters
    - _Requirements: 7.1, 7.2, 7.3, 7.4, 7.5_

  - [ ]* 3.15 Write property test for pagination state preservation
    - **Property 11: Pagination State Preservation**
    - **Validates: Requirements 7.6**
    - Create test file `resources/js/__tests__/properties/PaginationTest.js`
    - Verify search and filter parameters are preserved when navigating between pages

  - [ ] 3.16 Create SearchFilter component
    - Create `resources/js/Components/Admin/SearchFilter.jsx`
    - Implement debounced search input (300ms delay)
    - Update URL query parameters using Inertia router
    - _Requirements: 6.1, 6.2, 6.3, 6.4_

  - [ ]* 3.17 Write property test for search filter correctness
    - **Property 9: Search Filter Correctness**
    - **Validates: Requirements 6.1, 6.2, 6.3**
    - Create test file `resources/js/__tests__/properties/SearchFilterTest.js`
    - Use fast-check to verify all filtered results contain search term in searchable fields

  - [ ] 3.18 Create Modal component
    - Create `resources/js/Components/Admin/Modal.jsx`
    - Implement backdrop click to close
    - Add ESC key handler to close
    - Implement focus trap
    - Add smooth open/close animations
    - _Requirements: 11.7_

  - [ ] 3.19 Create Notification component
    - Create `resources/js/Components/Admin/Notification.jsx`
    - Implement success and error variants
    - Add auto-dismiss after 3 seconds for success notifications
    - Keep error notifications visible until manually dismissed
    - _Requirements: 11.8, 11.9, 14.4, 14.5_

  - [ ]* 3.20 Write property test for CRUD success notification
    - **Property 21: CRUD Success Notification**
    - **Validates: Requirements 11.8, 14.4**
    - Create test file `resources/js/__tests__/properties/NotificationTest.js`
    - Verify success notifications appear and auto-dismiss after 3 seconds

  - [ ]* 3.21 Write property test for CRUD error notification
    - **Property 22: CRUD Error Notification**
    - **Validates: Requirements 11.9, 14.5**
    - Add test to `resources/js/__tests__/properties/NotificationTest.js`
    - Verify error notifications appear and remain until manually dismissed

  - [ ] 3.22 Create LoadingSpinner component
    - Create `resources/js/Components/Admin/LoadingSpinner.jsx`
    - Implement animated spinner icon
    - Add optional text label
    - _Requirements: 10.6_

  - [x] 3.23 Create StatCard component
    - Create `resources/js/Components/Admin/StatCard.jsx`
    - Display title, value, and icon
    - Add optional trend indicator (up/down arrow with percentage)
    - Implement color variants (blue, green, purple, orange)
    - _Requirements: 5.1, 5.2, 5.3, 5.4, 5.5_

  - [ ] 3.24 Create Chart component
    - Create `resources/js/Components/Admin/Chart.jsx`
    - Install chart library: `npm install recharts`
    - Implement line and bar chart types
    - Accept data array with date and count properties
    - Add responsive behavior for mobile
    - _Requirements: 5.6, 5.7, 9.6_


- [ ] 4. Build Dashboard Page
  - [ ] 4.1 Create DashboardController
    - Create `app/Http/Controllers/Admin/DashboardController.php`
    - Implement `index()` method to fetch dashboard statistics
    - Calculate total counts for contact messages, bookings, newsletter subscribers, users
    - Calculate counts for last 30 days
    - Generate chart data for last 7 days (contact messages and bookings per day)
    - Fetch 5 most recent contact messages and bookings
    - Return Inertia response with all data
    - _Requirements: 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8_

  - [ ]* 4.2 Write property test for count accuracy
    - **Property 6: Count Accuracy**
    - **Validates: Requirements 2.7, 3.7, 4.6, 5.2, 5.3, 5.4, 5.5, 6.7, 7.5**
    - Create test file `tests/Feature/Admin/DashboardTest.php`
    - Verify displayed counts match actual database record counts
    - Test unread messages count, bookings by status, active subscribers

  - [ ]* 4.3 Write property test for chart data accuracy
    - **Property 7: Chart Data Accuracy**
    - **Validates: Requirements 5.6, 5.7**
    - Add test to `tests/Feature/Admin/DashboardTest.php`
    - Verify chart data points match actual record counts per date

  - [ ]* 4.4 Write property test for recent activity ordering
    - **Property 8: Recent Activity Ordering**
    - **Validates: Requirements 5.8**
    - Add test to `tests/Feature/Admin/DashboardTest.php`
    - Verify recent activity items are the N most recent records ordered by creation date descending

  - [ ] 4.5 Create Dashboard page component
    - Create `resources/js/Pages/Admin/Dashboard.jsx`
    - Use AdminLayout wrapper
    - Display 4 StatCards in responsive grid (total messages, bookings, subscribers, users)
    - Display 2 Charts in responsive grid (contact messages and bookings for last 7 days)
    - Display 2 recent activity cards (recent messages and bookings)
    - _Requirements: 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 9.6_

  - [ ] 4.6 Add dashboard route
    - Add route to `routes/web.php` for `/admin/dashboard`
    - Apply `auth` and `admin` middleware
    - Map to DashboardController@index
    - _Requirements: 1.1, 1.2, 1.3_

  - [ ] 4.7 Update User model with admin methods
    - Add `isAdmin()` method to `app/Models/User.php`
    - Add `is_admin` to fillable array
    - Add `is_admin` to casts array as boolean
    - _Requirements: 1.3_

- [ ] 5. Checkpoint - Verify dashboard loads
  - Ensure all tests pass
  - Manually test: Start Laravel server (`php artisan serve`) and Vite (`npm run dev`)
  - Login as admin user and verify dashboard displays correctly
  - Ask the user if questions arise


- [ ] 6. Build Contact Messages CRUD
  - [x] 6.1 Update ContactMessage model
    - Update `app/Models/ContactMessage.php`
    - Add `is_read` to fillable array
    - Add `is_read` to casts array as boolean
    - Add `scopeUnread()` query scope
    - Add `scopeRead()` query scope
    - Add `scopeSearch($search)` query scope for filtering by name, email, subject
    - Add `getFullNameAttribute()` accessor
    - _Requirements: 2.4, 6.1_

  - [x] 6.2 Create ContactMessageController
    - Create `app/Http/Controllers/Admin/ContactMessageController.php`
    - Implement `index()` method with search, status filter, and pagination
    - Implement `show($id)` method to display full message details
    - Implement `toggleRead($id)` method to mark as read/unread
    - Implement `destroy($id)` method to delete message
    - Implement `export()` method to generate CSV file
    - Return Inertia responses with appropriate data
    - _Requirements: 2.1, 2.3, 2.4, 2.5, 2.6, 6.1, 6.6, 8.1_

  - [ ]* 6.3 Write property test for delete operation persistence
    - **Property 4: Delete Operation Persistence**
    - **Validates: Requirements 2.6, 4.5**
    - Create test file `tests/Feature/Admin/ContactMessageControllerTest.php`
    - Verify deleted records no longer exist in database

  - [ ]* 6.4 Write property test for status filter correctness
    - **Property 10: Status Filter Correctness**
    - **Validates: Requirements 6.5, 6.6**
    - Add test to `tests/Feature/Admin/ContactMessageControllerTest.php`
    - Verify all filtered results have the selected status value

  - [x] 6.3 Create ContactMessages Index page
    - Create `resources/js/Pages/Admin/ContactMessages/Index.jsx`
    - Use AdminLayout wrapper
    - Display SearchFilter component for searching by name, email, subject
    - Display Select component for filtering by read/unread status
    - Display Table component with contact message data
    - Add action buttons: "Mark Read/Unread", "View", "Delete"
    - Display Pagination component
    - Add Export button
    - Show unread count badge
    - _Requirements: 2.1, 2.2, 2.4, 2.5, 2.7, 6.1, 6.4, 6.6, 6.7, 7.1, 8.1_

  - [ ] 6.4 Create ContactMessages Show page
    - Create `resources/js/Pages/Admin/ContactMessages/Show.jsx`
    - Use AdminLayout wrapper
    - Display full message details (name, email, subject, message, date)
    - Add "Mark Read/Unread" button
    - Add "Delete" button with confirmation modal
    - Add "Back to List" button
    - _Requirements: 2.3, 2.4, 2.5, 11.7_

  - [ ] 6.5 Add contact messages routes
    - Add routes to `routes/web.php` for contact messages CRUD
    - Apply `auth` and `admin` middleware
    - Routes: index, show, toggleRead, destroy, export
    - _Requirements: 1.1, 2.1, 2.3, 2.4, 2.5, 2.6, 8.1_

  - [ ]* 6.6 Write unit tests for ContactMessageController
    - Add tests to `tests/Feature/Admin/ContactMessageControllerTest.php`
    - Test index displays all messages
    - Test search filters correctly
    - Test status filter works
    - Test toggle read/unread
    - Test delete removes record
    - Test export generates CSV

  - [ ]* 6.7 Write property test for export completeness
    - **Property 12: Export Completeness**
    - **Validates: Requirements 8.4**
    - Create test file `tests/Feature/Admin/ExportTest.php`
    - Verify exported CSV contains all filtered records

  - [ ]* 6.8 Write property test for export header presence
    - **Property 13: Export Header Presence**
    - **Validates: Requirements 8.5**
    - Add test to `tests/Feature/Admin/ExportTest.php`
    - Verify CSV file contains column headers as first row

  - [ ]* 6.9 Write property test for export date formatting
    - **Property 14: Export Date Formatting**
    - **Validates: Requirements 8.6**
    - Add test to `tests/Feature/Admin/ExportTest.php`
    - Verify date fields match format YYYY-MM-DD HH:MM:SS

- [ ] 7. Build Bookings CRUD
  - [x] 7.1 Update Booking model
    - Update `app/Models/Booking.php`
    - Add `status` to fillable array
    - Add `status` to casts array
    - Add `scopeStatus($status)` query scope
    - Add `scopeSearch($search)` query scope for filtering by name, email
    - Add `getTotalGuestsAttribute()` accessor
    - _Requirements: 3.4, 6.2_

  - [x] 7.2 Create BookingController
    - Create `app/Http/Controllers/Admin/BookingController.php`
    - Implement `index()` method with search, status filter, and pagination
    - Implement `show($id)` method to display full booking details
    - Implement `create()` method to show create form
    - Implement `store()` method to save new booking with validation
    - Implement `edit($id)` method to show edit form
    - Implement `update($id)` method to save changes with validation
    - Implement `destroy($id)` method to delete booking
    - Implement `export()` method to generate CSV file
    - Return Inertia responses with appropriate data
    - _Requirements: 3.1, 3.3, 3.4, 3.5, 3.6, 6.2, 6.5, 8.2, 11.2, 11.3_

  - [ ]* 7.3 Write property test for update operation persistence
    - **Property 5: Update Operation Persistence**
    - **Validates: Requirements 3.6**
    - Create test file `tests/Feature/Admin/BookingControllerTest.php`
    - Verify status changes are persisted to database

  - [ ]* 7.4 Write property test for required field validation
    - **Property 18: Required Field Validation**
    - **Validates: Requirements 11.5, 13.1**
    - Add test to `tests/Feature/Admin/BookingControllerTest.php`
    - Verify submitting form with empty required fields fails validation

  - [ ]* 7.5 Write property test for email validation
    - **Property 19: Email Validation**
    - **Validates: Requirements 13.2, 13.4**
    - Create test file `resources/js/__tests__/properties/ValidationTest.js`
    - Use fast-check to verify invalid email formats fail validation

  - [ ]* 7.6 Write property test for date validation
    - **Property 20: Date Validation**
    - **Validates: Requirements 13.3, 13.5**
    - Add test to `tests/Feature/Admin/BookingControllerTest.php`
    - Verify past dates fail validation when not allowed

  - [x] 7.3 Create Bookings Index page
    - Create `resources/js/Pages/Admin/Bookings/Index.jsx`
    - Use AdminLayout wrapper
    - Display SearchFilter component for searching by name, email
    - Display Select component for filtering by status
    - Display status count badges (pending, confirmed, cancelled)
    - Display Table component with booking data
    - Add action buttons: "View", "Edit", "Delete"
    - Display Pagination component
    - Add "Create Booking" button
    - Add Export button
    - _Requirements: 3.1, 3.2, 3.4, 3.7, 6.2, 6.4, 6.5, 6.7, 7.1, 8.2, 11.2_

  - [ ] 7.4 Create Bookings Show page
    - Create `resources/js/Pages/Admin/Bookings/Show.jsx`
    - Use AdminLayout wrapper
    - Display full booking details (name, email, date, guests, activities, budget, status)
    - Add status update buttons (pending, confirmed, cancelled)
    - Add "Edit" button
    - Add "Delete" button with confirmation modal
    - Add "Back to List" button
    - _Requirements: 3.3, 3.4, 11.7_

  - [ ] 7.5 Create Bookings Create page
    - Create `resources/js/Pages/Admin/Bookings/Create.jsx`
    - Use AdminLayout wrapper
    - Create form with Inertia useForm hook
    - Add Input components for: fullname, email, date_of_travel, num_adults, num_children, preferred_activities, budget
    - Display validation errors inline
    - Add "Create Booking" submit button with loading state
    - Add "Cancel" button
    - _Requirements: 11.2, 11.5, 11.6, 13.1, 13.2, 13.3_

  - [ ] 7.6 Create Bookings Edit page
    - Create `resources/js/Pages/Admin/Bookings/Edit.jsx`
    - Use AdminLayout wrapper
    - Pre-populate form with existing booking data
    - Use same form structure as Create page
    - Add "Update Booking" submit button with loading state
    - Add "Cancel" button
    - _Requirements: 11.3, 11.5, 11.6_

  - [ ] 7.7 Add bookings routes
    - Add routes to `routes/web.php` for bookings CRUD
    - Apply `auth` and `admin` middleware
    - Routes: index, show, create, store, edit, update, destroy, export
    - _Requirements: 1.1, 3.1, 3.3, 8.2, 11.2, 11.3_

  - [ ]* 7.8 Write unit tests for BookingController
    - Add tests to `tests/Feature/Admin/BookingControllerTest.php`
    - Test index displays all bookings
    - Test search filters correctly
    - Test status filter works
    - Test create saves new booking
    - Test update changes booking
    - Test delete removes record
    - Test validation rules

- [ ] 8. Checkpoint - Verify bookings CRUD works
  - Ensure all tests pass
  - Manually test: Create, view, edit, update status, delete bookings
  - Test search and filter functionality
  - Test export to CSV
  - Ask the user if questions arise

- [ ] 9. Build Newsletter Subscribers CRUD
  - [x] 9.1 Update NewsletterSubscriber model
    - Update `app/Models/NewsletterSubscriber.php`
    - Add `status` to fillable array
    - Add `scopeActive()` query scope
    - Add `scopeSearch($search)` query scope for filtering by email
    - _Requirements: 4.3, 6.3_

  - [x] 9.2 Create NewsletterSubscriberController
    - Create `app/Http/Controllers/Admin/NewsletterSubscriberController.php`
    - Implement `index()` method with search and pagination
    - Implement `create()` method to show create form
    - Implement `store()` method to save new subscriber with validation
    - Implement `toggleStatus($id)` method to toggle active/unsubscribed
    - Implement `destroy($id)` method to delete subscriber
    - Implement `export()` method to generate CSV file
    - Return Inertia responses with appropriate data
    - _Requirements: 4.1, 4.3, 4.4, 4.5, 6.3, 8.3, 11.4_

  - [x] 9.3 Create NewsletterSubscribers Index page
    - Create `resources/js/Pages/Admin/NewsletterSubscribers/Index.jsx`
    - Use AdminLayout wrapper
    - Display SearchFilter component for searching by email
    - Display Table component with subscriber data (email, date, status)
    - Add action buttons: "Toggle Status", "Delete"
    - Display Pagination component
    - Add "Add Subscriber" button
    - Add Export button
    - Show active subscribers count
    - _Requirements: 4.1, 4.2, 4.3, 4.4, 4.6, 6.3, 6.4, 6.7, 7.1, 8.3, 11.4_

  - [ ] 9.4 Create NewsletterSubscribers Create page
    - Create `resources/js/Pages/Admin/NewsletterSubscribers/Create.jsx`
    - Use AdminLayout wrapper
    - Create form with Inertia useForm hook
    - Add Input component for email
    - Display validation errors inline
    - Add "Add Subscriber" submit button with loading state
    - Add "Cancel" button
    - _Requirements: 11.4, 11.5, 11.6, 13.2_

  - [x] 9.5 Add newsletter subscribers routes
    - Add routes to `routes/web.php` for newsletter subscribers CRUD
    - Apply `auth` and `admin` middleware
    - Routes: index, create, store, toggleStatus, destroy, export
    - _Requirements: 1.1, 4.1, 4.3, 4.4, 4.5, 8.3, 11.4_

  - [ ]* 9.6 Write unit tests for NewsletterSubscriberController
    - Create test file `tests/Feature/Admin/NewsletterSubscriberControllerTest.php`
    - Test index displays all subscribers
    - Test search filters correctly
    - Test create saves new subscriber
    - Test toggle status changes status
    - Test delete removes record
    - Test validation rules

- [ ] 10. Build Content Management Pages
  - [ ] 10.1 Create ContentController
    - Create `app/Http/Controllers/Admin/ContentController.php`
    - Implement `editAbout()` method to show About page content form
    - Implement `updateAbout()` method to save About page changes
    - Implement `editContact()` method to show Contact page content form
    - Implement `updateContact()` method to save Contact page changes
    - Implement `editTravelGuide()` method to show Travel Guide content form
    - Implement `updateTravelGuide()` method to save Travel Guide changes
    - Store content in database or config files
    - Return Inertia responses with appropriate data
    - _Requirements: 15.1, 15.2, 15.3, 15.4, 15.5_

  - [ ]* 10.2 Write property test for content update persistence
    - **Property 27: Content Update Persistence**
    - **Validates: Requirements 15.5**
    - Create test file `tests/Feature/Admin/ContentControllerTest.php`
    - Verify content changes are saved to database and reflected on public website

  - [ ] 10.2 Create Content About page
    - Create `resources/js/Pages/Admin/Content/About.jsx`
    - Use AdminLayout wrapper
    - Create form with textarea for About page content
    - Add "Save Changes" submit button with loading state
    - Display success/error notifications
    - _Requirements: 15.1, 15.5_

  - [ ] 10.3 Create Content Contact page
    - Create `resources/js/Pages/Admin/Content/Contact.jsx`
    - Use AdminLayout wrapper
    - Create form with inputs for contact information (address, phone, email, hours)
    - Add "Save Changes" submit button with loading state
    - Display success/error notifications
    - _Requirements: 15.2, 15.5_

  - [ ] 10.4 Create Content TravelGuide page
    - Create `resources/js/Pages/Admin/Content/TravelGuide.jsx`
    - Use AdminLayout wrapper
    - Create form with textarea for Travel Guide content
    - Add "Save Changes" submit button with loading state
    - Display success/error notifications
    - _Requirements: 15.3, 15.5_

  - [ ] 10.5 Add content management routes
    - Add routes to `routes/web.php` for content management
    - Apply `auth` and `admin` middleware
    - Routes: editAbout, updateAbout, editContact, updateContact, editTravelGuide, updateTravelGuide
    - _Requirements: 1.1, 15.1, 15.2, 15.3_

  - [ ]* 10.6 Write unit tests for ContentController
    - Add tests to `tests/Feature/Admin/ContentControllerTest.php`
    - Test edit pages display current content
    - Test update saves changes
    - Test validation rules


- [ ] 11. Implement SPA Navigation and Loading States
  - [ ] 11.1 Configure Inertia progress indicator
    - Update `resources/js/app.jsx` to configure progress bar color and delay
    - Test navigation between pages shows progress indicator
    - _Requirements: 10.6_

  - [ ]* 11.2 Write property test for SPA navigation
    - **Property 16: SPA Navigation**
    - **Validates: Requirements 10.4**
    - Create test file `resources/js/__tests__/properties/NavigationTest.js`
    - Verify page transitions occur via XHR without full page reload

  - [ ] 11.3 Add loading states to all action buttons
    - Review all Button components in CRUD pages
    - Ensure all submit buttons use `processing` state from useForm hook
    - Ensure all delete buttons show loading state during deletion
    - _Requirements: 14.2, 14.3, 14.7_

  - [ ] 11.4 Implement notification system
    - Create notification context or use flash messages from Inertia shared data
    - Display notifications in AdminLayout
    - Auto-dismiss success notifications after 3 seconds
    - Keep error notifications until manually dismissed
    - _Requirements: 11.8, 11.9, 14.4, 14.5_

- [ ] 12. Implement Responsive Design
  - [ ] 12.1 Test and fix mobile sidebar behavior
    - Test sidebar on mobile viewport (<768px)
    - Ensure sidebar is hidden by default
    - Ensure hamburger menu opens sidebar
    - Ensure backdrop closes sidebar
    - _Requirements: 9.1, 9.2, 9.3_

  - [ ] 12.2 Test and fix table responsiveness
    - Test all tables on mobile viewport
    - Ensure horizontal scroll works
    - Ensure action buttons are accessible
    - _Requirements: 9.4_

  - [ ] 12.3 Test and fix form responsiveness
    - Test all forms on mobile viewport
    - Ensure fields stack vertically
    - Ensure buttons are full-width on mobile
    - _Requirements: 9.5_

  - [ ] 12.4 Test and fix dashboard responsiveness
    - Test dashboard on mobile viewport
    - Ensure stat cards stack in single column
    - Ensure charts stack in single column
    - _Requirements: 9.6_

- [ ] 13. Implement Data Export Functionality
  - [ ] 13.1 Create CSV export helper function
    - Create `app/Helpers/CsvExporter.php` class
    - Implement method to convert array of records to CSV format
    - Add column headers as first row
    - Format dates as YYYY-MM-DD HH:MM:SS
    - Return CSV as downloadable response
    - _Requirements: 8.4, 8.5, 8.6_

  - [ ] 13.2 Add export functionality to ContactMessageController
    - Implement `export()` method in ContactMessageController
    - Apply current search and filter parameters
    - Use CsvExporter to generate CSV
    - Return download response
    - _Requirements: 8.1, 8.4, 8.7_

  - [ ] 13.3 Add export functionality to BookingController
    - Implement `export()` method in BookingController
    - Apply current search and filter parameters
    - Use CsvExporter to generate CSV
    - Return download response
    - _Requirements: 8.2, 8.4, 8.7_

  - [ ] 13.4 Add export functionality to NewsletterSubscriberController
    - Implement `export()` method in NewsletterSubscriberController
    - Apply current search and filter parameters
    - Use CsvExporter to generate CSV
    - Return download response
    - _Requirements: 8.3, 8.4, 8.7_

  - [ ] 13.5 Add export buttons to Index pages
    - Add Export button to ContactMessages Index page
    - Add Export button to Bookings Index page
    - Add Export button to NewsletterSubscribers Index page
    - Show loading state during export generation
    - _Requirements: 8.1, 8.2, 8.3, 14.7_


- [ ] 14. Add Confirmation Dialogs
  - [ ] 14.1 Implement delete confirmation for contact messages
    - Add Modal component to ContactMessages Show page
    - Show confirmation dialog before deleting
    - Display message: "Are you sure you want to delete this message?"
    - Add "Cancel" and "Delete" buttons
    - _Requirements: 11.7_

  - [ ] 14.2 Implement delete confirmation for bookings
    - Add Modal component to Bookings Show and Index pages
    - Show confirmation dialog before deleting
    - Display message: "Are you sure you want to delete this booking?"
    - Add "Cancel" and "Delete" buttons
    - _Requirements: 11.7_

  - [ ] 14.3 Implement delete confirmation for newsletter subscribers
    - Add Modal component to NewsletterSubscribers Index page
    - Show confirmation dialog before deleting
    - Display message: "Are you sure you want to delete this subscriber?"
    - Add "Cancel" and "Delete" buttons
    - _Requirements: 11.7_

- [ ] 15. Setup Testing Infrastructure
  - [ ] 15.1 Configure Vitest for React component testing
    - Create `vitest.config.js` with jsdom environment
    - Create `resources/js/test-setup.js` with React Testing Library setup
    - Install testing dependencies: `npm install --save-dev vitest @testing-library/react @testing-library/jest-dom jsdom`
    - Add test scripts to `package.json`
    - _Requirements: Testing Strategy_

  - [ ] 15.2 Configure fast-check for property-based testing
    - Install fast-check: `npm install --save-dev fast-check`
    - Create directory structure: `resources/js/__tests__/properties/`
    - _Requirements: Testing Strategy_

  - [ ] 15.3 Configure PHPUnit for backend testing
    - Verify `phpunit.xml` is configured with SQLite in-memory database
    - Create directory structure: `tests/Feature/Admin/`, `tests/Unit/Models/`
    - Install Inertia testing helpers: `composer require --dev inertiajs/inertia-laravel`
    - _Requirements: Testing Strategy_

  - [ ] 15.4 Create test factories
    - Update `database/factories/ContactMessageFactory.php`
    - Update `database/factories/BookingFactory.php`
    - Update `database/factories/NewsletterSubscriberFactory.php`
    - Update `database/factories/UserFactory.php` to support admin users
    - _Requirements: Testing Strategy_

- [ ] 16. Write Component Unit Tests
  - [ ]* 16.1 Write unit tests for Button component
    - Create `resources/js/Components/Admin/__tests__/Button.test.jsx`
    - Test renders children correctly
    - Test onClick handler is called
    - Test disabled state when loading
    - Test variant classes are applied

  - [ ]* 16.2 Write unit tests for Input component
    - Create `resources/js/Components/Admin/__tests__/Input.test.jsx`
    - Test renders label and input
    - Test displays error message
    - Test applies error styling
    - Test required indicator appears

  - [ ]* 16.3 Write unit tests for Table component
    - Create `resources/js/Components/Admin/__tests__/Table.test.jsx`
    - Test renders columns and data
    - Test empty state message
    - Test row click handler
    - Test action buttons render

  - [ ]* 16.4 Write unit tests for SearchFilter component
    - Create `resources/js/Components/Admin/__tests__/SearchFilter.test.jsx`
    - Test debounces input changes
    - Test calls onChange after debounce delay
    - Test displays search icon

  - [ ]* 16.5 Write unit tests for Pagination component
    - Create `resources/js/Components/Admin/__tests__/Pagination.test.jsx`
    - Test renders page numbers
    - Test renders next/previous buttons
    - Test displays "Showing X-Y of Z" text
    - Test preserves query parameters in links


- [ ] 17. Write Backend Unit Tests
  - [ ]* 17.1 Write unit tests for ContactMessage model
    - Create `tests/Unit/Models/ContactMessageTest.php`
    - Test scopeUnread filters correctly
    - Test scopeRead filters correctly
    - Test scopeSearch finds records
    - Test getFullNameAttribute accessor

  - [ ]* 17.2 Write unit tests for Booking model
    - Create `tests/Unit/Models/BookingTest.php`
    - Test scopeStatus filters correctly
    - Test scopeSearch finds records
    - Test getTotalGuestsAttribute accessor

  - [ ]* 17.3 Write unit tests for NewsletterSubscriber model
    - Create `tests/Unit/Models/NewsletterSubscriberTest.php`
    - Test scopeActive filters correctly
    - Test scopeSearch finds records

  - [ ]* 17.4 Write feature tests for authentication
    - Create `tests/Feature/Admin/AuthenticationTest.php`
    - Test unauthenticated users redirected to login
    - Test non-admin users receive 403 error
    - Test admin users can access dashboard
    - Test login with valid credentials
    - Test login with invalid credentials
    - Test logout destroys session

- [ ] 18. Final Checkpoint - Complete Testing and Validation
  - Run all backend tests: `php artisan test`
  - Run all frontend tests: `npm run test`
  - Verify test coverage meets requirements (80% backend, 70% frontend)
  - Manually test all CRUD operations
  - Test responsive design on mobile, tablet, desktop
  - Test all search and filter functionality
  - Test data export for all tables
  - Test authentication and authorization
  - Ask the user if questions arise

- [ ] 19. Polish and Optimization
  - [ ] 19.1 Add loading skeletons for data tables
    - Create LoadingSkeleton component
    - Display skeleton while data is loading
    - _Requirements: 14.1_

  - [ ] 19.2 Optimize chart rendering performance
    - Lazy load Chart component
    - Add Suspense boundary with loading fallback
    - _Requirements: Performance Optimization_

  - [ ] 19.3 Add error boundaries
    - Create ErrorBoundary component
    - Wrap AdminLayout with ErrorBoundary
    - Display user-friendly error message when component crashes
    - _Requirements: Error Handling_

  - [ ] 19.4 Implement scroll position preservation
    - Configure Inertia to preserve scroll position
    - Test navigation back to previous page maintains scroll
    - _Requirements: 10.5_

  - [ ] 19.5 Add keyboard shortcuts
    - Add ESC key to close modals
    - Add CMD/CTRL+K for search focus
    - Document shortcuts in help section
    - _Requirements: Accessibility_

  - [ ] 19.6 Optimize bundle size
    - Run `npm run build` and check bundle size
    - Lazy load heavy components (Chart, Modal)
    - Remove unused dependencies
    - _Requirements: Performance Optimization_

  - [ ] 19.7 Add meta tags and page titles
    - Set appropriate page titles for each route
    - Add meta description for SEO
    - _Requirements: 10.1_


- [ ] 20. Documentation and Deployment Preparation
  - [ ] 20.1 Create admin user guide
    - Document how to log in
    - Document how to manage contact messages
    - Document how to manage bookings
    - Document how to manage newsletter subscribers
    - Document how to update content
    - Document how to export data
    - _Requirements: Documentation_

  - [ ] 20.2 Create developer documentation
    - Document project structure
    - Document component architecture
    - Document how to add new admin pages
    - Document testing strategy
    - Document deployment process
    - _Requirements: Documentation_

  - [ ] 20.3 Prepare for production deployment
    - Run `npm run build` to compile production assets
    - Update `.env` file with production settings (APP_ENV=production, APP_DEBUG=false)
    - Run `php artisan config:cache`
    - Run `php artisan route:cache`
    - Run `php artisan view:cache`
    - Test production build locally
    - _Requirements: Deployment Checklist_

  - [ ] 20.4 Security audit
    - Verify all admin routes have auth and admin middleware
    - Verify CSRF protection is enabled
    - Verify all user input is validated and sanitized
    - Verify sensitive data is not exposed in responses
    - Test rate limiting on login route
    - _Requirements: Security Considerations_

  - [ ] 20.5 Performance audit
    - Test page load times
    - Verify database queries are optimized (use eager loading where needed)
    - Verify pagination is used for large datasets
    - Test with realistic data volumes
    - _Requirements: Performance Optimization_

## Notes

- Tasks marked with `*` are optional testing tasks and can be skipped for faster MVP delivery
- Each task references specific requirements for traceability
- Checkpoints ensure incremental validation at key milestones
- Property tests validate universal correctness properties across all inputs
- Unit tests validate specific examples, edge cases, and integration points
- The implementation follows a phased approach: setup → auth → components → dashboard → CRUD pages
- All code should be beginner-friendly with clear comments and simple patterns
- Use Inertia.js for all navigation and form submissions (no separate API needed)
- Use Tailwind CSS for all styling (no custom CSS files)
- Follow Laravel and React best practices throughout

## Testing Summary

This implementation plan includes 27 property-based tests corresponding to the 27 correctness properties defined in the design document:

1. Property 1: Unauthenticated Access Redirect (Task 2.2)
2. Property 2: Admin Authorization (Task 2.3)
3. Property 3: Table Data Completeness (Task 3.13)
4. Property 4: Delete Operation Persistence (Task 6.3)
5. Property 5: Update Operation Persistence (Task 7.3)
6. Property 6: Count Accuracy (Task 4.2)
7. Property 7: Chart Data Accuracy (Task 4.3)
8. Property 8: Recent Activity Ordering (Task 4.4)
9. Property 9: Search Filter Correctness (Task 3.17)
10. Property 10: Status Filter Correctness (Task 6.4)
11. Property 11: Pagination State Preservation (Task 3.15)
12. Property 12: Export Completeness (Task 6.7)
13. Property 13: Export Header Presence (Task 6.8)
14. Property 14: Export Date Formatting (Task 6.9)
15. Property 15: Inertia Props Passing (Task 1.7)
16. Property 16: SPA Navigation (Task 11.2)
17. Property 17: Validation Error Display (Task 3.10)
18. Property 18: Required Field Validation (Task 7.4)
19. Property 19: Email Validation (Task 7.5)
20. Property 20: Date Validation (Task 7.6)
21. Property 21: CRUD Success Notification (Task 3.20)
22. Property 22: CRUD Error Notification (Task 3.21)
23. Property 23: Form Submission Loading State (Task 3.8)
24. Property 24: Sidebar Presence (Task 3.3)
25. Property 25: Active Navigation Highlighting (Task 3.4)
26. Property 26: Breadcrumb Accuracy (Task 3.6)
27. Property 27: Content Update Persistence (Task 10.2)

Additionally, the plan includes comprehensive unit tests for models, controllers, and React components to ensure robust test coverage.

## Execution Instructions

To execute this implementation plan:

1. Open this tasks.md file in your IDE
2. Click "Start task" next to any task item to begin implementation
3. Complete tasks in sequential order for best results
4. Optional tasks (marked with `*`) can be skipped if time is limited
5. Use checkpoints to validate progress before moving to the next phase
6. Refer to the design document for detailed implementation guidance
7. Refer to the requirements document for acceptance criteria

The implementation is designed to be beginner-friendly, with clear steps and incremental progress. Each task builds on previous work, ensuring a solid foundation at each phase.
