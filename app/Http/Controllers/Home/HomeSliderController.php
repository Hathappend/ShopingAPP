<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Admin\HomeSlideService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class HomeSliderController extends Controller
{
    private HomeSlideService $homeSlideService;
    public function __construct(HomeSlideService $homeSlideService)

    {
        $this->homeSlideService = $homeSlideService;
    }

    public function homeSlider(): View
    {
        $homeslide = HomeSlide::query()->find(1);
        return view('admin.home_slide.all', compact('homeslide'));
    }

    public function updateSlider(Request $request): RedirectResponse
    {
        $slideId = $request->id;

        $request->validate([
            'title' => 'required|string|max:100',
            'short_title' => 'required|string|max:255',
            'video_url' => 'required|string|max:255',
            'home_slide' => ['image', 'mimes:jpeg,png,jpg','max:5120']
        ]);

        $findSlide = HomeSlide::query()->find($slideId);

        $data = $request->except(['_token', 'id']);

        $changes = [];
        foreach ($data as $attr => $value) {
            if ($attr == 'home_slide' && $value->getClientOriginalName() != $findSlide->home_slide) {
                $changes[$attr] = ($attr != 'home_slide') ? $value : time() . '_' . $value->getClientOriginalName();
            }
        }

        if (!empty($changes)) {

            if (!empty($changes['home_slide'])) {
                Storage::delete("public/img/admin/home_slide/{$findSlide->home_slide}");
                $image = Image::read($data['home_slide'])->resize(636, 852);
                $image->save(storage_path("app/public/img/admin/home_slide/{$changes['home_slide']}"));
            }

            $result =  $this->homeSlideService->update($findSlide, $changes);
            if ($result) {
                return redirect()->route('admin.home.slide')->with('success', 'Home Slide Successfully Updated.');
            }
        }

        return redirect()->back()->with('error', 'You not change anything.');

    }
}
