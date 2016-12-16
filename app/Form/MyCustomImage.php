<?php
/**
 * Created by PhpStorm.
 * User: andy-m
 * Date: 16.12.16
 * Time: 20:20
 */

namespace App\Form;


use Illuminate\Http\UploadedFile;
use SleepingOwl\Admin\Form\Element\Image;

class MyCustomImage extends Image
{

    protected static function saveFile(UploadedFile $file, $path, $filename, array $settings)
    {
        if (
            class_exists('Intervention\Image\Facades\Image')
            and
            (bool) getimagesize($file->getRealPath())
        ) {

            $image = \Intervention\Image\Facades\Image::make($file);
            $thumb = \Intervention\Image\Facades\Image::make($file);

            $thumb->resize(320, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            foreach ($settings as $method => $args) {
                call_user_func_array([$image, $method], $args);
            }

            $thumb->save($path.'/thumb-'.$filename);
            return $image->save($path.'/'.$filename);
        }

        $file->move($path, $filename);
    }

}