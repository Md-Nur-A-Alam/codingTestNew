<div align="center">
<img src="public/assets/mmtv_logo.png" alt="MicroMac Techno Valley Ltd Logo" width="120" />
<br/><br/>
<h1>🚀 Assessment of Standard Coding</h1>
<h3>A Full-Stack Inventory Management System</h3>
<p>
Welcome to my submission for the MicroMac Techno Valley Ltd. assessment.<br/>
This repository is more than just code—it is a showcase of my ability to architect robust database logic, write clean backend PHP, and design a premium, glassmorphism-inspired user interface.
</p>
<p>
<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
<img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript" />
</p>
</div>

---

## 🎯 The Purpose & Vision
The goal of this project was to build a hierarchical **Brand → Model → Item** inventory manager. However, my vision was to execute this requirements list with absolute precision while elevating it to the standards of a modern SaaS application. It strictly adheres to professional coding architectures, raw SQL querying, dual-layer security, and an exceptionally smooth user experience.

---

## 🛠️ Uses & Activities
This application serves as the core foundational structure for any hierarchical product catalog system (e.g., Electronics Stores, Automotive Dealerships, Logistics). 

The primary user activities within the system include:
- **Hierarchical Registration:** Users sequentially register base **Brands**, assign specific product **Models** exclusively to those Brands, and finally register individual physical **Items** under those precise Model classifications.
- **Error-Free Data Entry:** When registering a new Item, the user first selects the manufacturer (Brand). The system actively listens to this selection and dynamically filters the next dropdown to *only* display Models produced by that exact Brand, completely eliminating impossible data-entry errors.
- **Smart Record Editing:** Users can update records at any level. The system intercepts the existing data, maps it into a focused modal, and pre-triggers all dependent logic so the user never has to rebuild the relationships from scratch.
- **Safe Deletions:** The system oversees all delete requests, enforcing strict relational integrity to ensure the database remains uncorrupted.

---

## 📄 Application Modules (Pages)

### 1. Brand Management Dashboard
The foundational module where the base manufacturer definitions are stored.
- **Functionalities:**
  - View all brands in a visually clean, data-dense grid sorted strictly by newest first.
  - **Add Brand:** Opens a modal to input Name and Status.
  - **Edit Brand:** Instantly maps existing row data into the modal for rapid updates.
  - **Validation:** Strict client/server checks prevent duplicate brand names or empty fields.

### 2. Model Management Dashboard
The secondary module linking specific product architectures to a parent Brand.
- **Functionalities:**
  - View all models cleanly joined with their parent Brand names.
  - **Add Model:** Features a relational dropdown forcing the user to assign the model to an active Brand.
  - **Edit Model:** The modal automatically pre-selects the correct parent Brand to preserve context.
  - **Validation:** Prevents duplicate model names from being registered under the same parent Brand.

### 3. Item Management Dashboard
The core inventory module representing the physical products.
- **Functionalities:**
  - View all items displayed with their complete Brand and Model hierarchy.
  - **Add Item (Dependent Dropdowns):** Selecting a Brand dynamically filters the Model dropdown via real-time JavaScript, guaranteeing that an item can never be assigned to a mismatched Brand-Model pair.
  - **Smart Edit:** Intercepts the row data and perfectly re-triggers the dynamic dropdown logic so the user doesn't have to rebuild the hierarchy from scratch.
  - **Validation:** Ensures every item strictly belongs to a valid, existing Brand and Model.

---

## ⚙️ Architecture & Engineering Highlights

### 🛡️ 1. Bulletproof Data Integrity
*Preventing orphaned data before it happens.*
When adding a new item, the application enforces strict relational logic on the frontend. The Model dropdown is mathematically bound to the Brand selection—dynamically filtering in real-time via Javascript. This guarantees users can never select impossible combinations.

### 🔄 2. Smart-Map Editing
*Respecting the user's time.*
Clicking "Edit" intercepts the data row, grabs the existing database values, and perfectly maps them into the Edit Modal. It pre-triggers all dependent dropdown logic so absolutely no relational context is lost upon opening the modal.

### 🔐 3. Dual-Layer Validation
*Air-tight security protocols.*
- **Client-Side:** Real-time checks for empty fields, string lengths, and duplicates.
- **Server-Side:** Laravel controllers aggressively re-validate all incoming requests.

### ⚡ 4. Optimized Raw SQL
*Built strictly to assessment constraints.*
Instead of relying on the Eloquent ORM, the Laravel DB Facade is utilized to execute raw, highly-optimized SQL queries (`DB::select`, `DB::insert`, `DB::update`) to demonstrate true database mastery.

---

## 🎨 UI/UX & Interface Showcase

This interface was designed with **Glassmorphism**, moving away from standard flat designs by utilizing subtle gradients, floating `backdrop-blur` containers, and non-blocking **Toast notifications** to replace jarring browser alerts. 

<table width="100%">
<tr>
<td width="33%" align="center" valign="top">
<b>1. Brand Dashboard</b><br/>
<i>A clean, data-dense grid featuring strict sorting rules.</i><br/><br/>
<img src="public/assets/brandPage.png" width="100%" style="border-radius:6px;" />
</td>
<td width="33%" align="center" valign="top">
<b>2. Model Dashboard</b><br/>
<i>Organizing models relationally under specific brands.</i><br/><br/>
<img src="public/assets/modelPage.png" width="100%" style="border-radius:6px;" />
</td>
<td width="33%" align="center" valign="top">
<b>3. Item Dashboard</b><br/>
<i>Showcasing a multi-relational display joining all tables.</i><br/><br/>
<img src="public/assets/itemPage.png" width="100%" style="border-radius:6px;" />
</td>
</tr>
<tr>
<td width="33%" align="center" valign="top">
<b>4. Add Item (Dynamic Filtering)</b><br/>
<i>Models filter dynamically based on the selected Brand.</i><br/><br/>
<img src="public/assets/add item.png" width="100%" style="border-radius:6px;" />
</td>
<td width="33%" align="center" valign="top">
<b>5. Smart Edit Modal</b><br/>
<i>Values perfectly map to inputs without losing context.</i><br/><br/>
<img src="public/assets/modelEdit_modal.png" width="100%" style="border-radius:6px;" />
</td>
<td width="33%" align="center" valign="top">
<b>6. Toast Notifications</b><br/>
<i>Sleek, non-blocking flash message UI feedback.</i><br/><br/>
<img src="public/assets/toast message.png" width="100%" style="border-radius:6px;" />
</td>
</tr>
</table>

---

## 🚀 Installation & Database Setup

Want to run this locally? Follow these simple steps:

```bash
# 1. Clone the repository
git clone https://github.com/Md-Nur-A-Alam/your-repo-name.git
cd your-repo-name

# 2. Install dependencies
composer install

# 3. Environment setup
cp .env.example .env
php artisan key:generate
```

**4. Import the Database**
Update your `.env` file with your local MySQL credentials. Then, import the provided `codingtestmmtv.sql` file located in the root directory into your MySQL client. This instantly loads the required schemas and my pre-populated sample data!

```bash
# 5. Start the server
php artisan serve
```
*(Note: Tailwind CSS and DaisyUI are served via CDN, so `npm install` is not required!).*

---

## 👨‍💻 Meet the Developer

<div align="center">
<img src="public/assets/developer_Nur.jpeg" alt="Md. Nur A Alam" width="140" style="border-radius: 50%; border: 4px solid #EE2726; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);" />

<h2>Md. Nur A Alam</h2>
<p><b>Full-Stack Software Engineer</b> passionate about building highly scalable, secure, and visually stunning web applications.</p>

<a href="https://nur-dynamic-profile-client-beta.vercel.app/" target="_blank"><img src="https://img.shields.io/badge/Portfolio-2563EB?style=for-the-badge&logo=vercel&logoColor=white" /></a>
<a href="https://www.linkedin.com/in/md-nur-a-alam13/" target="_blank"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white" /></a>
<a href="https://github.com/Md-Nur-A-Alam" target="_blank"><img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" /></a>
<br/>
<a href="https://codeforces.com/profile/Nur_Alam.2812" target="_blank"><img src="https://img.shields.io/badge/Codeforces-1F8ACB?style=for-the-badge&logo=codeforces&logoColor=white" /></a>
<a href="https://www.hackerrank.com/profile/md_nuralam2812" target="_blank"><img src="https://img.shields.io/badge/HackerRank-00EA64?style=for-the-badge&logo=hackerrank&logoColor=white" /></a>
<a href="https://judge.beecrowd.com/en/profile/630077" target="_blank"><img src="https://img.shields.io/badge/BeeCrowd-000000?style=for-the-badge&logo=codingninjas&logoColor=white" /></a>
<br/>
<a href="https://web.facebook.com/Md.NurAAlamSoikot/" target="_blank"><img src="https://img.shields.io/badge/Facebook-1877F2?style=for-the-badge&logo=facebook&logoColor=white" /></a>
<a href="https://www.youtube.com/@NurAAlam44" target="_blank"><img src="https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white" /></a>

<br/><br/>
<i>Thank you for reviewing my submission!</i>
</div>
