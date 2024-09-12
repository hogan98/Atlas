<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    public function test_you_must_be_logged_in(): void
    {
        $this->get('admin/categories')
            ->assertStatus(302)
            ->assertRedirect('login');

        $this->actingAs($this->customer)
            ->get('admin/categories')
            ->assertStatus(403)
            ->assertSee('You are not authorized to access this page.');

        $this->actingAs($this->admin)
            ->get('admin/categories')
            ->assertStatus(200)
            ->assertSee('Categories');
    }

    public function test_an_admin_can_add_a_category()
    {
        $this->actingAs($this->admin)
            ->get('admin/categories/create')
            ->assertStatus(200)
            ->assertSee('Add a Category');

        $attributes = [
            'title' => null,
            'slug' => null,
        ];

        // validation tests
        $this->actingAs($this->admin)
            ->post('admin/categories', $attributes)
            ->assertStatus(302)
            ->assertSessionHasErrors(['title', 'slug']);

        $attributes = [
            'title' => 'test',
            'slug' => 'test test', // slug should be like test-test
        ];

        $this->actingAs($this->admin)
            ->post('admin/categories', $attributes)
            ->assertStatus(302)
            ->assertSessionHasErrors('slug');

        Category::create([
           'title' => 'test',
           'slug' => 'test',
        ]);

        $attributes = [
            'title' => 'test',
            'slug' => 'test', // slug should be unique
        ];

        $this->actingAs($this->admin)
            ->post('admin/categories', $attributes)
            ->assertStatus(302)
            ->assertSessionHasErrors('slug');

        // lets check we can save the new category
        $attributes = [
            'title' => 'test 2',
            'slug' => 'test2',
        ];

        $this->actingAs($this->admin)
            ->post('admin/categories', $attributes)
            ->assertStatus(302)
            ->assertSessionHas('status', 'The category was successfully created.')
            ->assertRedirect('admin/categories');

        $exists = Category::where('slug', 'test2')
            ->exists();

        $this->assertTrue($exists);

    }

    public function test_an_admin_can_edit_a_category()
    {

    }

    public function test_an_admin_can_delete_a_category()
    {

    }
}
