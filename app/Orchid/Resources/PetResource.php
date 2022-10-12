<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Crud\ResourceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Models\Pet;
//Inputs
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Cropper;
//Legend
use Orchid\Screen\Sight;

class PetResource extends Resource {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Pet::class;

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
                 ->required()
                 ->placeholder('Enter the pet title'),
            Input::make('slug')
                 ->title('Slug')
                 ->required()
                 ->placeholder('Enter the pet slug'),
            Cropper::make('image')
                   ->required()
                   ->width(500)
                   ->height(500)
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
            TD::make('title', 'Title'),
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
            Sight::make('image')->render(function($model){
                return '<img src="'.$model->imagePath.'" />';
            }),
            Sight::make('user_id')->render(function($model){
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
            'title' => ['required' , 'min:5', 'max:255'],
            'slug' => [
                'required',
                Rule::unique(self::$model, 'slug')->ignore($model),
            ],
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
    /**
     * Get the number of models to return per page
     *
     * @return int
     */
    public static function perPage(): int
    {
        return 30;
    }
    /**
     * Action to create and update the model
     *
     * @param ResourceRequest $request
     * @param Model           $model
     */
    public function onSave(ResourceRequest $request, Pet $model)
    {
        $PetData = $request->all();
        $PetData['user_id'] = auth()->user()->id;
        $model->forceFill($PetData)->save();
    }

    /**
     * Action to delete a model
     *
     * @param Pet $model
     *
     * @throws Exception
     */
    public function onDelete(Pet $model)
    {
        $model->delete();
    }

}
