<?php
require '../TaxSum.php';

// example collection of products with prices where
$productsWithoutTax = [
    1 => (object) [
        'name' => 'Red T-shirt',
        'price' => 24.00,
    ],
    2 => (object) [
        'name' => 'Blue T-shirt',
        'price' => 24.00,
    ],
    3 => (object) [
        'name' => 'Yellow T-shirt',
        'price' => 24.00,
    ]
];

// Same products with taxes added, but as we want to calculate back to the price without tax
$productsWithTax = [
    1 => (object) [
        'name' => 'Red T-shirt',
        'price' => 30.00,
    ],
    2 => (object) [
        'name' => 'Blue T-shirt',
        'price' => 30.00,
    ],
    3 => (object) [
        'name' => 'Yellow T-shirt',
        'price' => 30.00,
    ]
];

try {
    $TaxSum = new TaxSum(25); // initialize TaxSum with a tax percentage of 25% (The tax percent in Denmark)

    echo "<pre>";

    /**
     * In this section we adds taxes to each product in the collection $productsWithoutTax
     */
    echo "<h3>Product prices - Adds Taxes</h3>";
    foreach ($productsWithoutTax as $product) {

        $priceBeforeTax = $product->price;
        $priceAfterTax  = $TaxSum->vatOfAmount($product->price) + $product->price;

        echo sprintf("Product Name: %s \nPrice BEFORE tax added: %0.2f \nPrice AFTER tax added: %0.2f", $product->name, $priceBeforeTax, $priceAfterTax);
        echo "\n----------------------\n\n";
    }

    /**
     * In this we take the products with prices with tax, and calculate back to the original price without tax.
     */
    echo "<hr><h3>Product prices - Calculates what the prices was before the taxes was added</h3>";
    foreach ($productsWithTax as $product) {

        $priceWithTax    = $product->price;
        $priceWithoutTax = $product->price - $TaxSum->vatOfIncluded($product->price);

        echo sprintf("Product Name: %s \nPrice with tax: %0.2f \nPrice without tax: %0.2f", $product->name, $priceWithTax, $priceWithoutTax);
        echo "\n----------------------\n\n";
    }

    echo "</pre>";

} catch (\Exception $e) {
    echo sprintf('Error: %s', $e->getMessage());
}