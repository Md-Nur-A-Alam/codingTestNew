<div align="center">
  <img src="public/assets/mmtv_logo.png" alt="MicroMac Techno Valley Ltd Logo" width="220" />
  <h1>Assessment of Standard Coding</h1>
  <p>
    <strong>A highly robust Brand → Model → Item inventory manager.</strong>
  </p>
  <p>
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel" />
    <img src="https://img.shields.io/badge/MySQL-005C84?style=flat-square&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black" alt="JavaScript" />
  </p>
</div>

---

## ⚡ Engineering Highlights

<table>
  <tr>
    <td width="45%" valign="top">
      <h3>🛡️ Bulletproof Data Integrity</h3>
      <p><i>Preventing orphaned data before it happens.</i></p>
      <p>When adding a new item, the application enforces strict relational logic. The Model dropdown is mathematically bound to the Brand selection—dynamically filtering in real-time via Javascript. This guarantees users can never select impossible data combinations.</p>
    </td>
    <td width="55%" valign="center">
      <img src="public/assets/add item.png" alt="Add Item Dependent Dropdown" width="100%" />
    </td>
  </tr>
  <tr>
    <td width="55%" valign="center">
      <img src="public/assets/modelEdit_modal.png" alt="Model Edit Modal" width="100%" />
    </td>
    <td width="45%" valign="top">
      <h3>🔄 Smart-Map Editing</h3>
      <p><i>Respecting the user's time.</i></p>
      <p>Clicking "Edit" intercepts the request, grabs the existing database values, and perfectly maps them into the Edit Modal. It even pre-triggers the dependent dropdown logic so no relational context is lost upon opening the modal.</p>
    </td>
  </tr>
  <tr>
    <td width="45%" valign="top">
      <h3>🔔 Non-Blocking UX</h3>
      <p><i>Smooth interactions over jarring alerts.</i></p>
      <p>Execution-blocking <code>window.alert()</code> popups are a thing of the past. Success, warning, and error events trigger sleek, auto-dismissing <b>Toast notifications</b> mapped directly to Laravel's secure session flashes.</p>
    </td>
    <td width="55%" valign="center">
      <img src="public/assets/toast message.png" alt="Toast Notification Example" width="100%" />
    </td>
  </tr>
</table>

---

## 🎨 Interface Previews

<details>
<summary><strong>📸 Click to expand full dashboard previews</strong></summary>
<br/>
<table>
  <tr>
    <td width="50%" valign="top">
      <h4 align="center">🏢 Brand Dashboard</h4>
      <img src="public/assets/brandPage.png" alt="Brand Page" width="100%" />
    </td>
    <td width="50%" valign="top">
      <h4 align="center">📦 Item Dashboard</h4>
      <img src="public/assets/itemPage.png" alt="Item Page" width="100%" />
    </td>
  </tr>
</table>
</details>

---

## 🔐 Dual-Layer Validation Protocol

Security is prioritized through a strict two-step validation protocol:
1. **Client-Side (JavaScript):** Intercepts submissions to check for empty fields, max string lengths, alphanumeric constraints, and cross-references parent dropdowns to prevent duplicates in real-time.
2. **Server-Side (Laravel):** Backend controllers aggressively re-validate all incoming requests to guarantee that malicious bypasses of frontend constraints are impossible.

---

<div align="center">
  <img src="public/assets/developer_Nur.jpeg" alt="Developer Nur" width="90" style="border-radius: 50%; box-shadow: 0 4px 6px rgba(0,0,0,0.1);" />
  <p><strong>Developed by Nur</strong><br/>
  <em>For MicroMac Techno Valley Ltd.</em></p>
</div>
