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
 * @property int $id
 * @property int $vehiculo_id
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Usuario $usuario
 * @property-read \App\Models\Vehiculo $vehiculo
 * @method static \Database\Factories\HistoricoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Historico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historico query()
 * @method static \Illuminate\Database\Eloquent\Builder|Historico whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historico whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historico whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historico whereUsuarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historico whereVehiculoId($value)
 */
	class Historico extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Usuario
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $correo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Historico> $historicos
 * @property-read int|null $historicos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vehiculo> $vehiculos
 * @property-read int|null $vehiculos_count
 * @method static \Database\Factories\UsuarioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 */
	class Usuario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vehiculo
 *
 * @property int $id
 * @property string $marca
 * @property string $modelo
 * @property int $anho
 * @property int $duenho_id
 * @property string $precio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Usuario $dueno
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Historico> $historicos
 * @property-read int|null $historicos_count
 * @method static \Database\Factories\VehiculoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereAnho($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereDuenhoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereMarca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereModelo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehiculo whereUpdatedAt($value)
 */
	class Vehiculo extends \Eloquent {}
}

