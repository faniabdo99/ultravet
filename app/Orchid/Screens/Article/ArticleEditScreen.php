<?php

namespace App\Orchid\Screens\Article;
//Models
use App\Models\Article;
use App\Models\User;
//Others
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
//Fields
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Upload;

class ArticleEditScreen extends Screen{
    public $article;
    public function query(Article $article): iterable {
        return [
            'article' => $article
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string{
        return $this->article->exists ? 'Edit article' : 'Create a new article';
    }
    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string {
        return "Blog Articles";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable {
        return [
            Button::make('Create article')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->article->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->article->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->article->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable {
        return [
            Layout::rows([
                Input::make('article.title')
                    ->title('Title')
                    ->required()
                    ->placeholder('The Article Title')
                    ->help('Specify a short descriptive title for this article.'),

                Input::make('article.slug')
                    ->title('Slug')
                    ->required()
                    ->placeholder('the-article-title')
                    ->help('Slug must be same as the title but without any special charachters'),

                Picture::make('article.image')
                        ->title("Image")
                        ->acceptedFiles('.jpg,.png,.webp,.gif'),
                TextArea::make('article.description')
                    ->title('Description')
                    ->rows(3)
                    ->required()
                    ->maxlength(255)
                    ->placeholder('Brief description for preview, no longer than 255 chrachters'),

                Relation::make('article.user_id')
                    ->title('Author')
                    ->required()
                    ->fromModel(User::class, 'name'),

                Quill::make('article.content')
                      ->title('Content')
                      ->required(),
            ])
        ];
    }
    //Screen Actions
    /**
     * @param Article    $article
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Article $article, Request $request){
        $article->fill($request->get('article'))->save();
        Alert::info('You have successfully created an article.');
        return redirect()->route('platform.article.list');
    }

    /**
     * @param Article $article
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Article $article){
        $article->delete();
        Alert::info('You have successfully deleted the article.');
        return redirect()->route('platform.article.list');
    }
}
