# 🧪 TESTING GUIDE - MODERNISASI DASHBOARD

## Persiapan Testing

### 1. Setup Database
```bash
# Hapus database lama dan buat baru
php artisan migrate:fresh

# Seed dengan data sampel
php artisan db:seed DatabaseSeeder
```

### 2. Cek Migrasi
```bash
# Lihat daftar migrations
php artisan migrate:status

# Jika ada error, rollback dan coba lagi
php artisan migrate:rollback
php artisan migrate
```

---

## Testing Checklist

### ✅ Test 1: Database Connection
```bash
php artisan tinker

# Jalankan commands ini:
User::count()           # Harus return angka
Product::count()        # Harus return angka
Blog::count()           # Harus return angka
Iklan::count()          # Harus return angka

# Test timestamps
User::latest()->first()->created_at
Product::latest()->first()->created_at

# Test scopes
User::active()->count()     # Harus return angka
Product::active()->count()  # Harus return angka
```

### ✅ Test 2: Dashboard Page Load
```bash
# Start server
php artisan serve

# Buka di browser:
http://localhost:8000/admin/dashboard
```

**Expected Results:**
- Page loads without errors
- Menampilkan 4 stat cards
- Stat cards menampilkan angka yang correct
- Recent items sections populated
- Responsive layout
- No console errors

### ✅ Test 3: Data Accuracy
Cek di `/admin/dashboard`:
- [ ] Total Pengguna = COUNT users table
- [ ] Produk Masuk = COUNT products WHERE month = current month
- [ ] Total Produk = COUNT products
- [ ] Konten Aktif = COUNT blogs + COUNT iklan WHERE is_active=1

### ✅ Test 4: Growth Calculations
```bash
# Di tinker, test pertumbuhan
php artisan tinker

$thisMonth = User::whereMonth('created_at', 1)
    ->whereYear('created_at', 2026)->count();
$lastMonth = User::whereMonth('created_at', 12)
    ->whereYear('created_at', 2025)->count();

$growth = ($thisMonth - $lastMonth) / $lastMonth * 100;
```

Bandingkan dengan yang ditampilkan di dashboard.

### ✅ Test 5: Recent Items
Di tinker:
```bash
Product::latest()->take(5)->get()  # Harus same dengan recent products
User::latest()->take(5)->get()     # Harus same dengan recent users  
Blog::latest()->take(5)->get()     # Harus same dengan recent blogs
```

### ✅ Test 6: Responsive Design
Test dashboard di:
- [ ] Desktop (1920x1080)
- [ ] Tablet (768x1024)
- [ ] Mobile (375x667)
- [ ] Landscape mobile (667x375)

**Expected:** Layout harus adjust dengan baik di semua ukuran

### ✅ Test 7: Visual Testing
- [ ] Stat cards memiliki warna berbeda
- [ ] Growth indicators muncul dengan benar
- [ ] Recent items list formatted proper
- [ ] Badges terlihat jelas
- [ ] Hover effects bekerja
- [ ] Typography readable

### ✅ Test 8: Error Handling
Test dengan scenarios berikut:

1. **Empty Database**
   ```bash
   php artisan migrate:fresh
   # Visit dashboard - harus tetap load tanpa error
   ```

2. **Missing Data**
   - Jika tidak ada products → "Belum ada produk"
   - Jika tidak ada users → "Belum ada pengguna baru"
   - Jika tidak ada blogs → "Belum ada artikel"

3. **Invalid Date Format**
   ```bash
   # Cek bahwa dates format dengan benar meski data corrupted
   ```

---

## Sample Data untuk Testing

### Insert Sample Users
```bash
php artisan tinker

User::create([
    'name' => 'Admin User',
    'email' => 'admin@azzahra.test',
    'password' => Hash::make('password'),
    'is_admin' => true,
    'is_active' => true,
]);

User::create([
    'name' => 'Regular User',
    'email' => 'user@azzahra.test',
    'password' => Hash::make('password'),
    'is_admin' => false,
    'is_active' => true,
]);
```

### Insert Sample Products
```bash
Product::create([
    'category' => 'Electronics',
    'product_name' => 'Gaming Laptop',
    'brand' => 'ASUS',
    'specs' => 'RTX 4060, i7, 16GB RAM',
    'price' => 15000000,
    'description' => 'High-end gaming laptop',
    'stock' => 5,
    'is_active' => true,
]);
```

### Insert Sample Blogs
```bash
Blog::create([
    'title' => 'Tips Memilih Laptop Gaming',
    'date' => now(),
    'body' => 'Panduan lengkap memilih laptop gaming yang tepat...',
]);
```

---

## Performance Testing

### Load Testing
```bash
# Test dengan banyak data
php artisan tinker

for($i = 0; $i < 1000; $i++) {
    User::create([
        'name' => 'User ' . $i,
        'email' => 'user' . $i . '@test.com',
        'password' => Hash::make('password'),
    ]);
}

# Time how long dashboard takes to load
# Should be under 200ms untuk 1000+ records
```

### Query Optimization
```bash
# Check queries di laravel.log
tail -f storage/logs/laravel.log

# Harus minimal queries:
# - 1 COUNT users
# - 1 COUNT products
# - 1 COUNT blogs
# - 1 COUNT iklan
# - 1 SELECT recent products
# - 1 SELECT recent users
# - 1 SELECT recent blogs
# Total: ~7 queries
```

---

## Debugging Tips

### Jika Dashboard Blank
1. Check browser console (F12) untuk errors
2. Check `storage/logs/laravel.log`
3. Verify database connection
4. Run `php artisan config:cache` dan clear

### Jika Data Tidak Muncul
1. Verify data exists: `php artisan tinker` → `User::count()`
2. Check view syntax: `resources/views/admin/dashboard/index.blade.php`
3. Check controller passing correct data
4. Verify model relationships jika ada

### Jika Styling Tidak Muncul
1. Check CSS di view file
2. Browser cache: Ctrl+Shift+Delete
3. Run `npm run dev` jika using Vite
4. Check file permissions

### Database Migration Issues
```bash
# Jika migration error
php artisan migrate:rollback
php artisan migrate

# Jika stuck
php artisan migrate:reset
php artisan migrate
php artisan db:seed
```

---

## Browser Developer Tools

### Console Testing
```javascript
// Check if data loaded
console.log(document.querySelectorAll('.stat-card').length); // Should be 4+

// Check CSS variables
getComputedStyle(document.documentElement).getPropertyValue('--primary');

// Test responsive
window.innerWidth // Check viewport width
```

### Network Testing
1. Open DevTools → Network tab
2. Reload dashboard
3. Check:
   - HTTP status 200
   - Page load time
   - Asset sizes
   - No 404 errors

---

## Final Checklist Before Production

- [ ] Database migrations successful
- [ ] No PHP errors in logs
- [ ] Dashboard loads in < 500ms
- [ ] All stat cards display correct data
- [ ] Recent items sections populated properly
- [ ] Responsive on mobile/tablet/desktop
- [ ] Growth calculations accurate
- [ ] All links/buttons working
- [ ] Error handling works properly
- [ ] Tests passing (if using automated tests)

---

**Testing Completed On:** _____________
**Tested By:** _____________
**Result:** ✅ PASS / ❌ FAIL

---

Untuk pertanyaan atau issues, check `MODERNISASI_DOKUMENTASI.md`
