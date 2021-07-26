<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Article;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    public function testGetAllArticlesAndMotFound()
    {
        $response = $this->get('/api/articles');

        $response->assertStatus(204);
        $response->assertNoContent();
    }

    public function testCanGetAllArticlesWithSuccess()
    {
        Article::create([
            'title' => $this->faker->title(),
            'body' => $this->faker->text(),
        ]);

        $response = $this->get('/api/articles');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    public function testCanStoreAnArticle()
    {
        $this->withoutExceptionHandling();

        $inputs  = [
            'title' => $this->faker->title(),
            'body' => $this->faker->text(),
        ];

        $response = $this->post('/api/articles', $inputs);

        $response->assertStatus(201);
    }
}
