<?php

use Faker\Factory as Faker;
use App\Models\Article;
use App\Repositories\ArticleRepository;

trait MakeArticleTrait
{
    /**
     * Create fake instance of Article and save it in database
     *
     * @param array $articleFields
     * @return Article
     */
    public function makeArticle($articleFields = [])
    {
        /** @var ArticleRepository $articleRepo */
        $articleRepo = App::make(ArticleRepository::class);
        $theme = $this->fakeArticleData($articleFields);
        return $articleRepo->create($theme);
    }

    /**
     * Get fake instance of Article
     *
     * @param array $articleFields
     * @return Article
     */
    public function fakeArticle($articleFields = [])
    {
        return new Article($this->fakeArticleData($articleFields));
    }

    /**
     * Get fake data of Article
     *
     * @param array $postFields
     * @return array
     */
    public function fakeArticleData($articleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'judul' => $fake->word,
            'informasi' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $articleFields);
    }
}
