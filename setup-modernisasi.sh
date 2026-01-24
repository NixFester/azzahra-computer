#!/bin/bash

# ============================================
# SCRIPT SETUP MODERNISASI APLIKASI AZZAHRA
# ============================================

echo "🚀 Starting setup modernization..."

# Step 1: Install dependencies
echo "📦 Installing composer dependencies..."
composer install

# Step 2: Update environment
echo "🔧 Updating environment..."
cp .env.example .env

# Step 3: Generate key
echo "🔑 Generating application key..."
php artisan key:generate

# Step 4: Run migrations
echo "💾 Running migrations..."
php artisan migrate

# Step 5: Clear cache
echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:cache
php artisan view:cache

# Step 6: Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# Step 7: Optional: Seed data
echo "🌱 Would you like to seed sample data? (y/n)"
read -r response
if [ "$response" = "y" ]; then
    php artisan db:seed
fi

echo "✅ Setup completed successfully!"
echo "🎉 Your application is ready!"
echo ""
echo "📝 Next steps:"
echo "1. Run: php artisan serve"
echo "2. Visit: http://localhost:8000/admin/dashboard"
echo "3. Login with your credentials"
echo ""
echo "📚 Check MODERNISASI_DOKUMENTASI.md for more information"
