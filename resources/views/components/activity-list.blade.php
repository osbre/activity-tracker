<ul {!! $attributes !!}>
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
