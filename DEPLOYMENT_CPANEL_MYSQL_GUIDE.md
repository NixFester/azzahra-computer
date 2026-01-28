# Deployment Guide: cPanel & SQLite to MySQL Migration

Panduan lengkap untuk mendeploy aplikasi Azzahra Computer ke cPanel dan melakukan migrasi dari SQLite ke MySQL.

---

## Bagian 1: Migrasi dari SQLite ke MySQL

### 1.1 Setup Database MySQL di cPanel

#### Langkah 1: Buat Database Baru
1. Login ke cPanel hosting Anda
2. Cari menu **MySQL Databases** atau **Databases**
3. Klik **Create New Database**
4. Masukkan nama database (contoh: `azzahra_computer`)
5. Klik **Create Database**

#### Langkah 2: Buat User MySQL
1. Di menu **MySQL Databases**, scroll ke bagian **MySQL Users**
2. Klik **Create New User**
3. Username: `azzahra_user` (atau sesuai preferensi)
4. Generate password yang kuat
5. Klik **Create User**

#### Langkah 3: Assign User ke Database
1. Di menu **MySQL Databases**, scroll ke **Add User to Database**
2. Pilih user dan database yang sudah dibuat
3. Klik **Add**
4. Centang semua privileges (atau minimal: `SELECT`, `INSERT`, `UPDATE`, `DELETE`, `CREATE`, `ALTER`)
5. Klik **Make Changes**

---

### 1.2 Konfigurasi File `.env` Lokal

Sebelum push ke cPanel, update file `.env` dengan konfigurasi MySQL:

```env
# Ubah dari SQLite ke MySQL
# DB_CONNECTION=sqlite
# DB_DATABASE=database.sqlite

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=azzahra_computer
DB_USERNAME=azzahra_user
DB_PASSWORD=your_strong_password_here
```

**Catatan**: Untuk cPanel shared hosting, `DB_HOST` biasanya `localhost`.

---

### 1.3 Backup Data Lama (Jika Ada)

Jika sudah ada data di SQLite:

```bash
# Buat folder backup
mkdir -p storage/backups

# Export dari SQLite (gunakan tool online atau manual export)
# Atau gunakan Laravel Tinker untuk export data
php artisan tinker
> $users = User::all()->toArray();
> \Illuminate\Support\Facades\File::put('storage/backups/users.json', json_encode($users));
```

---

### 1.4 Migrasi Database di Local (Testing)

Sebelum deploy, test migrasi di local machine:

```bash
# 1. Update .env ke MySQL lokal
# (setup MySQL lokal menggunakan XAMPP/WAMP/Docker)

# 2. Jalankan migrasi
php artisan migrate

# 3. Seed data (optional)
php artisan db:seed

# 4. Verify data
php artisan tinker
> User::count()
> Product::count()
```

---

## Bagian 2: Push ke cPanel

### 2.1 Persiapan File untuk Deploy

#### Step 1: Bersihkan File Tidak Perlu
```bash
# Hapus folder yang tidak perlu di production
rm -rf node_modules          # Akan di-install di server dengan composer
rm -rf vendor               # Akan di-install di server dengan composer
rm -rf .env.example         # Jangan copy ke server
rm -rf storage/logs/*       # Clear logs
rm -rf storage/cache/*      # Clear cache

# Atau update .gitignore dan gunakan git untuk exclude
```

#### Step 2: Siapkan `.env` Production
```bash
# Copy untuk production
cp .env .env.production

# Edit .env dengan kredensial production:
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=azzahra_computer
DB_USERNAME=azzahra_user
DB_PASSWORD=your_mysql_password
```

---

### 2.2 Upload ke cPanel

#### Metode 1: File Manager cPanel (Recommended untuk small projects)

1. **Login ke cPanel**
   - Buka cpanel.yourdomain.com
   - Masukkan username & password hosting

2. **Navigasi ke Public HTML**
   - Klik **File Manager**
   - Pilih **public_html** folder
   - Ini adalah root folder website Anda

3. **Upload File**
   - Klik **Upload** atau drag-drop file
   - Upload seluruh project (kecuali `node_modules` dan `vendor`)
   - Atau upload ZIP dan extract di cPanel

4. **Extract jika ZIP**
   - Right-click file ZIP
   - Klik **Extract**

**Struktur folder di public_html:**
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── public/          ← Content dari folder public Laravel
├── .env             ← File production .env
├── composer.json
├── artisan
└── ... (other files)
```

#### Metode 2: FTP Upload (Untuk file besar)

1. **Setup FTP Client** (FileZilla, WinSCP, dll)
   - Host: `ftp.yourdomain.com` atau IP dari cPanel
   - Username: cPanel username
   - Password: cPanel password
   - Port: 21 (FTP) atau 990 (FTPS - recommended)

2. **Struktur Upload**
   ```
   /public_html/
     ├── app/
     ├── bootstrap/
     ├── config/
     ├── ... (semua file project)
     └── public/
   ```

3. **Set File Permissions**
   ```
   storage/        → 755 (folder) & 644 (files)
   bootstrap/cache → 755 (folder) & 644 (files)
   public/         → 755 (folder) & 644 (files)
   ```

#### Metode 3: Git Deploy (Jika cPanel support)

1. **Setup Git di cPanel**
   - Beberapa hosting support SSH + Git
   - Clone repository ke public_html:
   ```bash
   cd /home/username/public_html
   git clone https://github.com/username/azzahra-computer.git .
   ```

2. **Pull updates**
   ```bash
   git pull origin main
   ```

---

### 2.3 Install Dependencies di Server

**Via cPanel Terminal (SSH)**

1. **Setup SSH Access di cPanel**
   - Buka **SSH Access** di cPanel
   - Generate key atau gunakan password

2. **SSH ke Server**
   ```bash
   ssh username@yourdomain.com
   # atau
   ssh -p 22 username@yourdomain.com
   ```

3. **Install Dependencies**
   ```bash
   cd ~/public_html

   # 1. Install Composer dependencies
   composer install --no-dev --optimize-autoloader
   
   # 2. Run migrations
   php artisan migrate --force
   
   # 3. Seed database (optional)
   php artisan db:seed --class=DatabaseSeeder
   
   # 4. Clear cache
   php artisan cache:clear
   php artisan config:cache
   php artisan route:cache
   
   # 5. Fix permissions
   chmod -R 755 storage bootstrap/cache
   chmod -R 644 storage/* bootstrap/cache/*
   
   # 6. Build assets (jika belum)
   npm install
   npm run build
   ```

**Jika cPanel tidak support SSH:**

   - Hubungi support hosting untuk install dependencies
   - Atau upload pre-built files dengan `vendor/` dan `node_modules/`
   - Minimal: jalankan migration melalui Artisan commands

---

### 2.4 Konfigurasi Domain & SSL

1. **Point Domain ke Folder Public**
   - cPanel → **Addon Domains** atau **Parked Domains**
   - Pastikan domain menunjuk ke `public_html/public` folder
   - Atau setup `.htaccess` redirect

2. **Setup SSL Certificate**
   - cPanel → **AutoSSL** atau **Let's Encrypt**
   - Generate sertifikat gratis
   - Update `APP_URL` di `.env` ke `https://yourdomain.com`

3. **Setup `.htaccess` (jika belum ada)**
   ```bash
   # Di public_html/
   php artisan storage:link  # Generate symlink untuk storage
   ```

   File: `public/.htaccess`
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteRule ^ index.php [L]
   </IfModule>
   ```

---

### 2.5 Setup File Permissions

Jalankan di server via SSH atau cPanel Terminal:

```bash
# Navigate ke project root
cd ~/public_html

# Set directory permissions
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;

# Set special permissions
chmod 755 artisan
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Set owner (jika diperlukan)
chown -R username:username .
```

---

## Bagian 3: Testing & Troubleshooting

### 3.1 Verify Installation

1. **Akses Website**
   ```
   https://yourdomain.com
   ```
   - Seharusnya menampilkan homepage Laravel atau landing page

2. **Check Error Logs**
   ```bash
   # Via SSH
   tail -f storage/logs/laravel.log
   
   # Atau lihat di cPanel → File Manager
   # storage/logs/laravel.log
   ```

3. **Test Database Connection**
   ```bash
   php artisan tinker
   > DB::connection()->getPdo();  // Should return PDO object
   > User::count()                 // Should return number > 0
   ```

---

### 3.2 Common Issues & Fixes

| Issue | Cause | Solution |
|-------|-------|----------|
| **500 Internal Server Error** | Misconfiguration atau missing `.env` | Check `storage/logs/laravel.log` untuk error details |
| **Database connection refused** | Wrong credentials atau MySQL not running | Verify DB credentials di `.env` dan MySQL user privileges di cPanel |
| **Permission denied (storage)** | Wrong folder permissions | `chmod -R 775 storage bootstrap/cache` |
| **Artisan command not found** | Wrong PHP version | Verify PHP version: `php -v` (min 8.2) |
| **CSS/JS not loading** | Missing public symlink | Run `php artisan storage:link` |
| **Migration error** | Foreign key constraints | Disable: `php artisan migrate --force` atau disable foreign keys |
| **Blank page** | `APP_DEBUG=false` tanpa logs | Enable temporary: `APP_DEBUG=true` untuk debugging |

---

### 3.3 Post-Deployment Checklist

- [ ] Website accessible via domain
- [ ] Database connected & migrations run
- [ ] Admin dashboard loading with data
- [ ] Product list displaying correctly
- [ ] User authentication working
- [ ] SSL certificate active (green lock)
- [ ] Error logs clean (no critical errors)
- [ ] Backup created sebelum deployment
- [ ] `.env` file tidak exposed (check via browser)
- [ ] `composer.json` visible tapi not executable

---

## Bagian 4: Update & Maintenance

### 4.1 Update Aplikasi

```bash
# Via SSH
cd ~/public_html

# 1. Pull latest changes
git pull origin main

# 2. Install dependencies
composer install --no-dev --optimize-autoloader

# 3. Run migrations
php artisan migrate --force

# 4. Clear cache
php artisan cache:clear
php artisan config:cache
php artisan route:cache

# 5. Restart queue (jika ada)
php artisan queue:restart
```

### 4.2 Database Backup

```bash
# Via SSH/cPanel Terminal
cd ~/public_html

# Backup database ke file
mysqldump -u azzahra_user -p azzahra_computer > database_backup_$(date +%Y%m%d).sql

# Atau gunakan Laravel
php artisan backup:run  # (jika package backup terinstall)
```

### 4.3 Monitoring

- Setup uptime monitoring (pingdom.com, statuspage.io)
- Monitor error logs: `tail -f storage/logs/laravel.log`
- Setup automated backups di cPanel

---

## File Reference

- **Local config**: `.env` (development)
- **Server config**: `.env` (production) di public_html
- **Database migrations**: `database/migrations/`
- **Logs location**: `storage/logs/laravel.log`
- **Public assets**: `public_html/public/`

---

## Quick Command Reference

```bash
# Development
composer run dev              # Start dev server + vite + queue

# Production deployment
php artisan migrate --force   # Run migrations
php artisan config:cache      # Cache config
php artisan route:cache       # Cache routes
php artisan view:cache        # Cache views

# Database operations
php artisan db:seed           # Seed database
php artisan tinker            # REPL shell
```

---

## Support & Resources

- [Laravel Documentation](https://laravel.com/docs)
- [MySQL cPanel Guide](https://docs.cpanel.net/cpanel/)
- [Laravel Deployment](https://laravel.com/docs/deployment)
- Contact hosting provider untuk technical support

---

**Last Updated**: January 28, 2026  
**Version**: 1.0
