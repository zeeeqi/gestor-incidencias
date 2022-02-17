<?php

namespace Database\Factories;

use App\Models\Incidencia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidencia>
 */
class IncidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Incidencia::class;
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraph(),
            'user_id_creado' => $this->faker->randomElement([1,2]),
            'user_id_reparado'=> null,
            'estado'=> 'pendiente'
        ];
    }
}
