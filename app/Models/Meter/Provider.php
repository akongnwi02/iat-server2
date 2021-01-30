<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 10:52 PM
 */

namespace App\Models\Meter;


use App\Models\Traits\Uuid;
use Arcanedev\Support\Database\Model;

class Provider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'providers';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    use Uuid;
    
    protected $fillable = [
        'name',
        'code'
    ];
}