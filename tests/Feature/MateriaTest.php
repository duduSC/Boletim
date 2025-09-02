<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class MateriaTest extends TestCase
{
    /**
     * @test
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/materias/create");
        $response->assertStatus(200);
        $response->assertViewIs("materias.create");
    }
}
