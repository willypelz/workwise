<?php

namespace Tests\Feature\Api\v1;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_success_when_creating_a_article()
    {
        $data = [
            'name' => 'Michael Article',
            'author' => 'Asefon',
            'text' => 'this is a text',
            'expiry_date' => '2022-06-09',
            'publication_date' => '2022-02-09'
        ];

        $response = $this->postJson('/api/v1/articles', $data);
        $response->assertStatus(JsonResponse::HTTP_CREATED)
            ->assertJson(["status_code" => JsonResponse::HTTP_CREATED]);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_success_when_getting_all_articles()
    {

        $response = $this->getJson('/api/v1/articles');
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson(["status_code" => JsonResponse::HTTP_OK]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_success_when_getting_filtered_articles()
    {

        $response = $this->getJson('/api/v1/articles');
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson(["status_code" => JsonResponse::HTTP_OK]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_single_article_when_is_fetched()
    {

        $response = $this->getJson('/api/v1/articles/' . $this->article->id);
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson(["status_code" => JsonResponse::HTTP_OK]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_success_when_article_was_updated()
    {
        $data = [
            'name' => 'Michael Article',
            'author' => 'Asefon',
            'text' => 'this is a text',
            'expiry_date' => '2022-06-09',
            'publication_date' => '2022-02-09'
        ];

        $response = $this->patchJson('/api/v1/articles/' . $this->article->id, $data);
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson(["status_code" => JsonResponse::HTTP_OK]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_error_when_article_was_updated()
    {
        $data = [
            'name' => 'Michael Article',
            'author' => 'Asefon',
            'text' => 'this is a text',
            'expiry_date' => '2022-06-09',
            'publication_date' => '2022-02-09'
        ];

        $response = $this->patchJson('/api/v1/articles/' . 40, $data);
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson(["error" => "Article to be updated not found"]);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_returns_No_content_when_content_is_deleted()
    {

        $response = $this->deleteJson('/api/v1/articles/' . $this->article->id);
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson(["status_code" => JsonResponse::HTTP_NO_CONTENT]);
    }



}
