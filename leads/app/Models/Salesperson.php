<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    use HasFactory;
    protected $table = 'salespersons';
    protected $fillable = [
        'salesname', 'travelspirit_id', 'calendlylink'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    public function edit(Lead $lead)
{
    $salespersons = Salesperson::all(); // Retrieve all salespersons

    return view('leads.edit', compact('lead', 'salespersons'));
}
}
