<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'completed'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function getAll()
    {
        return static::all();
    }

    public function findTask()
    {
        return static::find($id);
    }

    public function deleteTask()
    {
        return static::find($id)->delete();
    }

    public function store()
    {
        
    }
}
