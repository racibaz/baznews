<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 6.8.2016
 * Time: 09:54
 */
namespace App\Library;



use App\Attachment;
use Illuminate\Support\Facades\File;

class Uploader
{

    public static function fileUpload($record,$field,$file,$destination,$filename)
    {
        if($file->isValid()){

            //$extension = $file->getClientOriginalExtension();

            $orjinalDirPath = public_path($destination);
            $orjinalFilePath = public_path($destination . "/" . $filename);
            $file->move($orjinalDirPath, $filename);

            $record->update([
                $field => $destination .'/'. $filename
            ]);

            return true;

        } else {
            return false;
        }
    }


    public static function removeFile($destination)
    {
        if(File::exists(public_path($destination))) {
            File::delete(public_path($destination));
        }
    }


    public static function imageUploader($record, $path)
    {
    }
}