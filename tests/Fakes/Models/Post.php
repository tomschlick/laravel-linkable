<?php

namespace TomSchlick\Linkable\Tests\Fakes\Models;

use Illuminate\Database\Eloquent\Model;
use TomSchlick\Linkable\Linkable;

class Post extends Model
{
    use Linkable;

    protected $guarded = [];

    /**
     * Link to a sub-item of the resource.
     *
     * @param string $key
     * @param array  $attr
     *
     * @return mixed
     */
    public function sublink(string $key, array $attr = []): string
    {
        return route("post.$key", array_merge($attr, [
            'post_id' => $this->getKey(),
        ]));
    }
}
