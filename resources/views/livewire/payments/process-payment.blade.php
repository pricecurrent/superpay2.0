<div class="bg-gradient-to-b from-gray-200 to-gray-300 min-h-screen">
    <div class="max-w-xl mx-auto px-16 py-10 rounded-bl-3xl rounded-br-3xl shadow-2xl bg-white ">
        <div>
            <h1 class="text-center text-xl font-medium">Please Pay</h1>
            <p class="text-center text-gray-400 text-sm">Bob sent you a payment</p>
        </div>

        <div class="px-8 py-5 mt-10 rounded-3xl bg-gradient-to-r from-blue-700 to-blue-400">
            <div class="flex items-center space-x-4">
                <div>
                    <img class="w-16 h-16 rounded-2xl border-4 border-blue-300" src="https://cdn.dribbble.com/users/821812/avatars/normal/14eea0b9af2401b8e120618f692b71b2.jpg?1587300850">
                </div>
                <div>
                    <div class="text-blue-100 text-xs tracking-wide font-medium">Amount to pay</div>
                    <div class="mt-1 flex space-x-1">
                        <span class="text-xs text-blue-200 -mb-3">$</span>
                        <span class="text-white font-medium text-lg tracking-wider lining-nums slashed-zero proportional-nums">{{ $payment->amount }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <span class="font-medium">Payment details</span>
        </div>

        <form
            x-data="{stripe: null, elements: null, card: null}"
            x-init="
                stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
                elements = stripe.elements();
                card = elements.create('card');
                card.mount($refs.cardElement);
            "
            class="mt-6"
        >
            <div>
                <label class="font-medium text-sm">Card Details</label>
                <div class="mt-2 border py-2 px-4 border-gray-300 rounded-xl">
                    <div wire:ignore x-ref="cardElement"></div>
                </div>
            </div>

            <div class="mt-6 flex space-x-6">
                <div>
                    <label class="text-sm font-medium">Full Name</label>
                    <input placeholder="John Doe" type="text" class="w-full py-2 px-4 border border-gray-300 rounded-xl focus:outline-none focus:shadow-outline text-sm text-gray-600">
                </div>
                <div>
                    <label class="text-sm font-medium">Email</label>
                    <input placeholder="john@example.com" type="text" class="w-full py-2 px-4 border border-gray-300 rounded-xl focus:outline-none focus:shadow-outline text-sm text-gray-600">
                </div>
            </div>

            <div class="mt-8 text-right">
                <button x-on:click.prevent="
                        stripe.createToken(card).then(response => {
                            @this.set('billingToken', response.token.id);
                            @this.call('process');
                        })
                    "
                    class="px-10 py-2 rounded-lg bg-gradient-to-r from-blue-700 to-blue-400">
                    <span class="text-white text-sm tracking-wide font-medium">Pay ${{ $payment->amount }}</span>
                </button>
            </div>
        </form>
    </div>
</div>
