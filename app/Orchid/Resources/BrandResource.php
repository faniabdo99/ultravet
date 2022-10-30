<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Crud\ResourceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
//Inputs
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Cropper;
//Legend
use Orchid\Screen\Sight;

class BrandResource extends Resource {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Brand::class;

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
            Cropper::make('image')
                    ->title('Brand Logo')
                    ->required()
                    ->width(500)
                    ->height(500),
            CheckBox::make('is_featured')
                ->title('Make as Featured')
                ->placeholder('Mark as Featured')
                ->sendTrueOrFalse()
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
            TD::make('title'),
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
            Sight::make('image')->render(function($model){
                return '<img src="'.$model->imagePath.'" />';
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
            'title' => ['required','min:3','max:255'],
            'slug' => [
                'required',
                Rule::unique(self::$model, 'slug')->ignore($model),
            ],
            'image' => ['required']
        ];
    }
    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    public function onDelete(Model $model){
        $model->update([
            'slug' => $model->slug.'_deleted'
        ]);
        $model->delete();
    }
}
