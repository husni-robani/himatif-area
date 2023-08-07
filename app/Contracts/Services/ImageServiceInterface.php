<?php
namespace App\Contracts\Services;

interface ImageServiceInterface{

    public function uploadImage($image, $diskDirectory) : static;

    public function storeImageDb($fieldName): object;

    public function deleteImage($fieldName) : static;



}
