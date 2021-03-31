<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'gender',
        'description',
        'phone_number',
        'D.O.B',
        'occupation',
        'nationality',
        'image_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
