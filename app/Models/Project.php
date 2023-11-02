<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'url',
        'type_id',
        'image',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function getBadge()
    {
        return $this->type ? "<span class='badge' style='background-color:{$this->type->color}'>{$this->type->label}</span>" : "Uncategorized" ;
    }

    public function getTechBadges()
    {
        $html = "";
        foreach($this->technologies as $technology)
        {
            $html.= $technology ? "<span class='badge rounded-pill mx-1' style='background-color:{$technology->color}'>{$technology->label}</span>" : "Uncategorized";
        }
        return $html;
    }
}
