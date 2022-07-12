<?php

it('will test for store sale currency field validation', function (){
    $response = $this->post(route('storeSale'),[
        'currency' => null,
        'description' => 'Rare R9 Shirt',
        'amount' => 150,
        'payment_link' => 'https://www.test.tst',
        'sale_number' => 250
    ]);

    $response->assertSessionHasErrors(['currency']);
});


it('will test for store sale description field validation', function (){
    $response = $this->post(route('storeSale'),[
        'currency' => 'ILS',
        'description' => null,
        'amount' => 150,
        'payment_link' => 'asdasdqwe',
        'sale_number' => 500
    ]);

    $response->assertSessionHasErrors(['description']);
});

it('will test for store sale amount field validation', function (){
    $response = $this->post(route('storeSale'),[
        'currency' => 'ILS',
        'description' => null,
        'amount' => -50,
        'payment_link' => 'asdasdqwe',
        'sale_number' => 500
    ]);

    $response->assertSessionHasErrors(['amount']);
});

it('will test for store sale payment_link field validation', function (){
    $response = $this->post(route('storeSale'),[
        'currency' => 'ILS',
        'description' => 'Inter Milan Shirt',
        'amount' => 150,
        'payment_link' => null,
        'sale_number' => 500
    ]);

    $response->assertSessionHasErrors(['payment_link']);
});

it('will test for store sale sale_number field validation', function (){
    $response = $this->post(route('storeSale'),[
        'currency' => 'ILS',
        'description' => 'Rare R9 Shirt',
        'amount' => 150,
        'payment_link' => 'https://www.test.tst',
        'sale_number' => 'Random text'
    ]);

    $response->assertSessionHasErrors(['sale_number']);
});
