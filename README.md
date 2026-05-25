# cognitIA - Strategic Cognitive Board

Frontend for the **Strategic Cognitive Board of cognitIA**: a multi-agent decision interface designed to make executive reasoning visible, traceable, and actionable.

This UI is not a generic chat frontend. It is the presentation layer of a structured reasoning system in which **organisational roles** operate under **Six Thinking Hats** as controlled reasoning protocols, with transparent orchestration and governed synthesis. :contentReference[oaicite:1]{index=1} :contentReference[oaicite:2]{index=2}

---

## What this UI does

The UI allows users to:

- Submit a **strategic brief** as free text
- Optionally attach supporting context such as documents, spreadsheets, or constraints
- Trigger the execution of the reasoning engine through a REST API
- Visualise the progression of the reasoning flow across hats and agents
- Inspect intermediate outputs instead of receiving only a final answer
- Review the final structured synthesis together with its reasoning trace

The design principle is simple:

> **You don’t just get an answer. You see thinking.** :contentReference[oaicite:3]{index=3}

---

## Why this interface exists

Traditional AI tools are optimised for speed, but high-stakes executive decisions require something else: **disciplined multi-perspective reasoning**. The UI exists to make that process visible and usable for boards, executive committees, and strategic discussions. :contentReference[oaicite:4]{index=4}

This interface was built to support:

- executive-grade transparency
- structured disagreement
- auditable reasoning
- governance-ready outputs
- better usability and adoption than a backend-only prototype :contentReference[oaicite:5]{index=5} :contentReference[oaicite:6]{index=6}

---

## Product principles

### 1. Transparency is the product
The UI exposes the system’s intermediate reasoning rather than hiding it behind a single opaque output. This improves trust, explainability, and governance readiness. :contentReference[oaicite:7]{index=7} :contentReference[oaicite:8]{index=8}

### 2. Roles are the agents
The system does not model hats as agents. Instead, the agents are organisational roles such as CEO, CFO, CTO, CPO, CDO, and CSO. The UI reflects that distinction clearly. :contentReference[oaicite:9]{index=9} :contentReference[oaicite:10]{index=10}

### 3. Hats are reasoning protocols
The interface makes visible how the same role changes reasoning mode across iterations: facts, intuition, risks, upside, alternatives, and synthesis. :contentReference[oaicite:11]{index=11}

### 4. Governed output matters more than raw generation
The goal is not to produce “more AI text”, but a **structured decision** backed by a visible reasoning trail. :contentReference[oaicite:12]{index=12}

---

## Core user experience

A typical flow looks like this:

1. The user enters a **strategic decision brief**
2. The backend normalises the decision space
3. The engine runs sequential reasoning across roles and hats
4. The UI shows live execution feedback
5. Intermediate outputs are displayed by hat / role
6. A final synthesis is presented with rationale, risks, and mitigation

The current concept shown in the presentation includes:

- real-time agent activity visualisation
- reasoning by hat, kept structured and separated
- streaming outputs
- traceable decision path
- governed synthesis output :contentReference[oaicite:13]{index=13}

---

## Tech stack

According to the current architecture, the UI layer is built with:

- **Laravel**
- **Blade**
- **Controllers**
- **REST API integration** with the Python reasoning engine

Its purpose is to provide an end-to-end interface from executive input to governed decision output, while keeping a clean separation between orchestration and presentation. :contentReference[oaicite:14]{index=14}

---

## High-level architecture

```text
[User Input]
    ↓
[Laravel UI]
    ↓  REST API
[Python / LangGraph Engine]
    ↓
[Role × Hat reasoning outputs]
    ↓
[Blue Hat synthesis]
    ↓
[UI rendering: decision + reasoning trace]

## Quick start

git clone <your-repository-url>
cd <repository-folder>
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan serve
npm run dev

Navigate to: http://localhost:8001/cognitive-hat