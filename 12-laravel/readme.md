composer global require laravel/installer
laravel new blog
php artisan serve
php artisan make:controller Articles

//Add Route to articles

php artisan make:model Article
php artisan make:model Category
php artisan make:migration create_articles_table --create=articles
php artisan make:migration create_article_category_table --create=article_category

// Add Schema::defaultStringLength(191); to boot
