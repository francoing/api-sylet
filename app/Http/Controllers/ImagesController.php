<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image; 

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    // public function imagen( $codigo) {
        
    //     $storagePath = public_path('img/productos/'. $codigo ); 
    //      return Image::make($storagePath)->response(); 

        
    //     } 


    public function imagen( $imagen) {
        
            $storagePath = public_path('img/productos/'. $imagen ); 
             return Image::make($storagePath)->response(); 
    
            
            } 



}
