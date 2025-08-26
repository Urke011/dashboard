<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptCategory extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'color', 'parent_id'];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
    public function children()
    {
        return $this->hasMany(ReceiptCategory::class, 'parent_id');
    }
}

