<?php

namespace Tests\Unit;

use Carbon\Traits\ToStringFormat;
use Tests\TestCase;
use App\Http\Requests\StoreMateriaRequest;
use function Livewire\Volt\rules;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class StoreMateriaRequestTest extends TestCase
{
    /**
     * 
     * @test
     */

    public function test_rules(): void
    {
        $request = new StoreMateriaRequest();

        $this->assertEquals([
            'nome' => 'required|string|max:60',
            'carga_horaria' => 'required|integer',
            'descricao' => 'nullable|max:80'
        ], $request->rules());
    }

    public function test_authorize(): void {

        $request = new StoreMateriaRequest();

        $this->assertTrue($request->authorize());
    }
}
