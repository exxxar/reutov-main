<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'minutes',
        'min_correct',
        'chapter_id'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    public function passed(User $user)
    {
        return $this->attempts()->where('is_passed', true)->where('user_id', $user->id)->count() > 0;
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
