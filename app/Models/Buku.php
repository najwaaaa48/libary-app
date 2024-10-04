<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'buku_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    'buku_id',
    'buku_penulis_id',
    'buku_penerbit_id',
    'buku_kategori_id',
    'buku_rak_id',

    'buku_judul',
    'buku_isbn',
    'buku_thnpenerbit', 
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'buku_penulis_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'buku_kategori_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'buku_penerbit_id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'buku_rak_id');
    }

    protected static function createBuku($data)
    {
        return DB::table('buku')->insert($data);
    }

    protected static function readBuku()
    {
        $data = DB::table('buku')->paginate(10);

        return $data;
    }

    protected static function updateBuku($id, $data)
    {
        $buku = DB::table('buku')->where('buku_id', $id)->first();

        if ($buku) {
            DB::table('buku')->where('buku_id', $id)->update($data);
            return $data;
        }

        return null;
    }
    protected static function readBukuById($id)
    {
        $buku = DB::table('buku')->where('buku_id', $id)->first();

        return $buku;
    }
protected static function deleteBuku($id)
{
    return DB::table('buku')->where('buku_id', $id)->delete();
}

}
