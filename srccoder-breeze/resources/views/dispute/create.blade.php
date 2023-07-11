<x-app-guest>
    <div class="flex items-center justify-center shadow-2xl dark:bg-gray-800 dark:text-white">
        
        <form class="m-auto p-auto" method="POST" action="{{ route('dispute.store') }}">
            <h1 class="my-10 font-serif font-extrabold text-center border-b-2 border-red-700 ">Dispute an IP flag</h1>

            @csrf

            <div class="items-center justify-center my-10 form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value={{ "old('email')" }} class="form-control">
            </div>
            
            <div class="my-10 form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" value={{ "old('message')"  }} class="form-control"></textarea>
            </div>
            
            
            <button type="submit" class="p-5 mx-auto my-10 font-serif font-extrabold text-center text-white bg-red-700 border border-b-2 rounded shadow border-white-700">Submit dispute</button>
        </form>
    </div>
</x-app-guest>