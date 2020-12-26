<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Project extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;

    protected $removeViewsOnDelete = true;

    public static function fromCategory ($category)
    {
        return Project::whereJsonContains('categories', $category);
    }

    public static function categoryCount ($category)
    {
        return Project::fromCategory($category)->count();
    }

    public function hasCategory ($category)
    {
        return in_array($category, json_decode($this->categories));
    }
}
