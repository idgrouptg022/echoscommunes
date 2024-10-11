<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Actualite extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function authorable(): MorphTo
    {
        return $this->morphTo();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($actualite) {
            $actualite->description = $actualite->extractPlainText($actualite->body);
            $actualite->slug = $actualite->generateSlug($actualite->title);
            $actualite->save();
        });

        static::updating(function ($actualite) {
            $actualite->description = $actualite->extractPlainText($actualite->body);
            $actualite->slug = $actualite->generateSlug($actualite->title);
        });
    }

    private function extractPlainText($body): string
    {
        $htmlDecodedString = htmlspecialchars_decode($body, ENT_QUOTES);

        $plainText = strip_tags($htmlDecodedString);

        $plainText = substr($plainText, 0, 200);

        return $plainText;
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);

        if (static::where("slug", $slug)->exists()) {
            $max = static::where("title", $title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
