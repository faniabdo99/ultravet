<?php

namespace App\Orchid\Screens;
use Illuminate\Http\Request;
use App\Models\Setting;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class SystemVariablesScreen extends Screen {
    public $setting;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Setting $setting): iterable
    {
        return [
            'setting' => $setting->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'System Variables';
    }
    /**
     * Display the screen description
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'General variables in the system';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Changes')
                ->icon('save-alt')
                ->method('save')
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
                // System Variables
                Input::make('lb_usd_exchange_rate')
                    ->title('Exchange Rate')
                    ->value($this->setting->lb_usd_exchange_rate)
                    ->required(),
                Input::make('email')
                    ->title('Email')
                    ->value($this->setting->email)
                    ->required(),
                Input::make('phone_number')
                    ->title('Phone Number')
                    ->value($this->setting->phone_number)
                    ->required(),
                Input::make('address')
                    ->title('Address')
                    ->value($this->setting->address)
                    ->required(),
                Input::make('working_hours_label_1')
                    ->title('Working Hours Label #1')
                    ->value($this->setting->working_hours_label_1)
                    ->required(),
                Input::make('working_hours_value_1')
                    ->title('Working Hours Value #1')
                    ->value($this->setting->working_hours_value_1)
                    ->required(),
                Input::make('working_hours_label_2')
                    ->title('Working Hours Label #2')
                    ->value($this->setting->working_hours_label_2)
                    ->required(),
                Input::make('working_hours_value_2')
                    ->title('Working Hours Value #2')
                    ->value($this->setting->working_hours_value_2)
                    ->required(),
                Input::make('working_hours_label_3')
                    ->title('Working Hours Label #3')
                    ->value($this->setting->working_hours_label_3),
                Input::make('working_hours_value_3')
                    ->title('Working Hours Value #3')
                    ->value($this->setting->working_hours_value_3),
                Input::make('happy_clients')
                    ->title('Happy Clients')
                    ->type('number')
                    ->value($this->setting->happy_clients)
                    ->required(),
                Input::make('years')
                    ->title('Years of Experience')
                    ->type('number')
                    ->value($this->setting->years)
                    ->required(),
                Input::make('brands')
                    ->title('Brands Count')
                    ->type('number')
                    ->value($this->setting->brands)
                    ->required(),
                Input::make('products')
                    ->title('Products Count')
                    ->type('number')
                    ->value($this->setting->products)
                    ->required(),
                Input::make('description')
                    ->title('Ultravet Description')
                    ->max(255)
                    ->value($this->setting->description)
                    ->required(),
                Quill::make('toc')
                    ->title('Terms & Conditions page')
                    ->value($this->setting->toc),
                Input::make('homepage_slogan')
                    ->title('Homepage Slogan')
                    ->value($this->setting->homepage_slogan),
                Input::make('homepage_header')
                        ->title('Homepage Header')
                    ->value($this->setting->homepage_header),
                Input::make('homepage_description')
                    ->title('Homepage Description')
                    ->value($this->setting->homepage_description),
                Input::make('card_one_icon')
                    ->title('Card #1 Icon')
                    ->value($this->setting->card_one_icon),
                Input::make('card_one_title')
                    ->title('Card #1 Title')
                    ->value($this->setting->card_one_title),
                Input::make('card_one_description')
                    ->title('Card #1 Description')
                    ->value($this->setting->card_one_description),
                Input::make('card_two_icon')
                    ->title('Card #2 Icon')
                    ->value($this->setting->card_two_icon),
                Input::make('card_two_title')
                    ->title('Card #2 Title')
                    ->value($this->setting->card_two_title),
                Input::make('card_two_description')
                    ->title('Card #2 Description')
                    ->value($this->setting->card_two_description),
                Input::make('card_three_icon')
                    ->title('Card #3 Icon')
                    ->value($this->setting->card_three_icon),
                Input::make('card_three_title')
                    ->title('Card #3 Title')
                    ->value($this->setting->card_three_title),
                Input::make('card_three_description')
                    ->title('Card #3 Description')
                    ->value($this->setting->card_three_description),
                Input::make('card_four_icon')
                    ->title('Card #4 Icon')
                        ->value($this->setting->card_four_icon),
                Input::make('card_four_title')
                    ->title('Card #4 Title')
                    ->value($this->setting->card_four_title),
                Input::make('card_four_description')
                    ->title('Card #4 Description')
                    ->value($this->setting->card_four_description),
            ])
        ];
    }

    /**
     * Save the updates
     *
     * @return Redirect
     */
    public function save(Request $r){
        $r->validate([
            'lb_usd_exchange_rate' => 'required|numeric',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'happy_clients' => 'required|numeric',
            'years' => 'required|numeric',
            'brands' => 'required|numeric',
            'products' => 'required|numeric',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'working_hours_label_1' => 'required|max:255',
            'working_hours_value_1' => 'required|max:255',
            'working_hours_label_2' => 'required|max:255',
            'working_hours_value_2' => 'required|max:255'
        ]);
        Setting::first()->update($r->all());
        Alert::success('System settings has been updated successfully!');
    }
    /**
     * Permission
     *
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'settings'
        ];
    }
}
