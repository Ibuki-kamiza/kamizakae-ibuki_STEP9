<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品登録</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('tests.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium">商品名</label>
                        <input name="name" class="mt-1 w-full rounded border-gray-300" value="{{ old('name') }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">価格</label>
                        <input name="price" type="number" class="mt-1 w-full rounded border-gray-300" value="{{ old('price', 0) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">商品説明</label>
                        <textarea name="description" rows="4" class="mt-1 w-full rounded border-gray-300">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">在庫数</label>
                        <input name="stock" type="number" class="mt-1 w-full rounded border-gray-300" value="{{ old('stock', 0) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">商品画像</label>
                        <input name="image" type="file" class="mt-1 block w-full">
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('tests.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            戻る
                        </a>

                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            登録
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
