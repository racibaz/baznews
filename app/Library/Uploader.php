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
    public static function fileUpload($record,$file,$path,$filename)
    {
        if($file->isValid()){

            //$extension = $file->getClientOriginalExtension();

            $orjinalDirPath = base_path() . '/public/' . $path . "/";
            $orjinalFilePath = base_path() . '/public/' . $path . "/" . $filename;
            $file->move($orjinalDirPath, $filename);


            $attachment = new Attachment();
            $attachment->path =  $path .'/'. $filename;
            $attachment->save();

            $record->attachments()->save($attachment);
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