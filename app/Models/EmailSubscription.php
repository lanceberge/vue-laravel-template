<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class EmailSubscription extends Model
{
    public static $emailListFieldNames = ['marketing', 'feature_updates', 'notifications', 'new_blog_posts'];
    public static $subscriptionToModelMap = [
        'marketing' => 'Marketing',
        'feature_updates' => 'Feature Updates',
        'notifications' => 'Notifications',
        'new_blog_posts' => 'New Blog Posts',
    ];

    public function __construct()
    {
        $this->fillable = self::$emailListFieldNames;
    }
}
