<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_agent'; 

    // protected $hidden = ['Nom','Matricule', 'categorie'];

    protected $fillable = ['Nom','Prenom', 'Matricule', 'parcours'];

    public $timestamps = false;

    public function pointages() {
        return $this->hasMany(Pointage::class);
    }

    public function absences() {
        return $this->hasMany(Absence::class);
    }
}
