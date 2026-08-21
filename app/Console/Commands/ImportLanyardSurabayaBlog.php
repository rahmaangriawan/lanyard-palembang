<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportLanyardSurabayaBlog extends Command
{
    protected $signature = 'blog:import-lanyardsurabaya
        {--dry-run : Fetch and validate without changing database or active files}
        {--source=https://lanyardmedan.com : Approved public blog base URL to import}
        {--limit= : Limit source articles for a safe smoke test (requires --dry-run)}';

    protected $description = 'Import the public Lanyard Medan blog and its images into the local CMS.';

    public function handle(): int
    {
        $options = [
            '--source' => (string) $this->option('source'),
        ];

        foreach (['dry-run'] as $flag) {
            if ((bool) $this->option($flag)) {
                $options['--'.$flag] = true;
            }
        }

        if ($this->option('limit') !== null && $this->option('limit') !== '') {
            $options['--limit'] = (string) $this->option('limit');
        }

        return $this->call('blog:import-lanyardbekasi', $options);
    }
}
