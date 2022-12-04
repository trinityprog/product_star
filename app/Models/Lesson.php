<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    const QUEUE_STATUS = 0; //В очереди
    const STARTED_STATUS = 1; //В процессе
    const VIEWED_STATUS = 2; //Просмотрен
    const COMPLETED_STATUS = 3; //Пройден

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
