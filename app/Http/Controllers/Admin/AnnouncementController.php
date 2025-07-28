<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the announcements.
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created announcement in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => ['required', Rule::in(['kegiatan', 'ujian', 'libur', 'ppdb', 'umum'])],
            'priority' => ['required', Rule::in(['low', 'normal', 'high', 'urgent'])],
            'announcement_date' => 'required|date',
            'valid_until' => 'nullable|date|after_or_equal:announcement_date',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'external_link' => 'nullable|url|max:255',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:10240',
        ]);

        // Handle attachment upload
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('announcements', 'public');
            $validated['attachment_url'] = Storage::url($path);
        }

        // Create announcement
        $announcement = Announcement::create($validated);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil dibuat.');
    }

    /**
     * Show the specified announcement.
     */
    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified announcement.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified announcement in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => ['required', Rule::in(['kegiatan', 'ujian', 'libur', 'ppdb', 'umum'])],
            'priority' => ['required', Rule::in(['low', 'normal', 'high', 'urgent'])],
            'announcement_date' => 'required|date',
            'valid_until' => 'nullable|date|after_or_equal:announcement_date',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'external_link' => 'nullable|url|max:255',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:10240',
        ]);

        // Handle attachment upload
        if ($request->hasFile('attachment')) {
            // Delete old attachment if it exists
            if ($announcement->attachment_url) {
                $oldPath = str_replace('/storage/', '', $announcement->attachment_url);
                Storage::disk('public')->delete($oldPath);
            }

            // Store new attachment
            $path = $request->file('attachment')->store('announcements', 'public');
            $validated['attachment_url'] = Storage::url($path);
        }

        // Update announcement
        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Remove the specified announcement from storage.
     */
    public function destroy(Announcement $announcement)
    {
        // Delete attachment if it exists
        if ($announcement->attachment_url) {
            $path = str_replace('/storage/', '', $announcement->attachment_url);
            Storage::disk('public')->delete($path);
        }

        // Delete announcement
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
