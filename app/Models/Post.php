<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'content', 'image', 'categorie_id'];
  /**
   * GETTER de la categorie à qui appartient ce post.
   */
  public function categorie()
  {
    return $this->belongsTo('App\Models\Categorie');
  }

}
