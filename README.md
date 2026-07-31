# Inventory Management System - Coding Standard Assessment

## Overview
This project is a modern, responsive, and robust **Brand → Model → Item** inventory management web application. It was built as part of a coding standard assessment to demonstrate proficiency in database relationship management, MVC architectural patterns, and frontend/backend validation logic.

The application allows users to manage a hierarchical inventory structure where:
- A **Brand** can have many **Models**.
- A **Model** can have many **Items**.

Users can perform full CRUD (Create, Read, Update, Delete) operations on each tier using dynamic, non-blocking modal interfaces rather than traditional multi-page forms.

---

## Technology Stack

### Backend
- **Framework:** Laravel (PHP)
- **Database:** MySQL
- **Querying:** Laravel DB Facade (Raw SQL queries for optimized execution as per constraints)

### Frontend
- **Templating:** Laravel Blade
- **Styling:** Tailwind CSS (for rapid, utility-first premium styling)
- **UI Components:** DaisyUI (for pre-built, accessible modal and button components)
- **Interactivity:** Vanilla JavaScript (ES6)
- **Notifications:** Toastify.js (for sleek, non-blocking flash messages)

---

## Key Techniques & Features

### 1. Robust Data Integrity (Dependent Dropdowns)
To prevent orphaned or impossible data combinations, the application enforces strict relational logic on the frontend. When adding an **Item**, the "Model" dropdown remains empty until a "Brand" is selected. Once selected, JavaScript dynamically filters the models to only show those belonging to the chosen brand.

### 2. Dual-Layer Validation
Security and data integrity are prioritized through a two-step validation process:
- **Client-Side (JavaScript):** Intercepts form submissions to check for empty fields, maximum string lengths, alphanumeric-only characters, and duplicate entries. This provides instant feedback to the user without unnecessary server requests.
- **Server-Side (Laravel):** The backend controllers re-validate all incoming requests (`$request->validate()`) to ensure malicious users cannot bypass the frontend checks.

### 3. Modern UI/UX Architecture
Instead of relying on jarring native browser alerts (`window.alert`) and prompts (`window.confirm`), the application utilizes:
- **DaisyUI Modals:** For adding, editing, and confirming deletions. This keeps the user immersed in the application's design system.
- **Toastify Notifications:** Success, warning, and error messages are pushed to the UI as auto-dismissing toast notifications that map directly to Laravel's backend Session Flash messages.

### 4. Smart Editing Logic
When a user clicks "Edit" on any grid row, a JavaScript function intercepts the call and dynamically injects the row's existing data into the Edit Modal. For complex relational items (like the Item grid), it automatically pre-selects the correct Brand, triggers the dependent dropdown logic to fetch the models, and then pre-selects the correct Model seamlessly.

### 5. Consistent Sorting Rules
All data grids are strictly ordered by `entry_date DESC` with a fallback tiebreaker of `id DESC`. This guarantees that the most recently added or modified items always surface to the top of the list, providing a consistent and expected user experience across all modules.
