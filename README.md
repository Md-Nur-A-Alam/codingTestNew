<div align="center">
  <img src="public/assets/mmtv_logo.png" alt="MicroMac Techno Valley Ltd Logo" width="250" />
  <h1>Assessment of Standard Coding</h1>
  <h3>Inventory Management System</h3>
</div>

<br/>

## 📖 Overview
This project is a modern, responsive, and highly robust **Brand → Model → Item** inventory management web application. It was engineered specifically to demonstrate proficiency in database relationship logic, modern MVC architecture, and secure full-stack validation.

The application allows users to seamlessly navigate and manage a hierarchical inventory structure:
- A **Brand** can have many **Models**.
- A **Model** can have many **Items**.

---

## 📸 Interface Previews

### The Brand Dashboard
A clean, data-dense grid featuring strict sorting rules and instantaneous CRUD operations.
<img src="public/assets/brandPage.png" alt="Brand Page Screenshot" width="800" />

### The Item Dashboard
Showcasing the multi-relational display joining the Item, Model, and Brand tables securely.
<img src="public/assets/itemPage.png" alt="Item Page Screenshot" width="800" />

---

## 🛠 Technology Stack

- **Backend Framework:** Laravel (PHP)
- **Database Architecture:** MySQL
- **Query Strategy:** Laravel DB Facade (Raw optimized SQL queries mapped to constraints)
- **Frontend Templating:** Laravel Blade
- **Styling:** Tailwind CSS (Rapid, utility-first UI styling)
- **UI Components:** DaisyUI (Pre-built, highly accessible modal & button components)
- **Interactivity:** Vanilla JavaScript (ES6)

---

## ✨ Key Technical Features

### 1. Robust Data Integrity (Dependent Dropdowns)
To prevent orphaned or impossible data combinations, the application enforces strict relational logic on the frontend. When adding a new item, the dropdown dynamically queries and filters models to exclusively match the selected brand.
<br/>
<img src="public/assets/add item.png" alt="Add Item Dependent Dropdown" width="600" />

### 2. Smart Editing Logic & Data Preservation
When a user clicks "Edit", a custom Javascript event listener intercepts the action and dynamically maps the existing database values perfectly into the Edit Modal, allowing the user to seamlessly update fields without re-selecting existing relational data.
<br/>
<img src="public/assets/modelEdit_modal.png" alt="Model Edit Modal" width="600" />

### 3. Non-Blocking UX (Toast Notifications)
Instead of relying on jarring, execution-blocking browser alerts (`window.alert`), all success, warning, and error events trigger sleek, auto-dismissing Toast notifications mapped directly to Laravel's secure session flash messages.
<br/>
<img src="public/assets/toast message.png" alt="Toast Notification Example" width="600" />

### 4. Dual-Layer Validation Protocol
Security and data integrity are prioritized through a two-step validation process:
- **Client-Side (JavaScript):** Intercepts submissions to check for empty fields, maximum string lengths, alphanumeric constraints, and cross-references parent dropdowns to prevent duplicates in real-time.
- **Server-Side (Laravel):** The backend controllers aggressively re-validate all incoming requests (`$request->validate()`) to ensure no malicious bypass of frontend constraints.

---

## 👨‍💻 Developer
<div align="center">
  <img src="public/assets/developer_Nur.jpeg" alt="Developer Nur" width="150" style="border-radius: 50%;" />
  <p><strong>Developed by Nur</strong></p>
  <p>Submitted for the MicroMac Techno Valley Ltd. Standard Coding Assessment.</p>
</div>
