<?php


it('will test for generate sale link sale_price field validation', function (){
    $response = $this->post(route('generateSale'),[
        'sale_price' => -50,
        'currency' => 'required|string',
        'product_name' => 'required|string',
    ]);

    $response->assertSessionHasErrors(['sale_price']);
});

it('will test for generate sale link currency field validation', function (){
    $response = $this->post(route('generateSale'),[
        'sale_price' => 500,
        'currency' => null,
        'product_name' => 'required|string',
    ]);

    $response->assertSessionHasErrors(['currency']);
});

it('will test for generate sale link product_name  field validation', function (){
    $response = $this->post(route('generateSale'),[
        'sale_price' => 500,
        'currency' => 'required|string',
        'product_name' =>null,
    ]);

    $response->assertSessionHasErrors(['product_name']);
});
