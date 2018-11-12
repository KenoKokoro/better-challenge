<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\BinaryUuid\HasBinaryUuid;

/**
 * @property string      guid
 * @property string      title
 * @property string      description
 * @property Carbon      created_at
 * @property Carbon      updated_at
 * @property Carbon|null deleted_at
 */
class Tip extends Model
{
    use SoftDeletes, HasBinaryUuid;

    protected $table = 'tips';

    protected $fillable = ['title', 'description'];

    public $incrementing = false;

    public function getKeyName()
    {
        return 'guid';
    }
}
