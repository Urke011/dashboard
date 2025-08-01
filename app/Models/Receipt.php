<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'currency', 'receipt_category_id'];

    public function category()
    {
        return $this->belongsTo(ReceiptCategory::class, 'receipt_category_id');
    }
}
