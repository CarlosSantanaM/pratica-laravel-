<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'user_id'];

    public function user(){

        return $this->belongsTo(User::class);

    }

    // Definindo que um Post pertence a um User e permitindo a atribuicao em massa ($fillable).
}
