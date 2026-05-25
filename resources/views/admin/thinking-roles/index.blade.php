<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thinking Roles | cognitIA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#030712] text-white antialiased">
    <main class="mx-auto max-w-6xl px-6 py-10">
        <header class="mb-10 flex items-start justify-between gap-6">
            <div>
                <div class="mb-4 text-sm uppercase tracking-[0.35em] text-cyan-400">
                    COGNITIA
                </div>

                <h1 class="mb-4 text-4xl font-bold">
                    Thinking Roles
                </h1>

                <p class="max-w-3xl text-lg leading-8 text-slate-300">
                    Configure the roles that will participate in your cognitive-hat analysis.
                    These roles belong only to your user account.
                </p>
            </div>

            <div class="flex gap-3">
                <a
                    href="{{ route('cognitive-hat.index') }}"
                    class="rounded-xl border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:border-cyan-400 hover:text-cyan-300 transition"
                >
                    Back to cockpit
                </a>

                <a
                    href="{{ route('admin.thinking-roles.create') }}"
                    class="rounded-xl bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 hover:bg-cyan-300 transition"
                >
                    New role
                </a>
            </div>
        </header>

        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-500/40 bg-emerald-500/10 p-4 text-sm text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/70 shadow-2xl">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-800 bg-slate-950/70 text-slate-300">
                    <tr>
                        <th class="px-5 py-4">Order</th>
                        <th class="px-5 py-4">Code</th>
                        <th class="px-5 py-4">Name</th>
                        <th class="px-5 py-4">Title</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800">
                    @forelse ($roles as $role)
                        <tr class="hover:bg-slate-800/40">
                            <td class="px-5 py-4 text-slate-400">
                                {{ $role->sort_order }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="rounded-lg border border-cyan-400/30 bg-cyan-400/10 px-3 py-1 text-xs font-semibold text-cyan-300">
                                    {{ $role->code }}
                                </span>
                            </td>

                            <td class="px-5 py-4 font-semibold">
                                {{ $role->name }}
                            </td>

                            <td class="px-5 py-4 text-slate-300">
                                {{ $role->title ?: '—' }}
                            </td>

                            <td class="px-5 py-4">
                                @if ($role->is_active)
                                    <span class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-3 py-1 text-xs text-emerald-300">
                                        Active
                                    </span>
                                @else
                                    <span class="rounded-lg border border-slate-600 bg-slate-800 px-3 py-1 text-xs text-slate-400">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-3">
                                    <a
                                        href="{{ route('admin.thinking-roles.edit', $role) }}"
                                        class="rounded-xl border border-slate-700 px-3 py-2 text-xs text-slate-300 hover:border-cyan-400 hover:text-cyan-300 transition"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.thinking-roles.destroy', $role) }}"
                                        onsubmit="return confirm('Delete this role?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-xl border border-red-500/40 px-3 py-2 text-xs text-red-300 hover:bg-red-500/10 transition"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-slate-400">
                                No roles found. Create your first role to start using this thinking model.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>