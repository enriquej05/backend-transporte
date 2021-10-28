@servers(['production' => ['-i /server-bwe/bwemx.pem ubuntu@18.223.230.153']])

@task('deployment', ['on' => 'production'])
    sudo su
    cd ../admin/web/enrique-dev.com/backend
    php artisan down
    git checkout -f
    git pull https://enriquej05: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@github.com/enriquej05/backend-transporte.git
    composer install
    php artisan optimize:clear
    composer dump-autoload --optimize
    npm install
    npm run production
    chmod -R 777 storage
    chmod -R 777 bootstrap
    php artisan up
@endtask
