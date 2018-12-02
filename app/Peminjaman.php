<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Peminjaman
 *
 * @package App
 * @property string $nama
 * @property string $judul_buku
 * @property string $tanggal_peminjaman
 * @property string $batas_waktu
*/
class Peminjaman extends Model
{
    use SoftDeletes;

    protected $fillable = ['tanggal_peminjaman', 'batas_waktu', 'nama_id', 'judul_buku_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNamaIdAttribute($input)
    {
        $this->attributes['nama_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setJudulBukuIdAttribute($input)
    {
        $this->attributes['judul_buku_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTanggalPeminjamanAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['tanggal_peminjaman'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['tanggal_peminjaman'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTanggalPeminjamanAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBatasWaktuAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['batas_waktu'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['batas_waktu'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBatasWaktuAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    public function nama()
    {
        return $this->belongsTo(User::class, 'nama_id');
    }
    
    public function judul_buku()
    {
        return $this->belongsTo(Product::class, 'judul_buku_id');
    }
    
}
