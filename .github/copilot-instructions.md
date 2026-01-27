# Copilot Instructions for Azzahra Computer

## Project Overview

**Azzahra Computer** is a Laravel 12 e-commerce application undergoing modernization. It combines product management, user administration, blog content, and advertising features with a modernized dashboard using real database analytics.

**Stack**: Laravel 12, PHP 8.2+, Blade templates, Vite (with Tailwind CSS), MySQL/PostgreSQL

---

## Architecture & Data Flow

### Core Models & Relationships
- **User**: Authenticatable model with admin/customer distinction (`is_admin`, `is_active` booleans). Has `phone`, `address` fields.
- **Product**: E-commerce items with `category`, `brand`, `specs`, `price`. **Note**: Timestamps disabled (`public $timestamps = false`). Being migrated to include `created_at`, `updated_at`, `description`, `stock`, `is_active`.
- **Blog**: Content management for articles with timestamps.
- **Iklan** (Advertisements): Marketing content with status tracking.
- **Store**: Order/transaction management.

**Key Pattern**: Models use `HasFactory` trait for seeding. New models should include timestamps and `is_active` boolean for soft feature flags.

### Dashboard Analytics Architecture
The `DashboardController` (app/Http/Controllers/Admin/DashboardController.php) calculates real-time statistics:
- **calculateStats()**: Aggregates totals, monthly counts, and growth percentages
- **getMonthlyCount()** & **getLastMonthCount()**: Use Carbon queries on `created_at` for YTM/LTM comparisons
- **calculateGrowth()**: Returns percentage change (handles zero-division)
- Returns compact stats dict with keys: `user_growth`, `product_growth`, `kunjungan`, `produk_masuk`, etc.

**Pattern**: All analytics queries filter by `created_at` timestamp; ensure migrations add these fields.

---

## Critical Developer Workflows

### Setup & Installation
```bash
# One-command modernized setup (runs composer, migrations, npm, cache clear)
./setup-modernisasi.sh

# Or manual steps:
composer install
php artisan migrate
npm install && npm run build
php artisan cache:clear && php artisan config:cache
```

### Development Server
```bash
# Composer script for concurrent dev (server + queue + logs + vite)
composer run dev

# Or individual services:
php artisan serve              # Default: localhost:8000
php artisan queue:listen       # Background jobs
npm run dev                    # Vite HMR (port 5173)
```

### Database Migrations & Testing
```bash
php artisan migrate            # Apply pending migrations
php artisan migrate:fresh      # Reset database (dev only)
php artisan db:seed DatabaseSeeder  # Populate sample data

# Verify in tinker REPL:
php artisan tinker
> User::count()              # Should return > 0
> Product::active()->count() # Test query scopes
> User::latest()->first()->created_at  # Verify timestamps
```

### Testing
```bash
# Run full test suite
composer run test

# Or directly:
php artisan test --filter=TestName
```

**Test Coverage**: See `tests/` folder. Focus on Feature tests for controllers and Unit tests for helpers/traits.

---

## Project-Specific Conventions

### Naming & File Organization
- **Controllers**: Admin controllers in `app/Http/Controllers/Admin/` (e.g., `DashboardController`, `ProdukController`).
- **Models**: Singular namespace but plural/descriptive names (e.g., `Iklan` for advertisements, `Store` for transactions).
- **Helpers**: Static utility classes in `app/Helpers/` (e.g., `DashboardHelper` for growth calculations).
- **Traits**: Reusable behaviors in `app/Traits/` (e.g., `HasStatistics` for monthly count methods).
- **Views**: Blade templates organized as `resources/views/{section}/{page}.blade.php` (e.g., `admin/dashboard/index.blade.php`).

### Database Conventions
- **Timestamps**: New tables must include `created_at`, `updated_at`. Use `$timestamps = true` (Laravel default) or explicitly add migration fields.
- **Status Fields**: All major entities use `is_active` boolean for soft feature control.
- **Soft Deletes**: Not yet implemented; future migrations should add `soft_delete` trait if needed.

### Blade Template Patterns
- Use **CSS Variables** for theming (dark/light modes): `var(--primary-color)`, `var(--bg-secondary)`.
- Responsive grid: `grid-cols-1 md:grid-cols-2 lg:grid-cols-4` for stat cards.
- Badge system: `<span class="badge badge-{status}">{{ $status }}</span>` for categorization.
- Data tables: Iterate recent items with Laravel's `@foreach` and use `$loop->iteration` for indices.

### Helper & Trait Usage
- **DashboardHelper**: 
  ```php
  DashboardHelper::calculateGrowthPercentage($current, $previous)  // Returns %
  DashboardHelper::formatNumber($num)                              // Returns string with separators
  DashboardHelper::getGrowthLabel($percentage)                     // Returns "▲ 12%" formatted string
  ```
- **HasStatistics trait**: Add to models needing monthly analytics:
  ```php
  use HasStatistics;
  // Enables: $model->getThisMonthCount(), $model->getLastMonthCount(), $model->getMonththGrowth()
  ```

---

## Integration Points & External Dependencies

### Vite & Asset Pipeline
- **Entry points**: `resources/css/app.css`, `resources/js/app.js` (configured in `vite.config.js`).
- **Tailwind CSS**: Enabled via `@tailwindcss/vite` plugin. New styles use Tailwind utilities.
- **HMR**: Auto-refresh on file changes during `npm run dev`.

### Authentication Middleware
- Custom middleware `check.auth` protects admin routes (`middleware(['check.auth'])`).
- Implemented in `app/Http/Middleware/` (verify actual file name in workspace).
- Routes under `/admin` prefix require authentication.

### Database Configuration
- Uses `.env` file for connection (`DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, etc.).
- See `config/database.php` for driver setup. Migrations support MySQL/PostgreSQL.

### NPM Dependencies
- Bootstrap Icons: `twbs/bootstrap-icons` (use with `<i class="bi bi-{icon}"></i>`).
- See `package.json` for full dev stack (Vite, Tailwind, etc.).

---

## Common Patterns to Follow

### Statistics Queries
Always use Carbon's `whereMonth()` + `whereYear()` for month comparisons:
```php
$thisMonth = Product::whereMonth('created_at', Carbon::now()->month)
                     ->whereYear('created_at', Carbon::now()->year)
                     ->count();
```

### View Data Passing
Controllers use `compact()` to pass variables to Blade:
```php
return view('admin.dashboard.index', compact('stats', 'recentProducts', 'recentUsers'));
```

### Array Response Structure
Admin stats returned as associative array:
```php
return [
    'user_growth' => 12.5,
    'product_growth' => -5.0,
    'kunjungan' => 150,  // Total users
    'produk_masuk' => 8, // This month's products
];
```

---

## Modernization Status

### ✅ Completed
- Dashboard with real analytics (growth rates, totals, recent items)
- User & Product models updated with timestamps and status fields
- Responsive Blade template with modern CSS
- Database migrations for schema updates
- Setup script for one-command initialization

### 🚀 Next Phase (Optional)
- Chart.js integration (placeholders ready in dashboard view)
- Search functionality in product/blog lists
- Email notifications for admin actions
- API endpoints for mobile app

---

## Troubleshooting Quick Reference

| Issue | Solution |
|-------|----------|
| Migrations fail | Run `php artisan migrate:fresh` (dev only) and reseed with `php artisan db:seed` |
| Dashboard shows zero stats | Verify data exists: `php artisan tinker` → `User::count()`, `Product::count()` |
| Vite not hot-reloading | Ensure `npm run dev` is running; check HMR config in `vite.config.js` |
| Auth middleware blocking admin routes | Verify `check.auth` middleware exists in `app/Http/Middleware/` |
| Timestamps NULL in DB | Ensure migration includes `$table->timestamps()` and timestamps enabled in model |

---

## When in Doubt

1. **Database changes**: Always create migration files (`php artisan make:migration`) for schema modifications.
2. **New controllers**: Namespace under `Admin/` if admin-only; inherit from `App\Http\Controllers\Controller`.
3. **New models**: Include `HasFactory`, add timestamps migration, use `is_active` for features.
4. **View changes**: Update `resources/views/` and use Blade syntax; check MODERNISASI_CHECKLIST.md for approved patterns.
5. **Helper functions**: Add to `DashboardHelper` or create domain-specific helper; document with PHPDoc.

Refer to `MODERNISASI_DOKUMENTASI.md` for detailed change history and `TESTING_GUIDE.md` for validation steps.
