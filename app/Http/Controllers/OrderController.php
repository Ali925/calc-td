<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\OrderCreate;
use App\Mail\ManagerMailSend;
use App\Order;
use App\ReadyProduct;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event as Event;

class OrderController extends Controller
{
    public function setOrder(Request $request)
    {
        $query = new Order();
        $query->order_num = '';
        $query->save();

        $query = Order::find($query->id);
        $query->order_num = '000-'.$query->id;
        $query->save();

        return response()->json(['id' => $query->id,'order_num' => $query->order_num]);
    }

    public function setCustomer(Request $request)
    {
        $query = new Customer();
        $query->first_name = $request->FirstName;
        $query->middle_name = $request->MiddleName;
        $query->last_name = $request->LastName;
        $query->email = $request->Email;
        $query->address = (!empty($request->address))?$request->address:'empty';
        $query->city = (!empty($request->city))?$request->city:'empty';
        $query->phone = $request->MobilePhone;
        $query->save();

        $order = Order::find($request->order_id);
        $order->customer_id = $query->id;
        $order->save();

        $detail = $order->readyProducts;

        Event::fire(new OrderCreate($order,$query,$detail));

        return response()->json(['status' => true, 'order' => [
            'order_number'=>$order->order_num,
            'order_amount' => $order->order_amount]]);
    }

    public function setReadyProduct(Request $request)
    {

        $post = print_r($_POST, TRUE);
        file_put_contents(public_path('/').'post_content.txt', $post, FILE_APPEND);
        $prs = print_r($request->ready_product, TRUE);
        file_put_contents(public_path('/').'post_content.txt', $prs, FILE_APPEND);
        die();

        $coast = [];
        $order = Order::find($request->order_id);

        if (!empty($request->ready_product)){

            foreach ($request->ready_product as $product){

                $readyProduct = new ReadyProduct();
                $readyProduct->blank_type_id = $product['blank_type_id'];
                $readyProduct->thickness_id = $product['thickness_id'];
                $readyProduct->form_id = $product['form_id'];
                $readyProduct->decor_category_id = $product['decor_category_id'];
                $readyProduct->decor_id = $product['decor_id'];
                $readyProduct->wrapper_id = $product['wrapper_id'];
                $readyProduct->pattern_accordance_id = $product['pattern_accordance_id'];

                $readyProduct->part_side_one = $product['part_side_one'];
                $readyProduct->part_side_two = $product['part_side_two'];
                $readyProduct->part_side_three = $product['part_side_three'];
                $readyProduct->part_side_four = $product['part_side_four'];
                $readyProduct->part_edge_one = $product['part_edge_one'];
                $readyProduct->part_edge_two = $product['part_edge_two'];
                $readyProduct->part_edge_three = $product['part_edge_three'];
                $readyProduct->part_edge_four = $product['part_edge_four'];

                $readyProduct->edge_one = $product['edge_one'];
                $readyProduct->edge_two = $product['edge_two'];
                $readyProduct->edge_three = $product['edge_three'];
                $readyProduct->edge_four = $product['edge_four'];

                $readyProduct->nip_id = $product['nip_id'];
                $readyProduct->width = $product['width'];
                $readyProduct->length = $product['length'];
                $readyProduct->coast = $product['coast'];
                $readyProduct->save();

                $coast[] = (int)$product['coast'];

                DB::table('order_ready_product')->insert([
                    'order_id' => $order->id,
                    'ready_product_id' => $readyProduct->id
                ]);
            }

            $order->blank = $request->blank_sum;
            $order->order_amount = array_sum($coast)+$request->blank_sum;
            $order->save();

            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }
}
