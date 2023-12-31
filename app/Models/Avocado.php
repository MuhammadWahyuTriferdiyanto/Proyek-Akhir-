<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avocado extends Model
{
    use HasFactory;

    protected $fillable = ['no', 'nama', 'gambar', 'keterangan', 'berat', 'harga', 'stok'];

    // Accessor to get the image URL or a message if no image is available
    public function getGambarAttribute($value)
    {
        // Replace 'path-to-your-image-directory/' with the actual path to your image directory
        $imageUrl = $value ? asset('path-to-your-image-directory/' . $value) : null;

        // Replace 'path-to-default-image-if-no-gambar' with the actual path to a default image
        return $imageUrl ?: asset('path-to-default-image-if-no-gambar');
    }

    // Mutator to convert berat to decimal before saving
    public function setBeratAttribute($value)
    {
        $this->attributes['berat'] = str_replace(',', '.', $value);
    }
}
