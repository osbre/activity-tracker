<section {!! $attributes !!}>
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
