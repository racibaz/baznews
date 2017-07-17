<?php

namespace App\Modules\Article\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class ArticleAuthorRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Article\Models\ArticleAuthor';

    public function getAuthorAvatar($author): string
    {
        if($author->photo){
            return 'images/article_author_images/' . $author->id . '/58x58_' . $author->photo;
        }else{
            return 'img/default_user_avatar.jpg';
        }
    }
}