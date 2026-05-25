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
            max-width: 760px;
            margin: 0 auto 2rem;
            padding: 26px;
            border-radius: 36px;
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
            height: 390px;
            border-radius: 30px;
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
            margin-top: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .thinking-stream-step {
            position: relative;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(15,23,42,0.76);
            border: 1px solid rgba(255,255,255,0.10);
            color: #cbd5e1;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            overflow: hidden;
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
            margin-top: 20px;
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
            padding: 10px 16px;
            border-radius: 18px;
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
            margin-top: 18px;
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
    <div class="max-w-7xl mx-auto px-6 py-12">
        <header class="mb-8 flex items-start justify-between gap-6">
            <div>
                <div class="text-cyan-400 text-sm tracking-[0.35em] uppercase mb-4">
                    COGNITIA
                </div>

                <h1 class="text-4xl font-bold mb-6">
                    Strategic Decision Cockpit
                </h1>

                <p class="max-w-3xl text-lg leading-8 text-slate-100">
                    Describe a strategic idea, opportunity, or dilemma in your own words.
                    The system will interpret it, activate the relevant executive roles,
                    and return a structured recommendation.
                </p>
            </div>

            @if (auth()->check())
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button
                        type="submit"
                        class="rounded-xl border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:border-cyan-400 hover:text-cyan-300 transition"
                    >
                        Logout
                    </button>
                </form>
            @endif
        </header>

        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-red-400/30 bg-red-400/10 px-4 py-3 text-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
            <div class="xl:col-span-5">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl">
                    <h2 class="text-2xl font-semibold mb-6">Describe the case</h2>

                    <form method="POST" action="{{ route('cognitive-hat.analyze') }}" class="space-y-5" id="analysisForm">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium mb-3">Strategic idea</label>
                            <textarea
                                name="idea"
                                rows="14"
                                class="w-full rounded-3xl bg-slate-900/70 border border-white/10 px-5 py-4 text-white leading-8"
                                placeholder="Example: We are a small company with limited technical and economic resources, but we see an opportunity in SMEs in Spain that need automation..."
                            >{{ old('idea') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            id="analysisSubmitBtn"
                            class="w-full rounded-2xl bg-cyan-300 text-slate-950 font-semibold px-5 py-4 hover:bg-cyan-200 transition"
                        >
                            Run analysis
                        </button>
                    </form>
                </div>
            </div>

            <div class="xl:col-span-7">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl min-h-[420px]">
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
                            $roles = ['CEO', 'CPO', 'CFO', 'CDO', 'CSO', 'CTO'];
                            $outputs = $state['outputs'] ?? [];
                        @endphp

                        <div class="mb-8">
                            <p class="text-sm uppercase tracking-[0.2em] text-cyan-300 mb-3">
                                Primary recommendation
                            </p>

                            <div class="rounded-3xl border border-emerald-400/20 bg-emerald-400/10 p-6">
                                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5">
                                    <div>
                                        <div class="text-slate-300 text-sm mb-2">Recommended path</div>
                                        <div class="text-5xl font-bold mb-3">{{ $recommendation }}</div>
                                        <p class="text-slate-200 leading-8 max-w-3xl">
                                            {{ $result['executive_summary'] ?? '' }}
                                        </p>
                                    </div>

                                    <div class="shrink-0 grid grid-cols-1 gap-3 min-w-[180px]">
                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                            <div class="text-xs uppercase tracking-[0.16em] text-slate-400 mb-1">Confidence</div>
                                            <div class="text-xl font-semibold capitalize">{{ $confidence }}</div>
                                        </div>

                                        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                            <div class="text-xs uppercase tracking-[0.16em] text-slate-400 mb-1">Run ID</div>
                                            <div class="text-sm text-slate-300 break-all">{{ $result['run_id'] ?? '' }}</div>
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
                            </div>

                            <div id="tab-overview" class="main-tab-panel">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Mode</p>
                                        <p class="text-xl font-semibold">{{ strtoupper($result['mode'] ?? '-') }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Final Hat</p>
                                        <p class="text-xl font-semibold">{{ $result['final_hat'] ?? '-' }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                        <p class="text-sm text-slate-400 mb-1">Questions</p>
                                        <p class="text-xl font-semibold">{{ count($openQuestions) }}</p>
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

                        <div id="analysisLoading" class="hidden h-full min-h-[520px] flex items-center justify-center">
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
                                                    <span class="thinking-role-dot"></span> CEO
                                                </div>
                                            </div>

                                            <div class="thinking-role cfo">
                                                <div class="thinking-role-badge violet">
                                                    <span class="thinking-role-dot"></span> CFO
                                                </div>
                                            </div>

                                            <div class="thinking-role cto">
                                                <div class="thinking-role-badge">
                                                    <span class="thinking-role-dot"></span> CTO
                                                </div>
                                            </div>

                                            <div class="thinking-role cpo">
                                                <div class="thinking-role-badge violet">
                                                    <span class="thinking-role-dot"></span> CPO
                                                </div>
                                            </div>

                                            <div class="thinking-role cdo">
                                                <div class="thinking-role-badge gold">
                                                    <span class="thinking-role-dot"></span> CDO
                                                </div>
                                            </div>

                                            <div class="thinking-role cso">
                                                <div class="thinking-role-badge gold">
                                                    <span class="thinking-role-dot"></span> CSO
                                                </div>
                                            </div>

                                            <div class="thinking-role blue">
                                                <div class="thinking-role-badge">
                                                    <span class="thinking-role-dot"></span> BLUE HAT
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="thinking-stream">
                                        <div class="thinking-stream-step active">WHITE HAT</div>
                                        <div class="thinking-stream-step active">YELLOW HAT</div>
                                        <div class="thinking-stream-step active">BLACK HAT</div>
                                        <div class="thinking-stream-step active">GREEN HAT</div>
                                        <div class="thinking-stream-step active">BLUE HAT</div>
                                    </div>

                                    <div class="thinking-feed">
                                        <div class="thinking-feed-item" id="thinkingFeedLine">
                                            <span class="thinking-feed-pulse"></span>
                                            <span id="thinkingFeedText">Interpreting strategic intent and extracting implicit constraints</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="thinking-title">
                                    <h2 class="text-4xl font-semibold mb-3">
                                        Agents are thinking
                                        <span class="thinking-dots"><span>.</span><span>.</span><span>.</span></span>
                                    </h2>

                                    <p class="text-slate-300 text-lg leading-8 max-w-3xl mx-auto">
                                        A multi-role executive network is mapping intent, challenging assumptions,
                                        testing alternatives, and converging on a board-ready recommendation.
                                    </p>

                                    <p class="text-slate-500 text-sm mt-4">
                                        Executive council active: CEO · CFO · CTO · CPO · CDO · CSO · Blue Hat Orchestrator
                                    </p>
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

            const thinkingMessages = [
                'Interpreting strategic intent and extracting implicit constraints',
                'Activating executive roles and aligning cognitive perspectives',
                'Mapping upside scenarios and validating opportunity space',
                'Stress-testing assumptions, risks, and execution bottlenecks',
                'Exploring alternative pathways and modular rollout strategies',
                'Synthesizing recommendation, trade-offs, and next steps'
            ];

            let feedInterval = null;
            let stepInterval = null;

            function startThinkingExperience() {
                let msgIndex = 0;
                let stepIndex = 0;

                if (feedText) {
                    feedText.textContent = thinkingMessages[0];
                }

                if (feedInterval) clearInterval(feedInterval);
                if (stepInterval) clearInterval(stepInterval);

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

                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Thinking...';
                        submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
                    }

                    startThinkingExperience();
                });
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
        });
    </script>

</body>
</html>
