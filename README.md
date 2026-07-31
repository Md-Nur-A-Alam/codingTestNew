<div align="center">
  <img src="public/assets/mmtv_logo.png" alt="MicroMac Techno Valley Ltd Logo" width="280" />
  <br/><br/>
  <h1 align="center">📦 Inventory Management Architecture</h1>
  <p align="center">
    <strong>Assessment of Standard Coding — Executed with Precision.</strong>
  </p>

  <p align="center">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript" />
  </p>
</div>

---

## ⚡ Mission Brief

This project transcends a simple CRUD application. It is a highly robust **Brand → Model → Item** hierarchical inventory manager, engineered specifically to showcase:
1. **Relational Data Integrity:** Strict one-to-many cascading logic.
2. **Dual-Layer Security:** Air-tight validation on both the client (JS) and server (Laravel).
3. **Premium UX Design:** Glassmorphism UI, non-blocking notifications, and DaisyUI modals.

---

## 🎨 Visual Tour

<table>
  <tr>
    <td width="50%">
      <h3 align="center">🏢 Brand Dashboard</h3>
      <p align="center"><i>A data-dense grid featuring strict sorting rules and instantaneous CRUD operations.</i></p>
      <img src="public/assets/brandPage.png" alt="Brand Page Screenshot" />
    </td>
    <td width="50%">
      <h3 align="center">📦 Item Dashboard</h3>
      <p align="center"><i>Showcasing a multi-relational display joining the Item, Model, and Brand tables securely.</i></p>
      <img src="public/assets/itemPage.png" alt="Item Page Screenshot" />
    </td>
  </tr>
</table>

---

## 🧠 Engineering Highlights

### 🛡️ 1. Bulletproof Data Integrity
> *Preventing orphaned data before it happens.*

When adding a new item, the application enforces strict relational logic. The Model dropdown is mathematically bound to the Brand selection—dynamically filtering in real-time via Javascript.
<br/>
<img src="public/assets/add item.png" alt="Add Item Dependent Dropdown" width="550" />

### 🔄 2. Smart-Map Editing
> *Respecting the user's time.*

Clicking "Edit" intercepts the request, grabs the existing database values, and perfectly maps them into the Edit Modal. It even pre-triggers the dependent dropdown logic so no relational context is lost.
<br/>
<img src="public/assets/modelEdit_modal.png" alt="Model Edit Modal" width="550" />

### 🔔 3. Non-Blocking Notifications
> *Smooth interactions over jarring alerts.*

Execution-blocking `window.alert()` popups are a thing of the past. Success, warning, and error events trigger sleek, auto-dismissing **Toast notifications** mapped directly to Laravel's secure session flashes.
<br/>
<img src="public/assets/toast message.png" alt="Toast Notification Example" width="550" />

---

## 🔐 Dual-Layer Validation Architecture

<details>
<summary><strong>👉 Click to view validation logic</strong></summary>
<br/>

Security is prioritized through a strict two-step validation protocol:

1. **Client-Side (JavaScript):** Intercepts submissions to check for empty fields, maximum string lengths (50/100/255), alphanumeric constraints, and cross-references parent dropdowns to prevent duplicates in real-time.
2. **Server-Side (Laravel):** Backend controllers aggressively re-validate all incoming requests to guarantee that malicious bypasses of frontend constraints are impossible.

</details>

---

<br/>

<div align="center">
  <img src="public/assets/developer_Nur.jpeg" alt="Developer Nur" width="130" style="border-radius: 50%; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);" />
  <h3>Developed by Nur</h3>
  <p><em>Submitted for the MicroMac Techno Valley Ltd. Standard Coding Assessment.</em></p>
</div>
