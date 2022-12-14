<?php

namespace App\Orchid\Resources;

use App\Models\Pet;
use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Crud\ResourceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
//Inputs
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Relation;
//Legend
use Orchid\Screen\Sight;
class CategoryResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Category::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Title')
                ->required(),
            Input::make('slug')
                ->title('Slug')
                ->required(),
            Input::make('order_num')
                ->title('Order Number')
                ->type('number'),
            Relation::make('parent_id')
                    ->allowEmpty()
                    ->fromModel(\App\Models\Category::class, 'title')
                    ->title('Parent Category')
                    ->applyScope('parent'),
            Relation::make('pet_id')
                    ->title('Pet')
                    ->fromModel(Pet::class, 'title')
                    ->required(),
            CheckBox::make('is_featured')
                ->title('Featured?')
                ->placeholder('Mark as Featured')
                ->sendTrueOrFalse(),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('order_num'),
            TD::make('title'),
            TD::make('is_featured','Featured')->render(function($model){
                return ($model->is_featured) ? "Yes" : "No";
            }),
            TD::make('pet_id', 'Pet')->render(function ($model){
               return '<a href="/admin/crud/view/pet-resources/'.$model->Pet->id.'">'.$model->Pet->title.'</a>';
            }),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('title'),
            Sight::make('slug'),
            Sight::make('parent_id'),
            Sight::make('order_num'),
            Sight::make('is_featured', 'Featured?')->render(function($model){
                return ($model->is_featured) ? "Yes" : "No";
            }),
            Sight::make('user_id', 'Created By')->render(function($model){
                return $model->User->name;
            }),
        ];
    }
    /**
     * Get the validation rules that apply to save/update.
     *
     * @return array
     */
    public function rules(Model $model): array
    {
        return [
            'title' => ['required' , 'min:3', 'max:255'],
            'slug' => [
                'required',
                Rule::unique(self::$model, 'slug')->ignore($model),
            ],
        ];
    }
    /**
     * Action to create and update the model
     *
     * @param ResourceRequest $request
     * @param Model           $model
     */
    public function onSave(ResourceRequest $request, Model $model)
    {
        $CategoryData = $request->all();
        $CategoryData['is_parent'] = ($request->parent_id == null) ? 0 : 1;
        $CategoryData['user_id'] = auth()->user()->id;
        $model->forceFill($CategoryData)->save();
    }
    public function onDelete(Model $model){
        $model->update([
            'slug' => $model->slug.'_deleted'
        ]);
        $model->delete();
    }
    /**
     * @return string|null
     * This function adds an option to the roles actions list in the admin panel
     */
    public static function permission(): ?string {
        return 'private-category-resource';
    }
}
