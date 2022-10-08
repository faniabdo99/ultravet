<?php
namespace App\Orchid\Screens\Article;
//Models
use App\Models\Article;
//Layouts
use App\Orchid\Layouts\Article\ArticleListLayout;
//Others
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class ArticleListScreen extends Screen {
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array {
        return [
            'articles' => Article::paginate()
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string {
        return 'Blog post';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string {
        return "All blog posts";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.article.edit')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            ArticleListLayout::class
        ];
    }
}