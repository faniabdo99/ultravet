<?php
namespace App\Orchid\Layouts\Article;

use App\Models\Article;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class ArticleListLayout extends Table{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'articles';

    /**
     * @return TD[]
     */
    public function columns(): array {
        return [
            TD::make('image' , 'Image')
                ->render(function (Article $article){
                    return '<img style="width:100px;height:auto;" src="'.$article->ImagePath.'" />';
                }),
            TD::make('title', 'Title')
                ->render(function (Article $article) {
                    return Link::make($article->title)
                        ->route('platform.article.edit', $article);
                }),
            TD::make('created_at', 'Created')
                ->render(function(Article $article){
                    return $article->created_at->format('Y-m-d');
                }),
            TD::make('updated_at', 'Last edit')
                ->render(function(Article $article){
                    return $article->updated_at->format('Y-m-d');
                }),
        ];
    }
}