@servers(['localhost' => '127.0.0.1'])

@setup
$remote = 'origin';
$branch = 'master';
$projectDir = getenv('PROJECT_DIR');
$bot = getenv('TELEGRAM_BOT_TOKEN');
$chat = getenv('TELEGRAM_CHAT_ID');
@endsetup

@task('check')
bash -eu << 'EOF'
cd {{ $projectDir }}

OLD=$(git rev-parse HEAD)
git fetch {{ $remote }} {{ $branch }}
NEW=$(git rev-parse {{ $remote }}/{{ $branch }})

if [ "$OLD" != "$NEW" ]; then
    echo "update"
else
    echo "no-update"
fi
EOF
@endtask

@task('deploy')
bash -eu << 'EOF'
cd {{ $projectDir }}

git pull {{ $remote }} {{ $branch }}
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader
npm run build
php artisan optimize

curl -fsS \
    -o /dev/null \
    -w '' \
    "https://api.telegram.org/bot{{ $bot }}/sendMessage" \
    --data-urlencode "chat_id={{ $chat }}" \
    --data-urlencode "text=Deploy OK" \
    > /dev/null 2>&1

@endtask


@error
    @telegram($bot, $chat, '🟥 Error during deploy!')
@enderror
