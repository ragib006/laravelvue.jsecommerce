<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addcategory extends Model
{




  // public function manysubcategory(){
  //
  //
  //     return $this->hasMany('App\Addcategory','category_type');
  //
  // }


  public function parentcategory(){

  return $this->hasMany('App\Addcategory','category_type')->where('category_status',1);


  }




}
