<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\OrderListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Models\Order;
class OrderScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders' => Order::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Orders';
    }
    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Orders list";
    }
    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Admin Homepage')
                ->href(url('/admin'))
                ->icon('globe-alt'),
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
            OrderListLayout::class
        ];
    }
}
