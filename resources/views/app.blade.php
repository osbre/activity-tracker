<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ActivityTracker</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js"></script>
    <script>
        window.app = () => ({
            activities: [],
            statistics: {},
            async fetchData() {
                this.activities = await fetch('/api/activities').then(r => r.json())
                this.statistics = await fetch('/api/statistics').then(r => r.json())
            },
        });
    </script>
</head>
<body x-data="app()" x-init="fetchData()">
    <div class="py-3 px-4 md:px-0 md:max-w-4xl mx-auto">
        <div class="mt-2 grid grid-cols-3 gap-4">
            <section class="col-span-2">
                <header class="flex justify-between">
                    <h1 class="font-medium text-3xl text-gray-600">️🍃 Activity tracker</h1>
                    <button class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add new
                    </button>
                </header>

                <ul class="mt-3">
                    <li class="flex justify-between p-4 rounded-md bg-purple-100 mb-4   ">
                        <span>December 13 🗓️</span>
                        <span>Run 🏃</span>
                        <span>3.4 km 🚘</span>
                        <span>35 minutes ⌛</span>
                        <span>6.4 km / hour 💨</span>
                    </li>
                </ul>
            </section>
            <aside>
                <section class="py-4 px-6 rounded-lg bg-blue-50">
                    <h3 class="font-bold  text-gray-700">Longest ride 🚴</h3>
                    <div class="mt-1 flex justify-between">
                        <span>Oct 25</span>
                        <span>25 km</span>
                        <span>1h 45 min</span>
                    </div>
                    <h3 class="mt-6 font-bold  text-gray-700">Longest run 🏃</h3>
                    <div class="mt-1 flex justify-between">
                        <span>Sep 30</span>
                        <span>5 km</span>
                        <span>30 min</span>
                    </div>
                </section>
                <section class="mt-4 py-4 px-6 rounded-lg bg-gray-100 text-gray-900">
                    <div class="flex justify-between">
                        <span class="font-semibold">Total ride distance:</span>
                        <span>25.2 km</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Total run distance:</span>
                        <span>12.4 km</span>
                    </div>
                </section>
            </aside>
        </div>
    </div>
</body>
</html>
