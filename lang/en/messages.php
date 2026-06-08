<?php

return [
    // Navbar
    'login' => 'Login',
    'register' => 'Register',
    'dashboard_admin' => 'Admin Dashboard',
    'dashboard_petugas' => 'Officer Dashboard',
    'dashboard_user' => 'My Dashboard',
    'logout' => 'Logout',

    // Sidebar Admin
    'menu_navigation' => 'Navigation Menu',
    'account_management' => 'Account Management',
    'all_complaints' => 'All Complaints',
    
    // Sidebar Petugas
    'verification_followup' => 'Verification & Follow-up',
    
    // Sidebar User
    'write_complaint' => 'Write Complaint',

    // Login Form
    'login_title' => 'Login - Aspirasiku',
    'welcome_back' => 'Welcome Back',
    'or' => 'Or',
    'register_new_account' => 'register a new account here',
    'username' => 'Username',
    'password' => 'Password',
    'remember_me' => 'Remember me',
    'login_button' => 'Login',

    // Register Form
    'register_title' => 'Register - Aspirasiku',
    'create_new_account' => 'Create a New Account',
    'already_have_account' => 'Already have an account?',
    'login_here' => 'Login here',
    'nik_label' => 'NIK (National Identity Number)',
    'fullname' => 'Full Name',
    'email' => 'Email',
    'phone' => 'Phone Number',
    'password_confirmation' => 'Confirm Password',
    'register_button' => 'Register Now',

    // Validation
    'validation_nik_required' => 'NIK is required.',
    'validation_nik_size' => 'NIK must be exactly 16 characters.',
    'validation_nik_unique' => 'NIK is already registered.',
    'validation_username_unique' => 'Username is already taken.',
    'validation_username_alpha_num' => 'Username may only contain letters and numbers.',
    'validation_email_unique' => 'Email is already registered.',
    'validation_password_min' => 'Password must be at least 8 characters.',
    'validation_password_confirmed' => 'Password confirmation does not match.',

    // Controllers
    'account_suspended' => 'Your account has been suspended. Contact an admin.',
    'login_success_admin' => 'Welcome back, Admin!',
    'login_success_petugas' => 'Welcome back, Officer!',
    'login_success_user' => 'Welcome back!',
    'login_failed' => 'The provided credentials do not match our records.',
    'register_success' => 'Registration successful! Welcome to your dashboard.',
    'logout_success' => 'You have been successfully logged out.',

    // Complaints Validation & Controller
    'complaint_title_required' => 'The complaint title is required.',
    'complaint_category_required' => 'A category must be selected.',
    'complaint_category_invalid' => 'The selected category is invalid.',
    'complaint_content_required' => 'The complaint content is required.',
    'complaint_content_min' => 'The content is too short (minimum 10 characters).',
    'complaint_attachment_image' => 'The attachment must be an image.',
    'complaint_attachment_mimes' => 'The image format must be jpeg, png, jpg, or gif.',
    'complaint_attachment_max' => 'The image size may not be greater than 2MB.',
    'complaint_submitted_success' => 'Complaint successfully submitted and is awaiting verification.',
    'unauthorized_access' => 'You do not have access to this page.',

    // Landing Page
    'hero_title' => 'Voice Your Aspirations for Change',
    'hero_subtitle' => 'Official public complaint platform. We guarantee confidentiality and transparently follow up on your reports.',
    'start_complaint' => 'Make a Complaint Now',
    'total_complaints' => 'Total Complaints',
    'resolved_complaints' => 'Resolved',
    'active_users' => 'Active Users',
    'public_complaints' => 'Recent Aspirations',
    'no_complaints' => 'No complaints yet.',

    // Dashboard User
    'write_new_complaint' => 'Write a New Complaint',
    'complaint_title' => 'Complaint Title',
    'title_placeholder' => 'Type a short and clear title...',
    'category' => 'Category',
    'select_category' => 'Select a Category',
    'complaint_content' => 'Complaint Details',
    'description_placeholder' => 'Tell the details of the chronology, location, and other important info...',
    'attachment' => 'Attachment Proof (Optional)',
    'drag_drop' => 'Click or drag file here',
    'max_file_size' => 'PNG, JPG, GIF up to 2MB',
    'is_private_label' => 'Hide my name (Anonymous) & Keep it Private',
    'submit_complaint' => 'Submit Complaint',
    'my_complaint_history' => 'My Complaint History',
    'status_pending' => 'Pending',
    'status_process' => 'In Progress',
    'status_resolved' => 'Resolved',
    'complaint_timeline' => 'Complaint Timeline',
    'detail_complaint' => 'Complaint Detail',
    'back' => 'Back',
    'track_status' => 'Track Status',
    'timeline_pending' => 'Complaint Received',
    'timeline_pending_desc' => 'Your complaint has entered our system and is in the verification queue.',
    'timeline_process' => 'Being Processed',
    'timeline_process_desc' => 'Officers have verified and are following up on your complaint in the field.',
    'timeline_resolved' => 'Successfully Handled',
    'timeline_resolved_desc' => 'Your complaint has been successfully resolved by the officer.',
    'official_response' => 'Official Response',
    'no_response_yet' => 'No response from the officer yet.',
];
