<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\lib\resize;
use DB; 
use Auth;
use File;

use Validator;
use App\User;

use Illuminate\Support\Facades\Input;

class utilcontroller extends Controller
{
    public function uploads(Request $req){
        if ($req->hasFile('image')) {
             $rules = array(
             'image'    => 'image|mimes:jpg,jpeg|max:2048|dimensions:max_width=600,max_height=600', 
             
         ); 
         $validator = Validator::make(Input::all(), $rules);
          
         if ($validator->fails()) {
             return "<div id='warn' style='color:red; '> ".ucwords($validator->errors()->first())."</div>"   ; // send back the input (not the password) so that we can repopulate the form
         }else{
            
             $photo =str_random(28).".jpg"; 
             $destination =  'public/uploads/'; 
             if(Auth::user()->pic!="")File::delete($destination.Auth::user()->pic);
              $watermark_location="public/images/watermark.png";
              $save_watermarked_file_to = $destination.$photo ;  
         $req->file('image')->move($destination, $photo);
                  
         $resizeObj = new resize($save_watermarked_file_to);  
         $resizeObj -> resizeImage(189, 200, 'crop');
         $resizeObj -> saveImage($save_watermarked_file_to, 100);
         utilcontroller::watermark($save_watermarked_file_to, $watermark_location, $save_watermarked_file_to); 
         $update = User::find(Auth::user()->id);
 $update->pic = $photo;
 $update->save();
         return   "<div id='warn' style='color:green; '> Upload Successful</div>";
         }
     }
         else
         {
         if(Auth::user()->pic!="") return "public/uploads/".Auth::user()->pic;
         }
     }

    public function lga(request $req)
    {
$i='<option value="">Select An Option </option>';
        foreach(DB::table('lga')->where('state_id',$req->id)->get() as $value){                                                         
           $i .= " <option value= '$value->id'>" .ucwords( $value->name) ."</option>";
     } 
        return $i; 
    }

    public function study(Request $req){
        if($req->name=='dep'){
            $i='<option value="">Select An Option </option>';
            foreach(DB::table('department')->where('schools_id',$req->id)->get() as $value){                                                         
               $i .= " <option value= '$value->id'>" .ucwords( $value->department_name) ."</option>";
         } 
            return $i; 
        } 

        if($req->name=='course'){
            $i='<option value="">Select An Option </option>';
            foreach(DB::table('courses')->where('department_id',$req->id)->get() as $value){                                                         
               $i .= " <option value= '$value->ab' id='$value->id' course= '$value->program'>" .ucwords($value->program. " (".$value->ab.") In ". $value->course_name) ."</option>";
               
            } 
            return $i; 
        } 
        if($req->name=='course1'){
            $i='<option value="">Select An Option </option>'; 
            foreach(DB::table('courses')->where('department_id',$req->id)->get() as $value){ 
                $remember=''; 
     if($req->remember==$value->id)  $remember='selected="selected"';             
               $i .= " <option value= '$value->id' $remember> "  .ucwords($value->program. " (".$value->ab.") In ". $value->course_name) ."</option>";
             
            } 
            return $i; 
        } 
        
        if($req->name=='duration'){
            $i='<option value="">Select An Option </option>';
            foreach(DB::table('courses')->where('id',$req->id)->get() as $value){   

                for ($x = 1; $x <= $value->duration; $x++) {
                    $remember=''; 
                    if($req->remember==$x)  $remember='selected="selected"'; 
                $i .= " <option value= '$x'  $remember >$x</option>";
                
                } 
               
            } 
            return $i; 
        } 

    }
    
    function watermark($SourceFile, $WatermarkFile, $SaveToFile = NULL)
    {
    @imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
        $watermark = @imagecreatefrompng($WatermarkFile)
        or exit('Cannot open the watermark file.');
        imageAlphaBlending($watermark, false);
        imageSaveAlpha($watermark, true);
        $image_string = @file_get_contents($SourceFile)
        or exit('Cannot open image file.');
        $image = @imagecreatefromstring($image_string)
        or exit('Not a valid image format.');
                    
                        
    
    
    
        $imageWidth=imageSX($image);
        $imageHeight=imageSY($image);
        $watermarkWidth=imageSX($watermark);
        $watermarkHeight=imageSY($watermark);
        
        $coordinate_X = ($imageWidth -8) - ($watermarkWidth);
        $coordinate_Y = ( $imageHeight-0) - ($watermarkHeight);
        imagecopy($image, $watermark, $coordinate_X, $coordinate_Y,0, 0, $watermarkWidth, $watermarkHeight);
        if(!($SaveToFile)) header('Content-Type: image/jpeg');
        imagejpeg ($image, $SaveToFile, 100);
        imagedestroy($image);
        imagedestroy($watermark);
        if(!($SaveToFile)) exit;
    }
 
    //
}
