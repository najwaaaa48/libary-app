<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    'kategori_id',
    'kategori_nama',
    ];
    protected static function createKategoriBuku ($data)
    {
    return self::create($data);
    } 

    protected static function readKategoriBuku ()
    {
    $data = self::all();

    return $data; 
    } 

    protected static function updateKategoriBuku ($id, $data)
    {
    $kategori = self::find($id);

    if ($kategori) {
        $kategori->update($data);
        return $kategori;
    }

    return null;
    }
    
    protected static function readKategoriBukuById ($id)
{
    $kategori = self::find($id);

    return $kategori;
}

    protected static function deleteKategoriBuku ($id)
{
    return self::destroy($id);
}
}
