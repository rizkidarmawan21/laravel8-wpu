set -e

echo "deploying app ..."
(php artisan down --message 'The app is being (quickly) updated. Please try again in a minute') || true
    git pull origin master

    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader

# Exit maintenance mode
php artisan up

echo "Application deployed!"