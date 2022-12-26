<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $stripe = \Stripe\PaymentIntent::create([
                'description'          => $request->description,
                "amount"               => $request->amount * 100,
                "currency"             => "usd",
                'payment_method_types' => ['card'],
            ]);
            
            $data = $stripe->getLastResponse()->json;
            Payment::create(['name' => $request->user, 'meta' => json_encode($data)]);
            Session::flash('success', 'Payment successful!');
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function paymentDetail()
    {
        $payments = Payment::all();

        return view('payment_detail', compact('payments'));
    }
}
