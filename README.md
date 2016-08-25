
```html
Installation

Get the package through Composer.

Open composer and require the following:
"require": {
        "westaddy/reviews":"dev-master",
    },
And then include the service provider within app/config/app.php.

'providers' => [
    Westaddy\Reviews\AzzonReviewServiceProvider::class
];

At last you need to publish and run the migration.

	php artisan vendor:publish --provider=Westaddy\Reviews\AzzonReviewServiceProvider && php artisan migrate

Setup a Model

<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Rating
{
     use \Westaddy\Reviews\Review;
}

Create a rating

Post::createReview($post_id,$comment,$rating,$ip,$user_id);


Get all ratingd

Post::getReviews($post_id);

```