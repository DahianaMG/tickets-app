<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Provincia;
use App\Models\TicketComentario;
use App\Models\EstadoTickets;

class Ticket extends Model
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
    protected $table = 'tickets';

    protected $fillable = [
        'nombre',
        'descripcion',
        'provincia_id'
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id', 'id');
    }
    public function comentarios()
    {
        return $this->hasMany(TicketComentario::class, 'ticket_id', 'id');
    }

    public function estadosTickets()
    {
        return $this->hasMany(EstadoTicket::class, 'ticket_id', 'id');
    }
}
