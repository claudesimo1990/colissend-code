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
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $category
 * @property string|null $publishedAt
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\BlogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class IdeHelperBlog {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class IdeHelperContact {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $code
 * @property string|null $flag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class IdeHelperCountry {}
}

namespace App\Models{
/**
 * App\Models\Friends
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Friends newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friends newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friends query()
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereUserId($value)
 */
	class IdeHelperFriends {}
}

namespace App\Models{
/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $active_img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereActiveImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 */
	class IdeHelperGallery {}
}

namespace App\Models{
/**
 * App\Models\Identity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Identity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Identity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Identity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Identity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identity wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identity whereUserId($value)
 */
	class IdeHelperIdentity {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $from
 * @property int $to
 * @property int $read
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\MessageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 */
	class IdeHelperMessage {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $order_number
 * @property string|null $shipped_at
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class IdeHelperOrder {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string|null $name
 * @property int $user_id
 * @property int $referenznumber
 * @property string $type
 * @property string $from
 * @property string $to
 * @property string $dateFrom
 * @property string $dateTo
 * @property string|null $content
 * @property int $kilo
 * @property int $price
 * @property int|null $quantity
 * @property string $slug
 * @property string|null $company
 * @property string|null $objects
 * @property string|null $payment
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $count_reservations
 * @property-read string $ticket
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereKilo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereObjects($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereReferenznumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 */
	class IdeHelperPost {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $slug
 * @property int $price
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $formatted_price
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class IdeHelperProduct {}
}

namespace App\Models{
/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $avatar
 * @property string|null $city
 * @property int $user_id
 * @property string|null $country
 * @property string|null $street
 * @property string|null $phone
 * @property string|null $birthday
 * @property string|null $about
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $google
 * @property string|null $linkedin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 */
	class IdeHelperProfile {}
}

namespace App\Models{
/**
 * App\Models\Pub
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property string|null $image
 * @property string $content
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PubFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pub newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pub query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pub whereUserId($value)
 */
	class IdeHelperPub {}
}

namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property int $post_id
 * @property int $user_id
 * @property string|null $message
 * @property string|null $kilo
 * @property string|null $price
 * @property int $referenznumber
 * @property string $status
 * @property int $paid
 * @property string|null $objects
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\Post $post
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ReservationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereKilo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereObjects($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereReferenznumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
 */
	class IdeHelperReservation {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class IdeHelperRole {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int $reservations_id
 * @property string $payment_id
 * @property string $payment_method
 * @property string $amount
 * @property string $paypal_fee
 * @property string $net_amount
 * @property string|null $paypal_client_email
 * @property string $full_name
 * @property string $street
 * @property string $city
 * @property string $postal_code
 * @property string $country_code
 * @property string $currency_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Reservation|null $reservation
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNetAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaypalClientEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaypalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReservationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 */
	class IdeHelperTransaction {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $password
 * @property string $email
 * @property string|null $genre
 * @property string|null $country
 * @property string|null $city
 * @property string $avatar
 * @property string|null $phone
 * @property string|null $identity_card
 * @property string|null $confirmation_token
 * @property string|null $google_id
 * @property string|null $facebook_id
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $google
 * @property string|null $linkedin
 * @property string|null $paypal_name
 * @property string|null $paypal_email
 * @property string|null $bank_address_1
 * @property string|null $bank_address_2
 * @property string|null $bank_postal_code
 * @property string|null $bank_city
 * @property string|null $bank_owner
 * @property string|null $bank_iban
 * @property string|null $birthday
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone_verified_at
 * @property string|null $last_connexion
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Friends[] $friends
 * @property-read int|null $friends_count
 * @property-read mixed $my_avatar
 * @property-read \Illuminate\Database\Eloquent\Collection $packs
 * @property-read string $thumb
 * @property-read \Illuminate\Database\Eloquent\Collection $travels
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Identity[] $identities
 * @property-read int|null $identities_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\Profile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentityCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastConnexion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePaypalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser {}
}

