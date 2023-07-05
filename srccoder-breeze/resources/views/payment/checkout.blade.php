<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Accept a payment</title>
    <meta name="description" content="A demo of a payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}" />
  </head>
  <body>
    <input id="card-holder-name" type="text">
    <div id="card-element"></div>
    <form id="payment-form">
      <div id="link-authentication-element"></div>
      <div id="payment-element"></div>
      <button id="submit">
        <div class="hidden spinner" id="spinner"></div>
        <span id="button-text">Pay now</span>
      </button>
      <div id="payment-message" class="hidden"></div>
    </form>
    <button id="card-button">Process Payment</button>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/checkout.js') }}" defer></script>
  </body>
</html>