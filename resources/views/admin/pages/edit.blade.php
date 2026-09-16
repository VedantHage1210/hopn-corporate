<x-layouts.admin title="Edit Page">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Page — {{ $page->title }}</h1>
        <div class="flex items-center gap-3 text-sm">
            <a href="{{ route('admin.pages.preview', $page->id) }}" target="_blank" class="text-slate-300 hover:text-white">Preview →</a>
            <a href="{{ route('admin.pages.versions', $page->id) }}" class="text-slate-300 hover:text-white">Version History →</a>
            <a href="{{ route('admin.pages.index') }}" class="text-slate-400 hover:text-white">← Back</a>
        </div>
    </div>

    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif

    <div class="card-panel p-6 mb-8">
        <form method="POST" action="{{ route('admin.pages.update', $page->id) }}">
            @csrf @method('PUT')
            @include('admin.pages._form', ['page' => $page])
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Page</button>
            </div>
        </form>
    </div>

    {{-- ============ DRAG & DROP BLOCK BUILDER ============ --}}
    <div class="card-panel p-6" x-data="pageBlockBuilder()">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-white">Page Blocks</h2>
                <p class="text-xs text-slate-500 mt-1">Drag a block by its handle to reorder. These render on the public page in this order, above the plain content above.</p>
            </div>
            <form method="POST" action="{{ route('admin.page-blocks.store', $page->id) }}" class="flex items-center gap-2">
                @csrf
                <select name="block_type" class="rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    <option value="text">Text</option>
                    <option value="hero">Hero</option>
                    <option value="image">Image</option>
                    <option value="cta">Call to Action</option>
                    <option value="quote">Quote</option>
                    <option value="cards">Cards</option>
                </select>
                <button type="submit" class="btn-primary text-sm">+ Add Block</button>
            </form>
        </div>

        <div id="block-list" class="space-y-3" data-reorder-url="{{ route('admin.page-blocks.reorder', $page->id) }}">
            @forelse($page->blocks as $block)
            <div class="block-row rounded-lg border border-slate-700 bg-slate-900" draggable="true"
                 data-id="{{ $block->id }}"
                 x-on:dragstart="dragStart($event)" x-on:dragover.prevent x-on:drop="drop($event, {{ $page->id }})">
                <div class="flex items-center justify-between px-4 py-3 cursor-move" style="cursor:move;">
                    <div class="flex items-center gap-3">
                        <span class="text-slate-500" title="Drag to reorder" role="button" aria-label="Drag to reorder this block" tabindex="0">⠿⠿</span>
                        <span class="rounded-full bg-slate-700 px-2 py-0.5 text-xs font-semibold text-slate-200 uppercase">{{ $block->block_type }}</span>
                        <span class="text-sm text-white">{{ $block->title }}</span>
                        @if(!$block->is_visible)<span class="text-xs text-slate-500">(hidden)</span>@endif
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <button type="button" x-on:click="toggle({{ $block->id }})" class="text-indigo-300 hover:text-indigo-200" x-text="open === {{ $block->id }} ? 'Close' : 'Edit'"></button>
                        <form method="POST" action="{{ route('admin.page-blocks.destroy', [$page->id, $block->id]) }}">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Remove this block?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </div>
                </div>

                <div x-show="open === {{ $block->id }}" x-cloak class="border-t border-slate-800 px-4 py-4">
                    <form method="POST" action="{{ route('admin.page-blocks.update', [$page->id, $block->id]) }}" class="space-y-4">
                        @csrf @method('PUT')

                        <div class="grid gap-3 md:grid-cols-3">
                            <div><label class="block text-xs text-slate-400 mb-1">Block label (EN)</label><input type="text" name="title" value="{{ $block->title }}" class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></div>
                            <div><label class="block text-xs text-slate-400 mb-1">Block label (DE)</label><input type="text" name="title_de" value="{{ $block->title_de }}" class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></div>
                            <div><label class="block text-xs text-slate-400 mb-1">Block label (AR)</label><input type="text" name="title_ar" value="{{ $block->title_ar }}" dir="rtl" class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></div>
                        </div>

                        @foreach(['en'=>'English','de'=>'Deutsch','ar'=>'العربية'] as $langCode => $langLabel)
                        <div class="rounded-lg border border-slate-800 p-3">
                            <p class="text-xs font-bold uppercase text-slate-500 mb-2">{{ $langLabel }}</p>
                            @php $c = $block->contentFor($langCode); @endphp

                            @if($block->block_type === 'text')
                                <textarea name="content_{{ $langCode }}_body" rows="4" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Body text..."
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ $c['body'] ?? '' }}</textarea>
                            @elseif($block->block_type === 'hero')
                                <input type="text" name="content_{{ $langCode }}_heading" value="{{ $c['heading'] ?? '' }}" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Heading"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white mb-2">
                                <input type="text" name="content_{{ $langCode }}_subheading" value="{{ $c['subheading'] ?? '' }}" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Subheading"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                            @elseif($block->block_type === 'image')
                                <input type="text" name="content_{{ $langCode }}_url" value="{{ $c['url'] ?? '' }}" placeholder="Image URL"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white mb-2">
                                <input type="text" name="content_{{ $langCode }}_caption" value="{{ $c['caption'] ?? '' }}" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Caption"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                            @elseif($block->block_type === 'cta')
                                <input type="text" name="content_{{ $langCode }}_heading" value="{{ $c['heading'] ?? '' }}" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Heading"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white mb-2">
                                <div class="grid gap-2 md:grid-cols-2">
                                    <input type="text" name="content_{{ $langCode }}_button_label" value="{{ $c['button_label'] ?? '' }}" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Button label"
                                        class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                                    <input type="text" name="content_{{ $langCode }}_button_url" value="{{ $c['button_url'] ?? '' }}" placeholder="Button URL"
                                        class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                                </div>
                            @elseif($block->block_type === 'quote')
                                <textarea name="content_{{ $langCode }}_quote" rows="3" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Quote text"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white mb-2">{{ $c['quote'] ?? '' }}</textarea>
                                <input type="text" name="content_{{ $langCode }}_author" value="{{ $c['author'] ?? '' }}" dir="{{ $langCode==='ar'?'rtl':'ltr' }}" placeholder="Author"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                            @elseif($block->block_type === 'cards')
                                <textarea name="content_{{ $langCode }}_items" rows="4" dir="{{ $langCode==='ar'?'rtl':'ltr' }}"
                                    placeholder="One card per line: Title | Description"
                                    class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ collect($c['items'] ?? [])->map(fn($i) => ($i['title'] ?? '').' | '.($i['description'] ?? ''))->implode("\n") }}</textarea>
                            @endif
                        </div>
                        @endforeach

                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center gap-2 text-sm text-slate-300"><input type="checkbox" name="is_visible" value="1" {{ $block->is_visible ? 'checked' : '' }}>Visible on page</label>
                            <button type="submit" class="btn-primary text-sm">Save Block</button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <p class="text-sm text-slate-500 py-6 text-center">No blocks yet — add one above to start building this page visually.</p>
            @endforelse
        </div>
    </div>

    <script>
        function pageBlockBuilder() {
            return {
                open: null,
                dragged: null,
                toggle(id) { this.open = this.open === id ? null : id; },
                dragStart(e) { this.dragged = e.target.closest('.block-row'); },
                drop(e, pageId) {
                    const target = e.target.closest('.block-row');
                    if (!target || !this.dragged || target === this.dragged) return;
                    const list = document.getElementById('block-list');
                    const rows = Array.from(list.children);
                    const draggedIndex = rows.indexOf(this.dragged);
                    const targetIndex = rows.indexOf(target);
                    if (draggedIndex < targetIndex) {
                        target.after(this.dragged);
                    } else {
                        target.before(this.dragged);
                    }
                    const order = Array.from(list.children).map(el => el.dataset.id);
                    fetch(list.dataset.reorderUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ order })
                    });
                }
            }
        }
    </script>
</x-layouts.admin>
