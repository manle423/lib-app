<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;

class CleanupImages extends Command
{
    protected $signature = 'images:cleanup';
    protected $description = 'Delete images from the public directory that are no longer referenced in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $referencedImages = Book::pluck('image')->toArray();
        $publicPath = public_path('uploads/books');
        $files = glob($publicPath . '/*');

        foreach ($files as $file) {
            $fileName = basename($file);
            if (!in_array('uploads/books/' . $fileName, $referencedImages)) {
                unlink($file);
            }
        }

        $this->info('Unreferenced images have been deleted.');
    }
}
