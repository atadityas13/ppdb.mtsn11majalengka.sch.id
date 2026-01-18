# MOBILE OPTIMIZATION GUIDE
## Panduan Penggunaan Fitur Mobile untuk PPDB System

---

## ✅ FITUR YANG SUDAH DIOPTIMASI

### 1. **SIDEBAR NAVIGATION**
- Auto-hide di mobile (lebar layar < 768px)
- Slide-in animation saat dibuka
- Overlay backdrop (tap untuk menutup)
- Auto-close setelah klik menu
- Touch-friendly menu items

**Cara Pakai:**
- Tap icon hamburger (☰) untuk buka sidebar
- Tap diluar sidebar (area gelap) untuk tutup
- Tap menu untuk navigasi (sidebar auto-close)

---

### 2. **TABLE RESPONSIVE**
- Horizontal scroll dengan smooth scrolling
- Scroll indicator "← Geser untuk melihat lebih →"
- Sticky header saat scroll vertikal
- Touch-friendly action buttons
- Optimized font size (12px)

**Tips:**
- Geser tabel ke kiri/kanan untuk lihat kolom tersembunyi
- Action buttons diperkecil tapi tetap mudah di-tap (min 36px)

---

### 3. **CARDS & DASHBOARD**
- Full-width di mobile (<576px)
- 2 kolom di tablet (768-991px)
- Auto-adjust height
- Touch-friendly statistics boxes

---

### 4. **FORMS**
- Touch-friendly input fields (min 44px height)
- Larger touch targets untuk buttons
- Auto-scroll ke error pertama saat validation
- Modal full-screen friendly

---

### 5. **BUTTONS**
- Minimum height 44px (Apple guidelines)
- Proper spacing dengan gap
- Icon + text yang responsive
- Wrap di mobile jika terlalu banyak

---

## 🎨 CSS CLASSES TAMBAHAN

### Mobile Utility Classes:
```html
<!-- Hide di mobile -->
<div class="mobile-hide">Hanya tampil di desktop</div>

<!-- Show di mobile saja -->
<div class="mobile-show">Hanya tampil di mobile</div>

<!-- Text center di mobile -->
<h1 class="mobile-text-center">Judul</h1>

<!-- Full width di mobile -->
<button class="btn mobile-full-width">Button</button>
```

### Table Card View (Optional):
Untuk convert tabel jadi card di mobile, tambahkan class `table-auto-mobile`:
```html
<table class="table table-auto-mobile">
```

---

## 📱 BREAKPOINTS

- **Mobile**: < 768px
- **Tablet**: 768px - 991px  
- **Desktop**: > 991px
- **Extra Small**: < 576px

---

## ⚙️ JAVASCRIPT FEATURES

### Auto-Enabled:
✅ Sidebar toggle & overlay
✅ Table scroll detection
✅ Touch scroll hints
✅ Modal ESC key close
✅ Dropdown auto-close
✅ Form error scroll

### Optional (Uncomment di mobile-optimize.js):
- Mobile card table conversion
- Responsive button text
- Sticky navbar
- Back to top button
- Pull to refresh

**Untuk enable fitur optional:**
Edit `assets/js/mobile-optimize.js` line ~190-195:
```javascript
// Uncomment yang diinginkan:
initMobileCardTable();
initBackToTop();
initStickyHeader();
```

---

## 🔧 CUSTOMIZATION

### Ubah Breakpoint:
Edit `assets/css/mobile-optimize.css` line 6:
```css
@media (max-width: 768px) {  /* Ubah 768px sesuai kebutuhan */
```

### Ubah Sidebar Width:
Edit line 26:
```css
.main-sidebar {
    width: 260px;  /* Default 260px */
}
```

### Ubah Touch Target Size:
Edit line 237:
```css
.btn {
    min-height: 44px;  /* Apple: 44px, Android: 48px */
}
```

---

## 🐛 TROUBLESHOOTING

### Sidebar tidak auto-hide di mobile?
1. Cek apakah `mobile-optimize.js` sudah loaded
2. Buka Console (F12), lihat error
3. Pastikan jQuery loaded sebelum mobile-optimize.js

### Table tidak bisa scroll?
1. Pastikan table ada wrapper `.table-responsive`
2. Cek apakah ada CSS `overflow: hidden` yang override
3. Set minimum width di table: `style="min-width: 600px"`

### Modal terlalu besar di mobile?
1. Cek line 272-286 di mobile-optimize.css
2. Adjust `max-height` di `.modal-body`

---

## 📊 TESTING CHECKLIST

### Mobile (< 768px):
- [ ] Sidebar hidden by default
- [ ] Hamburger menu works
- [ ] Tables scroll horizontal
- [ ] Buttons 44px+ height
- [ ] Forms easy to fill
- [ ] Modals tidak overflow
- [ ] No horizontal page scroll

### Tablet (768-991px):
- [ ] 2 kolom cards
- [ ] Table readable
- [ ] Sidebar full width

### Landscape Phone:
- [ ] Modal tidak terlalu tinggi
- [ ] Content tetap accessible

---

## 🚀 PERFORMANCE

- CSS file: ~15KB (uncompressed)
- JS file: ~8KB (uncompressed)
- No external dependencies
- Load time: < 50ms

---

## 📝 CHANGELOG

**v1.0 - Initial Release**
- Responsive sidebar dengan overlay
- Table horizontal scroll
- Touch-friendly UI elements
- Mobile-optimized forms & buttons
- Utility classes

---

## 💡 BEST PRACTICES

1. **Always test di real device**, bukan hanya Chrome DevTools
2. **Test landscape & portrait** mode
3. **Test dengan koneksi lambat** (3G/4G)
4. **Perhatikan touch target size** (min 44x44px)
5. **Hindari horizontal scroll di main content**
6. **Use semantic HTML** untuk accessibility

---

## 🔗 RESOURCES

- [Apple Human Interface Guidelines](https://developer.apple.com/design/human-interface-guidelines/)
- [Material Design Touch Targets](https://material.io/design/usability/accessibility.html)
- [Bootstrap 4 Responsive](https://getbootstrap.com/docs/4.0/layout/overview/)

---

**Dibuat untuk:** PPDB MTsN 11 Majalengka
**Tanggal:** Januari 2026
**Versi:** 1.0
