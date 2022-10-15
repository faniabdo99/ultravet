<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Crud\ResourceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Alert;
//Legend
use Orchid\Screen\Sight;
//Inputs
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
class ProductResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Product::class;

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
            Select::make('status')
                ->title('Status')
                ->options([
                    'available' => 'Available',
                    'sold' => 'Sold Out',
                    'hidden' => 'Hidden'
                ])
                ->required(),
            Cropper::make('image')
                ->title('Image')
                ->required(),
            Input::make('sku')
                ->title('Stock Keeping Unit (SKU)')
                ->required(),
            TextArea::make('description')
                ->title('Description')
                ->required(),
            Input::make('price')
                ->title('Price in USD')
                ->type('number')
                ->required(),
            Quill::make('content')
                ->title('Content')
                ->required(),
            Upload::make('attachments')
                ->title('Attachments')
                ->maxFiles(5)
                ->maxFileSize(2)
                ->acceptedFiles('image/*')
                ->media(),
            Input::make('qty')
                ->title('Quantity')
                ->type('number')
                ->required(),
            Relation::make('brand_id')
                ->fromModel(\App\Models\Brand::class, 'title')
                ->title('Brand')
                ->required(),
            Relation::make('category_id')
                ->fromModel(\App\Models\Category::class, 'title')
                ->title('Category')
                ->required(),
            Relation::make('pet_id')
                ->fromModel(\App\Models\Pet::class, 'title')
                ->title('Pet')
                ->required(),
            Relation::make('discount_id')
                ->fromModel(\App\Models\Discount::class, 'title')
                ->title('Discount'),
            CheckBox::make('is_featured')
                ->title('Make as Featured')
                ->placeholder('Mark as Featured')
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
            TD::make('sku'),
            TD::make('title'),
            TD::make('price'),
            TD::make('qty'),
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
            Sight::make('qty'),
            Sight::make('price'),
            Sight::make('description'),
            Sight::make('content')
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
    * Action to create and update the model
    *
    * @param ResourceRequest $request
    * @param Model           $model
    */
    public function onSave(ResourceRequest $request, Model $model)
    {
        $ProductData = $request->all();
        $ProductData['user_id'] = auth()->user()->id;
        $model->forceFill(array_filter($ProductData))->save();
    }
}
