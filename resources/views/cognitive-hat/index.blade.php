<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cognitIA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hidden-panel {
            display: none;
        }

        .tab-btn-active {
            background: #67e8f9;
            color: #020617;
        }

        .tab-btn-inactive {
            background: rgba(15, 23, 42, 0.6);
            color: #cbd5e1;
            border: 1px solid rgba(255,255,255,0.10);
        }

        .role-btn-active {
            background: rgba(103, 232, 249, 0.18);
            color: white;
            border: 1px solid rgba(103, 232, 249, 0.35);
        }

        .role-btn-inactive {
            background: rgba(15, 23, 42, 0.6);
            color: #cbd5e1;
            border: 1px solid rgba(255,255,255,0.10);
        }

        /* =====================================
        GOD-TIER AGENTIC THINKING EXPERIENCE
        ====================================== */

        .thinking-god-shell {
            position: relative;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 18px;
            border-radius: 30px;
            background:
                radial-gradient(circle at 10% 10%, rgba(103,232,249,0.08), transparent 25%),
                radial-gradient(circle at 90% 15%, rgba(167,139,250,0.08), transparent 28%),
                radial-gradient(circle at 50% 80%, rgba(56,189,248,0.08), transparent 32%),
                linear-gradient(180deg, rgba(15,23,42,0.82), rgba(2,6,23,0.94));
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow:
                inset 0 0 40px rgba(103,232,249,0.04),
                0 30px 80px rgba(0,0,0,0.42);
            overflow: hidden;
        }

        .thinking-god-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, transparent, rgba(255,255,255,0.03), transparent);
            transform: translateX(-100%);
            animation: shellSweep 8s linear infinite;
            pointer-events: none;
        }

        .thinking-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(103,232,249,0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(103,232,249,0.035) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.35;
            mask-image: radial-gradient(circle at center, black 45%, transparent 100%);
            pointer-events: none;
        }

        .thinking-visual {
            position: relative;
            height: 295px;
            border-radius: 26px;
            overflow: hidden;
            border: 1px solid rgba(103,232,249,0.12);
            background:
                radial-gradient(circle at center, rgba(103,232,249,0.06), transparent 30%),
                linear-gradient(180deg, rgba(2,6,23,0.90), rgba(15,23,42,0.88));
            perspective: 1200px;
        }

        .thinking-orbit {
            position: absolute;
            inset: 24px;
            border-radius: 999px;
            border: 1px solid rgba(103,232,249,0.08);
            transform-style: preserve-3d;
            animation: orbitSpin 14s linear infinite;
        }

        .thinking-orbit.orbit-2 {
            inset: 58px;
            border-color: rgba(167,139,250,0.10);
            animation-duration: 18s;
            animation-direction: reverse;
        }

        .thinking-orbit.orbit-3 {
            inset: 96px;
            border-color: rgba(56,189,248,0.10);
            animation-duration: 12s;
        }

        .thinking-layer {
            position: absolute;
            inset: 0;
            transform-style: preserve-3d;
        }

        .thinking-layer.back {
            transform: translateZ(-70px) scale(0.90);
            opacity: 0.33;
            filter: blur(0.3px);
        }

        .thinking-layer.mid {
            transform: translateZ(-15px) scale(0.97);
            opacity: 0.55;
        }

        .thinking-layer.front {
            transform: translateZ(42px) scale(1.02);
        }

        .thinking-halo {
            position: absolute;
            inset: 50%;
            width: 160px;
            height: 160px;
            transform: translate(-50%, -50%);
            border-radius: 9999px;
            border: 1px solid rgba(103,232,249,0.10);
            box-shadow:
                0 0 30px rgba(103,232,249,0.10),
                inset 0 0 24px rgba(103,232,249,0.05);
            animation: haloBreath 4.5s ease-in-out infinite;
        }

        .thinking-halo.h2 {
            width: 230px;
            height: 230px;
            border-color: rgba(167,139,250,0.10);
            animation-delay: 1.2s;
        }

        .thinking-halo.h3 {
            width: 310px;
            height: 310px;
            border-color: rgba(56,189,248,0.08);
            animation-delay: 2.3s;
        }

        .thinking-core {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 28px;
            height: 28px;
            transform: translate(-50%, -50%);
            border-radius: 9999px;
            background: radial-gradient(circle at 35% 35%, #ffffff, #67e8f9 45%, #0ea5e9 100%);
            box-shadow:
                0 0 0 12px rgba(103,232,249,0.06),
                0 0 36px rgba(103,232,249,0.85),
                0 0 80px rgba(103,232,249,0.22);
            animation: corePulse 2.8s ease-in-out infinite;
            z-index: 8;
        }

        .thinking-line {
            position: absolute;
            height: 2px;
            border-radius: 999px;
            overflow: hidden;
            background: linear-gradient(
                90deg,
                rgba(103,232,249,0.04),
                rgba(103,232,249,0.80),
                rgba(103,232,249,0.04)
            );
            box-shadow: 0 0 14px rgba(103,232,249,0.18);
        }

        .thinking-line.violet {
            background: linear-gradient(
                90deg,
                rgba(167,139,250,0.04),
                rgba(167,139,250,0.82),
                rgba(167,139,250,0.04)
            );
            box-shadow: 0 0 14px rgba(167,139,250,0.18);
        }

        .thinking-line.gold {
            background: linear-gradient(
                90deg,
                rgba(250,204,21,0.04),
                rgba(250,204,21,0.85),
                rgba(250,204,21,0.04)
            );
            box-shadow: 0 0 14px rgba(250,204,21,0.18);
        }

        .thinking-line::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.98), transparent);
            animation: signalFlow 2.3s linear infinite;
        }

        .thinking-node {
            position: absolute;
            width: 14px;
            height: 14px;
            border-radius: 9999px;
            background: #67e8f9;
            box-shadow:
                0 0 0 5px rgba(103,232,249,0.08),
                0 0 18px rgba(103,232,249,0.68);
            animation: nodePulse 2.1s infinite;
        }

        .thinking-node.violet {
            background: #a78bfa;
            box-shadow:
                0 0 0 5px rgba(167,139,250,0.08),
                0 0 18px rgba(167,139,250,0.68);
        }

        .thinking-node.gold {
            background: #facc15;
            box-shadow:
                0 0 0 5px rgba(250,204,21,0.08),
                0 0 18px rgba(250,204,21,0.68);
        }

        .thinking-role {
            position: absolute;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .thinking-role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            background: rgba(15,23,42,0.88);
            border: 1px solid rgba(255,255,255,0.10);
            color: #dbeafe;
            box-shadow: 0 8px 20px rgba(0,0,0,0.22);
            backdrop-filter: blur(8px);
            white-space: nowrap;
        }

        .thinking-role-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #67e8f9;
            box-shadow: 0 0 10px rgba(103,232,249,0.85);
        }

        .thinking-role-badge.violet .thinking-role-dot {
            background: #a78bfa;
            box-shadow: 0 0 10px rgba(167,139,250,0.85);
        }

        .thinking-role-badge.gold .thinking-role-dot {
            background: #facc15;
            box-shadow: 0 0 10px rgba(250,204,21,0.85);
        }

        .thinking-stream {
            margin-top: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .thinking-stream-step {
            position: relative;
            padding: 8px 13px;
            border-radius: 999px;
            background: rgba(15,23,42,0.76);
            border: 1px solid rgba(255,255,255,0.10);
            color: #cbd5e1;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            overflow: hidden;
        }

        .thinking-stream-step .thinking-mode,
        .thinking-stream-step .thinking-mode-sub {
            position: relative;
            z-index: 1;
            display: block;
            line-height: 1.15;
        }

        .thinking-stream-step .thinking-mode {
            font-weight: 700;
        }

        .thinking-stream-step .thinking-mode-sub {
            margin-top: 2px;
            font-size: 10px;
            letter-spacing: 0.08em;
            text-transform: none;
            opacity: 0.72;
        }

        .thinking-stream-step.active {
            color: #082f49;
            background: linear-gradient(90deg, #67e8f9, #a78bfa);
            border-color: transparent;
            box-shadow: 0 0 22px rgba(103,232,249,0.20);
        }

        .thinking-stream-step.active::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.65), transparent);
            animation: stepSweep 2.8s linear infinite;
        }

        .thinking-feed {
            margin-top: 12px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
        }

        .thinking-feed-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 9px 14px;
            border-radius: 16px;
            background: rgba(15,23,42,0.72);
            border: 1px solid rgba(255,255,255,0.08);
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.5;
            animation: feedGlow 4s ease-in-out infinite;
        }

        .thinking-feed-pulse {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #67e8f9;
            box-shadow: 0 0 10px rgba(103,232,249,0.8);
            animation: tinyPulse 1.5s infinite;
        }

        .thinking-title {
            text-align: center;
            margin-top: 16px;
        }

        .thinking-dots span {
            display: inline-block;
            animation: blinkDots 1.4s infinite;
        }

        .thinking-dots span:nth-child(2) { animation-delay: .2s; }
        .thinking-dots span:nth-child(3) { animation-delay: .4s; }

        .p1 { top: 44px; left: 92px; }
        .p2 { top: 52px; right: 106px; }
        .p3 { bottom: 72px; left: 78px; }
        .p4 { bottom: 62px; right: 88px; }
        .p5 { top: 110px; left: 180px; }
        .p6 { top: 120px; right: 168px; }
        .p7 { bottom: 112px; left: 170px; }
        .p8 { bottom: 118px; right: 172px; }
        .p9 { top: 50%; left: 50%; transform: translate(-50%, -50%); }

        .b1 { top: 86px; left: 130px; }
        .b2 { top: 96px; right: 138px; }
        .b3 { bottom: 102px; left: 136px; }
        .b4 { bottom: 94px; right: 132px; }

        .l1  { top: 50px; left: 106px; width: 438px; }
        .l2  { bottom: 68px; left: 94px; width: 438px; }
        .l3  { top: 94px; left: 96px; width: 150px; transform: rotate(28deg); transform-origin: left center; }
        .l4  { top: 100px; right: 100px; width: 150px; transform: rotate(-28deg); transform-origin: right center; }
        .l5  { bottom: 100px; left: 88px; width: 168px; transform: rotate(-28deg); transform-origin: left center; }
        .l6  { bottom: 104px; right: 88px; width: 168px; transform: rotate(28deg); transform-origin: right center; }

        .l7  { top: 126px; left: 194px; width: 158px; transform: rotate(28deg); transform-origin: left center; }
        .l8  { top: 124px; left: 196px; width: 156px; transform: rotate(-28deg); transform-origin: left center; }
        .l9  { bottom: 132px; left: 182px; width: 168px; transform: rotate(18deg); transform-origin: left center; }
        .l10 { bottom: 128px; left: 184px; width: 168px; transform: rotate(-18deg); transform-origin: left center; }

        .l11 { top: 176px; left: 82px; width: 490px; }
        .l12 { top: 70px; left: 270px; width: 2px; height: 200px; transform: rotate(90deg); transform-origin: top left; }
        .l13 { top: 82px; left: 220px; width: 250px; transform: rotate(12deg); transform-origin: left center; }
        .l14 { bottom: 92px; left: 214px; width: 260px; transform: rotate(-12deg); transform-origin: left center; }

        .thinking-role.ceo { top: 40px; left: 92px; }
        .thinking-role.cfo { top: 46px; right: 100px; transform: translate(50%, -50%); }
        .thinking-role.cto { bottom: 56px; left: 76px; }
        .thinking-role.cpo { bottom: 52px; right: 82px; transform: translate(50%, -50%); }
        .thinking-role.cdo { top: 118px; left: 162px; }
        .thinking-role.cso { top: 122px; right: 154px; transform: translate(50%, -50%); }
        .thinking-role.blue { top: 50%; left: 50%; transform: translate(-50%, -50%); }



        @media (max-width: 768px) {
            .thinking-visual {
                height: 260px;
            }

            .thinking-role-badge {
                font-size: 9px;
                padding: 6px 9px;
            }

            .thinking-stream-step {
                padding: 7px 10px;
                font-size: 10px;
            }
        }


        .recommendation-value {
            font-size: clamp(1.75rem, 3vw, 3rem);
            line-height: 1.08;
            letter-spacing: -0.03em;
            overflow-wrap: anywhere;
            word-break: normal;
        }

        .thinking-timer {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 14px auto 0;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid rgba(103,232,249,0.18);
            background: rgba(15,23,42,0.72);
            color: #e0f2fe;
            font-size: 14px;
            letter-spacing: 0.02em;
        }

        .thinking-clock {
            width: 18px;
            height: 18px;
            border-radius: 999px;
            border: 2px solid rgba(103,232,249,0.75);
            position: relative;
            box-shadow: 0 0 14px rgba(103,232,249,0.20);
        }

        .thinking-clock::before,
        .thinking-clock::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 2px;
            border-radius: 999px;
            background: #67e8f9;
            transform-origin: bottom center;
        }

        .thinking-clock::before {
            height: 6px;
            animation: clockHand 3s linear infinite;
        }

        .thinking-clock::after {
            height: 4px;
            opacity: 0.75;
            animation: clockHand 12s linear infinite;
        }

        @keyframes clockHand {
            from { transform: translate(-50%, -100%) rotate(0deg); }
            to { transform: translate(-50%, -100%) rotate(360deg); }
        }

        @keyframes shellSweep {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes orbitSpin {
            from { transform: rotateX(68deg) rotateZ(0deg); }
            to   { transform: rotateX(68deg) rotateZ(360deg); }
        }

        @keyframes haloBreath {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: .28; }
            50% { transform: translate(-50%, -50%) scale(1.08); opacity: .72; }
        }

        @keyframes corePulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.22); }
        }

        @keyframes nodePulse {
            0%, 100% { transform: scale(1); opacity: .70; }
            50% { transform: scale(1.22); opacity: 1; }
        }

        @keyframes signalFlow {
            0% { transform: translateX(-100%); opacity: 0; }
            18% { opacity: 1; }
            100% { transform: translateX(100%); opacity: 0; }
        }

        @keyframes stepSweep {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes feedGlow {
            0%, 100% { box-shadow: 0 0 0 rgba(103,232,249,0); }
            50% { box-shadow: 0 0 18px rgba(103,232,249,0.08); }
        }

        @keyframes tinyPulse {
            0%, 100% { opacity: .5; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.35); }
        }

        @keyframes blinkDots {
            0%, 80%, 100% { opacity: .25; transform: translateY(0); }
            40% { opacity: 1; transform: translateY(-2px); }
        }
    </style>

</head>
<body class="bg-slate-950 text-white min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <header class="mb-8 flex items-start justify-between gap-6">
            <div>
                <div class="text-cyan-400 text-sm tracking-[0.35em] uppercase mb-4">
                    COGNITIA
                </div>

                <h1 class="text-4xl font-bold mb-0">
                    Strategic Decision Cockpit
                </h1>
            </div>

            <div class="flex items-center gap-3 pt-1">
                <a
                    href="{{ route('admin.thinking-roles.index') }}"
                    class="rounded-xl border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:border-cyan-400 hover:text-cyan-300 transition"
                >
                    Manage roles
                </a>

                @if (auth()->check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="rounded-xl border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:border-cyan-400 hover:text-cyan-300 transition"
                        >
                            Logout
                        </button>
                    </form>
                @endif
            </div>
        </header>

        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-red-400/30 bg-red-400/10 px-4 py-3 text-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 items-stretch">
            <div class="xl:col-span-5 flex">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl h-full min-h-[560px] w-full flex flex-col">
                    <p class="mb-6 text-lg leading-8 text-slate-100">
                        Describe a strategic idea, opportunity, or dilemma in your own words.
                        The system will interpret it, activate the relevant advisory roles,
                        and return a structured recommendation.
                    </p>

                    <form method="POST" action="{{ route('cognitive-hat.analyze') }}" class="flex flex-1 flex-col gap-5" id="analysisForm">
                        @csrf

                        <div class="flex flex-1 flex-col">
                            <textarea
                                name="idea"
                                rows="12"
                                class="w-full min-h-[330px] flex-1 rounded-3xl bg-slate-900/70 border border-white/10 px-5 py-4 text-white leading-8"
                                placeholder="Example: We are a small company with limited technical and economic resources, but we see an opportunity in SMEs in Spain that need automation..."
                            >{{ old('idea') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            id="analysisSubmitBtn"
                            class="mt-auto w-full rounded-2xl bg-cyan-300 text-slate-950 font-semibold px-5 py-4 hover:bg-cyan-200 transition"
                        >
                            Run analysis
                        </button>
                    </form>
                </div>
            </div>

            <div class="xl:col-span-7 flex">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl h-full min-h-[560px] w-full">
                    @if($result)
                        @php
                            $state = $result['state'] ?? [];
                            $recommendation = $result['recommendation'] ?? '-';
                            $options = $result['options'] ?? [];
                            $confidence = strtolower($result['decision_confidence'] ?? 'medium');
                            $interpretedBrief = $state['interpreted_brief'] ?? '';
                            $nextSteps = $state['next_steps'] ?? [];
                            $risks = $state['risks'] ?? [];
                            $openQuestions = $state['open_questions'] ?? [];
                            $outputs = $state['outputs'] ?? [];
                            $configuredRoles = collect($state['roles'] ?? [])->pluck('code')->filter()->values()->all();
                            $outputRoles = collect($outputs)
                                ->flatMap(fn ($hatOutputs) => array_keys($hatOutputs ?? []))
                                ->unique()
                                ->values()
                                ->all();
                            $roles = !empty($configuredRoles) ? $configuredRoles : $outputRoles;
                            $interactionCount = collect($outputs)
                                ->flatMap(fn ($hatOutputs) => collect($hatOutputs ?? [])->map(fn ($items) => count($items ?? [])))
                                ->sum();
                        @endphp

                        <script type="application/json" id="analysisResultJson">
                        {!! json_encode($exportPayload ?? ['response' => $result], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
                        </script>

                        <div class="mb-8">
                            <p class="text-sm uppercase tracking-[0.2em] text-cyan-300 mb-3">
                                Primary recommendation
                            </p>

                            <div class="rounded-3xl border border-emerald-400/20 bg-emerald-400/10 p-6">
                                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5">
                                    <div class="min-w-0 flex-1">
                                        <div class="text-slate-300 text-sm mb-2">Recommended path</div>
                                        <div class="recommendation-value font-bold mb-3">{{ $recommendation }}</div>
                                        <p class="text-slate-200 leading-8 max-w-3xl">
                                            {{ $result['executive_summary'] ?? '' }}
                                        </p>
                                    </div>

                                    <div class="shrink-0 grid grid-cols-1 gap-3 w-full md:w-[220px]">
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                            <div class="text-xs uppercase tracking-[0.16em] text-slate-400 mb-1">Confidence</div>
                                            <div class="text-xl font-semibold capitalize">{{ $confidence }}</div>
                                        </div>

                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                            <div class="text-xs uppercase tracking-[0.16em] text-slate-400 mb-1">Run ID</div>
                                            <div class="text-sm text-slate-300 break-all">{{ $result['run_id'] ?? '' }}</div>
                                        </div>

                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                            <div class="text-xs uppercase tracking-[0.16em] text-slate-400 mb-1">Total time</div>
                                            <div class="text-xl font-semibold" id="analysisElapsedResult">Calculating...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($interpretedBrief))
                            <div class="mb-8">
                                <p class="text-sm uppercase tracking-[0.2em] text-cyan-300 mb-3">
                                    How the system understood your challenge
                                </p>

                                <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-6">
                                    <p class="text-slate-300 leading-8">
                                        {{ $interpretedBrief }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="mb-8">
                            <p class="text-sm uppercase tracking-[0.2em] text-cyan-300 mb-3">
                                Strategic options
                            </p>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                                @foreach($options as $key => $option)
                                    <div class="rounded-3xl border {{ $key === $recommendation ? 'border-emerald-400/30 bg-emerald-400/10' : 'border-white/10 bg-slate-900/60' }} p-5">
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="text-lg font-semibold">Option {{ $key }}</div>
                                            @if($key === $recommendation)
                                                <span class="rounded-full border border-emerald-400/30 bg-emerald-400/15 px-3 py-1 text-xs text-emerald-200">
                                                    Recommended
                                                </span>
                                            @endif
                                        </div>

                                        <p class="text-slate-300 leading-7">
                                            {{ $option }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <div class="flex flex-wrap gap-2 mb-6" id="mainTabs">
                                <button type="button" data-tab="overview" class="main-tab-btn tab-btn-active rounded-full px-4 py-2 text-sm font-medium transition">
                                    Overview
                                </button>
                                <button type="button" data-tab="risks" class="main-tab-btn tab-btn-inactive rounded-full px-4 py-2 text-sm font-medium transition">
                                    Risks
                                </button>
                                <button type="button" data-tab="questions" class="main-tab-btn tab-btn-inactive rounded-full px-4 py-2 text-sm font-medium transition">
                                    Open Questions
                                </button>
                                <button type="button" data-tab="next" class="main-tab-btn tab-btn-inactive rounded-full px-4 py-2 text-sm font-medium transition">
                                    Next Steps
                                </button>
                                <button type="button" data-tab="roles" class="main-tab-btn tab-btn-inactive rounded-full px-4 py-2 text-sm font-medium transition">
                                    Role Explorer
                                </button>
                                <button type="button" data-tab="save" class="main-tab-btn tab-btn-inactive rounded-full px-4 py-2 text-sm font-medium transition">
                                    Save
                                </button>
                            </div>

                            <div id="tab-overview" class="main-tab-panel">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Mode</p>
                                        <p class="text-xl font-semibold">{{ strtoupper($result['mode'] ?? '-') }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Final Hat</p>
                                        <p class="text-xl font-semibold">{{ $result['final_hat'] ?? '-' }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Interactions</p>
                                        <p class="text-xl font-semibold">{{ $interactionCount }}</p>
                                    </div>

                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Total time</p>
                                        <p class="text-xl font-semibold" id="analysisElapsedOverview">Calculating...</p>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-risks" class="main-tab-panel hidden-panel">
                                <div class="space-y-3">
                                    @forelse($risks as $risk)
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-300 leading-7">
                                            {{ $risk }}
                                        </div>
                                    @empty
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-400">
                                            No risks available.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div id="tab-questions" class="main-tab-panel hidden-panel">
                                <div class="space-y-3">
                                    @forelse($openQuestions as $question)
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-300 leading-7">
                                            {{ $question }}
                                        </div>
                                    @empty
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-400">
                                            No open questions available.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div id="tab-next" class="main-tab-panel hidden-panel">
                                <div class="space-y-3">
                                    @forelse($nextSteps as $step)
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-300 leading-7">
                                            {{ $step }}
                                        </div>
                                    @empty
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-400">
                                            No next steps available.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div id="tab-roles" class="main-tab-panel hidden-panel">
                                <div class="flex flex-wrap gap-2 mb-5" id="roleTabs">
                                    @foreach($roles as $index => $role)
                                        <button
                                            type="button"
                                            data-role="{{ $role }}"
                                            class="role-tab-btn {{ $index === 0 ? 'role-btn-active' : 'role-btn-inactive' }} rounded-full px-4 py-2 text-sm font-medium transition"
                                        >
                                            {{ $role }}
                                        </button>
                                    @endforeach
                                </div>

                                @foreach($roles as $index => $role)
                                    <div id="role-panel-{{ $role }}" class="role-panel {{ $index === 0 ? '' : 'hidden-panel' }}">
                                        <div class="space-y-4">
                                            @forelse($outputs as $hat => $hatOutputs)
                                                @if(isset($hatOutputs[$role]) && count($hatOutputs[$role]) > 0)
                                                    @php
                                                        $entry = $hatOutputs[$role][0];
                                                    @endphp
                                                    <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-5">
                                                        <div class="flex items-center justify-between mb-3">
                                                            <div class="text-lg font-semibold">{{ $hat }}</div>
                                                            <div class="text-sm text-slate-400 capitalize">
                                                                Confidence: {{ $entry['confidence'] ?? 'n/a' }}
                                                            </div>
                                                        </div>

                                                        <div class="text-slate-300 leading-8 whitespace-pre-line">
                                                            {{ $entry['content'] ?? '' }}
                                                        </div>

                                                        @if(!empty($entry['questions']))
                                                            <div class="mt-4">
                                                                <p class="text-xs uppercase tracking-[0.16em] text-cyan-300 mb-2">Questions raised</p>
                                                                <ul class="space-y-2">
                                                                    @foreach($entry['questions'] as $question)
                                                                        <li class="text-slate-400 leading-7">• {{ $question }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            @empty
                                                <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4 text-slate-400">
                                                    No role output available.
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="tab-save" class="main-tab-panel hidden-panel">
                                <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-6">
                                    <div class="mb-6">
                                        <p class="text-sm uppercase tracking-[0.2em] text-cyan-300 mb-3">
                                            Save result
                                        </p>

                                        <h3 class="text-2xl font-semibold mb-3">
                                            Export or reuse this analysis
                                        </h3>

                                        <p class="text-slate-300 leading-8 max-w-3xl">
                                            Save this analysis for future reuse, download it as an executive PDF report,
                                            or export the full JSON generated by the cognitIA engine.
                                        </p>
                                    </div>

                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                                        {{-- Knowledge base - disabled for now --}}
                                        <div class="rounded-3xl border border-slate-700/70 bg-slate-950/60 p-5 opacity-60">
                                            <div class="mb-4 flex items-center justify-between gap-3">
                                                <div>
                                                    <h4 class="text-lg font-semibold">
                                                        Knowledge base
                                                    </h4>
                                                    <p class="text-sm text-slate-400 mt-1">
                                                        Coming soon
                                                    </p>
                                                </div>

                                                <span class="rounded-full border border-slate-600 px-3 py-1 text-xs text-slate-400">
                                                    Disabled
                                                </span>
                                            </div>

                                            <p class="text-slate-400 leading-7 mb-5">
                                                This will save the analysis into the future organisational knowledge base,
                                                so it can be retrieved, searched, reused, and connected to future decisions.
                                            </p>

                                            <button
                                                type="button"
                                                disabled
                                                class="w-full cursor-not-allowed rounded-2xl border border-slate-700 px-4 py-3 text-sm font-semibold text-slate-500"
                                            >
                                                Save to knowledge base
                                            </button>
                                        </div>

                                        {{-- PDF export --}}
                                        <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-5">
                                            <div class="mb-4">
                                                <h4 class="text-lg font-semibold">
                                                    Executive PDF report
                                                </h4>
                                                <p class="text-sm text-slate-400 mt-1">
                                                    For sharing or archiving
                                                </p>
                                            </div>

                                            <p class="text-slate-300 leading-7 mb-5">
                                                Generate an executive report with a cover page, summary, recommendation,
                                                strategic options, risks, open questions, next steps, and role-based reasoning.
                                            </p>

                                            <button
                                                type="button"
                                                id="downloadPdfBtn"
                                                class="w-full rounded-2xl bg-cyan-300 px-4 py-3 text-sm font-semibold text-slate-950 hover:bg-cyan-200 transition"
                                            >
                                                Download PDF
                                            </button>
                                        </div>

                                        {{-- JSON export --}}
                                        <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-5">
                                            <div class="mb-4">
                                                <h4 class="text-lg font-semibold">
                                                    Full JSON
                                                </h4>
                                                <p class="text-sm text-slate-400 mt-1">
                                                    For external technical use
                                                </p>
                                            </div>

                                            <p class="text-slate-300 leading-7 mb-5">
                                                Download the complete response returned by the backend, including internal state,
                                                outputs by thinking mode, roles, risks, questions, recommendation, and metadata.
                                            </p>

                                            <button
                                                type="button"
                                                id="downloadJsonBtn"
                                                class="w-full rounded-2xl border border-cyan-400/40 px-4 py-3 text-sm font-semibold text-cyan-300 hover:bg-cyan-400/10 transition"
                                            >
                                                Download JSON
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @else
                        <div id="analysisIdle" class="h-full min-h-[320px] flex items-center justify-center">
                            <div class="text-center max-w-2xl">
                                <h2 class="text-2xl font-semibold mb-4">Analysis output</h2>
                                <p class="text-slate-300 leading-8">
                                    Submit a strategic case to receive a recommendation, alternative options,
                                    and the underlying multi-role reasoning.
                                </p>
                            </div>
                        </div>

                        <div id="analysisLoading" class="hidden h-full min-h-[496px] flex items-center justify-center">
                            <div class="w-full max-w-5xl text-center">
                                <div class="thinking-god-shell">
                                    <div class="thinking-grid"></div>

                                    <div class="thinking-visual">
                                        <div class="thinking-orbit orbit-1"></div>
                                        <div class="thinking-orbit orbit-2"></div>
                                        <div class="thinking-orbit orbit-3"></div>

                                        <div class="thinking-halo"></div>
                                        <div class="thinking-halo h2"></div>
                                        <div class="thinking-halo h3"></div>

                                        <div class="thinking-layer back">
                                            <div class="thinking-line violet l13"></div>
                                            <div class="thinking-line violet l14"></div>
                                            <div class="thinking-node violet b1"></div>
                                            <div class="thinking-node violet b2"></div>
                                            <div class="thinking-node violet b3"></div>
                                            <div class="thinking-node violet b4"></div>
                                        </div>

                                        <div class="thinking-layer mid">
                                            <div class="thinking-line gold l11"></div>
                                            <div class="thinking-line gold l12"></div>
                                        </div>

                                        <div class="thinking-layer front">
                                            <div class="thinking-line l1"></div>
                                            <div class="thinking-line l2"></div>
                                            <div class="thinking-line l3"></div>
                                            <div class="thinking-line l4"></div>
                                            <div class="thinking-line l5"></div>
                                            <div class="thinking-line l6"></div>
                                            <div class="thinking-line l7"></div>
                                            <div class="thinking-line l8"></div>
                                            <div class="thinking-line violet l9"></div>
                                            <div class="thinking-line violet l10"></div>

                                            <div class="thinking-node p1"></div>
                                            <div class="thinking-node p2"></div>
                                            <div class="thinking-node p3"></div>
                                            <div class="thinking-node p4"></div>
                                            <div class="thinking-node violet p5"></div>
                                            <div class="thinking-node violet p6"></div>
                                            <div class="thinking-node gold p7"></div>
                                            <div class="thinking-node gold p8"></div>

                                            <div class="thinking-core"></div>

                                            <div class="thinking-role ceo">
                                                <div class="thinking-role-badge">
                                                    <span class="thinking-role-dot"></span> Agent
                                                </div>
                                            </div>

                                            <div class="thinking-role cfo">
                                                <div class="thinking-role-badge violet">
                                                    <span class="thinking-role-dot"></span> Agent
                                                </div>
                                            </div>

                                            <div class="thinking-role cto">
                                                <div class="thinking-role-badge">
                                                    <span class="thinking-role-dot"></span> Agent
                                                </div>
                                            </div>

                                            <div class="thinking-role cpo">
                                                <div class="thinking-role-badge violet">
                                                    <span class="thinking-role-dot"></span> Agent
                                                </div>
                                            </div>

                                            <div class="thinking-role cdo">
                                                <div class="thinking-role-badge gold">
                                                    <span class="thinking-role-dot"></span> Agent
                                                </div>
                                            </div>

                                            <div class="thinking-role cso">
                                                <div class="thinking-role-badge gold">
                                                    <span class="thinking-role-dot"></span> Agent
                                                </div>
                                            </div>

                                            <div class="thinking-role blue">
                                                <div class="thinking-role-badge">
                                                    <span class="thinking-role-dot"></span> cognitIA Core
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="thinking-stream">
                                        <div class="thinking-stream-step active">
                                            <span class="thinking-mode">White</span>
                                            <span class="thinking-mode-sub">Evidence</span>
                                        </div>
                                        <div class="thinking-stream-step">
                                            <span class="thinking-mode">Red</span>
                                            <span class="thinking-mode-sub">Intuition</span>
                                        </div>
                                        <div class="thinking-stream-step">
                                            <span class="thinking-mode">Black</span>
                                            <span class="thinking-mode-sub">Risks</span>
                                        </div>
                                        <div class="thinking-stream-step">
                                            <span class="thinking-mode">Yellow</span>
                                            <span class="thinking-mode-sub">Upside</span>
                                        </div>
                                        <div class="thinking-stream-step">
                                            <span class="thinking-mode">Green</span>
                                            <span class="thinking-mode-sub">Alternatives</span>
                                        </div>
                                        <div class="thinking-stream-step">
                                            <span class="thinking-mode">Blue</span>
                                            <span class="thinking-mode-sub">Synthesis</span>
                                        </div>
                                    </div>

                                    <div class="thinking-feed">
                                        <div class="thinking-feed-item" id="thinkingFeedLine">
                                            <span class="thinking-feed-pulse"></span>
                                            <span id="thinkingFeedText">Interpreting strategic intent and extracting implicit constraints</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="thinking-title">
                                    <h2 class="text-3xl font-semibold mb-3">
                                        cognitIA is thinking
                                        <span class="thinking-dots"><span>.</span><span>.</span><span>.</span></span>
                                    </h2>

                                    <p class="text-slate-300 text-base leading-7 max-w-3xl mx-auto">
                                        Your advisory council is evaluating the case across evidence, intuition,
                                        risks, opportunities, alternatives, and synthesis.
                                    </p>

                                    <div class="thinking-timer" aria-live="polite">
                                        <span class="thinking-clock" aria-hidden="true"></span>
                                        <span>Elapsed time:</span>
                                        <span id="analysisElapsedTimer" class="font-semibold tabular-nums">00:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('analysisForm');
            const idle = document.getElementById('analysisIdle');
            const loading = document.getElementById('analysisLoading');
            const submitBtn = document.getElementById('analysisSubmitBtn');

            const feedText = document.getElementById('thinkingFeedText');
            const streamSteps = document.querySelectorAll('.thinking-stream-step');
            const elapsedTimer = document.getElementById('analysisElapsedTimer');
            const elapsedResult = document.getElementById('analysisElapsedResult');
            const elapsedOverview = document.getElementById('analysisElapsedOverview');

            const thinkingMessages = [
                'Interpreting strategic intent and extracting implicit constraints',
                'Activating advisory agents and aligning cognitive perspectives',
                'Collecting evidence and clarifying what is known',
                'Surfacing intuition, stakeholder reactions, and weak signals',
                'Stress-testing risks, assumptions, and execution bottlenecks',
                'Mapping upside scenarios and validating opportunity space',
                'Exploring alternative pathways and modular rollout strategies',
                'Synthesizing recommendation, trade-offs, and next steps'
            ];

            let feedInterval = null;
            let stepInterval = null;
            let timerInterval = null;

            function formatElapsed(ms) {
                if (!Number.isFinite(ms) || ms < 0) {
                    return '00:00';
                }

                const totalSeconds = Math.floor(ms / 1000);
                const minutes = Math.floor(totalSeconds / 60);
                const seconds = totalSeconds % 60;

                return String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
            }

            function updateElapsedDisplays(ms) {
                const formatted = formatElapsed(ms);

                if (elapsedTimer) elapsedTimer.textContent = formatted;
                if (elapsedResult) elapsedResult.textContent = formatted;
                if (elapsedOverview) elapsedOverview.textContent = formatted;
            }

            function getStoredAnalysisStart() {
                const raw = window.localStorage.getItem('cognitia_analysis_started_at');
                const parsed = raw ? parseInt(raw, 10) : NaN;
                return Number.isFinite(parsed) ? parsed : null;
            }

            function startThinkingExperience() {
                let msgIndex = 0;
                let stepIndex = 0;

                if (feedText) {
                    feedText.textContent = thinkingMessages[0];
                }

                if (feedInterval) clearInterval(feedInterval);
                if (stepInterval) clearInterval(stepInterval);
                if (timerInterval) clearInterval(timerInterval);

                const startedAt = getStoredAnalysisStart() || Date.now();
                updateElapsedDisplays(Date.now() - startedAt);

                timerInterval = setInterval(() => {
                    updateElapsedDisplays(Date.now() - startedAt);
                }, 1000);

                feedInterval = setInterval(() => {
                    msgIndex = (msgIndex + 1) % thinkingMessages.length;
                    if (feedText) {
                        feedText.textContent = thinkingMessages[msgIndex];
                    }
                }, 2400);

                stepInterval = setInterval(() => {
                    streamSteps.forEach((step, idx) => {
                        if (idx === stepIndex) {
                            step.classList.add('active');
                        } else {
                            step.classList.remove('active');
                        }
                    });

                    stepIndex = (stepIndex + 1) % streamSteps.length;
                }, 1600);
            }

            if (form) {
                form.addEventListener('submit', function () {
                    if (idle) idle.classList.add('hidden');
                    if (loading) loading.classList.remove('hidden');

                    window.localStorage.setItem('cognitia_analysis_started_at', String(Date.now()));

                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Thinking...';
                        submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
                    }

                    startThinkingExperience();
                });
            }

            const storedStartedAt = getStoredAnalysisStart();
            if (storedStartedAt && (elapsedResult || elapsedOverview)) {
                updateElapsedDisplays(Date.now() - storedStartedAt);
                window.localStorage.removeItem('cognitia_analysis_started_at');
            }

            const mainTabButtons = document.querySelectorAll('.main-tab-btn');
            const mainTabPanels = document.querySelectorAll('.main-tab-panel');

            mainTabButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const target = this.dataset.tab;

                    mainTabButtons.forEach(b => {
                        b.classList.remove('tab-btn-active');
                        b.classList.add('tab-btn-inactive');
                    });

                    this.classList.remove('tab-btn-inactive');
                    this.classList.add('tab-btn-active');

                    mainTabPanels.forEach(panel => {
                        panel.classList.add('hidden-panel');
                    });

                    const targetPanel = document.getElementById('tab-' + target);
                    if (targetPanel) {
                        targetPanel.classList.remove('hidden-panel');
                    }
                });
            });

            const roleButtons = document.querySelectorAll('.role-tab-btn');
            const rolePanels = document.querySelectorAll('.role-panel');

            roleButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const targetRole = this.dataset.role;

                    roleButtons.forEach(b => {
                        b.classList.remove('role-btn-active');
                        b.classList.add('role-btn-inactive');
                    });

                    this.classList.remove('role-btn-inactive');
                    this.classList.add('role-btn-active');

                    rolePanels.forEach(panel => {
                        panel.classList.add('hidden-panel');
                    });

                    const targetPanel = document.getElementById('role-panel-' + targetRole);
                    if (targetPanel) {
                        targetPanel.classList.remove('hidden-panel');
                    }
                });
            });

            const downloadJsonBtn = document.getElementById('downloadJsonBtn');
            const downloadPdfBtn = document.getElementById('downloadPdfBtn');

            if (downloadJsonBtn) {
                downloadJsonBtn.addEventListener('click', function () {
                    const jsonScript = document.getElementById('analysisResultJson');

                    if (!jsonScript) {
                        alert('No analysis result is available to download.');
                        return;
                    }

                    let jsonText = jsonScript.textContent.trim();

                    if (!jsonText) {
                        alert('The analysis result is empty.');
                        return;
                    }

                    try {
                        const parsed = JSON.parse(jsonText);
                        jsonText = JSON.stringify(parsed, null, 2);
                    } catch (error) {
                        console.error('Invalid JSON result:', error);
                        alert('The analysis result could not be exported as JSON.');
                        return;
                    }

                    const blob = new Blob([jsonText], {
                        type: 'application/json;charset=utf-8'
                    });

                    const now = new Date();
                    const timestamp = now
                        .toISOString()
                        .replace(/[:.]/g, '-')
                        .slice(0, 19);

                    const filename = `cognitia-analysis-${timestamp}.json`;

                    const url = URL.createObjectURL(blob);
                    const link = document.createElement('a');

                    link.href = url;
                    link.download = filename;

                    document.body.appendChild(link);
                    link.click();

                    document.body.removeChild(link);
                    URL.revokeObjectURL(url);
                });
            }

            if (downloadPdfBtn) {
                downloadPdfBtn.addEventListener('click', function () {
                    const jsonScript = document.getElementById('analysisResultJson');

                    if (!jsonScript) {
                        alert('No analysis result is available to export.');
                        return;
                    }

                    let result;

                    try {
                        result = JSON.parse(jsonScript.textContent.trim());
                    } catch (error) {
                        console.error('Invalid JSON result:', error);
                        alert('The analysis result could not be exported as PDF.');
                        return;
                    }

                    const reportTitle = prompt(
                        'Report title',
                        'Strategic Decision Report'
                    );

                    if (!reportTitle) {
                        return;
                    }

                    generateCognitiaPdfReport(result, reportTitle);
                });
            }

            function generateCognitiaPdfReport(exportData, reportTitle) {
                if (!window.jsPDF) {
                    alert('PDF library is not available. Please check that jsPDF is installed and loaded.');
                    return;
                }

                const payload = exportData.response ? exportData.response : exportData;
                const requestPayload = exportData.request || {};
                const metadata = exportData.metadata || {};

                const doc = new window.jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                const page = {
                    width: 210,
                    height: 297,
                    marginX: 18,
                    marginTop: 20,
                    marginBottom: 20
                };

                const usableWidth = page.width - (page.marginX * 2);
                let y = page.marginTop;

                const state = payload.state || {};
                const options = payload.options || {};
                const outputs = state.outputs || {};
                const risks = state.risks || [];
                const openQuestions = state.open_questions || [];
                const nextSteps = state.next_steps || [];

                const recommendation = payload.recommendation || '-';
                const executiveSummary = payload.executive_summary || '';
                const confidence = payload.decision_confidence || '-';
                const finalHat = payload.final_hat || '-';
                const mode = payload.mode || '-';
                const runId = payload.run_id || '-';
                const interpretedBrief = state.interpreted_brief || '';
                const originalIdea = requestPayload.idea || state.idea || getCurrentIdeaText() || '';
                const configuredRoles = requestPayload.roles || [];

                const interactions = countInteractions(outputs);
                const totalTime = getDisplayedTotalTime();

                function addPageIfNeeded(requiredSpace = 20) {
                    if (y + requiredSpace > page.height - page.marginBottom) {
                        doc.addPage();
                        y = page.marginTop;
                        addPageHeader();
                    }
                }

                function addPageHeader() {
                    doc.setFont('helvetica', 'bold');
                    doc.setFontSize(9);
                    doc.setTextColor(14, 165, 233);
                    doc.text('cognitIA', page.marginX, 12);

                    doc.setFont('helvetica', 'normal');
                    doc.setFontSize(8);
                    doc.setTextColor(120, 120, 120);
                    doc.text('AI-generated strategic reasoning report', page.width - page.marginX, 12, {
                        align: 'right'
                    });

                    doc.setDrawColor(220, 220, 220);
                    doc.line(page.marginX, 15, page.width - page.marginX, 15);
                }

                function addSectionTitle(title) {
                    addPageIfNeeded(18);

                    y += 4;
                    doc.setFont('helvetica', 'bold');
                    doc.setFontSize(13);
                    doc.setTextColor(15, 23, 42);
                    doc.text(title, page.marginX, y);
                    y += 7;

                    doc.setDrawColor(14, 165, 233);
                    doc.line(page.marginX, y, page.marginX + 32, y);
                    y += 6;
                }

                function addParagraph(text, options = {}) {
                    if (!text) {
                        return;
                    }

                    const fontSize = options.fontSize || 10;
                    const lineHeight = options.lineHeight || 5.5;
                    const color = options.color || [45, 55, 72];
                    const indent = options.indent || 0;
                    const width = usableWidth - indent;

                    doc.setFont('helvetica', options.bold ? 'bold' : 'normal');
                    doc.setFontSize(fontSize);
                    doc.setTextColor(...color);

                    const lines = doc.splitTextToSize(String(text), width);

                    lines.forEach(line => {
                        addPageIfNeeded(lineHeight + 2);
                        doc.text(line, page.marginX + indent, y);
                        y += lineHeight;
                    });

                    y += 2;
                }

                function addKeyValue(label, value) {
                    addPageIfNeeded(10);

                    doc.setFont('helvetica', 'bold');
                    doc.setFontSize(9);
                    doc.setTextColor(71, 85, 105);
                    doc.text(label, page.marginX, y);

                    doc.setFont('helvetica', 'normal');
                    doc.setTextColor(15, 23, 42);

                    const text = String(value || '-');
                    const lines = doc.splitTextToSize(text, usableWidth - 52);
                    doc.text(lines, page.marginX + 52, y);

                    y += Math.max(7, lines.length * 5);
                }

                function addBulletList(items) {
                    if (!items || items.length === 0) {
                        addParagraph('No items available.', {
                            color: [100, 116, 139]
                        });
                        return;
                    }

                    items.forEach(item => {
                        addPageIfNeeded(12);

                        doc.setFont('helvetica', 'normal');
                        doc.setFontSize(10);
                        doc.setTextColor(45, 55, 72);

                        const lines = doc.splitTextToSize(String(item), usableWidth - 8);

                        doc.text('•', page.marginX, y);
                        doc.text(lines, page.marginX + 6, y);

                        y += Math.max(7, lines.length * 5.5);
                    });

                    y += 2;
                }

                function addCoverPage() {
                    doc.setFillColor(2, 6, 23);
                    doc.rect(0, 0, page.width, page.height, 'F');

                    doc.setTextColor(103, 232, 249);
                    doc.setFont('helvetica', 'bold');
                    doc.setFontSize(12);
                    doc.text('COGNITIA', page.marginX, 42);

                    doc.setTextColor(255, 255, 255);
                    doc.setFontSize(28);

                    const titleLines = doc.splitTextToSize(reportTitle, usableWidth);
                    doc.text(titleLines, page.marginX, 72);

                    doc.setFont('helvetica', 'normal');
                    doc.setFontSize(12);
                    doc.setTextColor(203, 213, 225);

                    const subtitle = 'Executive report generated from a multi-perspective AI advisory analysis.';
                    const subtitleLines = doc.splitTextToSize(subtitle, usableWidth);
                    doc.text(subtitleLines, page.marginX, 102 + titleLines.length * 8);

                    doc.setDrawColor(103, 232, 249);
                    doc.line(page.marginX, 135, page.width - page.marginX, 135);

                    doc.setFontSize(10);
                    doc.setTextColor(148, 163, 184);

                    doc.text('Generated by cognitIA', page.marginX, 155);
                    doc.text('Run ID: ' + runId, page.marginX, 163);
                    doc.text('Mode: ' + String(mode).toUpperCase(), page.marginX, 171);
                    doc.text('Confidence: ' + confidence, page.marginX, 179);
                    doc.text('Total time: ' + totalTime, page.marginX, 187);
                    doc.text('Interactions: ' + interactions, page.marginX, 195);

                    if (metadata.generated_at) {
                        doc.text('Generated at: ' + metadata.generated_at, page.marginX, 203);
                    }

                    doc.setFontSize(9);
                    doc.setTextColor(100, 116, 139);
                    doc.text('This report is AI-generated and should be reviewed by qualified decision-makers before use.', page.marginX, 260);

                    doc.addPage();
                    y = page.marginTop;
                    addPageHeader();
                }

                function addOptions() {
                    if (!options || Object.keys(options).length === 0) {
                        addParagraph('No strategic options available.', {
                            color: [100, 116, 139]
                        });
                        return;
                    }

                    Object.entries(options).forEach(([key, value]) => {
                        addPageIfNeeded(22);

                        doc.setFont('helvetica', 'bold');
                        doc.setFontSize(11);
                        doc.setTextColor(15, 23, 42);
                        doc.text('Option ' + key, page.marginX, y);
                        y += 6;

                        addParagraph(value);
                    });
                }

                function addConfiguredRolesSummary() {
                    if (!configuredRoles || configuredRoles.length === 0) {
                        addParagraph('No configured advisory roles were included in the exported request.', {
                            color: [100, 116, 139]
                        });
                        return;
                    }

                    configuredRoles.forEach((role, index) => {
                        addPageIfNeeded(34);

                        const code = role.code || '-';
                        const name = role.name || '-';
                        const title = role.title || '-';
                        const profile = role.profile || role.profile_prompt || '-';

                        doc.setFillColor(248, 250, 252);
                        doc.setDrawColor(226, 232, 240);
                        doc.roundedRect(page.marginX, y - 4, usableWidth, 28, 3, 3);

                        doc.setFont('helvetica', 'bold');
                        doc.setFontSize(10);
                        doc.setTextColor(15, 23, 42);
                        doc.text(`${index + 1}. ${code}`, page.marginX + 4, y + 3);

                        doc.setFont('helvetica', 'normal');
                        doc.setFontSize(9);
                        doc.setTextColor(71, 85, 105);

                        const titleText = `${name}${title && title !== '-' ? ' — ' + title : ''}`;
                        const titleLines = doc.splitTextToSize(titleText, usableWidth - 8);
                        doc.text(titleLines, page.marginX + 4, y + 9);

                        y += 25;

                        doc.setFont('helvetica', 'normal');
                        doc.setFontSize(9);
                        doc.setTextColor(45, 55, 72);

                        const profileLines = doc.splitTextToSize(profile, usableWidth);
                        profileLines.forEach(line => {
                            addPageIfNeeded(6);
                            doc.text(line, page.marginX, y);
                            y += 5;
                        });

                        y += 5;
                    });
                }

                function addRoleReasoning() {
                    const roleCodes = extractRoleCodes(outputs);

                    if (roleCodes.length === 0) {
                        addParagraph('No role-level reasoning available.');
                        return;
                    }

                    roleCodes.forEach(roleCode => {
                        addPageIfNeeded(20);

                        doc.setFont('helvetica', 'bold');
                        doc.setFontSize(11);
                        doc.setTextColor(15, 23, 42);
                        doc.text(roleCode, page.marginX, y);
                        y += 7;

                        Object.entries(outputs).forEach(([hat, hatOutputs]) => {
                            if (!hatOutputs || !hatOutputs[roleCode] || hatOutputs[roleCode].length === 0) {
                                return;
                            }

                            const entry = hatOutputs[roleCode][0];

                            addPageIfNeeded(18);

                            doc.setFont('helvetica', 'bold');
                            doc.setFontSize(9);
                            doc.setTextColor(14, 165, 233);
                            doc.text(hat, page.marginX, y);
                            y += 5;

                            addParagraph(entry.content || '', {
                                fontSize: 9.5,
                                lineHeight: 5
                            });

                            if (entry.questions && entry.questions.length > 0) {
                                doc.setFont('helvetica', 'bold');
                                doc.setFontSize(8.5);
                                doc.setTextColor(71, 85, 105);
                                doc.text('Questions raised', page.marginX, y);
                                y += 5;

                                addBulletList(entry.questions);
                            }
                        });

                        y += 4;
                    });
                }

                addCoverPage();

                addSectionTitle('1. Executive Summary');
                addKeyValue('Recommended path', recommendation);
                addKeyValue('Confidence', confidence);
                addKeyValue('Final thinking mode', finalHat);
                addKeyValue('Total time', totalTime);
                addKeyValue('Interactions', interactions);
                addParagraph(executiveSummary);

                if (originalIdea) {
                    addSectionTitle('2. Original Case');
                    addParagraph(originalIdea);
                }

                if (interpretedBrief) {
                    addSectionTitle('3. How cognitIA Interpreted the Challenge');
                    addParagraph(interpretedBrief);
                }

                addSectionTitle('4. Strategic Options');
                addOptions();

                addSectionTitle('5. Key Risks');
                addBulletList(risks);

                addSectionTitle('6. Open Questions');
                addBulletList(openQuestions);

                addSectionTitle('7. Recommended Next Steps');
                addBulletList(nextSteps);

                addSectionTitle('8. Advisory Roles Used');
                addConfiguredRolesSummary();

                addSectionTitle('9. Role-Based Reasoning');
                addRoleReasoning();

                addSectionTitle('10. Metadata');
                addKeyValue('Run ID', runId);
                addKeyValue('Mode', String(mode).toUpperCase());
                addKeyValue('Final hat', finalHat);
                addKeyValue('Decision confidence', confidence);
                addKeyValue('Generated at', metadata.generated_at || new Date().toLocaleString());

                const safeTitle = reportTitle
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/(^-|-$)/g, '')
                    .slice(0, 60) || 'cognitia-report';

                doc.save(`${safeTitle}.pdf`);
            }

            function getCurrentIdeaText() {
                const textarea = document.querySelector('textarea[name="idea"]');
                return textarea ? textarea.value.trim() : '';
            }

            function getDisplayedTotalTime() {
                const totalTimeElement = document.querySelector('[data-total-time]');

                if (totalTimeElement && totalTimeElement.textContent.trim()) {
                    return totalTimeElement.textContent.trim();
                }

                const possibleTime = Array.from(document.querySelectorAll('#tab-overview *'))
                    .map(el => el.textContent.trim())
                    .find(text => /^\d{2}:\d{2}$/.test(text));

                return possibleTime || '-';
            }

            function countInteractions(outputs) {
                let count = 0;

                Object.values(outputs || {}).forEach(hatOutputs => {
                    Object.values(hatOutputs || {}).forEach(roleEntries => {
                        if (Array.isArray(roleEntries)) {
                            count += roleEntries.length;
                        }
                    });
                });

                return count;
            }

            function extractRoleCodes(outputs) {
                const codes = [];

                Object.values(outputs || {}).forEach(hatOutputs => {
                    Object.keys(hatOutputs || {}).forEach(roleCode => {
                        if (!codes.includes(roleCode)) {
                            codes.push(roleCode);
                        }
                    });
                });

                return codes;
            }
        });
    </script>

</body>
</html>
