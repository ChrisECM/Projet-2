<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $table = 'order';
    protected $fillable = [
        'ref',
        'total',
    ];
    
    public function scopeTotalOrder($query) {
	    $result = $query->groupBy('ref')->selectRaw('ref, sum(total*qte) as totalorder')->get();
	    $arraytotalorder= array();
	    foreach($result as $line){
		$arraytotalorder[$line->ref] = $line->totalorder;
	    }
	    return $arraytotalorder;
    }

}
