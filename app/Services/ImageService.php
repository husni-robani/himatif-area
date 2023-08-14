<?php

namespace App\Services;

use App\Contracts\Services\ImageServiceInterface;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public string $diskDirectory;
    public object $object;
    private string $path;

    public function __construct(object $object = null)
    {
        $this->object = $object;
    }

    public function uploadImage($image, $diskDirectory): static
    {
        if ($image !== null) {
            $this->path = $image->store($this->diskDirectory);
            return $this;
        }

        return $this;
    }

    public function storeImageDb($fieldName): object
    {
        if ($fieldName && $this->path) {
            $this->object->{$fieldName} = $this->path;
            $this->object->save();
            return $this->object;
        }

        return $this;
    }

    public function deleteImage($fieldName): static
    {
        Storage::delete($this->object->{$fieldName});
        $this->object->{$fieldName} = 'https://ui-avatars.com/api/?background=3d3d3d&color=fff&rounded=true';
        $this->object->save();
        return $this;
    }

}
