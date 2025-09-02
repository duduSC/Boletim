<?php

namespace App\Services;

use Illuminate\Support\Str;
class ImageUpload
{
    public function SaveImage($form,$entidadeId,$pasta):String
    {
        $local = "images/".$pasta;
        $nomeArquivo = Str::slug($form->input("nome")) . "_" . "foto" . $entidadeId;
        if ($form->hasFile("image")) {
            $imagem = $form->file("image")->storeAs($local, $nomeArquivo, "public");
        } else {
            $imagem = "images/user_image.png";
        }
        return $imagem;
    }
}
