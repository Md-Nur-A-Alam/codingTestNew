<div align="center">
  <img src="public/assets/mmtv_logo.png" alt="MicroMac Techno Valley Ltd Logo" width="120" />
  <h1>Assessment of Standard Coding</h1>
  <p><strong>A robust, hierarchical inventory manager (Brand → Model → Item)</strong></p>
  <p>
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel" />
    <img src="https://img.shields.io/badge/MySQL-005C84?style=flat-square&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black" alt="JavaScript" />
  </p>
</div>

---

## 🎯 Purpose
This project was developed to fulfill the "Standard Coding Assessment" for MicroMac Techno Valley Ltd. It demonstrates proficiency in building a hierarchical inventory management system while adhering strictly to professional coding standards, raw SQL database querying, and providing a seamless, modern user experience.

---

## 🚀 Installation & Setup
1. **Clone the repository:**
   ```bash
   git clone https://github.com/Md-Nur-A-Alam/your-repo-name.git
   cd your-repo-name
   ```
2. **Install PHP dependencies:**
   ```bash
   composer install
   ```
3. **Environment setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *(Update your `.env` file with your local MySQL credentials).*
4. **Import Database:**
   Import the provided `codingtestmmtv.sql` file into your MySQL database. This contains the required schema and pre-populated sample data.
5. **Run the server:**
   ```bash
   php artisan serve
   ```
   *(Note: Tailwind CSS and DaisyUI are served via CDN, so `npm install` is not required).*

---

## 🛠️ Technology Stack
- **Backend:** Laravel (PHP)
- **Database:** MySQL (using Laravel DB Facade with raw optimized SQL queries)
- **Frontend Engine:** Laravel Blade
- **Styling:** Tailwind CSS & DaisyUI
- **Interactivity:** Vanilla JavaScript (ES6)
- **Notifications:** Toastify.js

---

## ⚙️ Technical Aspects (Architecture & Security)
- **Dependent Dropdowns (Data Integrity):** The frontend strictly enforces hierarchical logic. When adding an item, the Model dropdown dynamically filters to match the selected Brand, preventing impossible "orphan" combinations.
- **Smart-Map Editing:** Clicking "Edit" automatically intercepts the data row, maps it to the edit modal, and pre-triggers all dependent dropdown logic to perfectly preserve relational context.
- **Dual-Layer Validation:**
  - *Client-Side:* Real-time checks for empty fields, string lengths, and duplicate parent-child combinations.
  - *Server-Side:* Laravel controllers aggressively re-validate all incoming requests to guarantee data security.

---

## 📊 Non-Technical Aspects (UI/UX)
- **Glassmorphism:** Utilizes subtle background gradients and floating glass-like containers (`backdrop-blur`) for a premium modern aesthetic.
- **Non-Blocking Feedback:** Uses sleek, auto-dismissing Toast notifications instead of jarring browser `window.alert()` popups.
- **Intuitive Modals:** All CRUD operations happen within elegant, center-screen DaisyUI modals to keep the user contextually grounded.
- **Responsive Design:** Automatically adjusts from desktop to mobile interfaces seamlessly.

---

## 📸 Interface Previews

<div align="center">
  <img src="public/assets/brandPage.png" width="48%" />
  <img src="public/assets/modelPage.png" width="48%" />
  <br/><br/>
  <img src="public/assets/itemPage.png" width="48%" />
  <img src="public/assets/add item.png" width="48%" />
  <br/><br/>
  <img src="public/assets/modelEdit_modal.png" width="48%" />
  <img src="public/assets/toast message.png" width="48%" />
</div>

---

## 👨‍💻 Developer Profile

<div align="center">
  <img src="public/assets/developer_Nur.jpeg" alt="Developer Nur" width="120" style="border-radius: 50%; border: 4px solid #EE2726;" />
  <h3>Md. Nur A Alam</h3>
</div>

<p align="center">
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
</p>
