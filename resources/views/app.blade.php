<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ActivityTracker</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body x-data="app()" x-init="fetchData()">

<x-modal-with-form x-show="modalVisible" />

<div class="py-3 px-4 md:px-0 md:max-w-4xl mx-auto">
    <div class="mt-2 grid grid-cols-3 gap-4">
        <section class="col-span-2">
            <x-header />
            <x-activity-list class="mt-3" />
        </section>
        <aside>
            <x-records-widget class="py-4 px-6 rounded-lg bg-blue-50" />
            <x-total-widget class="mt-4 py-4 px-6 rounded-lg bg-gray-100 text-gray-900" />
        </aside>
    </div>
</div>
</body>
</html>
