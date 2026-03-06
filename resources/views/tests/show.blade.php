<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品詳細</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="text-4xl font-bold mb-8">商品詳細</div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    <div>
                        @if($test->image_path)
                            <img src="{{ asset('storage/'.$test->image_path) }}"
                                 class="w-full max-w-md rounded object-cover" />
                        @else
                            <div class="w-full max-w-md h-64 bg-gray-100 rounded flex items-center justify-center text-gray-500">
                                no image
                            </div>
                        @endif
                    </div>

                    <div class="space-y-3">
                        <div class="text-lg">商品名：{{ $test->name }}</div>
                        <div class="text-lg">説明：{{ $test->description }}</div>
                        <div class="text-lg font-semibold">金額：¥{{ $test->price }}</div>
                        <div class="text-lg">会社：TNG</div>

                        {{-- ♡ お気に入り --}}
                        <div
                            x-data="{ favorited: @json($isFavorited) }"
                            class="flex items-center gap-3"
                        >
                            <button
                                type="button"
                                class="text-3xl select-none"
                                :class="favorited ? 'text-red-500' : 'text-gray-400'"
                                @click="
                                    fetch('{{ route('tests.favorite', $test) }}', {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Accept': 'application/json'
                                        }
                                    })
                                    .then(r => r.json())
                                    .then(data => { favorited = data.favorited; });
                                "
                                aria-label="favorite"
                            >
                                ♥
                            </button>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                                カートに追加する
                            </button>

                            <a href="{{ route('tests.index') }}"
                               class="px-6 py-3 bg-gray-600 text-white rounded hover:bg-gray-700">
                                戻る
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
