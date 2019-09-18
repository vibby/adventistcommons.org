<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class ProductSection extends Eloquent {

    protected $table = "product_sections"; // table name

    protected $fillable = array('product_id', 'name','position');

    public $timestamps = false;

}
