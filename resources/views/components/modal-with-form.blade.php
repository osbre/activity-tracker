<div {!! $attributes->merge(['class' => 'z-50 absolute w-full bg-blue-50 flex items-center justify-center h-screen']) !!}>
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
