<?php

namespace App\Models\Account;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
   
    public $table = 'transaction';
    protected $primaryKey = 'id';

    protected $dates = ['tdate'];
      
    protected $fillable = [
        'amount',
        'tdate',
        'debit_ahead_id',
        'credit_ahead_id',
        'admission_id',
        'month_id',
        'year_id',
        'note',
        'user_id',
    ];
    
    public function debit_ahead() {
        return $this->belongsTo(Ahead::class, 'debit_ahead_id');
    }
    public function credit_ahead() {
        return $this->belongsTo(Ahead::class, 'credit_ahead_id');
    }
    public function student() {
        return $this->belongsTo(Admission::class, 'admission_id');
    }
    public function month() {
        return $this->belongsTo(Month::class, 'month_id');
    }
    public function year() {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
