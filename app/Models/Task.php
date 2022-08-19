<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'hour_expected', 'hour_done', 'done_flag', 'approval_flag', 'email',
    ];

    public function logs()
    {
        return $this->hasMany(TaskLog::class);
    }

    public function updateHour($add_hour = 0)
    {
        $new_hour = $this->hour_done + $add_hour;
        $done_flag = $new_hour >= $this->hour_expected;

        $this->update([
            'hour_done' => $new_hour,
            'done_flag' => $done_flag,
        ]);
        // $this->increment('hour_done', $hour);

        $this->logs()->create(['hour_done' => $add_hour]);

        return $this;
    }
}
