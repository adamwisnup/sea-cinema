<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposit($amount)
    {
        $this->amount += $amount;
        $this->save();
    }

    public function withdraw($amount)
    {
        if ($this->amount >= $amount) {
            $this->amount -= $amount;
            $this->save();
            return $amount;
        } else {
            return 0;
        }
    }
}
