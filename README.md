
```html
Installation

Get the package through Composer.

composer require westaddy/azzon-reviews
And then include the service provider within app/config/app.php.

'providers' => [
    Westaddy\AzzonReviews\AzzonReviewServiceProvider::class
];

At last you need to publish and run the migration.

	php artisan vendor:publish --provider=Westaddy\AzzonReviews\AzzonReviewServiceProvider && php artisan migrate

Setup a Model

<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Rating
{
     use \Westaddy\AzzonReviews\Review;
}

Create a rating

Post::createReview($post_id,$comment,$rating,$ip,$user_id);


Get all rating

Post::getReviews($post_id);

```