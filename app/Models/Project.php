<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'url',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getBadge()
    {
        return $this->type ? "<span class='badge' style='background-color:{$this->type->color}'>{$this->type->label}</span>" : "Uncategorized" ;
    }
}
