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

@error
    @telegram($bot, $chat, 'Error during check!')
@enderror
