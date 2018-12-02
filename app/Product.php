<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App
 * @property string $name
 * @property integer $tahun_terbit
 * @property string $penerbit
 * @property string $lokasi_buku
 * @property text $description
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
*/
class Product extends Model
{
    protected $fillable = ['name', 'tahun_terbit', 'penerbit', 'lokasi_buku', 'description', 'photo1', 'photo2', 'photo3'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTahunTerbitAttribute($input)
    {
        $this->attributes['tahun_terbit'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }
    
    public function tag()
    {
        return $this->belongsToMany(ProductTag::class, 'product_product_tag');
    }
    
}
