<?php

namespace App\Orchid\Screens\Pet;
//Models
use App\Models\Pet;
//Others
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
//Fields
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;

class PetEditScreen extends Screen {
    public $pet;
    public function query(Pet $pet): iterable {
        return [
            'pet' => $pet
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string {
        return $this->pet->exists ? 'Edit pet' : 'Create a new pet';
    }
    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string {
        return "Manage a Pet";
    }
    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create pet')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->pet->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->pet->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->pet->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('pet.title')
                    ->title('Title')
                    ->required()
                    ->placeholder('The Pet Title')
                    ->help('Specify a short descriptive title for this pet.'),

                Input::make('pet.slug')
                    ->title('Slug')
                    ->required()
                    ->placeholder('the-pet-title')
                    ->help('Slug must be same as the title but without any special charachters'),

                Picture::make('pet.image')
                        ->title("Image")
                        ->required()
                        ->acceptedFiles('.jpg,.png,.webp,.gif'),
              
            ])
        ];
    }
    //Screen Actions
    public function createOrUpdate(Pet $pet, Request $request){
        $PetData = $request->get('pet');
        $PetData['user_id'] = auth()->user()->id;
        $pet->fill($PetData)->save();
        Alert::info('You have successfully created a pet.');
        return redirect()->route('platform.pet.list');
    }

    public function remove(Pet $pet){
        $pet->delete();
        Alert::info('You have successfully deleted the pet.');
        return redirect()->route('platform.pet.list');
    }
}
