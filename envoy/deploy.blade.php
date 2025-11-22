@servers(['localhost' => '127.0.0.1'])

@setup
$remote = 'origin';
$branch = 'master';
$projectDir = getenv('PROJECT_DIR');
$bot = getenv('TELEGRAM_BOT_TOKEN');
$chat = getenv('TELEGRAM_CHAT_ID');
@endsetup

@task('deploy')
bash -eu << 'EOF'
cd {{ $projectDir }}
git pull {{ $remote }} {{ $branch }}
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader
npm run build
php artisan optimize
EOF
@endtask

@success
    @telegram($bot, $chat, 'Deployed.')
@endsuccess

@error
    @telegram($bot, $chat, 'Error during deploy!')
@enderror
