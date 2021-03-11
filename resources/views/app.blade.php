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
            meta: {},
            async fetchData() {
                await fetch('/api/activities').then(r => r.json()).then(response => {
                    this.activities = response.data;
                    this.meta = response.meta;
                })
            },

            modalVisible: false,
            formData: {},
            async submitForm() {
                await fetch('/api/activities', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(this.formData)
                }).then(() => {
                    this.formData = {}
                }).then(() => {
                    this.modalVisible = false
                    this.fetchData()
                })
            },
        });
    </script>
</head>
<body x-data="app()" x-init="fetchData()">
<div x-show="modalVisible" class="z-50 absolute w-full bg-blue-50 flex items-center justify-center h-screen">
    <div class="bg-white w-11/12 md:max-w-3xl mx-auto rounded-lg shadow-lg z-50 py-16 px-6 sm:px-20 overflow-y-auto">
        <h1 class="text-3xl text-center font-medium text-black">
            Add new activity 🏃
        </h1>
        <form x-on:submit.prevent="submitForm()" class="flex flex-col mb-3 md:pt-10">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="start" class="text-gray-800 text-xl uppercase">Start time</label>
                    <input
                        x-model="formData.start"
                        id="start"
                        type="datetime-local"
                        required
                        class="mb-3 border-2 rounded-lg px-6 py-5 placeholder-gray-800 tracking-wider"
                    />
                </div>

                <div class="flex flex-col">
                    <label for="finish" class="text-gray-800 text-xl uppercase">Finish time</label>
                    <input
                        x-model="formData.finish"
                        id="finish"
                        type="datetime-local"
                        required
                        class="mb-3 border-2 rounded-lg px-6 py-5 placeholder-gray-800 tracking-wider"
                    />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <input
                    x-model="formData.distance"
                    placeholder="Distance"
                    type="number"
                    min="0"
                    required
                    class="mb-3 border-2 rounded-lg px-6 py-5 placeholder-gray-800 tracking-wider"
                />

                <select x-model="formData.type" required
                        class="mb-3 border-2 rounded-lg px-6 py-5 placeholder-gray-800 tracking-wider appearance-none">
                    <option value="">Choose type</option>
                    <option value="run">Run 🏃</option>
                    <option value="ride">Ride 🚵</option>
                </select>
            </div>

            <div class="flex justify-between items-end">
                <button x-on:click="modalVisible = false" type="button" class="text-lg">
                    Cancel
                </button>
                <button type="submit"
                        class="relative inline-flex items-center px-16 py-4 border border-transparent shadow-sm text-lg font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
<div class="py-3 px-4 md:px-0 md:max-w-4xl mx-auto">
    <div class="mt-2 grid grid-cols-3 gap-4">
        <section class="col-span-2">
            <header class="flex justify-between">
                <h1 class="font-medium text-3xl text-gray-600">️🍃 Activity tracker</h1>
                <button x-on:click="modalVisible = true"
                        class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Add new
                </button>
            </header>

            <ul class="mt-3">
                <template x-for="activity in activities" :key="activity">
                    <li class="flex justify-between p-4 rounded-md bg-purple-100 mb-4">
                        <span class="w-32" x-text="activity.date_readable.concat(' 🗓️')"></span>
                        <span x-text="activity.type_readable"></span>
                        <span x-text="activity.distance.toString().concat(' km 🚘')"></span>
                        <span x-text="activity.time_spent_readable.concat(' ⌛')"></span>
                        <span x-text="activity.speed.toString().concat(' km / hour 💨')"></span>
                    </li>
                </template>
            </ul>
        </section>
        <aside>
            <section class="py-4 px-6 rounded-lg bg-blue-50">
                <h3 class="font-bold  text-gray-700">Longest ride 🚴</h3>
                <div class="mt-1 flex justify-between">
                    <span x-text="meta.longest_ride?.date_readable_short ?? '...'">...</span>
                    <span x-text="meta.longest_ride?.distance_readable ?? '...'">...</span>
                    <span x-text="meta.longest_ride?.time_spent_readable ?? '...'">...</span>
                </div>
                <h3 class="mt-6 font-bold  text-gray-700">Longest run 🏃</h3>
                <div class="mt-1 flex justify-between">
                    <span x-text="meta.longest_run?.date_readable_short ?? '...'">...</span>
                    <span x-text="meta.longest_run?.distance_readable ?? '...'">...</span>
                    <span x-text="meta.longest_run?.time_spent_readable ?? '...'">...</span>
                </div>
            </section>
            <section class="mt-4 py-4 px-6 rounded-lg bg-gray-100 text-gray-900">
                <div class="flex justify-between">
                    <span class="font-semibold">Total ride distance:</span>
                    <span x-text="meta.total_ride_distance.toString().concat(' km') ?? '...'">...</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Total run distance:</span>
                    <span x-text="meta.total_run_distance.toString().concat(' km') ?? '...'">...</span>
                </div>
            </section>
        </aside>
    </div>
</div>
</body>
</html>
