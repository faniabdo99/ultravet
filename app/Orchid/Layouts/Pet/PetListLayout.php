<?php
namespace App\Orchid\Layouts\Pet;

use App\Models\Pet;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class PetListLayout extends Table{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'pets';

    /**
     * @return TD[]
     */
    public function columns(): array {
        return [
            TD::make('image' , 'Image')
                ->render(function (Pet $pet){
                    return '<img style="width:100px;height:auto;" src="'.$pet->ImagePath.'" />';
                }),
            TD::make('title', 'Title')
                ->render(function (Pet $pet) {
                    return Link::make($pet->title)
                        ->route('platform.pet.edit', $pet);
                }),
            TD::make('created_at', 'Created')
                ->render(function(Pet $pet){
                    return $pet->created_at->format('Y-m-d');
                }),
            TD::make('updated_at', 'Last edit')
                ->render(function(Pet $pet){
                    return $pet->updated_at->format('Y-m-d');
                }),
        ];
    }
}