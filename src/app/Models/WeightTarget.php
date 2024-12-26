<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WeightTarget extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'target_weight'];

    //User (1対1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}