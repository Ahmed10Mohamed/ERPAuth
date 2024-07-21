<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ProjectImage;
use Aws\S3\S3Client;

class ImageVideoUpload
{
    public function StoreImageSingle($upload,$model){

        $image = $upload;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/image/'.$model);
        $image->move($destinationPath, $imageName);
        $name = '/uploads/image/'.$model.'/'.$imageName;
         return $name;
    }
    public function DeleteImageSingle($image_data){
        if (File::exists(public_path().$image_data))
        {
            File::delete(public_path().$image_data);
        }
    }
    public function UpdateImageSingle($upload,$model,$image_data){
        if (File::exists(public_path().$image_data))
        {
            File::delete(public_path().$image_data);
        }

        $image = $upload;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/image/'.$model);
        $image->move($destinationPath, $imageName);
        $name = '/uploads/image/'.$model.'/'.$imageName;
         return $name;
    }
    public function Storepdf($upload,$model){
        $pdf = $upload;
        $pdfName = time().'.'.$pdf->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/pdf/'.$model);
        $pdf->move($destinationPath, $pdfName);
        $name = '/uploads/pdf/'.$model.'/'.$pdfName;
        return $name;
    }
    public function Updatepdf($upload,$model,$pdf_data){
        if (File::exists(public_path().$pdf_data))
        {
            File::delete(public_path().$pdf_data);
        }

        $pdf = $upload;
        $pdfName = time().'.'.$pdf->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/pdf/'.$model);
        $pdf->move($destinationPath, $pdfName);
        $name = '/uploads/pdf/'.$model.'/'.$pdfName;
         return $name;
    }
    public function StoreVideo($upload,$model){
        $video = $upload;
        $videoName = time().'.'.$video->getClientOriginalExtension();
        $destinationPath = public_path('uploads/'.$model);
        $video->move($destinationPath, $videoName);
        $SourceFile = 'uploads/'.$model.'/'.$videoName;
         // start upload in s3
         $s3 = $this->get_s3_data();
          // Specify your S3 bucket name
          $bucket = 'cyberz';
          // Specify the key (path) under which the file will be stored in S3
         $s3->putObject(array(
              'Bucket'     => $bucket,
              'Key'        => $SourceFile,
              'SourceFile' => $SourceFile,
              'Metadata'   => array(
                  'Foo' => 'abc',
                  'Baz' => '123'
              )
          ));
        if (File::exists(public_path().$SourceFile))
        {
            File::delete(public_path().$SourceFile);
        }
        return $SourceFile;
    }
    public function Updatevideo($upload,$model,$video_source){
        $s3 = $this->get_s3_data();
        $bucket = 'cyberz';
       
        $video = $upload;
        $videoName = time().'.'.$video->getClientOriginalExtension();
        $destinationPath = public_path('uploads/'.$model);
        $video->move($destinationPath, $videoName);
        $name = 'uploads/'.$model.'/'.$videoName;
      
        $s3->putObject(array(
            'Bucket'     => $bucket,
            'Key'        => $name,
            'SourceFile' => $name,
            'Metadata'   => array(
                'Foo' => 'abc',
                'Baz' => '123'
            )
        ));
      if (File::exists(public_path().$name))
      {
          File::delete(public_path().$name);
      }
        // after create in s3 delete 
        $s3->deleteObject([
            'Bucket' => $bucket,
            'Key' => $video_source,
        ]);
         return $name;
    }
    public function get_s3_data(){
          // Create an S3 client
          $s3 = new S3Client([
            'version' => 'latest',
            'region' => config('aws.region'),
            'credentials' => [
                'key' => 'AKIAWGDUSPYSJXG5F6XZ',
                'secret' => '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',
            ],
        ]);
      
        return $s3;
    }

}
