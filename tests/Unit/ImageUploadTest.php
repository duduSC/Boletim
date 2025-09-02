<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ImageUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class ImageUploadTest extends TestCase
{
    /**
     * @test
     */
    public function test_example(): void
    {
        $imageUpload = new ImageUpload();
        Storage::fake("public");

        $arquivo = UploadedFile::fake()->image("teste_image.jpg");
        $pasta = "test";

        $retorno= $imageUpload->SaveImage($arquivo,10,$pasta);
        Storage::assertExists($retorno);
        }
}
