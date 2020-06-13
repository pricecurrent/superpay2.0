# SuperPay

A simple, fake, devs-oriented project that handles charges processing through Stripe and distributes payouts, taking a fee for each transactions.

I'm making it to teach Laravel, PHPUnit, Livewire, maybe Vue and maybe something else.

## Installation

1. Clone this repo
2. Adjust your `.env` file, by putting your prod DB and testing DB names into the respective keys
3. run `composer install`
4. run `php artisan migrate`
5. run `php artisan migrate --database=testing`
6. run `npm install`
7. run `npm run dev`
8. view it in the browser or run the tests `vendor/bin/phpunit tests`

Refer to my [Youtube channel](https://www.youtube.com/channel/UC3n8EP0_kK3ufmXjbpGdmIA) where I talk about this stuff.
