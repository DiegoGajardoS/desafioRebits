<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Historico
 *
 * @property-read \App\Models\Usuario|null $usuario
 * @property-read \App\Models\Vehiculo|null $vehiculo
 * @method static \Database\Factories\HistoricoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Historico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historico query()
 */
	class Historico extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property mixed $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Usuario
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Historico> $historicos
 * @property-read int|null $historicos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vehiculo> $vehiculos
 * @property-read int|null $vehiculos_count
 * @method static \Database\Factories\UsuarioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 */
	class Usuario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vehiculo
 *
 * @property-read \App\Models\Usuario|null $dueno
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Historico> $historicos
 * @property-read int|null $historicos_count
 * @method static \Database\Factories\VehiculoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo query()
 */
	class Vehiculo extends \Eloquent {}
}

