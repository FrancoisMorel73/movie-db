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
 * 
 *
 * @property int $id
 * @property int $movie_id
 * @property int $person_id
 * @property string $role
 * @property int $credit_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Movie $movie
 * @property-read \App\Models\Person $person
 * @method static \Illuminate\Database\Eloquent\Builder|Casting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Casting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Casting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Casting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Casting whereCreditOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Casting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Casting whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Casting wherePersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Casting whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Casting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCasting {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movie> $movies
 * @property-read int|null $movies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperGenre {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $release_date
 * @property int $duration
 * @property string $type
 * @property string $summary
 * @property string $synopsis
 * @property string $poster
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Genre> $genres
 * @property-read int|null $genres_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Person> $persons
 * @property-read int|null $persons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Season> $seasons
 * @property-read int|null $seasons_count
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereSynopsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperMovie {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Person newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person query()
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPerson {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $content
 * @property int $rating
 * @property string $published_date
 * @property int $movie_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Movie $movie
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePublishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperReview {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $number
 * @property int $episode_count
 * @property int $movie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Movie $movie
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereEpisodeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSeason {}
}

namespace App\Models{
/**
 * 
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
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
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

