<?php


namespace TomSchlick\Linkable\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use TomSchlick\Linkable\Tests\Fakes\Models\Post;

class ModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function be_sure_routes_exist()
    {
        $this->assertHasRoute('post.index');
        $this->assertHasRoute('post.show');
        $this->assertHasRoute('post.create');
        $this->assertHasRoute('post.store');
        $this->assertHasRoute('post.edit');
        $this->assertHasRoute('post.update');
        $this->assertHasRoute('post.destroy');
    }

    /** @test */
    public function model_should_have_correct_methods()
    {
        $model = Post::create([
            'title' => 'Test',
        ]);

        $this->assertTrue(method_exists($model, 'link'));
        $this->assertTrue(method_exists($model, 'sublink'));
    }

    /** @test */
    public function assert_link_is_correct_path()
    {
        $model = Post::create([
            'title' => 'Test',
        ]);

        $this->assertEquals(
            config('app.url') . '/posts/' . $model->getKey(),
            $model->link()
        );
    }

    /** @test */
    public function assert_sublink_is_correct_path()
    {
        $model = Post::create([
            'title' => 'Test',
        ]);

        $this->assertEquals(
            config('app.url') . '/posts/' . $model->getKey() . '/edit',
            $model->sublink('edit')
        );
    }
}
