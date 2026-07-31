<div align="center">
  <img src="public/assets/mmtv_logo.png" alt="MicroMac Techno Valley Ltd Logo" width="120" />
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

## 🎯 Purpose
The purpose of this project is to fulfill the requirements of the "Standard Coding Assessment" for MicroMac Techno Valley Ltd. It serves as a practical demonstration of building a hierarchical inventory management system (Brand → Model → Item) while strictly adhering to professional coding standards, relational database architecture, and providing a seamless, modern user experience.

---

## 📊 Non-Technical Aspects (UI/UX)
- **Glassmorphism & Modern Aesthetics:** The application moves away from standard flat designs by utilizing subtle background gradients, floating glass-like containers (`backdrop-blur`), and soft shadow elevations for a premium feel.
- **Non-Blocking Feedback:** Instead of jarring browser alerts (`window.alert`), the system uses non-intrusive Toast notifications that slide in and auto-dismiss.
- **Intuitive Modals:** All CRUD operations (Adding, Editing, Deleting) happen within elegant, center-screen modals to keep the user contextually grounded on the data grid without redirecting to new pages.
- **Responsive Design:** The layout automatically adjusts from desktop to mobile, ensuring data remains accessible anywhere.

---

## ⚙️ Technical Aspects (Architecture & Security)
- **Dependent Dropdowns (Data Integrity):** The frontend strictly enforces hierarchical logic. When adding an item, the Model dropdown is mathematically bound to the selected Brand, preventing users from creating impossible "orphan" combinations.
- **Smart-Map Editing:** Clicking "Edit" automatically intercepts the data row, maps it to the edit modal, and pre-triggers all dependent dropdown logic to preserve the relational context.
- **Dual-Layer Validation Protocol:** 
  - *Client-Side:* Real-time interception to check string lengths, empty fields, and duplicate combinations.
  - *Server-Side:* Laravel backend controllers aggressively re-validate all incoming requests to guarantee no malicious bypasses occur.
- **Raw SQL Querying:** As per the assessment constraints, the Laravel DB Facade is used with optimized, raw SQL (`DB::select`, `DB::insert`, `DB::update`, `DB::delete`) rather than the Eloquent ORM.

---

## 🛠️ Technology Stack
- **Backend:** Laravel (PHP) for routing, controller logic, and server-side validation.
- **Database:** MySQL for strict relational data storage.
- **Frontend Framework:** Laravel Blade templating engine.
- **Styling:** Tailwind CSS for rapid, utility-first UI styling.
- **UI Components:** DaisyUI for pre-built, highly accessible modal and button components.
- **Interactivity:** Vanilla JavaScript (ES6) for DOM manipulation, dependent dropdowns, and form validation.
- **Notifications:** Toastify.js for sleek, non-blocking flash messages.

---

## 🚀 Installation & Setup

Follow these steps to get the project running on your local machine:

**1. Clone the repository**
```bash
git clone https://github.com/Md-Nur-A-Alam/your-repo-name.git
cd your-repo-name
```

**2. Install PHP Dependencies**
```bash
composer install
```

**3. Environment Setup**
Copy the `.env.example` file to create a new `.env` file, then generate the application key.
```bash
cp .env.example .env
php artisan key:generate
```
*Note: Make sure to update your `.env` file with your local MySQL database credentials (e.g., `DB_DATABASE=inventory_db`).*

**4. Run Migrations**
This will automatically generate the `brand`, `models`, and `items` tables with the exact schema constraints required.
```bash
php artisan migrate
```

**5. Start the Development Server**
```bash
php artisan serve
```
The application will now be running at `http://localhost:8000`. *(Note: Tailwind CSS and DaisyUI are served via CDN for this assessment, so no `npm install` is required!)*

---

## 📸 Interface Previews

<table>
  <tr>
    <td width="50%" align="center" valign="top">
      <b>1. The Brand Dashboard</b><br/>
      <i>A clean, data-dense grid featuring strict sorting rules.</i><br/><br/>
      <img src="public/assets/brandPage.png" alt="Brand Page" width="100%" />
    </td>
    <td width="50%" align="center" valign="top">
      <b>2. The Item Dashboard</b><br/>
      <i>Showcasing a multi-relational display joining all tables securely.</i><br/><br/>
      <img src="public/assets/itemPage.png" alt="Item Page" width="100%" />
    </td>
  </tr>
  <tr>
    <td width="50%" align="center" valign="top">
      <b>3. Add Item (Dependent Dropdowns)</b><br/>
      <i>Models filter dynamically based on the selected Brand.</i><br/><br/>
      <img src="public/assets/add item.png" alt="Add Item" width="100%" />
    </td>
    <td width="50%" align="center" valign="top">
      <b>4. Smart Edit Modal</b><br/>
      <i>Values map to inputs instantly without losing relational context.</i><br/><br/>
      <img src="public/assets/modelEdit_modal.png" alt="Edit Modal" width="100%" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top">
      <b>5. Toast Notifications</b><br/>
      <i>Sleek, non-blocking UI feedback.</i><br/><br/>
      <img src="public/assets/toast message.png" alt="Toast" width="50%" />
    </td>
  </tr>
</table>

---

## 👨‍💻 Developer Profile

<div align="center">
  <img src="public/assets/developer_Nur.jpeg" alt="Developer Nur" width="150" style="border-radius: 50%; border: 4px solid #EE2726; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" />
  <h2>Md. Nur A Alam</h2>
</div>

<p align="center">
  <a href="https://nur-dynamic-profile-client-beta.vercel.app/" target="_blank"><img src="https://img.shields.io/badge/Portfolio-2563EB?style=for-the-badge&logo=vercel&logoColor=white" alt="Portfolio" /></a>
  <a href="https://www.linkedin.com/in/md-nur-a-alam13/" target="_blank"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white" alt="LinkedIn" /></a>
  <a href="https://github.com/Md-Nur-A-Alam" target="_blank"><img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub" /></a>
  <br/>
  <a href="https://codeforces.com/profile/Nur_Alam.2812" target="_blank"><img src="https://img.shields.io/badge/Codeforces-1F8ACB?style=for-the-badge&logo=codeforces&logoColor=white" alt="Codeforces" /></a>
  <a href="https://www.hackerrank.com/profile/md_nuralam2812" target="_blank"><img src="https://img.shields.io/badge/HackerRank-00EA64?style=for-the-badge&logo=hackerrank&logoColor=white" alt="HackerRank" /></a>
  <a href="https://judge.beecrowd.com/en/profile/630077" target="_blank"><img src="https://img.shields.io/badge/BeeCrowd-000000?style=for-the-badge&logo=codingninjas&logoColor=white" alt="BeeCrowd" /></a>
  <br/>
  <a href="https://web.facebook.com/Md.NurAAlamSoikot/" target="_blank"><img src="https://img.shields.io/badge/Facebook-1877F2?style=for-the-badge&logo=facebook&logoColor=white" alt="Facebook" /></a>
  <a href="https://www.youtube.com/@NurAAlam44" target="_blank"><img src="https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white" alt="YouTube" /></a>
</p>
