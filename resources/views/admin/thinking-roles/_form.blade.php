@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-500/40 bg-red-500/10 p-4 text-sm text-red-200">
        <ul class="list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5">
    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label for="code" class="mb-2 block text-sm font-semibold">
                Code
            </label>
            <input
                id="code"
                name="code"
                type="text"
                value="{{ old('code', $role->code) }}"
                placeholder="CEO, CTO, PRESIDENT..."
                required
                class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
            >
            <p class="mt-2 text-xs text-slate-500">
                Short technical identifier. Use letters, numbers, hyphens or underscores.
            </p>
        </div>

        <div>
            <label for="sort_order" class="mb-2 block text-sm font-semibold">
                Order
            </label>
            <input
                id="sort_order"
                name="sort_order"
                type="number"
                min="0"
                value="{{ old('sort_order', $role->sort_order) }}"
                class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
            >
        </div>
    </div>

    <div>
        <label for="name" class="mb-2 block text-sm font-semibold">
            Name
        </label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $role->name) }}"
            placeholder="Chief Executive Officer, Opposition Leader..."
            required
            class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
        >
    </div>

    <div>
        <label for="title" class="mb-2 block text-sm font-semibold">
            Title
        </label>
        <input
            id="title"
            name="title"
            type="text"
            value="{{ old('title', $role->title) }}"
            placeholder="Optional longer title"
            class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
        >
    </div>

    <div>
        <label for="profile_prompt" class="mb-2 block text-sm font-semibold">
            Role prompt
        </label>
        <textarea
            id="profile_prompt"
            name="profile_prompt"
            rows="8"
            required
            placeholder="Describe how this role should think, evaluate, challenge, or contribute..."
            class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
        >{{ old('profile_prompt', $role->profile_prompt) }}</textarea>
    </div>

    <label class="flex items-center gap-3 text-sm text-slate-300">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            @checked(old('is_active', $role->is_active))
            class="rounded border-slate-700 bg-slate-950"
        >
        Active role
    </label>
</div>

<div class="mt-8 flex justify-between gap-4">
    <a
        href="{{ route('admin.thinking-roles.index') }}"
        class="rounded-xl border border-slate-700 px-5 py-3 text-sm text-slate-300 hover:border-cyan-400 hover:text-cyan-300 transition"
    >
        Cancel
    </a>

    <button
        type="submit"
        class="rounded-xl bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 hover:bg-cyan-300 transition"
    >
        Save role
    </button>
</div>