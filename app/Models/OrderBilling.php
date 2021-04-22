<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBilling extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_billings';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
