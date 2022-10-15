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
use Orchid\Screen\Fields\Select;
class DiscountResource extends Resource {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Discount::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array{
        return [
            Input::make('title')
                ->title('Title')
                ->help('The discount title for your reference')
                ->required(),
            Input::make('value')
                ->title('Value')
                ->type('number')
                ->required(),
            Select::make('type')
            ->options([
                'percent'   => 'Percentage',
                'fixed' => 'Fixed Number',
            ])
            ->title('Discount Type')
            ->required(),
            Input::make('expire')
                ->title('Expiry Date')
                ->type('date'),
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
            TD::make('type'),
            TD::make('value'),
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
            Sight::make('title'),
            Sight::make('value'),
            Sight::make('type')
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
            'value' => ['required' , 'numeric'],
            'type' => ['required' , 'in:percent,fixed'],
            
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
        $DiscountData = $request->all();
        if($DiscountData['type'] == 'percent' && $DiscountData['value'] > 100){
            Alert::error('The discount is more than 100%!');
            return;
        }else{
            $model->forceFill($DiscountData)->save();
        }
    }
}
