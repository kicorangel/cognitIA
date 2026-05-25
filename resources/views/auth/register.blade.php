<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | cognitIA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#030712] text-white antialiased">
    <main class="min-h-screen flex items-center justify-center px-6">
        <section class="w-full max-w-md rounded-3xl border border-slate-800 bg-slate-900/70 p-8 shadow-2xl">
            <div class="mb-8">
                <div class="text-cyan-400 text-sm tracking-[0.35em] uppercase mb-4">
                    COGNITIA
                </div>

                <h1 class="text-3xl font-bold mb-3">
                    Create your account
                </h1>

                <p class="text-slate-300 leading-relaxed">
                    Register to start testing the strategic decision cockpit.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-500/40 bg-red-500/10 p-4 text-sm text-red-200">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-semibold mb-2">
                        Name
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
                    >
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold mb-2">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold mb-2">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
                    >
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold mb-2">
                        Confirm password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-400"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-2xl bg-cyan-400 px-5 py-3 font-semibold text-slate-950 hover:bg-cyan-300 transition"
                >
                    Create account
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-400">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-cyan-300 hover:text-cyan-200">
                    Sign in
                </a>
            </p>
        </section>
    </main>
</body>
</html>