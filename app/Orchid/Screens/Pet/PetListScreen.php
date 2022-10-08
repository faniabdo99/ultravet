<?php
namespace App\Orchid\Screens\Pet;
//Models
use App\Models\Pet;
//Layouts
use App\Orchid\Layouts\Pet\PetListLayout;
//Others
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PetListScreen extends Screen {
    /**
     * Query data.
     *
     * @return array
     */
    public $pet;
    public function query(): iterable {
        return [
            'pets' => Pet::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string {
        return 'All Pets';
    }
    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string {
        return 'Manage pet types in the system';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.pet.edit')
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
            PetListLayout::class
        ];
    }
}
