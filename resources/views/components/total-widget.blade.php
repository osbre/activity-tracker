<section {!! $attributes !!}>
    <div class="flex justify-between">
        <span class="font-semibold">Total ride distance:</span>
        <span x-text="meta.total_ride_distance?.toString().concat(' km') ?? '...'">...</span>
    </div>
    <div class="flex justify-between">
        <span class="font-semibold">Total run distance:</span>
        <span x-text="meta.total_run_distance?.toString().concat(' km') ?? '...'">...</span>
    </div>
</section>
