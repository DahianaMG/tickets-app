<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EstadoTicket;

class Estado extends Model
{
    use SoftDeletes;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estados';

    protected $fillable = [
        'nombre',
        'codigo'
    ];

    public function estadosTickets() {
        return $this->hasMany(EstadoTicket::class, 'estado_id', 'id');
    }
}
