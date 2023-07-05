<x-app-guest>
    <div class="flex items-center justify-center p-10 mx-auto my-10">
        <form method="POST" action="{{ route('payment.make') }}">
            @csrf
            <input type="text" name="card_number" placeholder="Card Number">
            <input type="text" name="expiry_date" placeholder="Expiry Date">
            <input type="text" name="cvv" placeholder="CVV">
            <button type="submit">Pay</button>
        </form>
        
    </div>

</x-app-guest>