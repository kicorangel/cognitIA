<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Role | cognitIA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#030712] text-white antialiased">
    <main class="mx-auto max-w-4xl px-6 py-10">
        <header class="mb-10">
            <div class="mb-4 text-sm uppercase tracking-[0.35em] text-cyan-400">
                COGNITIA
            </div>

            <h1 class="mb-4 text-4xl font-bold">
                Edit Thinking Role
            </h1>

            <p class="max-w-3xl text-lg leading-8 text-slate-300">
                Adjust how this role contributes to the cognitive-hat analysis.
            </p>
        </header>

        <section class="rounded-3xl border border-slate-800 bg-slate-900/70 p-8 shadow-2xl">
            <form method="POST" action="{{ route('admin.thinking-roles.update', $role) }}">
                @csrf
                @method('PUT')

                @include('admin.thinking-roles._form')
            </form>
        </section>
    </main>
</body>
</html>