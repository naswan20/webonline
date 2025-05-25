<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number', 'customer_id', 'technician_id', 'service_id',
        'description', 'address', 'scheduled_at', 'status', 'total_price', 'notes'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function generateOrderNumber()
    {
        return 'ORD-' . date('Ymd') . '-' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
    }
}