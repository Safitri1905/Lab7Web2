<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render(string $kategori = null)
    {
    $model = new ArtikelModel();
    $query = $model->orderBy('created_at', 'DESC');
    
    if ($kategori) {
        $query->where('kategori', $kategori);
    }
    
    $artikel = $query->limit(5)->findAll();
    return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
