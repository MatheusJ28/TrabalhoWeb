<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $nome
 * @property int $numero
 * @property array<array-key, mixed>|null $imagens
 * @property int $obra_id
 * @property-read \App\Models\Obra $obra
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereImagens($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereObraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitulo whereUpdatedAt($value)
 */
	class Capitulo extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notes whereUserId($value)
 */
	class Notes extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $titulo
 * @property string $autor
 * @property string|null $capa_url
 * @property string|null $nota
 * @property string|null $slug
 * @property-read mixed $capa_url_publica
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Capitulo> $capitulos
 * @property-read int|null $capitulos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $favoritedBy
 * @property-read int|null $favorited_by_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereCapaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereNota($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obra whereUpdatedAt($value)
 */
	class Obra extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $last_login
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $name
 * @property string|null $profile_description
 * @property string $profile_color
 * @property string|null $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Obra> $favorites
 * @property-read int|null $favorites_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfileColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfileDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfilePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

