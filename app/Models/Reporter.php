<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reporter extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function actualites(): MorphMany
    {
        return $this->morphMany(Actualite::class, 'authorable');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($reporter) {
            $reporter->name = $reporter->setName($reporter->firstname, $reporter->lastname);
            $reporter->lastLogin = $reporter->lastLogin();
            $reporter->save();
        });

        static::updating(function ($reporter) {
            $reporter->lastLogin = $reporter->lastLogin();
        });
    }

    private function setName($firstname, $lastname): string
    {
        return $firstname . ' ' . Str::upper($lastname);
    }

    private function lastLogin(): Carbon
    {
        return now();
    }
}
