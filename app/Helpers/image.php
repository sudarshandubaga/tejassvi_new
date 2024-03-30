<?php

use Illuminate\Support\Facades\Storage;

function dataUriToImage($dataUri, $folder = "")
{
    @list($type, $image) = explode(';base64,', $dataUri);
    $extension = substr($type, 11, strlen($type));

    // $image = $imageArr[1];
    $image = str_replace(' ', '+', $image);
    $data = base64_decode($image);

    $fileName = $folder . "/" . uniqid() . "." . $extension;

    Storage::disk("public")->put($fileName, $data);

    return $fileName;
}
