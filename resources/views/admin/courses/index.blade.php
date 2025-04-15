@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Course</h1>
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('courses.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition" style="text-decoration: none;">
                + Tambah Course
            </a>
        </div>

        <div class="space-y-8 w-full">
            @foreach ($courses as $course)
                <div class="bg-white shadow rounded p-6">
                    <h2 class="text-xl font-semibold">{{ $course->nama_course }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Oleh: {{ $course->user->name }}</p>

                    <div class="flex gap-4 mb-4">
                        <a href="{{ route('courses.edit', $course) }}" class="text-blue-600 hover:underline">Edit</a>
                        <a href="{{ route('courses.show', $course) }}" class="text-green-600 hover:underline">Detail</a>
                        <form method="POST" action="{{ route('courses.destroy', $course) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                        </form>
                    </div>

<<<<<<< HEAD
                    @if ($course->subCourses->count())
                        <div class="ml-4 space-y-4">
                            @foreach ($course->subCourses as $sub)
                                <div class="border rounded p-4">
                                    <h3 class="font-semibold">🧩 {{ $sub->nama_course }}</h3>
                                    <p class="text-sm text-gray-500">Oleh: {{ $sub->user->name ?? '-' }}</p>

                                    @php
                                        function getYoutubeEmbedUrl($url)
                                        {
=======
                    {{-- SubCourses --}}
                    @if($course->subCourses->count())
                        <div class="ms-3">
                            @foreach($course->subCourses as $sub)
                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <h6 class="card-title">🧩 {{ $sub->nama_course }}</h6>
                                    <p class="card-subtitle text-muted mb-2">Oleh: {{ $sub->user->name ?? '-' }}</p>

                                    @php
                                        function getYoutubeEmbedUrl($url) {
>>>>>>> a0f664adf260205f721c1b3f4b8c5e8e9c3d2a47
                                            if (preg_match('/youtu\.be\/([^\?]*)/', $url, $matches)) {
                                                return 'https://www.youtube.com/embed/' . $matches[1];
                                            } elseif (preg_match('/youtube\.com.*v=([^&]*)/', $url, $matches)) {
                                                return 'https://www.youtube.com/embed/' . $matches[1];
                                            }
                                            return null;
                                        }
                                        $embedUrl = getYoutubeEmbedUrl($sub->link_video);
                                    @endphp

<<<<<<< HEAD
                                    @if ($embedUrl)
                                        <iframe class="w-full aspect-video my-2 rounded" src="{{ $embedUrl }}"
                                            frameborder="0" allowfullscreen></iframe>
                                    @else
                                        <p class="text-sm text-red-500">Link video tidak valid.</p>
                                    @endif

                                    <div class="flex gap-3 mt-2">
                                        <a href="{{ route('sub-courses.edit', $sub) }}"
                                            class="text-blue-600 hover:underline">Edit SubCourse</a>
                                        <form method="POST" action="{{ route('sub-courses.destroy', $sub) }}">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic mt-2 ml-4">Belum ada SubCourse.</p>
                    @endif
                </div>
            @endforeach
=======
                                    @if($embedUrl)
                                        <div class="ratio ratio-16x9 mb-3">
                                            <iframe src="{{ $embedUrl }}" allowfullscreen></iframe>
                                        </div>
                                    @else
                                        <p class="text-danger small">Link video tidak valid.</p>
                                    @endif

                                    <a href="{{ route('sub-courses.edit', $sub) }}" class="btn btn-sm btn-outline-primary">Edit SubCourse</a>
                                    <form method="POST" action="{{ route('sub-courses.destroy', $sub) }}" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="fst-italic text-muted ms-3">Belum ada SubCourse.</p>
                    @endif
                </div>
            </div>
>>>>>>> a0f664adf260205f721c1b3f4b8c5e8e9c3d2a47
        </div>
    </div>
@endsection
