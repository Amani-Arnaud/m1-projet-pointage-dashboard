<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_parametre';
    protected $fillable = ['nom_entreprise','heure_arrivee', 'heure_depart', 'contenu', 'latitude_entreprise', 'longitude_entreprise', 'rayon', 'marge_arrivee'];
    public $timestamps = false;
}
