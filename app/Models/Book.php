<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'ISBN',
        'image',
        'publisher_id',
        'published_year',
        'category_id',
        'quantity',
    ];
    public function deleteUnreferencedImages()
    {
        // Get all image paths from the database
        $referencedImages = Book::pluck('image')->toArray();

        // Define the path to the public images directory
        $publicPath = public_path('uploads/books');

        // Get all files in the directory
        $files = glob($publicPath . '/*');

        // Loop through the files and delete those not in the database
        foreach ($files as $file) {
            $fileName = basename($file);

            if (!in_array('uploads/books/' . $fileName, $referencedImages)) {
                // Delete the file if it's not referenced in the database
                unlink($file);
            }
        }
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
