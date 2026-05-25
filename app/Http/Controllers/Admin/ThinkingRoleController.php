<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThinkingRole;
use Illuminate\Http\Request;

class ThinkingRoleController extends Controller
{
    public function index()
    {
        $roles = ThinkingRole::where('user_id', auth()->id())
            ->where('model_key', 'cognitive_hat')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.thinking-roles.index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        return view('admin.thinking-roles.create', [
            'role' => new ThinkingRole([
                'model_key' => 'cognitive_hat',
                'is_active' => true,
                'sort_order' => 100,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateRole($request);

        ThinkingRole::create([
            'user_id' => auth()->id(),
            'model_key' => 'cognitive_hat',
            'code' => $data['code'],
            'name' => $data['name'],
            'title' => $data['title'] ?? null,
            'profile_prompt' => $data['profile_prompt'],
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.thinking-roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function edit(ThinkingRole $thinkingRole)
    {
        $this->authorizeUserRole($thinkingRole);

        return view('admin.thinking-roles.edit', [
            'role' => $thinkingRole,
        ]);
    }

    public function update(Request $request, ThinkingRole $thinkingRole)
    {
        $this->authorizeUserRole($thinkingRole);

        $data = $this->validateRole($request, $thinkingRole);

        $thinkingRole->update([
            'code' => $data['code'],
            'name' => $data['name'],
            'title' => $data['title'] ?? null,
            'profile_prompt' => $data['profile_prompt'],
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.thinking-roles.index')
            ->with('success', 'Role updated successfully.');
    }

    public function destroy(ThinkingRole $thinkingRole)
    {
        $this->authorizeUserRole($thinkingRole);

        $thinkingRole->delete();

        return redirect()
            ->route('admin.thinking-roles.index')
            ->with('success', 'Role deleted successfully.');
    }

    private function validateRole(Request $request, ?ThinkingRole $thinkingRole = null): array
    {
        $roleId = $thinkingRole?->id ?? 'NULL';

        return $request->validate([
            'code' => [
                'required',
                'string',
                'max:50',
                'regex:/^[A-Za-z0-9_-]+$/',
                'unique:thinking_roles,code,' . $roleId . ',id,user_id,' . auth()->id() . ',model_key,cognitive_hat',
            ],
            'name' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'profile_prompt' => ['required', 'string', 'min:10'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }

    private function authorizeUserRole(ThinkingRole $thinkingRole): void
    {
        abort_unless(
            $thinkingRole->user_id === auth()->id() &&
            $thinkingRole->model_key === 'cognitive_hat',
            403
        );
    }
}