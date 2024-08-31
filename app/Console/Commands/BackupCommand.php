<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:backup-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = config('DB_DATABASE');
        $username = config('DB_USERNAME');
        $password = config('DB_PASSWORD');
        $host = config('DB_HOST');
        $port = config('DB_PORT', '3306');

        $date = now()->format('Y-m-d_H-i-s');
        $backupFile = "backup/{$databaseName}_{$date}.sql";

        $command = "mysqldump --user={$username} --password={$password} --host={$host} --port={$port} {$databaseName} > " . storage_path( $backupFile);
    
        exec($command, $output, $return);

        if ($return === 0) {
            $this->info('Backup successfully created: ' . $backupFile);
        } else {
            $this->error('Backup failed.');
        }
    }
    }