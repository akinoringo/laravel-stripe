<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>サブスクリプション</h2>
                    <form id="setup-form">
                        @csrf
                        <input id="card-holder-name" type="text" placeholder="カード名義人">
                        <div id="card-element"></div>
                        <button id="card-button">
                            サブスクリプション
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
      <script src="https://js.stripe.com/v3/"></script>
      <script>
        const stripe = Stripe('pk_test_51LbZ5uEzzxhPl2CMKmIWuEW298X0srQbQgi4rPKk4ySCBdnKccP3iZ7Bk0VACLxihyqdxtFGwyysjJ01FmIFS9vf00WwQhXOWv');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            console.log(cardHolderName.value)
        });
      </script>
    @endpush
</x-app-layout>
