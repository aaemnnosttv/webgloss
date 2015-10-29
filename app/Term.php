<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
   protected $fillable = [
        'name',
        'acronym',
        'definition'
   ];

   /**
    * Get the aliases for this term
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function aliases()
   {
      return $this->hasMany(TermAlias::class);
   }
}
