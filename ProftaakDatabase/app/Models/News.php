<?php
// bestand dat verbinding maakt met de database voor nieuws het haalt de data uit de database en maakt het mogelijk om deze te gebruiken in de applicatie
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
