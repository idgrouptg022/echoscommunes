<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($contact) {
            $contact->identifiant = $contact->setContactMessageIdentifiant();
            $contact->save();
        });
    }

    public function setContactMessageIdentifiant(): string
    {
        $identifiant = uniqid("edcm");

        return $identifiant;
    }

    public function getRouteKeyName(): string
    {
        return "identifiant";
    }
}
