# Daniyal Pharma – WordPress Theme

> A clean, minimalist, professional WordPress theme built for **Daniyal Pharma Private Limited** — a B2B pharmaceutical company based in New Delhi, India. Designed and developed by [Fardeen Ahmad](https://github.com/fardeenahmad) at **Weblix Studios**.

---

![Theme Preview](https://img.shields.io/badge/WordPress-6.0%2B-blue?logo=wordpress&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white) ![License](https://img.shields.io/badge/License-GPLv2-green) ![Version](https://img.shields.io/badge/Version-1.0.0-0A2540)

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Pages Included](#pages-included)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Importing Demo Content](#importing-demo-content)
- [Theme Customization](#theme-customization)
- [Adding Your Logo](#adding-your-logo)
- [Custom Post Type: Products](#custom-post-type-products)
- [Navigation Menu Setup](#navigation-menu-setup)
- [File Structure](#file-structure)
- [Recommended Plugins](#recommended-plugins)
- [Credits](#credits)
- [License](#license)

---

## Overview

This is a fully custom WordPress theme built from scratch — no page builder, no bloat. Designed specifically for **Daniyal Pharma Private Limited**, a B2B pharmaceutical company supplying branded medicines to hospitals, clinics, and healthcare institutions across India.

The theme follows a minimalist design language with a **navy + green** color palette, **Playfair Display** serif headings, and **DM Sans** body text. It is mobile-responsive, SEO-friendly, and built for performance.

---

## Features

- ✅ **100% Custom Theme** — no Elementor, no page builder dependency
- ✅ **Fully Responsive** — mobile, tablet, and desktop
- ✅ **Custom Logo Support** — upload via WordPress Customizer
- ✅ **Sticky Glassmorphism Header** — with scroll shadow effect
- ✅ **Mobile Hamburger Menu** — with smooth open/close animation and ✕ transition
- ✅ **Custom Post Type: Products** (`dp_product`) — with meta fields for composition, dosage form, pack size, Rx status, and more
- ✅ **Custom Taxonomies** — Therapeutic Segments (`dp_segment`) and Product Types (`dp_type`)
- ✅ **AJAX Contact Form** — built-in, no plugin required
- ✅ **Scroll Reveal Animations** — via IntersectionObserver
- ✅ **Product Filter Bar** — JavaScript-powered, filter by therapeutic segment
- ✅ **WordPress Customizer Integration** — edit phone, email, address without touching code
- ✅ **WordPress Import File** — pre-built demo content (pages + blog posts) ready to import
- ✅ **Widget Areas** — Blog Sidebar + Footer columns
- ✅ **No Horizontal Scroll** — overflow-x contained across all breakpoints

---

## Pages Included

| Page | Slug | Description |
|------|------|-------------|
| Home | `/` | Full landing page with hero, about, products, segments, services, quality, CTA, blog |
| About Us | `/about-us/` | Company story, vision, mission, key details, why choose us |
| Products | `/products/` | Product grid with live JavaScript filter bar |
| Therapeutic Segments | `/therapeutic-segments/` | All 6 therapeutic areas with detailed descriptions |
| Services | `/services/` | 6 B2B pharmaceutical service offerings |
| Quality | `/quality/` | Quality assurance process and commitment |
| Blog | `/blog/` | Archive listing of blog posts |
| Contact | `/contact/` | Contact form + address, phone, email, business hours |

> **3 demo blog posts** are included in the WordPress import file covering pharmaceutical insights, hospital supply, and formulation types.

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| CMS | WordPress 6.0+ |
| PHP | 7.4+ (8.0+ recommended) |
| CSS | Custom Properties, CSS Grid, Flexbox |
| JavaScript | Vanilla ES6 — no jQuery dependency |
| Fonts | Google Fonts — Playfair Display, DM Sans, DM Mono |
| Icons | Emoji-based (no icon font dependency) |
| Forms | WordPress AJAX (`wp_ajax`) — no Contact Form 7 needed |
| Animations | IntersectionObserver API |

---

## Installation

### Method A — WordPress Dashboard (Recommended)

1. Download or clone this repository
2. ZIP the `daniyal-pharma-theme` folder
3. Go to **WordPress Admin → Appearance → Themes → Add New → Upload Theme**
4. Upload the ZIP and click **Activate**

### Method B — FTP / File Manager

1. Upload the `daniyal-pharma-theme` folder to:
   ```
   /wp-content/themes/daniyal-pharma-theme/
   ```
2. Go to **Appearance → Themes** and click **Activate**

### Method C — WP-CLI

```bash
wp theme install /path/to/daniyal-pharma-theme.zip --activate
```

---

## Importing Demo Content

The repository includes a WordPress XML import file with all pages and blog posts pre-filled.

1. Go to **Tools → Import → WordPress**
2. Install the WordPress Importer if prompted
3. Upload `daniyal-pharma-wordpress-import.xml`
4. Assign all content to your admin user
5. Check **"Download and import file attachments"**
6. Click **Submit**

After importing, go to **Settings → Reading** and set:
- **Front page** → `Home`
- **Posts page** → `Blog`

---

## Theme Customization

All key business details are editable without touching code:

**Appearance → Customize → Company Information**

| Setting | Default |
|---------|---------|
| Phone Number | +91-85878 70997 |
| Email Address | info@daniyalpharma.com |
| Address | Shop No. 27, Sarai Julaina, Sukhdev Vihar, New Delhi – 110025 |

### Colors

Edit `style.css` — all colors are CSS custom properties in `:root`:

```css
:root {
    --primary:      #0A2540;   /* Dark navy — primary brand color   */
    --accent:       #1A7F5A;   /* Green — buttons, highlights        */
    --accent-light: #22A370;   /* Lighter green — hover states       */
    --accent-pale:  #E6F5EF;   /* Pale green — card backgrounds      */
    --text:         #1C1C1E;   /* Body text                          */
    --text-muted:   #6B7280;   /* Secondary text                     */
    --border:       #E5E7EB;   /* Border color                       */
}
```

### Fonts

Update the Google Fonts URL and CSS variables in `style.css`:

```css
--font-display: 'Playfair Display', Georgia, serif;
--font-body:    'DM Sans', 'Helvetica Neue', sans-serif;
--font-mono:    'DM Mono', monospace;
```

---

## Adding Your Logo

### Via WordPress Customizer (Recommended)

1. Go to **Appearance → Customize → Site Identity**
2. Click **Select Logo** and upload your logo image
3. Recommended size: **200 × 100px**, PNG with transparent background
4. Click **Publish**

The logo will automatically display next to the site name in the header. If no logo is uploaded, a styled **"D"** icon fallback is shown.

### Via Theme Folder

Replace `logo.png` in the theme root directory. The theme will attempt to auto-register this as the custom logo on activation.

---

## Custom Post Type: Products

The theme registers a **Products** custom post type (`dp_product`) with a dedicated meta box.

### Adding a Product

1. Go to **Products → Add New** in the WP admin sidebar
2. Fill in the **Product Details** meta box:

| Field | Description |
|-------|-------------|
| Composition / Salt | Active pharmaceutical ingredients (e.g. Aceclofenac 100mg + Paracetamol 325mg) |
| Dosage Form | Tablet / Capsule / Softgel / Syrup / etc. |
| Pack Size | e.g. 10×10 Alu-Alu, Strip of 10 |
| Prescription Required | `yes` or `no` |
| Therapeutic Segment | e.g. Pain Management, Gastroenterology |
| Key Benefits | One per line |
| Uses / Indications | One per line |
| Side Effects | Description |
| Storage Instructions | e.g. Store below 25°C, protect from light |
| SEO Keywords | Comma-separated keywords |

3. Assign to **Therapeutic Segments** and **Product Types** taxonomies
4. Publish

### Demo Products

| Product Name | Composition | Segment |
|-------------|-------------|---------|
| Danacox-P Tablet | Aceclofenac 100mg + Paracetamol 325mg | Pain Management |
| Danirab-D Capsule | Rabeprazole 20mg + Domperidone 30mg SR | Gastroenterology |
| Danimet-400 Tablet | Metronidazole 400mg | Antibiotics |
| Ursoden SL 300mg | Ursodeoxycholic Acid 300mg | Liver Care |
| Denimax Capsule | Omega-3 + Multivitamin + Minerals | Nutritional |
| Danaserp Tablet | Aceclofenac 100mg + Serratiopeptidase 15mg | Pain Management |
| Danipan-40 Tablet | Pantoprazole 40mg | Gastroenterology |
| Calcidani Tablet | Calcium Carbonate 500mg + Vitamin D3 250IU | Nutritional |

---

## Navigation Menu Setup

1. Go to **Appearance → Menus → Create a new menu**
2. Name it `Primary Navigation`
3. Add pages in this order:

```
Home → About Us → Products → Therapeutic Segments → Services → Quality → Blog → Contact Us
```

4. Under **Menu Settings**, check **Primary Navigation**
5. Click **Save Menu**

---

## File Structure

```
daniyal-pharma-theme/
│
├── style.css               # Theme metadata + complete stylesheet
├── functions.php           # Theme setup, CPT, taxonomies, widgets,
│                           # customizer, AJAX contact form, auto-logo
├── header.php              # Sticky header, logo, desktop nav, mobile nav
├── footer.php              # 4-column footer, social icons, copyright
├── front-page.php          # Full homepage template (all sections)
├── page.php                # Default inner page template
├── single.php              # Single blog post template
├── index.php               # Blog archive listing
├── archive.php             # Category / tag archive listing
├── logo.png                # Default logo bundled with theme
│
└── js/
    └── main.js             # Vanilla JS — mobile menu, scroll reveal,
                            # product filter, AJAX contact form
```

---

## Recommended Plugins

| Plugin | Purpose |
|--------|---------|
| [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/) | Meta titles, descriptions, XML sitemaps |
| [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp/) | Reliable contact form email delivery |
| [Smush](https://wordpress.org/plugins/wp-smushit/) | Image compression and lazy loading |
| [W3 Total Cache](https://wordpress.org/plugins/w3-total-cache/) | Performance caching |
| [UpdraftPlus](https://wordpress.org/plugins/updraftplus/) | Automated backups |
| [Really Simple SSL](https://wordpress.org/plugins/really-simple-ssl/) | SSL / HTTPS setup |

---

## Credits

| Role | Name |
|------|------|
| **Theme Design & Development** | [Fardeen Ahmad](https://weblix.in) — Weblix Studios |
| **Client** | Daniyal Pharma Private Limited, New Delhi |
| **Typography** | [Google Fonts](https://fonts.google.com) — Playfair Display, DM Sans, DM Mono |
| **CMS** | [WordPress](https://wordpress.org) |

---

## Developer

**Fardeen Ahmad**
Founder & Lead Developer — [Weblix Studios](https://weblix.in)

> Weblix Studios is a web design and development agency based in New Delhi, India, building custom websites and digital experiences for small and growing businesses.

- 🌐 Website: [weblix.in](https://weblix.in)
- 📧 Email: hello@weblix.in
- 📍 Location: New Friends Colony, New Delhi, India

---

## License

This theme is licensed under the [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.html) or later.

```
Copyright (C) 2025 Fardeen Ahmad — Weblix Studios

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

> This theme was built for Daniyal Pharma Private Limited. Unauthorized redistribution or resale of this theme without written permission from Weblix Studios is not permitted.

---

<p align="center">
  Built with ❤️ by <strong>Fardeen Ahmad</strong> at <strong>Weblix Studios</strong> · New Delhi, India
</p>
