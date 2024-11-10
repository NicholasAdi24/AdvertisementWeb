<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section'; // Specify the table name if it's not plural
    protected $primaryKey = 'id_section'; // The primary key is 'id_section'

    // Add the fillable fields for mass assignment
    protected $fillable = ['section'];
    
    // You can define relationships if needed
    public function iklans()
    {
        return $this->hasMany(Iklan::class, 'section_id', 'id_section');
    }
}
