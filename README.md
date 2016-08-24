
```html
<h3>Installation</h3>

Get the package through Composer.

composer require westaddy/azzon-reviews
And then include the service provider within app/config/app.php.
<tt>
'providers' => [
    Westaddy\AzzonReviews\AzzonReviewServiceProvider::class
];
</tt>
At last you need to publish and run the migration.
<tt>
	php artisan vendor:publish --provider=Westaddy\AzzonReviews\AzzonReviewServiceProvider && php artisan migrate
</tt>
Setup a Model
<tt>
<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Rating
{
     use \Westaddy\AzzonReviews\Review;
}
</tt>
Create a rating
<tt>
Post::createReview($post_id,$comment,$rating,$ip,$user_id);
</tt>

Get all ratingd
<tt>
Post::getReviews($post_id);
</tt>
```