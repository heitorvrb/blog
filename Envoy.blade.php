@servers(['localhost' => '127.0.0.1'])

@setup
    $remote = 'origin';
    $branch = 'master';
    $projectDir = getenv('PROJECT_DIR');
    $token = getenv('TELEGRAM_BOT_TOKEN');
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
    EOF
@endtask

@after
    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    $data = http_build_query([
        'chat_id'=> $chat,
        'text' => 'Deploy OK',
    ]);

    file_get_contents($url . '?' . $data);
@endafter

@error
    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    $data = http_build_query([
        'chat_id' => $chat,
        'text' => '🟥 Error during deploy!',
    ]);

    file_get_contents($url . '?' . $data);
@enderror
