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

        <form class="mt-6">
            <div>
                <label class="font-medium text-sm">Card Details</label>
                <div class="mt-2 py-2 px-4 flex border border-gray-300 rounded-xl">
                    <div class="relative w-7/12 border-r-2 border-gray-300">
                        <div class="absolute bottom-0 inline-flex items-center top-0">
                            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <input class="pl-6 w-full text-sm text-gray-500 tracking-wide focus:outline-none" placeholder="4242424242424242">
                    </div>
                    <div class="px-6 w-3/12 border-r-2 border-gray-300">
                        <input class="w-full text-sm text-gray-500 tracking-wide focus:outline-none" placeholder="11/22">
                    </div>
                    <div class="pl-6 w-2/12">
                        <input class="w-full text-sm text-gray-500 tracking-wide focus:outline-none" placeholder="012">
                    </div>
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
                <button class="px-10 py-2 rounded-lg bg-gradient-to-r from-blue-700 to-blue-400">
                    <span class="text-white text-sm tracking-wide font-medium">Pay ${{ $payment->amount }}</span>
                </button>
            </div>
        </form>
    </div>
</div>
