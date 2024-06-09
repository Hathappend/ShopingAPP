<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    private ProfileService $profileService;

    /**
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }


    public function create(): View
    {
        return view('admin.profile.show', ['user' => Auth::user()]);
    }

    public function edit(): View
    {
        return view('admin.profile.edit', ['user' => Auth::user()]);
    }

    public function postEdit(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50',
            'email' => 'required|max:255|email',
            'profile_image' => ['image', 'mimes:jpeg,png,jpg','max:2048']
        ]);

        $user = Auth::user();

        $data = $request->except('_token');
        $changes = [];
        foreach ($data as $attr => $value) {
            if ($attr == 'profile_image' && $value->getClientOriginalName() !== $user->profile_image) {
                $changes[$attr] = ($attr != 'profile_image') ? $value : time() . '_' . $value->getClientOriginalName();
            }
        }

        if (!empty($changes)) {
            $result = $this->profileService->update($changes);
            if ($result) {
                if (!empty($changes['profile_image'])) {
                    Storage::delete("public/img/admin/profile/{$user->profile_image}");
                    $data['profile_image']->storePubliclyAs('/img/admin/profile', $changes['profile_image'], 'public');
                }
                return redirect()->route('admin.profile')->with('success', 'Profile saved.');
            }
        }

        return redirect()->back()->with('error', 'You not change anything.');

    }
}
