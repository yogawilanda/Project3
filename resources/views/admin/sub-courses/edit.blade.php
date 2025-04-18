@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Sub Course</h1>
        <form method="POST" class="card p-4 " action="{{ route('sub-courses.update', $sub_course) }}">
            @csrf
            @method('PUT')
            {{-- sekarang gini --}}
            <x-input-label name="nama_course" label="Nama SubCourse" :value="$sub_course->nama_course" />

            {{-- sebelumnya gini --}}
            {{-- <label for="nama_course" class="text-sm font-semibold">Nama SubCourse</label>
        <input type="text" name="nama_course" class="rounded"
            value="{{ old('nama_course', $sub_course->nama_course) }}" required> --}}

            <br>
            <x-input-field name="link_video" label="Link Video" type="url" :value="$sub_course->link_video" />
            {{-- <label for="link_video" class="text-sm font-semibold">Link Video</label>
            <input type="url" name="link_video" class="rounded"
                value="{{ old('link_video', $sub_course->link_video) }}"> --}}

            <br>
            <label for="Deskripsi" class="text-sm font-semibold">Deskripsi</label>
            <textarea name="description" class="rounded">{{ old('description', $sub_course->description) }}</textarea><br>

            <x-elevated-button buttonText="Simpan" />
            {{-- <button type="submit"
                class="bg-red-400 hover:bg-blue-700 dark:text-white font-bold py-2 px-4 rounded">Simpan</button> --}}
        </form>
    </div>
@endsection
