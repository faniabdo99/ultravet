<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\CheckBox;
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

class CouponResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Coupon::class;

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
                ->help('The coupon code users will use')
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
            Input::make('amount')
                ->title('Amount')
                ->type('number')
                ->required(),
            CheckBox::make('active')
                    ->title('Active')
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
            TD::make('value'),
            TD::make('amount'),
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
            Sight::make('amount')
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
            'amount' => ['required' , 'numeric'],
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
        $CouponData = $request->all();
        if($CouponData['type'] == 'percent' && $CouponData['value'] > 100){
            Alert::error('The coupon discount is more than 100%!');
            return;
        }else{
            $model->forceFill($CouponData)->save();
        }
    }
    public function onDelete(Model $model){
        $model->update([
            'slug' => $model->slug.'_deleted'
        ]);
        $model->delete();
    }
}
