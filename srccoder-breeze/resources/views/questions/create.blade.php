{{--  
<x-app-guest>
    <div class="flex items-stretch justify-center w-auto h-auto my-10">
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="border border-separate border-spacing-1 ring-2">
            <label for="title">Question Title:</label>
            <br />
            <input type="text" id="title" name="title" required>
            </div>
            <br />
            <div>
            <label for="body">Question Body:</label>
            <br />
            <textarea id="body" name="body" required></textarea>
            </div>
            <br />
            <div>
            <label for="bounty">Bounty:</label>
            <br />
            <input type="number" id="bounty" name="bounty" min="0" required>
            </div>
            <br />
            <input type="submit" value="Ask Question" class="btn-dark">
        </form>
    </div>
</x-app-guest>
  --}}
  <x-app-guest>
    <div class="container px-4 mx-auto mt-5">
        <div class="flex flex-col gap-4 md:grid md:grid-cols-3">
            <div class="hidden mt-10 md:block md:col-span-1">
                <!-- SVG Image -->
                <img src="/images/hammer_keyboard_laurel_wreath.svg" alt="Image Description">
            </div>

            <div class="md:col-span-1">
                <form action="{{ route('questions.store') }}" method="POST" class="mt-6 md:mt-0">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Question Title:</label>
                        <input type="text" id="title" name="title" required class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="body" class="block mb-2 text-sm font-bold text-gray-700">Question Body:</label>
                        <textarea id="body" name="body" required class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="bounty" class="block mb-2 text-sm font-bold text-gray-700">Bounty:</label>
                        <input type="number" id="bounty" name="bounty" min="0" required class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex items-center justify-between">
                        <input type="submit" value="Ask Question" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    </div>
                </form>
            </div>

            <div class="hidden mt-10 md:block md:col-span-1">
                <!-- SVG Image -->
                <img src="/images/hammer_keyboard_laurel_wreath.svg" alt="Image Description">
            </div>
        </div>
    </div>
</x-app-guest>
