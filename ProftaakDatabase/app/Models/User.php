<?php
//bestand dat de verbinding maakt met de database voor de user het haalt de data uit de database en maakt het mogelijk om deze te gebruiken in de applicatie

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // velden die ingevuld mogen worden bij het aanmaken of updaten van een user
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    // velden die verborgen blijven bij het omzetten naar json voor veiligheidsredenen
    protected $hidden = [
        'password',
        'remember_token', // hidden zodat je deze niet in json hebt
    ];

    // functie die bepaalt hoe bepaalde velden worden gecast naar het juiste datatype
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    // functie die controleert of de huidige user een admin is en true of false teruggeeft
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
