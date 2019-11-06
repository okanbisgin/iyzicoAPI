<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPrice("28.0");
$request->setPaidPrice("28.2");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId("B67832");
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setCallbackUrl("https://www.merchant.com/callback");
$request->setEnabledInstallments(array(2, 3, 6, 9));

$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId("BY789");
$buyer->setName($_POST['cardname']);
$buyer->setSurname($_POST['cardsurname']);
$buyer->setGsmNumber("+905350000000");
$buyer->setEmail($_POST['email']);
$buyer->setIdentityNumber("74300864791");
$buyer->setLastLoginDate("2019-11-06 12:43:35");
$buyer->setRegistrationDate("2013-04-21 15:12:09");
$buyer->setRegistrationAddress($_POST['address']);
$buyer->setIp("85.34.78.112");
$buyer->setCity($_POST['city']);
$buyer->setCountry($_POST['state']);
$buyer->setZipCode($_POST['zip']);
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("Okan Bey");
$shippingAddress->setCity("Istanbul");
$shippingAddress->setCountry($_POST['state']);
$shippingAddress->setAddress($_POST['address']);
$shippingAddress->setZipCode($_POST['zip']);
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("Okan Bey");
$billingAddress->setCity($_POST['city']);
$billingAddress->setCountry($_POST['state']);
$billingAddress->setAddress($_POST['address']);
$billingAddress->setZipCode($_POST['zip']);
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId("BI101");
$firstBasketItem->setName("Binocular");
$firstBasketItem->setCategory1("Collectibles");
$firstBasketItem->setCategory2("Accessories");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice("8");
$basketItems[0] = $firstBasketItem;

$secondBasketItem = new \Iyzipay\Model\BasketItem();
$secondBasketItem->setId("BI102");
$secondBasketItem->setName("Game code");
$secondBasketItem->setCategory1("Game");
$secondBasketItem->setCategory2("Online Game Items");
$secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
$secondBasketItem->setPrice("5");
$basketItems[1] = $secondBasketItem;

$thirdBasketItem = new \Iyzipay\Model\BasketItem();
$thirdBasketItem->setId("BI103");
$thirdBasketItem->setName("Usb");
$thirdBasketItem->setCategory1("Electronics");
$thirdBasketItem->setCategory2("Usb / Cable");
$thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$thirdBasketItem->setPrice("15");
$basketItems[2] = $thirdBasketItem;
$request->setBasketItems($basketItems);

# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result
print_r($checkoutFormInitialize->getStatus());
print_r($checkoutFormInitialize->getErrorMessage());
print_r($checkoutFormInitialize->getCheckoutFormContent());



?>
