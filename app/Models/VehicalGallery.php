<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class VehicalGallery extends Model
{
    // use HasFactory, Sluggable, SoftDeletes;
    use HasFactory;

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'file_name'
    //         ]
    //     ];
    // }

    public function vehical()
    {
        return $this->belongsTo('App\Models\Vehical');
    }

    public function setFileAttribute($file)
    {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) {
            upload_move($file, 'gallery');
            //Image::make($source_path)->resize(270,155)->save($source_path);
            upload_move($file, 'gallery', 'thumb');
            @unlink($source_path);
        }
        $this->attributes['file'] = $file;
        if ($file == '') {
            $this->deleteFile();
            $this->attributes['file'] = "";
        }
    }

    // public function setVideoAttribute($file) {
    //     $source_path = upload_tmp_path($file);
    //     if ($file && file_exists($source_path))
    //     {
    //     	$thumbnail_image = "thumbnail_image.png";
    //         upload_move($file,'gallery');
    //         Thumbnail::getThumbnail($source_path,public_path() . "/uploads/gallery-thumb",$thumbnail_image);
    //         @unlink($source_path);
    //     }
    //     $this->attributes['video'] = $file;
    //     $this->attributes['file'] = $thumbnail_image;
    //     if ($file == '')
    //     {
    //         $this->deleteFile();
    //         $this->attributes['video'] = "";
    //         $this->attributes['file'] = "";
    //     }
    // }

    public function file_url($type = 'original')
    {
        if (!empty($this->file)) {
            return Storage::url($this->file); // Devuelve la URL accesible
        }
        return asset('images/default-gallery.jpg'); // Imagen por defecto si no hay archivo
    }

    public function deleteFile()
    {
        Storage::delete('public/' . $this->file); // Elimina el archivo del almacenamiento
    }
}
