<?php

namespace Tests\Unit\App\Http\Requests;

use App\Http\Requests\CreateArticleRequest;
use PHPUnit\Framework\TestCase;

class CreateArticleRequestTest extends TestCase
{
    public function testUserIsAuthorizedToMakeThisRequest()
    {
        $createArticleRequest = new CreateArticleRequest();

        $this->assertTrue($createArticleRequest->authorize());
    }

    public function testGetterRulesOfValidationForCreateArticle()
    {
        $createArticleRequest = new CreateArticleRequest();
        $rules = $createArticleRequest->rules();

        $this->assertIsArray($rules);
        $this->assertArrayHasKey('title', $rules);
        $this->assertArrayHasKey('body', $rules);
        $this->assertEquals('required|string|max:255', $rules['title']);
        $this->assertEquals('required|string|min:50', $rules['body']);
    }
}
