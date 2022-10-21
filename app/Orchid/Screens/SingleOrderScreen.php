<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use App\Models\Order;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Alert;

class SingleOrderScreen extends Screen
{
    public $order;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Order $order): iterable
    {
        return [
            'order' => $order
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Order #'.$this->order->id;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Manage')
                ->icon('note')
                ->href(route('platform.order.edit', $this->order->id))
                ->canSee($this->order->exists),
            Button::make('Delete')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->order->exists),
            Button::make('Completed')
                ->icon('check')
                ->method('complete')
                ->canSee($this->order->exists),

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
            Layout::legend('order', [
                Sight::make('id', '#'),
                Sight::make('tracking_number', 'Tracking Number'),
                Sight::make('total_shipping', 'Shipping Cost')->render(function($model){
                    return $model->total_shipping.'$';
                }),
                Sight::make('total', 'Total')->render(function($model){
                    return $model->total.'$';
                }),
                Sight::make('total', 'Total in LBB')->render(function($model){
                    return number_format($model->total * $model->exchange_rate).' LBP';
                }),
                Sight::make('exchange_rate', 'Exchange Rate')->render(function($model){
                    return $model->exchange_rate.' LBP';
                }),
                Sight::make('name'),
                Sight::make('email'),
                Sight::make('address'),
                Sight::make('status'),
                Sight::make('order_notes', 'Order Notes (If Any)'),
                Sight::make('created_at', 'Date')->render(function($model){
                    return $model->created_at->format('Y-m-d');
                }),
                Sight::make('products', 'Order Items')->render(function($model){
                    $ToReturn = '<ul>';
                    foreach($model->Products as $Item){
                        $ToReturn .= '<li><a target="_blank" href="'.route('product.single' , [$Item->Product->slug,$Item->Product->id]).'">'.$Item->Product->title.' <b>X'.$Item->Cart->qty.'</b></a></li>';
                    }
                    $ToReturn .= '</ul>';
                    return $ToReturn;
                })
            ]),
        ];
    }
    /**
     * @param Order $order
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Order $order){
        $order->delete();
        Alert::info('You have successfully deleted the order.');
        return redirect()->route('platform.orders');
    }
    /**
     * @param Order $order
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function complete(Order $order){
        $order->update(['status' => 'complete']);
        // TODO: Send email to the user
        Alert::info('The order is marked complete, an email is sent to the user');
        return redirect()->route('platform.orders');
    }
}
