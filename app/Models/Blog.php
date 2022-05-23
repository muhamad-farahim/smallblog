<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'desc', 'body', "img", 'user_id'];


    static function create_dummy_blog(int $num): void
    {

        for ($x = 1; $x <= $num; $x++) {
            self::factory()->create();
        }
    }

    function getUsername()
    {

        return $this->BelongsTo(User::class, 'user_id')->first()->username;
    }

    function getImg()
    {


        return $this->img ? "storage/$this->img" : "https://source.unsplash.com/1200x400";
    }
}