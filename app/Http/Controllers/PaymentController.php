<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Payment;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdqfQ_xn0HyksbTB2lY_BZSTfgIxnsVZ2O6ZhItIt_S3el1B23iWyOagUFS4Ikrd4Maj-GYDGJvKYRju',     // ClientID
                'EOCGee6_vyg1J6n1S-fKPykBnfEL_IHP_yDa2DMyfCwpmSmoqUOgqSwl2tiT6YRyy-CvLENIVS0N4nB-'      // ClientSecret
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);
        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));
        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        // $baseUrl = getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://chemist.dev/execute-payment")
            ->setCancelUrl("http://chemist.dev/cancel");
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        // $request = clone $payment;

        // try {
        $payment->create($apiContext);
        // } catch (Exception $ex) {
        //     ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
        //     exit(1);
        // }
        return redirect($payment->getApprovalLink());
        // ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

        // return $payment;
    }

    public function execute(Request $request)
    {
        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdqfQ_xn0HyksbTB2lY_BZSTfgIxnsVZ2O6ZhItIt_S3el1B23iWyOagUFS4Ikrd4Maj-GYDGJvKYRju',     // ClientID
                'EOCGee6_vyg1J6n1S-fKPykBnfEL_IHP_yDa2DMyfCwpmSmoqUOgqSwl2tiT6YRyy-CvLENIVS0N4nB-'      // ClientSecret
            )
        );
        $paymentId = $request->paymentId;
        // dd($paymentId);
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

        $amount->setCurrency('USD');
        $amount->setTotal(20);
        $amount->setDetails($details);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);
        return $payment;  
        // return $request('paymentId');
    }

    public function items()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        // return $cart->getCart();
        foreach ($cart as $cartItem) {
            $item1 = new Item();
            $item1->setName($cart->item['name'])
                ->setCurrency('USD')
                ->setQuantity($cart->qty)
                ->setSku("123123") // Similar to `item_number` in Classic API
                ->setPrice($cart->price);
        }
    }
}
