<?php

it('will work for the sake of testing', function (){
    expect(true)->toBeTrue();
});


it('will test for get all sales', function () {

    $this->get(route('getAllSales'))->assertStatus(200);

});


it('will test for creating new sale' , function () {

    $response = $this->post(route('storeSale'),[
        'currency' => 'ILS',
        'description' => 'Hat',
        'amount' => 150,
        'payment_link' => 'asdasdqwe',
        'sale_number' => 500
    ]);

    $response->assertSessionHasNoErrors();

});

it('will test for generating sale link', function () {

    $response = $this->post(route('generateSale'), [
            'sale_price' => 600,
            'currency' => 'ILS',
            'product_name' => 'T-Shirt',
            'seller_payme_id' => env('SELLER_PAYME_ID'),
            'installments' => 1,
            'language' => 'en'
    ]);

    $response->assertSessionHasNoErrors();

});

