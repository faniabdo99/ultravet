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
                ->title('Stock Keeping Unit (SKU)'),
            TextArea::make('description')
                ->title('Description')
                ->required(),
            Input::make('price')
                ->title('Price in USD')
                ->type('number')
                ->step('0.1')
                ->required(),
            Input::make('nutritional_facts')
                ->title('Nutritional Facts'),
            Input::make('quality')
                ->title('Quality'),
            Input::make('weight')
                ->title('Weight'),
            Quill::make('content')
                ->title('Content')
                ->required(),
            Upload::make('attachments')
                ->title('Attachments')
                ->groups('gallery')
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
                ->displayAppend('TitleWithPet')
                ->title('Category')
                ->required(),
            Relation::make('pet_id')
                ->fromModel(\App\Models\Pet::class, 'title')
                ->title('Pet')
                ->required(),
            Relation::make('discount_id')
                ->fromModel(\App\Models\Discount::class, 'title')
                ->title('Discount'),
            Input::make('badge')
                ->title('Badge')
                ->maxlength(255),
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
            TD::make('sku')->sort(),
            TD::make('title')->sort()->filter(Input::make()),
            TD::make('price')->sort(),
            TD::make('qty')->sort(),
            TD::make('brand_id' , 'Brand')->render(function($model){
                return $model->Brand->title;
            })->sort(),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
            TD::make('Variations')
                ->render(function ($model) {
                    return '
                        <a data-turbo="true" class="btn btn-link" href="/admin/crud/list/product-variation-resources?filter[product_id]='.$model->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="me-2" role="img" fill="currentColor" componentname="orchid-icon">
                                <path d="M16.108 10.044c-3.313 0-6 2.687-6 6s2.687 6 6 6 6-2.686 6-6-2.686-6-6-6zM16.108 20.044c-2.206 0-4.046-1.838-4.046-4.044s1.794-4 4-4c2.206 0 4 1.794 4 4s-1.748 4.044-3.954 4.044zM31.99 15.768c-0.012-0.050-0.006-0.104-0.021-0.153-0.006-0.021-0.020-0.033-0.027-0.051-0.011-0.028-0.008-0.062-0.023-0.089-2.909-6.66-9.177-10.492-15.857-10.492s-13.074 3.826-15.984 10.486c-0.012 0.028-0.010 0.057-0.021 0.089-0.007 0.020-0.021 0.030-0.028 0.049-0.015 0.050-0.009 0.103-0.019 0.154-0.018 0.090-0.035 0.178-0.035 0.269s0.017 0.177 0.035 0.268c0.010 0.050 0.003 0.105 0.019 0.152 0.006 0.023 0.021 0.032 0.028 0.052 0.010 0.027 0.008 0.061 0.021 0.089 2.91 6.658 9.242 10.428 15.922 10.428s13.011-3.762 15.92-10.422c0.015-0.029 0.012-0.058 0.023-0.090 0.007-0.017 0.020-0.030 0.026-0.050 0.015-0.049 0.011-0.102 0.021-0.154 0.018-0.090 0.034-0.177 0.034-0.27 0-0.088-0.017-0.175-0.035-0.266zM16 25.019c-5.665 0-11.242-2.986-13.982-8.99 2.714-5.983 8.365-9.047 14.044-9.047 5.678 0 11.203 3.067 13.918 9.053-2.713 5.982-8.301 8.984-13.981 8.984z"></path>
                            </svg>
                            Variations
                        </a>';
                })
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
        $ProductData = $request->except('attachments');
        $Attachments = $request->attachments;
        $ProductData['user_id'] = auth()->user()->id;
        $model->forceFill($ProductData)->save();
        $model->attachment()->syncWithoutDetaching($Attachments);
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
        return 'private-product-resource';
    }
}
