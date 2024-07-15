<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $table = 'kelas';

    protected $fillable = [
        'category_id',
        'sub_title',
        'discount',
        'price',
        'heading1',
        'heading2',
    ];
}
