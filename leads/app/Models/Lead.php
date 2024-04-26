<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'surname', 'email', 'createdate', 'how', 'type', 'mail_id',
        'mail_date', 'mail_message', 'mail_subject', 'mail_json'
    ];
    public function salesperson()
    {
        return $this->belongsTo(Salesperson::class, 'sales_person_id');
    }
}
